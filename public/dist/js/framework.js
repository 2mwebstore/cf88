window.addEventListener('popstate', (event) => {
    loadUrl(location.pathname);
});

const loadUrl = async (url, eventTarget) => {
    //Reset appdata.fileManager.mainContent
    appdata.fileManager.mainContent = {}

    // Check if the current URL is different from the requested URL
    if (window.location.pathname !== url) {
        window.history.pushState({}, '', url);
    }

    // Update canonical and og:url meta tags with special handling for /home
    const baseUrl = url === '/home' ? '/' : url;
    updateMetaTags({
        canonical: `https://gofile.io${baseUrl}`,
        ogUrl: `${window.location.origin}${baseUrl}`
    });

    const parts = getUrlParts();

    if (parts.length === 0) {
        await loadUrl('/home');
    } else if (['login', 'myprofile', 'myfiles', 'd', 'contact'].includes(parts[0])) {
        await executeSpecificCode(parts, eventTarget);
    } else {
        await loadPage(parts[0]);
    }
};

const loadPage = async (part) => {
    //This function do not propagate error in catch, because it does manage the error behavior internally
    const mainElement = document.querySelector('#index_main');
    mainElement.innerHTML = `
        <div class="w-full h-full flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
        </div>
    `;

    try {
        const response = await fetch(`/contents/${part}.html`);
        if (!response.ok) throw new Error(`Error ${response.status}: ${response.statusText}`);
        const data = await response.text();
        mainElement.innerHTML = data;
    } catch (error) {
        mainElement.innerHTML = `
            <div class="w-full h-full flex flex-col items-center justify-center p-4 text-center bg-gray-800 text-white">
                <i class="fas fa-exclamation-triangle text-red-500 text-6xl"></i>
                <p class="mt-4 text-xl font-semibold">Oops! Something went wrong.</p>
                <p class="text-gray-400 mt-2">${error.message}</p>
            </div>
        `;
    }
    initPopover();
};

const executeSpecificCode = async (parts, eventTarget) => {
    const mainElement = document.querySelector('#index_content main');
    try {
        switch (parts[0]) {
            case 'login':
                if (parts[1]) {
                    createAlert('loading', 'Fetching account details...');
                    try {
                        const result = await getAccountByTokenAndSync(parts[1]);
                        closePopup();
                        createAlert('success', `Logged in successfully as <span class="font-bold">${result}</span>.`);
                        setAccountActive(result);
                        loadUrl("/myprofile");
                    } catch (error) {
                        throw new Error("executeSpecificCode " + error.message);
                    }
                } else {
                    loadPage('home');
                    openAddAccountWindow();
                }
                break;
            case 'myprofile':
                if (eventTarget) {
                    var account_accountItem = eventTarget.closest('.account_accountItem');
                    if (account_accountItem) {
                        var email = account_accountItem.getAttribute('data-email');
                        setAccountActive(email);
                    }
                }
                await loadPage('myprofile');
                await initProfilePage();
                break;

            case 'myfiles':
                if (eventTarget && eventTarget.closest('.account_accountItem')) {
                    var email = eventTarget.closest('.account_accountItem').getAttribute('data-email');
                    setAccountActive(email);
                }
                var account = await getAccountActive();
                //We force a replaceState here to avoid issue using the back history to /myfiles that will always redirect to /d/
                // window.history.replaceState({}, '', '/d/' + account.rootFolder);
                // loadUrl('/d/' + account.rootFolder);
                // // loadUrl('/');
                // await loadUrl('filemanager');
                await loadPage('filemanager');
                await setContentToMainContent('a4e1d661-5e0b-4594-93f9-290ccb496188', appdata.fileManager.contentFilter, pageValue, 1000, appdata.fileManager.sortField, appdata.fileManager.sortDirection)
                initFilemanager();
                updateFileManagerMetaTags();
                break;
            case 'd':
                try {
                    const urlParams = new URLSearchParams(window.location.search);
                    var pageValue = parseInt(urlParams.get('page'));
                    var filterValue = urlParams.get('filter');

                    if (isNaN(pageValue)) {
                        pageValue = 1;
                    }

                    closePopup()
                    appdata.fileManager.contentFilter = filterValue || ""; // Use filter value if exists, empty string if not
                    await loadPage('filemanager');
                    await setContentToMainContent('a4e1d661-5e0b-4594-93f9-290ccb496188', appdata.fileManager.contentFilter, pageValue, 1000, appdata.fileManager.sortField, appdata.fileManager.sortDirection)
                    initFilemanager();
                    updateFileManagerMetaTags();
                } catch (error) {
                    // loadUrl("/");
                    // await loadPage('filemanager');
                    // throw new Error("executeSpecificCode " + error.message);
                }
                break;
            case 'contact':
                await loadPage('contact');
                await initContactPage();
                break;
            default:
                mainElement.innerHTML = `<p>Unknown path: ${parts[0]}/${parts.slice(1).join('/')}</p>`;
        }
    } catch (error) {
        createAlert('error', error.message);
    }
};

const updateMetaTags = (options = {}) => {
    const {
        title,
        description,
        keywords,
        canonical,
        ogTitle,
        ogDescription,
        ogUrl,
        ogImage
    } = options;

    // Update regular meta tags
    if (title) {
        document.title = title;
    }

    const updateTag = (selector, content) => {
        if (content) {
            const element = document.querySelector(selector);
            if (element) {
                element.setAttribute('content', content);
            }
        }
    };

    updateTag('meta[name="description"]', description);
    updateTag('meta[name="keywords"]', keywords);

    // Update Open Graph tags
    updateTag('meta[property="og:title"]', ogTitle || title);
    updateTag('meta[property="og:description"]', ogDescription || description);
    updateTag('meta[property="og:url"]', ogUrl);
    updateTag('meta[property="og:image"]', ogImage);

    // Update canonical URL
    if (canonical) {
        let canonicalLink = document.querySelector('link[rel="canonical"]');
        if (canonicalLink) {
            canonicalLink.setAttribute('href', canonical);
        }
    }
};

const updateFileManagerMetaTags = () => {
    const content = appdata.fileManager.mainContent;
    let ogTitle, ogDescription;

    // Handle error case - folder not found
    if (content.status === 'error-notFound') {
        ogTitle = 'Folder not found';
        ogDescription = 'The requested folder does not exist or has been deleted.';
        return updateMetaTags({
            ogTitle,
            ogDescription
        });
    }

    // Handle other cases where content.data exists
    if (content.status === 'ok') {
        const folderData = content.data;

        // Handle case where user cannot access the folder
        if (!folderData.canAccess) {
            ogTitle = 'Protected Content';
            ogDescription = 'This content requires special permissions to access.';
            return updateMetaTags({
                ogTitle,
                ogDescription
            });
        }

        // Handle empty folder
        if (folderData.childrenCount === 0) {
            ogTitle = `Folder ${folderData.name}`;
            ogDescription = 'This folder is empty.';
            return updateMetaTags({
                ogTitle,
                ogDescription
            });
        }

        // Handle multiple files
        if (folderData.childrenCount > 1) {
            ogTitle = `Folder ${folderData.name}`;
            ogDescription = `${folderData.childrenCount} files`;
            return updateMetaTags({
                ogTitle,
                ogDescription
            });
        }

        // Handle single file
        if (folderData.childrenCount === 1) {
            const file = Object.values(folderData.children)[0];
            ogTitle = `${file.name}`;
            ogDescription = `${humanFileSize(file.size, true)}`;
            return updateMetaTags({
                ogTitle,
                ogDescription
            });
        }
    }
};