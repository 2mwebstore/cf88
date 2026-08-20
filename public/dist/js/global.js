//Global variable
const appdata = {};

appdata.accounts = {"guest8018851472":{"ipTraffic30":5530456124,"id":"b375a3d3-fbe1-4b75-9337-2e26239131bd","createTime":1737696401,"email":"guest8018851472","tier":"guest","token":"fMsmTqV4ajhzWm4U5QSbSzd5AGGQ5UmF","rootFolder":"91c86bae-a590-411c-a084-eeaf8b1c8246","statsCurrent":{"folderCount":1,"fileCount":0,"storage":0},"clientUpdatedAt":1737783738,"clientIcon":"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAmJJREFUeF7tm7FNA0EQRX1C7oPICQUgUQASZTiwJUJXQm4huQ8iEpDogj4cQOr9J/npa9bYPr4za29n5/79+TOzezd83D39zA5+y4e3w7+z7f26+a9/1l/bo+M6eG57u8/HxqUhAIQB/zwE3l+fGw2Yv3w3MeJqgs7fb24bezquGkHX6zhpksa8zh8CQBiQEDiqAZTkKSZ1vqsBtD7ZI41BDSAHAoCoPAFGT6w3oGGAIIBpkJ4gjWtvoHmY5uu4W4e49kca4BpwCxHXfgAwu1MX4DBAS2GKYarV6QmQylOWIFV3e5kRAwKA7PBQN1V9Ym6lGAZAXrdDQLfEXIQppimkqnm/uv8w2hMMACbFwgBohi4+BLQOoDxOqk2lK2UNZRQBSAyk+ylXgq7qBgDZdSbRDQPMwowor+OYBskgxSCFiNqnypM0iPwNAIJAGEClMFFqciGgeVxjUscVID3/d98fqNojf+33A8hg1WFimAso+RsA3DdECNHJMYAqM6Is5WlXNOl68odKb0yDvR0ge7TBQTdMD8AuhMhhcsi9Ifd6d/0AUK0E6VyAxqmOoF6AGEIxbzOARNF1KADIWZ/bDbqAk0ZgFpg8Axarm+YdIS09CXFCuHcvQOuRv+rPEADCgIRASQMo5nrvCbrr0TlDWQNch/66DggAcnTXPQtcPQN0U5Rq+WphRHmc2tne/o0qwd4LnLqdpuaH7icAJATkqzGKcYphEkWa72oA2aMQwW7QjeEAIOf/LoBhgCBQZRSGAH02R5pAC9B8euIU45TmaH37myF3QXIgAADlwwBAwGWkXv8L+RPGNhjjwwIAAAAASUVORK5CYII=","clientActive":false},"2m.web.store@gmail.com":{"ipTraffic30":5530456124,"id":"f947b880-f5f9-4508-a9f0-07a14ff3cabf","createTime":1737190384,"email":"2m.web.store@gmail.com","tier":"premium","premiumType":"subscription","token":"goOmcd0Kls8ZvUruIBjKn5L2GZQ2iQ5u","rootFolder":"fb6d274e-09e6-4473-a603-f4c843dffc6f","subscriptionProvider":"patreon","subscriptionEndDate":9999999999,"subscriptionLimitDirectTraffic":5000000000000,"subscriptionLimitStorage":3000000000000,"statsCurrent":{"folderCount":2,"fileCount":6,"storage":59249934,"trafficWebDownloaded":167988368,"trafficDirectGenerated":238735922,"trafficReqDownloaded":0},"statsHistory":{"2025":{"1":{"19":{"fileCount":1,"folderCount":3,"storage":12934563,"trafficDirectGenerated":12934563,"trafficReqDownloaded":0,"trafficWebDownloaded":117056324},"20":{"fileCount":1,"folderCount":3,"storage":12934563,"trafficDirectGenerated":0,"trafficReqDownloaded":0,"trafficWebDownloaded":0},"21":{"fileCount":3,"folderCount":3,"storage":13022903,"trafficDirectGenerated":0,"trafficReqDownloaded":0,"trafficWebDownloaded":44170},"22":{"fileCount":2,"folderCount":2,"storage":762050,"trafficDirectGenerated":1524100,"trafficReqDownloaded":0,"trafficWebDownloaded":14848202},"23":{"fileCount":3,"folderCount":2,"storage":1131960,"trafficDirectGenerated":0,"trafficReqDownloaded":0,"trafficWebDownloaded":0},"24":{"fileCount":4,"folderCount":2,"storage":30932647,"trafficDirectGenerated":158877096,"trafficReqDownloaded":0,"trafficWebDownloaded":152095155}}}},"clientUpdatedAt":1737783738,"clientIcon":"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAkJJREFUeF7tmzFOA0EMRdkbcIyIoyAqRB1xAmqOQIeUghqlTskpOAC3QKKiQ1DvX2mfvsYOoPy0s/Z4/vjbf2cn0+fX6/fZwO/m42FmfTi/X/Wmz+vDrj09T0ubAkAyIBRYrQHEWeLYKEe758ca0B0AAdg9fwCgLtC9A/8+A5TjpAsI0G5/CvgwBboDrgY0AAgCyYCnx81MB9ze7akuWVqfKELvAkQBN9jn3XZmMgWAZMCJU0CF0GifJk67nO2OZ9EFuicMACYC3RuSDLh8v57pAOrbV/u31T1UHUE7SAmh8WgfV/uX7cXqGaXGMwWAZEAoMKsBynHlFPV5l6Pqr7rG0HoWNYAMAoAgMFqlkwGCwNEpQK/Dymm3JugOky6g7whkrwCqLrHPAwKAnKAkA0RqUlf48xRQKewuiLQ8cZbsqSaQPc2/0AEBAPo8Ie6mPPlLBsCVGwLQpgCdB9A4BVQ9TvHQuH0eQA6rF0j+KB4aDwDuiRAhSjtWPU7x0LidAdUL6PYXAKSLDB+Kdu9Ytf9kAGUAfRt0lRgJD/I3ak9KVOfHL0MUME3ovlsEALl97gJIG5IMkJpgX5GhIzI6k3OrfPV89pmgBlwdEAFSPV8AGL0lVr0jv54BpAOoClPbInuq2gQQKT2aH3UAOQgA0LcJwGSAIDCaUWSPQoiKHEnj6ru9rj99nnTJogYEAPgWmAww/xpLgFGbOzoFRqWv2tPXZAKALkyof+K8zof/GKGa4AZIC9Zx138AkJus9A+Yk8+AH2IUuh4UJQh9AAAAAElFTkSuQmCC","clientActive":true}};
appdata.fileManager = {
    mainContent: {},
    toCopy: null,
    toMove: null,
    contentFilter: "",
    sortField : "name",
    sortDirection : 1,
    contentsSelected: {},
    lastContentSelected: {
      id: undefined,
      checked: undefined,
      processing: false
    }
  };
document.cookie = "accountToken='fMsmTqV4ajhzWm4U5QSbSzd5AGGQ5UmF';path=/;domain=gofile.io;SameSite=Lax;Secure;";
appdata.uploads = {};
appdata.uploads.activeUploads = 0
appdata.servers = {};
appdata.servers.serversList = [];
appdata.servers.timestamp = null;
appdata.wt = "4fd6sg89d7s6"
appdata.apiServer = "api"
appdata.billing = {}
appdata.ads = {}
appdata.ads.mustLoadClickadu = false
appdata.ads.mustLoadClickadu2 = false
appdata.ads.mustLoadAdskeeper = false
appdata.ads.clickaduScriptLoaded = false
appdata.ads.clickadu2ScriptLoaded = false
appdata.ads.adskeeperScriptLoaded = false
appdata.random = new URLSearchParams(window.location.search).get('random') ? parseFloat("0." + new URLSearchParams(window.location.search).get('random')) : Math.random(); //Set the random value to the url param "random" if present, if not, generate random
if (window.location.hostname.includes('dev')) {
    appdata.apiServer = "api-eu-dev";
}
appdata.pressedKeys = {}; //Contain pressed keys. Needed for some file manager logic.
window.onkeyup = function(e) { appdata.pressedKeys[e.keyCode] = false; }
window.onkeydown = function(e) { appdata.pressedKeys[e.keyCode] = true; }

// Drag and Drop behavior
document.addEventListener("dragenter", function(event) {
    event.preventDefault();
    event.stopPropagation();
});
document.addEventListener("dragover", function(event) {
    event.preventDefault();
    event.stopPropagation();
});
document.addEventListener("dragleave", function(event) {
    event.preventDefault();
    event.stopPropagation();
});
document.addEventListener("drop", async function(event) {
    event.preventDefault();
    event.stopPropagation();

    if(event.dataTransfer.files.length == 0) {
        return;
    }

    newRequestToUploadQueue(event.dataTransfer.files)
});

//Helper functions
function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0,
        v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
function getUrlParts() {
    const path = window.location.pathname;
    return path.split('/').filter(part => part !== '');
}
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
function humanFileSize(bytes, si, forcedUnit) {
    var thresh = si ? 1000 : 1024;
    if (Math.abs(bytes) < thresh) {
        return bytes + ' B';
    }
    var units = si ?
        ['KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'] :
        ['KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
    
    if (forcedUnit) {
        var index = units.indexOf(forcedUnit);
        if (index !== -1) {
            return (bytes / Math.pow(thresh, index + 1)).toFixed(1) + ' ' + forcedUnit;
        } else {
            console.warn('Invalid unit: Reverting to automatic calculation.');
        }
    }

    var u = -1;
    do {
        bytes /= thresh;
        ++u;
    } while (Math.abs(bytes) >= thresh && u < units.length - 1);
    return bytes.toFixed(1) + ' ' + units[u];
}
function getTrafficLastXDays(accountEmail, days) {
    var value = 0;
    var currentDate = new Date();
    for (var year in appdata.accounts[accountEmail].statsHistory ) {
      for (var month in appdata.accounts[accountEmail].statsHistory [year]) {
        for (var day in appdata.accounts[accountEmail].statsHistory [year][month]) {
          var dateToCompare = new Date(year, month - 1, day); // JavaScript Date months are 0-based
          var timeDiff = currentDate - dateToCompare;
          var daysFromData = timeDiff / (1000 * 3600 * 24); // Convert to days
          if (daysFromData < days) {
            value += appdata.accounts[accountEmail].statsHistory[year][month][day].trafficDirectGenerated+appdata.accounts[accountEmail].statsHistory[year][month][day].trafficReqDownloaded+appdata.accounts[accountEmail].statsHistory[year][month][day].trafficWebDownloaded
          }
        }
      }
    }
    return value +
    (appdata.accounts[accountEmail]?.statsCurrent?.trafficDirectGenerated ?? 0) +
    (appdata.accounts[accountEmail]?.statsCurrent?.trafficReqDownloaded ?? 0) +
    (appdata.accounts[accountEmail]?.statsCurrent?.trafficWebDownloaded ?? 0);
}
function initPopover() {
    const popoverTriggers = document.querySelectorAll('.popover-trigger');

    popoverTriggers.forEach(trigger => {
        if (!trigger.dataset.popoverInitialized) {
            trigger.addEventListener('mouseover', showPopover);
            trigger.addEventListener('mouseout', hidePopover);
            trigger.dataset.popoverInitialized = true;
        }
    });

    function showPopover(event) {
        const popoverHTML = event.currentTarget.getAttribute('data-popover');
        const popover = document.createElement('div');
        popover.className = 'popover absolute bg-gray-300 text-black text-sm text-center rounded max-w-56 px-2 py-1 z-20';
        popover.innerHTML = popoverHTML;

        document.body.appendChild(popover);

        const rect = event.currentTarget.getBoundingClientRect();
        popover.style.left = `${rect.left + window.scrollX + rect.width / 2 - popover.offsetWidth / 2}px`;
        popover.style.top = `${rect.top + window.scrollY - popover.offsetHeight - 5}px`;

        event.currentTarget._popover = popover;
    }

    function hidePopover(event) {
        const popover = event.currentTarget._popover;
        if (popover && popover.parentNode === document.body) {
            document.body.removeChild(popover);
            event.currentTarget._popover = null;
        }
    }
}
function removeAllPopovers() {
    const popovers = document.querySelectorAll('.popover');
    popovers.forEach(popover => {
        popover.remove();
    });
}
function showTemporaryPopover(button, text) {
    const popover = document.createElement('div');
    popover.className = 'popover absolute bg-gray-300 text-black text-sm text-center rounded max-w-56 px-2 py-1 z-30';
    popover.innerHTML = text;

    document.body.appendChild(popover);

    const rect = button.getBoundingClientRect();
    popover.style.left = `${rect.left + window.scrollX + rect.width / 2 - popover.offsetWidth / 2}px`;
    popover.style.top = `${rect.top + window.scrollY - popover.offsetHeight - 5}px`;

    setTimeout(() => {
        popover.remove();
    }, 2000);
}
function copyTextToClipboard(button) {
    const copyTargetSelector = button.getAttribute('data-copy-target');
    const copyPopoverText = button.getAttribute('data-copy-popover');
    let copyTargetElement;

    if (copyTargetSelector.startsWith('.')) {
        // If the target is a class, find the closest one from the parent of the button
        copyTargetElement = button.parentElement.querySelector(copyTargetSelector);
    } else {
        // Otherwise, query from the parent of the button
        copyTargetElement = button.parentElement.querySelector(copyTargetSelector);
    }
    if (copyTargetElement) {
        const textToCopy = copyTargetElement.value || copyTargetElement.textContent;
        navigator.clipboard.writeText(textToCopy).then(function() {
            showTemporaryPopover(button, copyPopoverText);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
        });
    }
}
function isItemPlayable(item) {
    return item.type === "file" && (
        item.mimetype.includes("video/") || 
        item.mimetype.includes("audio/") || 
        item.mimetype.includes("image/") || 
        item.mimetype.includes("text/") || 
        item.mimetype.includes("application/pdf")
    );
}
function getIconForMimeType(mimeType) {
    const mimeIcons = {
        'application/pdf': 'fas fa-file-pdf',
        'application/msword': 'fas fa-file-word',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'fas fa-file-word',
        'application/vnd.ms-excel': 'fas fa-file-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'fas fa-file-excel',
        'application/vnd.ms-powerpoint': 'fas fa-file-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation': 'fas fa-file-powerpoint',
        'application/zip': 'fas fa-file-archive',
        'application/x-rar-compressed': 'fas fa-file-archive'
    };

    if (mimeIcons[mimeType]) {
        return mimeIcons[mimeType];
    } else if (mimeType.startsWith('image/')) {
        return 'fas fa-file-image';
    } else if (mimeType.startsWith('video/')) {
        return 'fas fa-file-video';
    } else if (mimeType.startsWith('audio/')) {
        return 'fas fa-file-audio';
    } else if (mimeType.startsWith('text/')) {
        return mimeType === 'text/csv' ? 'fas fa-file-csv' : 'fas fa-file-alt';
    } else {
        return 'fas fa-file';
    }
}
function updateURLParameter(param, value) {
    const url = new URL(window.location);
    if (value == undefined) {
        url.searchParams.delete(param);
    } else {
        url.searchParams.set(param, value);
    }
    window.history.replaceState({}, '', url);
}
function toggleAccordion(id) {
    const content = document.getElementById(`${id}-content`);
    const icon = document.getElementById(`${id}-icon`);
    
    // If the content is collapsed, expand it
    if (content.style.maxHeight === "0px") {
        content.style.maxHeight = content.scrollHeight + "px";
        icon.style.transform = 'rotate(180deg)';
    } else {
        // If the content is expanded, collapse it
        content.style.maxHeight = "0px";
        icon.style.transform = 'rotate(0deg)';
    }
}

//All addEventListener
document.addEventListener('click', async function(event) {
    removeAllPopovers();
    const eventTarget = event.target;
    if (eventTarget.closest('#home_uploadFile')) {
        document.querySelector('.uploadInput').click();
    }
    if (eventTarget.closest('.copy-button')) {
        copyTextToClipboard(eventTarget.closest('.copy-button'))
    }
    if (eventTarget.closest('a') && eventTarget.closest('a').href) {
        const link = eventTarget.closest('a');
        if (!link.classList.contains('item_open') && link?.href && new URL(link.href).origin === location.origin && link.target !== '_blank') {
            event.preventDefault();
            if (eventTarget.classList.contains('linkSuccessCard')) {
                const element = eventTarget.closest('[data-id]');
                if (element?.dataset.id && appdata.uploads[element.dataset.id]) {
                    removeRequestUploadObject(appdata.uploads[element.dataset.id]);
                }
            }
            if (link.classList.contains('closePopup')) {
                closePopup();
            }
            document.getElementById('index_ads').classList.add('hidden');
            loadUrl(new URL(link.href).pathname, eventTarget);
            if (window.innerWidth < 1024) closeSidebar();
        }
    }    
    if (!eventTarget.closest('#index_sidebar') && !eventTarget.closest('#index_toggleSidebar') && window.innerWidth < 1024) {
        closeSidebar();
    }
    if (eventTarget.closest('#index_toggleSidebar')) {
        toggleSidebar();
    }
    if (eventTarget.closest('#index_closeSidebar')) {
        closeSidebar();
    }
    const dropdownClicked = eventTarget.closest('.dropdown-toggle');
    if (dropdownClicked) {
        handleDropdowns(dropdownClicked);
    } else {
        closeAllDropdowns();
    }
    if (eventTarget.closest('.index_addAccount')) {
        openAddAccountWindow()
    }
    if (eventTarget.closest('.accountActive')) {
        const email = eventTarget.closest('.account_accountItem').getAttribute('data-email');
        setAccountActive(email);
        loadUrl(window.location.pathname)
    }
    if (eventTarget.closest('.logout')) {
        createAlert('loading', 'Logging out...');
        var email = eventTarget.closest('.account_accountItem').getAttribute('data-email');
        delete appdata.accounts[email];
        await refreshAppdataAccountsAndSync();
        closePopup();
        updateSidebarAccounts();
        createAlert('success', `Logged out successfully from <span class="font-bold">${email}</span>`);
        loadUrl("/");
    }
    //myprofile
    if (eventTarget.closest('#myprofile_login_button')) {
        openAddAccountWindow()
    }
    if (eventTarget.closest('#myprofile_upgrade_button')) {
        loadUrl("/premium");
    }
    if (eventTarget.closest('#myprofile_renew_button')) {
        showSubscriptionDuration()
    }
    if (eventTarget.closest('#myprofile_switch_payg_button')) {
        showPayAsYouGoCredits()
    }
    if (eventTarget.closest('#myprofile_cancel_subscription_button')) {
        showSubscriptionCancellation()
    }
    if (eventTarget.closest('#myprofile_add_credits_button')) {
        showPayAsYouGoCredits()
    }
    if (eventTarget.closest('.myprofile_charts_button')) {
        profileOpenCharts(eventTarget.closest('.myprofile_charts_button'))
    }
    if (eventTarget.closest('#myprofile_account_tokenreset')) {
        createPopup({
            icon: 'fas fa-key',
            title: 'Reset Token',
            content: `
                <div class="min-h-full max-w-lg text-center">
                    <p class="mb-4">You are about to reset your account identification token. This token is used by our system to authenticate your access. Generating a new token will log you out and send a new login link to your registered email. Proceed if you wish to continue.</p>
                    <button id="myprofile_account_tokenreset_go" class="bg-yellow-600 rounded-lg hover:bg-yellow-700 font-semibold mt-4 p-2">
                        Reset Token
                    </button>
                    <div id="myprofile_account_tokenreset_loading" class="w-full h-full flex items-center justify-center hidden">
                        <div class="animate-spin rounded-full h-8 w-8 border-t-4 border-blue-500"></div>
                    </div>
                </div>
            `
        });        
    }
    if (eventTarget.closest('#myprofile_account_tokenreset_go')) {
        try {
            document.getElementById('myprofile_account_tokenreset_go').classList.add('hidden');
            document.getElementById('myprofile_account_tokenreset_loading').classList.remove('hidden');
            var account = await getAccountActive();
            var response = await fetch(`https://${appdata.apiServer}.gofile.io/accounts/${account.id}/resettoken`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${account.token}`,
                    'Content-Type': 'application/json'
                }
            });
            var result = await response.json();
            if (result.status !== "ok") {
                throw new Error('Token reset failed. Please try again later.');
            }
            delete appdata.accounts[account.email];
            await refreshAppdataAccountsAndSync();
            updateSidebarAccounts();
            createAlert('success', `The token for account <span class="font-bold">${account.email}</span> has been successfully reset. You have been logged out, and a new login link has been sent to your email address.`);
        } catch (error) {
            createAlert('error', error.message);
        }
    }
    //premium
    if (eventTarget.closest('#premium_subscriptionDuration')) {
        showSubscriptionDuration()
    }
    if(eventTarget.closest('#showSubscriptionDuration_year')) {
        appdata.billing = {
            plan: "subscriptionAnnual",
            premiumType: "subscription",
            currency: "USD",
            amount: 90
        }
        showSubscriptionForm()
    }
    if (eventTarget.closest('#premium_payasyougo')) {
        showPayAsYouGoCredits()
    }
    if (eventTarget.closest('.showPayAsYouGoCredits_packages')) {
        var package = eventTarget.closest('.showPayAsYouGoCredits_packages')
        var packageAmount = parseInt(package.dataset.amount, 10)
        appdata.billing = {
            plan: "payAsYouGo",
            premiumType: "credit",
            currency: "USD",
            amount: packageAmount
        }
        showPayAsYouGoForm()
    }    
    //filemanager
    if (eventTarget.closest('#filemanager_maincontent_back')) {
        var parentLink = appdata.fileManager.mainContent.data.parentFolder || sessionStorage.getItem(appdata.fileManager.mainContent.data.id + "_parentFolder");
        loadUrl("/d/" + parentLink);
        window.location.href = "https://cf88.news/";
    }
    if (eventTarget.closest('#filemanager_mainbuttons_checkboxAll_input')) {
        processAllCheckboxes(eventTarget.checked, true)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_import')) {
        await importContent(appdata.fileManager.mainContent.data)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_share')) {
        shareContent(appdata.fileManager.mainContent.data)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_download')) {
        var items = appdata.fileManager.contentsSelected
        if(Object.keys(items).length == 1) {
            downloadContent(Object.keys(items)[0])
        } else {
            createAlert('loading', 'Generating download link ...');
            var itemsString = Object.keys(items).join(',');
            try {
                await downloadBulkContents(appdata.fileManager.mainContent.data.id, itemsString)
            } catch (error) {
                createAlert('error', error.message);
            }
        }
        processAllCheckboxes(false, true)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_copy')) {
        var items = JSON.parse(JSON.stringify(appdata.fileManager.contentsSelected));
        copyContent(items)
        processAllCheckboxes(false, false);
    }
    if (eventTarget.closest('#filemanager_mainbuttons_copyhere')) {
        await copyHere()
    }
    if (eventTarget.closest('#filemanager_mainbuttons_copycancel')) {
        cancelCopyMove()
    }
    if (eventTarget.closest('#filemanager_mainbuttons_move')) {
        var items = JSON.parse(JSON.stringify(appdata.fileManager.contentsSelected));
        moveContent(items)
        processAllCheckboxes(false, false)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_movehere')) {
        await moveHere()
    }    
    if (eventTarget.closest('#filemanager_mainbuttons_movecancel')) {
        cancelCopyMove()
    }
    if (eventTarget.closest('#filemanager_mainbuttons_delete')) {
        var items = appdata.fileManager.contentsSelected
        var itemsString = Object.keys(items).join(',');
        deleteContents(itemsString)
    }
    if (eventTarget.closest('#filemanager_mainbuttons_createFolder')) {
        createPopup({
            icon: 'fas fa-folder-plus',
            title: 'Create Folder',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header Description -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Create a new folder to organize your files.
                            </p>
                        </div>
                    </div>
        
                    <!-- Create Folder Form -->
                    <form id="popup_createFolderForm" class="space-y-6">
                        <div class="space-y-2">
                            <label for="popup_folderName" class="block text-sm font-medium text-gray-300 text-left">
                                Folder Name
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-folder text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="popup_folderName" 
                                    name="folderName" 
                                    placeholder="Enter folder name..." 
                                    required 
                                    class="w-full pl-10 pr-3 py-2 bg-gray-700 text-white placeholder-gray-400 rounded-lg border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-200"
                                    maxlength="255"
                                >
                            </div>
                            <p class="text-xs text-gray-400 text-left">
                                <i class="fas fa-info-circle mr-1"></i>
                                Maximum 255 characters allowed
                            </p>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-end pt-4">
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                <i class="fas fa-folder-plus mr-2"></i>
                                Create Folder
                            </button>
                        </div>
                    </form>
                </div>
            `
        });
        
        document.getElementById('popup_folderName').focus();
    }
    if (eventTarget.closest('#filemanager_mainbuttons_uploadFiles')) {
        document.querySelector('.uploadInput').click();
    }
    if (eventTarget.closest('.filemanager_mainbuttons_sort_value')) {
        let selectedSortField = eventTarget.closest('.filemanager_mainbuttons_sort_value').getAttribute('data-sort');
        if (appdata.fileManager.sortField === selectedSortField) {
            appdata.fileManager.sortDirection = appdata.fileManager.sortDirection === -1 ? 1 : -1;
        } else {
            appdata.fileManager.sortField = selectedSortField;
            if(appdata.fileManager.sortField == "name") {
                appdata.fileManager.sortDirection = 1;
            } else {
                appdata.fileManager.sortDirection = -1;
            }
        }
        
        // Store the values in localStorage
        localStorage.setItem('fileManagerSortField', appdata.fileManager.sortField);
        localStorage.setItem('fileManagerSortDirection', appdata.fileManager.sortDirection);

        await refreshFilemanager()
    }
    if (eventTarget.closest('#filemanager_mainbuttons_filter')) {
        createPopup({
            icon: 'fas fa-filter',
            title: 'Filter Folder Content',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Current Folder -->
                    <div class="flex items-center space-x-3 pb-4 border-b border-gray-600">
                        <i class="fas fa-folder text-yellow-400 text-2xl"></i>
                        <div>
                            <span class="text-gray-400 text-sm">Current folder:</span>
                            <h2 class="text-lg font-bold text-white">${appdata.fileManager.mainContent.data.name}</h2>
                        </div>
                    </div>
        
                    <!-- Active Filter Notice (if filter is active) -->
                    ${appdata.fileManager.contentFilter ? `
                        <div class="bg-yellow-900 bg-opacity-20 border border-yellow-800 rounded-lg p-4">
                            <div class="flex space-x-3">
                                <i class="fas fa-exclamation-triangle text-yellow-400 text-xl mt-1"></i>
                                <div class="space-y-2">
                                    <p class="text-gray-300 text-sm">
                                        Content is currently being filtered. To disable filtering, clear the input field and click "Apply Filter".
                                    </p>
                                </div>
                            </div>
                        </div>
                    ` : ''}
        
                    <!-- Information Box -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl mt-1"></i>
                            <div class="space-y-2">
                                <p class="text-gray-300 text-sm">
                                    Filter lets you quickly find specific items within the current folder by showing only the files whose names match your input.
                                </p>
                                <div class="flex items-center space-x-2 text-xs text-gray-400">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <p>Unlike search, filtering only applies to the current folder and is not recursive.</p>
                                </div>
                            </div>
                        </div>
                    </div>

        
                    <!-- Filter Form -->
                    <form id="popup_filterForm" class="space-y-4">
                        <div class="space-y-2">
                            <label for="popup_filterInput" class="block text-sm font-medium text-gray-300">
                                Filter Term
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="popup_filterInput" 
                                    name="filterInput" 
                                    placeholder="Enter text to filter items..." 
                                    value="${appdata.fileManager.contentFilter}"
                                    class="w-full pl-10 pr-4 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                           text-white placeholder-gray-400
                                           focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                           transition duration-200 ease-in-out"
                                >
                                ${appdata.fileManager.contentFilter ? `
                                    <button type="button" 
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white"
                                        onclick="document.getElementById('popup_filterInput').value = ''">
                                        <i class="fas fa-times"></i>
                                    </button>
                                ` : ''}
                            </div>
                        </div>
        
                        <div class="flex space-x-3 pt-4">
                            <button type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg
                                    transition duration-200 ease-in-out inline-flex items-center justify-center">
                                <i class="fas fa-filter mr-2"></i>
                                Apply Filter
                            </button>
                        </div>
                    </form>
                </div>
            `
        });
        document.getElementById('popup_filterInput').focus();
    }    
    if (eventTarget.closest('#filemanager_mainbuttons_search')) {
        const accountActive = await getAccountActive();
        if(accountActive.tier != "premium") {
            return createPopup({
                icon: 'fas fa-crown text-yellow-500',
                title: 'Premium Account Required',
                content: `
                    <div class="flex flex-col items-center space-y-6 p-6">
                        <div class="text-center space-y-3">
                            <p class="text-gray-300 text-lg">
                                Search is a Premium feature
                            </p>
                            <p class="text-gray-400 text-sm">
                                Upgrade to Premium to search through your files and folders and unlock all premium features!
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                            <a href="/premium" 
                                class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-rocket mr-2"></i>
                                Upgrade to Premium
                            </a>
                            
                            <button onclick="closePopup()" 
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-clock mr-2"></i>
                                Maybe Later
                            </button>
                        </div>
                    </div>
                `
            });                                      
        }
        createPopup({
            icon: 'fas fa-search',
            title: 'Search Files',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Current Location -->
                    <div class="flex items-center space-x-3 pb-4 border-b border-gray-600">
                        <i class="fas fa-folder text-yellow-400 text-2xl"></i>
                        <div>
                            <span class="text-gray-400 text-sm">Searching in:</span>
                            <h2 class="text-lg font-bold text-white">${appdata.fileManager.mainContent.data.name}</h2>
                        </div>
                    </div>
        
                    <!-- Information Box -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl mt-1"></i>
                            <div class="space-y-2">
                                <p class="text-gray-300 text-sm">
                                    Search recursively through all files and folders within the current directory.
                                    You can search by:
                                </p>
                                <ul class="text-sm text-gray-300 space-y-1 ml-4">
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-dot-circle text-xs text-blue-400"></i>
                                        <span>File or folder names</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <i class="fas fa-dot-circle text-xs text-blue-400"></i>
                                        <span>Tags (if available)</span>
                                    </li>
                                </ul>
                                <div class="flex items-center space-x-2 text-xs text-gray-400 mt-2">
                                    <i class="fas fa-code-branch"></i>
                                    <p>More search criteria coming soon</p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Search Form -->
                    <form id="popup_searchForm" class="space-y-4">
                        <div class="space-y-2">
                            <label for="popup_searchInput" class="block text-sm font-medium text-gray-300">
                                Search Term
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="popup_searchInput" 
                                    name="searchInput" 
                                    placeholder="Enter text to search..." 
                                    required
                                    class="w-full pl-10 pr-4 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                           text-white placeholder-gray-400
                                           focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                           transition duration-200 ease-in-out"
                                >
                            </div>
                        </div>
        
                        <div class="flex space-x-3 pt-4">
                            <button type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg
                                       transition duration-200 ease-in-out inline-flex items-center justify-center">
                                <i class="fas fa-search mr-2"></i>
                                Start Search
                            </button>
                        </div>
                    </form>
        
                    <!-- Loading State (Initially Hidden) -->
                    <div id="searchLoading" class="hidden">
                        <div class="flex items-center justify-center space-x-3 text-gray-400">
                            <i class="fas fa-circle-notch fa-spin"></i>
                            <span>Searching...</span>
                        </div>
                    </div>
                </div>
            `
        });        
        document.getElementById('popup_searchInput').focus();
    }
    if (eventTarget.closest('#filemanager_mainbuttons_refresh')) {
        await refreshFilemanager()
    }
    if (eventTarget.closest('.item_playallmedia')) {
        playAllContent()
    }
    if (eventTarget.closest('.item_closeallmedia')) {
        closeAllContent()
    }
    if (eventTarget.closest('.item_download')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        downloadContent(itemId)
    }
    if (eventTarget.closest('.item_import')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        var content;
        if (itemId == appdata.fileManager.mainContent.data.id) {
            content = appdata.fileManager.mainContent.data;
        } else if (appdata.fileManager.mainContent.data.children[itemId] != undefined) {
            content = appdata.fileManager.mainContent.data.children[itemId];
        }
    
        await importContent(content)
    }
    if (eventTarget.closest('.item_share')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        var content;
        if (itemId == appdata.fileManager.mainContent.data.id) {
            content = appdata.fileManager.mainContent.data;
        } else if (appdata.fileManager.mainContent.data.children[itemId] != undefined) {
            content = appdata.fileManager.mainContent.data.children[itemId];
        }
    
        shareContent(content)
    }
    if (eventTarget.closest('.item_open')) {
        if (!event.ctrlKey && !event.metaKey && event.button !== 1) {  // if neither Ctrl nor Cmd key is pressed and not middle click
            event.preventDefault();
            const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
            sessionStorage.setItem(itemId+"_parentFolder", appdata.fileManager.mainContent.data.id);
            openContent(itemId)
        }
    }    
    if (eventTarget.closest('.item_play') || eventTarget.closest('.item_thumbnail')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        playContent(itemId, true)
    }
    if (eventTarget.closest('.item_close')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        closeContent(itemId)
    }
    if (eventTarget.closest('.item_rename')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        renameContent(itemId)
    }
    if (eventTarget.closest('.item_copy')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        copyContent({ [itemId]: true })
    }
    if (eventTarget.closest('.item_move')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        moveContent({ [itemId]: true })
    }
    if (eventTarget.closest('.item_delete')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        deleteContents(itemId)
    }
    if (eventTarget.closest('.item_properties')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        showProperties(itemId)
    }
    if (eventTarget.closest('.item_settings')) {
        const itemId = event.target.closest('[data-item-id]').getAttribute('data-item-id');
        const setting = event.target.closest('[data-setting]').getAttribute('data-setting');
        showSettings(itemId, setting)
    }
    if (eventTarget.closest('.filemanager_mainbuttons_pagination_previous')) {
        await loadPage('filemanager');
        await setContentToMainContent(appdata.fileManager.mainContent.data.id, appdata.fileManager.contentFilter, appdata.fileManager.mainContent.metadata.page-1, appdata.fileManager.mainContent.metadata.pageSize, appdata.fileManager.sortField, appdata.fileManager.sortDirection)
        initFilemanager();
    }
    if (eventTarget.closest('.filemanager_mainbuttons_pagination_next')) {
        await loadPage('filemanager');
        await setContentToMainContent(appdata.fileManager.mainContent.data.id, appdata.fileManager.contentFilter, appdata.fileManager.mainContent.metadata.page+1, appdata.fileManager.mainContent.metadata.pageSize, appdata.fileManager.sortField, appdata.fileManager.sortDirection)
        initFilemanager();
    }
    if (eventTarget.closest('#filemanager_abuse_button')) {
        showAbuseReportPopup()
    }
    if (eventTarget.closest('#filemanager_abuse_remove_button')) {
        deleteContents(appdata.fileManager.mainContent.data.id )
    }
    if (eventTarget.closest('.requestUploadObjectCancel')) {
        var dataId = eventTarget.closest('[data-id]').getAttribute('data-id');
        if(appdata.uploads[dataId].state == "pending") {
            removeRequestUploadObject(appdata.uploads[dataId]);
        } else {
            Object.values(appdata.uploads[dataId].fileList).forEach(fileObject => {
                if (fileObject.state != "progress" && fileObject.state != "done") {
                    fileObject.state = "canceled"
                }
            });
            appdata.uploads[dataId].state = "canceled"
        }
    }
    if (eventTarget.closest('.closeSuccessCard')) {
        var dataId = eventTarget.closest('[data-id]').getAttribute('data-id');
        removeRequestUploadObject(appdata.uploads[dataId]);
    }
});
document.addEventListener('submit', async function(event) {
    event.preventDefault();
    const eventTarget = event.target;
    if (eventTarget.closest('#popup_loginForm')) {
        const emailInput = document.getElementById('popup_email');
        const email = emailInput.value;
        createAlert('loading', 'Sending login link...');
        try {
            var sendLoginLinkResponse = await sendLoginLink(email)
            createPopup({
                icon: 'fas fa-check-circle text-green-500',
                title: 'Login Link Sent',
                content: `
                    <div class="min-h-full space-y-6">
                        <!-- Success Icon -->
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-24 w-24 rounded-full bg-green-900 bg-opacity-20">
                                <i class="fas fa-paper-plane text-green-400 text-4xl animate-bounce"></i>
                            </div>
                        </div>
            
                        <!-- Main Content -->
                        <div class="text-center space-y-3">
                            <h3 class="text-xl font-bold text-white">Check Your Inbox</h3>
                            <div class="bg-gray-800 rounded-lg p-3 mx-auto max-w-md">
                                <p class="text-blue-400 font-mono text-sm break-all">${sendLoginLinkResponse}</p>
                            </div>
                            <p class="text-gray-300">We've sent you a secure login link to complete your authentication.</p>
                        </div>
            
                        <!-- Timeline Steps -->
                        <div class="space-y-4 max-w-md mx-auto">
                            <div class="flex items-center space-x-3 text-sm">
                                <div class="flex-shrink-0 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-white font-medium">Email Sent</p>
                                    <p class="text-gray-400">Login link has been dispatched</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 text-sm">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-blue-400"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-white font-medium">Open Email</p>
                                    <p class="text-gray-400">Check your inbox or spam folder</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 text-sm">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-mouse-pointer text-blue-400"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-white font-medium">Click Link</p>
                                    <p class="text-gray-400">Complete your login process</p>
                                </div>
                            </div>
                        </div>
            
                        <!-- Help Section -->
                        <div class="text-center text-sm">
                            <p class="text-gray-400">
                                Having trouble? 
                                <button class="index_addAccount text-blue-400 hover:text-blue-300 font-medium">
                                    Resend Email
                                </button> 
                                or 
                                <a href="/contact" class="closePopup text-blue-400 hover:text-blue-300 font-medium">
                                    Contact Support
                                </a>
                            </p>
                        </div>
                    </div>
                `
            });
        } catch (error) {
            createAlert('error', error.message);
        }
    }
    if (eventTarget.closest('#filemanager_alert_passwordform')) {
        document.getElementById('filemanager_alert_passwordform_submit').classList.add('hidden');
        document.getElementById('filemanager_alert_passwordform_loading').classList.remove('hidden');
        if (typeof sha256 === 'undefined') {
            const scriptSha256 = document.createElement('script');
            scriptSha256.src = '/dist/js/sha256.min.js';
            scriptSha256.onload = () => {
                processPassword()
            };
            document.head.appendChild(scriptSha256);
        } else {
            processPassword();
        }

        async function processPassword() {
            const passwordInput = document.getElementById('filemanager_alert_passwordform_input');
            const password = passwordInput.value;
            sessionStorage['password|' + getUrlParts()[1]] = sha256(password);
            sessionStorage['password|' + appdata.fileManager.mainContent.data.id] = sha256(password);

            await refreshFilemanager()
        }
    }
    if (eventTarget.closest('#popup_createFolderForm')) {
        const folderName = document.getElementById('popup_folderName').value;
        createAlert('loading', 'Creating folder...');
        try {
            var response = await createFolderFetch(appdata.fileManager.mainContent.data.id, folderName)
        } catch (error) {
            return createAlert('error', error.message);
        }
        createAlert('success', `Folder <i class="fas fa-folder text-yellow-400 mr-1"></i><span class="font-bold">${folderName}</span> created successfully!`);
        await refreshFilemanager()
    }
    if (eventTarget.closest('#popup_filterForm')) {
        const filterInput = document.getElementById('popup_filterInput').value;
        appdata.fileManager.contentFilter = filterInput
        if(!appdata.fileManager.contentFilter) {
            updateURLParameter('filter', null);
        } else {
            updateURLParameter('filter', appdata.fileManager.contentFilter);
        }
        closePopup()
        await refreshFilemanager()
    }    
    if (eventTarget.closest('#popup_searchForm')) {
        const searchInput = document.getElementById('popup_searchInput').value;
        createAlert('loading', 'Searching, please wait...');
    
        try {
            const response = await searchFetch(appdata.fileManager.mainContent.data.id, searchInput);
            let content = '';
            const entries = Object.values(response.data);

            if (entries.length > 0) {
                content = `
                    <!-- Search Summary -->
                    <div class="mb-6 pb-4 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <div class="text-gray-300">
                                <span class="font-medium">${entries.length}</span> results found
                            </div>
                        </div>
                    </div>
                    
                    <!-- Results Grid -->
                    <div class="space-y-4">
                `;

                entries.forEach(entry => {
                    const isFile = entry.type === 'file';
                    const iconClass = isFile ? getIconForMimeType(entry.mimetype) : 'fas fa-folder text-yellow-400';
                    const createTime = new Date(entry.createTime * 1000).toLocaleDateString();

                    content += `
                        <div class="group relative rounded-lg bg-gray-800 hover:bg-gray-750 transition-all duration-200 p-4">
                            <!-- Main Content -->
                            <div class="flex items-start space-x-4">
                                <!-- Icon Section -->
                                <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg ${isFile ? 'bg-gray-700' : 'bg-yellow-400/10'}">
                                    ${isFile ? `
                                        <i class="${iconClass} text-2xl"></i>
                                    ` : `
                                        <div class="relative">
                                            <i class="fas fa-folder text-yellow-400 text-2xl"></i>
                                            <span class="absolute -bottom-1 -right-1 flex items-center justify-center min-w-5 min-h-5 text-xs font-bold text-white bg-gray-600 rounded-full border-2 border-gray-800">
                                                ${entry.childrenCount}
                                            </span>
                                        </div>
                                    `}
                                </div>

                                <!-- Details Section -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center space-x-2">
                                        <a href="${isFile ? `/d/${entry.parentFolder}?filter=${entry.name}` : `/d/${entry.code}`}" 
                                        class="text-lg font-semibold text-blue-400 hover:text-blue-300 truncate"
                                        target="_blank">
                                            ${entry.name}
                                        </a>
                                        ${isFile ? `
                                            <span class="px-2 py-1 text-xs font-medium text-gray-300 bg-gray-700 rounded-full">
                                                ${entry.mimetype?.split('/')[1]?.toUpperCase() || 'FILE'}
                                            </span>
                                        ` : ''}
                                    </div>

                                    <!-- Metadata -->
                                    <div class="mt-1 text-sm text-gray-400">
                                        <div class="flex items-center space-x-4">
                                            <span class="flex items-center">
                                                <i class="fas fa-calendar mr-1.5 text-gray-500"></i>
                                                ${createTime}
                                            </span>
                                            <span class="flex items-center">
                                                <i class="fas fa-weight-hanging mr-1.5 text-gray-500"></i>
                                                ${isFile ? humanFileSize(entry.size, true) : humanFileSize(entry.totalSize, true)}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                content += '</div>';
            } else {
                content = `
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-800 mb-4">
                            <i class="fas fa-search text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-300 mb-2">No Results Found</h3>
                        <p class="text-gray-400">Try adjusting your search criteria or try a different search term.</p>
                    </div>
                `;
            }

            createPopup({
                icon: 'fas fa-search',
                title: 'Search Results',
                content: `<div id="searchResults" class="space-y-3">${content}</div>`
            });


        } catch (error) {
            createAlert('error', error.message);
        }
    }
    if (eventTarget.closest('#showSubscriptionForm_form')) {
        appdata.billing.email = document.getElementById('showSubscriptionForm_formEmail').value
        appdata.billing.firstName = document.getElementById('showSubscriptionForm_formFirstname').value
        appdata.billing.lastName = document.getElementById('showSubscriptionForm_formLastname').value
        appdata.billing.country = document.getElementById('showSubscriptionForm_formCountry').value
        showPremiumPayment()
    }
    if (eventTarget.closest('#showPayAsYouGoForm_form')) {
        appdata.billing.email = document.getElementById('showPayAsYouGoForm_formEmail').value
        appdata.billing.firstName = document.getElementById('showPayAsYouGoForm_formFirstname').value
        appdata.billing.lastName = document.getElementById('showPayAsYouGoForm_formLastname').value
        appdata.billing.country = document.getElementById('showPayAsYouGoForm_formCountry').value
        showPremiumPayment()
    }
    if (eventTarget.closest('#contact_form')) {
        // Get form values
        const form = event.target;
        const name = form.querySelector('input[type="text"]').value;
        const email = form.querySelector('input[type="email"]').value;
        const subject = form.querySelector('select').value;
        const message = form.querySelector('textarea').value;
    
        // Create request payload
        const payload = {
            name: name,
            email: email,
            subject: subject,
            message: message
        };
    
        try {
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            createAlert('loading', 'Sending message...');
    
            // Send API request
            const response = await fetch(`https://${appdata.apiServer}.gofile.io/sendEmail`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload)
            });
    
            const data = await response.json();
            if (data.status === 'ok') {
                createPopup({
                    icon: 'fas fa-check-circle text-green-500',
                    title: 'Success',
                    content: `
                        <div class="flex flex-col items-center space-y-6 p-4">
                            <div class="relative w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mb-2">
                                <i class="fas fa-paper-plane text-2xl text-green-500"></i>
                            </div>
                            
                            <div class="text-center space-y-3 max-w-sm">
                                <h3 class="text-xl font-semibold text-gray-200">
                                    Message Received!
                                </h3>
                                <p class="text-gray-400 text-sm leading-relaxed">
                                    We have received your message and it will be processed shortly.
                                </p>
                            </div>
                            
                            <div class="flex justify-center w-full max-w-md mx-auto">
                                <button onclick="closePopup()" 
                                    class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-medium transition-all duration-200 flex items-center justify-center">
                                    <i class="fas fa-check mr-2"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    `
                });                
                loadUrl(window.location.pathname);
            } else {
                createAlert('error', 'Failed to send message');
            }            
        } catch (error) {
            createAlert('error', 'Error sending message: ' + error.message);
        } finally {
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = false;
            submitButton.innerHTML = 'Send Message';
        }
    }
    if (eventTarget.closest('#popup_abuseForm')) {
        // Get form elements
        const type = document.getElementById('popup_abuse_type').value;
        const email = document.getElementById('popup_abuse_email').value;
        const description = document.getElementById('popup_abuse_description').value;
        const folderCode = appdata.fileManager.mainContent.data.code;
        const domain = window.location.hostname;
        const folderLink = `https://${domain}/d/${folderCode}`;
    
        // Validate form
        if (!type || !email || !description) {
            return;
        }
    
        // Check if report was already sent
        const reportHistory = JSON.parse(sessionStorage.getItem('abuseReports') || '[]');
        if (reportHistory.includes(folderCode)) {
            createPopup({
                icon: 'fas fa-exclamation-circle',
                title: 'Report Already Submitted',
                content: `
                    <div class="text-center space-y-4">
                        <div class="text-yellow-400 text-5xl mb-4">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <p class="text-gray-300">
                            You have already submitted a report for this folder. Our team will review it as soon as possible.
                        </p>
                    </div>
                `
            });
            return;
        }
    
        // Show loading alert
        createAlert('loading', 'Submitting your report...');
    
        // Prepare email data
        const subject = `Report ${type} - ${email} - ${folderCode}`;
        const emailData = {
            name: 'Abuse Report',
            email: email,
            subject: subject,
            message: `Report details:\n- Folder: ${folderCode}\n- Folder Link: ${folderLink}\n- Type: ${type}\n- Reporter: ${email}\n\nDescription:\n${description}`
        };
    
        // Send request
        fetch(`https://${appdata.apiServer}.gofile.io/sendEmail`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(emailData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'ok') {
                // Store the report in session storage
                reportHistory.push(folderCode);
                sessionStorage.setItem('abuseReports', JSON.stringify(reportHistory));
    
                createPopup({
                    icon: 'fas fa-check-circle',
                    title: 'Report Submitted',
                    content: `
                        <div class="text-center space-y-4">
                            <div class="text-green-400 text-5xl mb-4">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <p class="text-gray-300">
                                Thank you for your report. Our team will review it as soon as possible.
                            </p>
                        </div>
                    `
                });
            } else {
                createAlert('error', 'Failed to submit report. Please try again later.');
            }
        })
        .catch(error => {
            createAlert('error', 'Failed to submit report. Please try again later.');
        });
    }    
})
document.addEventListener('change', async function(event) {
    event.preventDefault();
    const eventTarget = event.target;
    if (eventTarget.closest('.uploadInput')) {
        newRequestToUploadQueue(eventTarget.files)
    }
    if (eventTarget.closest('.item_checkbox')) {
        await itemCheckboxChangeEvent(eventTarget, true, true)
    }
    if (eventTarget.closest('.filemanager_mainbuttons_pagination_pageinput')) {
        const newPage = parseInt(eventTarget.value);
        appdata.fileManager.mainContent.metadata.page = eventTarget.value
        refreshFilemanager()
    }
})
window.addEventListener('resize', sidebarHandleResize);

//Sidebar
function sidebarHandleResize() {
    const overlay = document.getElementById('index_sidebarOverlay');
    window.innerWidth >= 1280 ? (overlay && overlay.classList.add('hidden'), openSidebar()) : closeSidebar();
}
function toggleSidebar() {
    const sidebar = document.getElementById('index_sidebar');
    window.innerWidth < 1024 ?
        sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebar() :
        sidebar.classList.contains('hidden') ? openSidebar() : closeSidebar();
}
function openSidebar() {
    const sidebar = document.getElementById('index_sidebar');
    const overlay = document.getElementById('index_sidebarOverlay');

    sidebar.classList.add('translate-x-0');
    sidebar.classList.remove('-translate-x-full', 'hidden');
    if (overlay && window.innerWidth < 1024) overlay.classList.remove('hidden');
}
function closeSidebar() {
    const sidebar = document.getElementById('index_sidebar');
    const overlay = document.getElementById('index_sidebarOverlay');

    sidebar.classList.add('-translate-x-full');
    sidebar.classList.remove('translate-x-0');
    if (window.innerWidth >= 1024) sidebar.classList.add('hidden');
    overlay && overlay.classList.add('hidden');
}
function handleDropdowns(dropdownClicked) {
    const dropdown = dropdownClicked.nextElementSibling;
    document.querySelectorAll('.dropdown').forEach(otherDropdown => {
        if (otherDropdown !== dropdown) otherDropdown.classList.add('hidden');
    });
    dropdown.classList.toggle('hidden');
}
function closeAllDropdowns() {
    document.querySelectorAll('.dropdown').forEach(dropdown => dropdown.classList.add('hidden'));
}

//Accounts
function appdataInitAccountsFromLocalStorage() {
    const appdataAccount = localStorage.getItem('appdataAccount');
    if (appdataAccount) {
        Object.assign(appdata.accounts, JSON.parse(appdataAccount));
    }
}
function appdataAccountsSaveToLocalStorage() {
    localStorage.setItem('appdataAccount', JSON.stringify(appdata.accounts));
}
function updateSidebarAccounts() {
    const accountsContainer = document.getElementById('index_accountList');
    accountsContainer.innerHTML = ''; // Clear the current accounts

    Object.keys(appdata.accounts).forEach(accountKey => {
        const account = appdata.accounts[accountKey];

        const accountDiv = document.createElement('div');
        accountDiv.classList.add('relative', 'account_accountItem');
        accountDiv.setAttribute('data-email', account.email);
        if (account.clientActive) {
            accountDiv.classList.add('border-2', 'border-blue-500', 'rounded');
        }

        accountDiv.innerHTML = `
            <div class="dropdown-toggle flex items-center justify-between p-2 bg-gray-700 rounded hover:bg-gray-600 transition-colors cursor-pointer">
                <div class="flex items-center gap-2 truncate">
                    <img src="${account.clientIcon ?? 'https://via.placeholder.com/24'}" alt="Avatar" class="h-7 w-7 rounded-full">
                    <span class="text-white truncate">${account.email}</span>
                </div>
                <i class="fas fa-angle-down text-white"></i>
            </div>
            <div class="dropdown hidden absolute bg-gray-700 text-white w-full mt-1 rounded shadow-lg z-10 border border-gray-600">
                <a href="/myprofile" class="block p-2 flex items-center gap-2 hover:bg-gray-600 hover:text-white"><i class="fas fa-user"></i> My Profile</a>
                <a href="/myfiles" class="block p-2 flex items-center gap-2 hover:bg-gray-600 hover:text-white"><i class="fas fa-folder"></i> My Files</a>
                <hr class="border-gray-600">
                ${!account.clientActive ? `<a href="javascript:void(0)" class="accountActive block p-2 flex items-center gap-2 hover:bg-gray-600 hover:text-white"><i class="fas fa-check-circle"></i> Make Active</a><hr class="border-gray-600">` : ''}
                <button type="button" class="logout block w-full text-left p-2 flex items-center gap-2 hover:bg-gray-600 hover:text-white"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        `;

        accountsContainer.appendChild(accountDiv);
    });
}
function setAccountActive(email) {
    let accountAlreadyActive = false;
    Object.keys(appdata.accounts).forEach(accountKey => {
        if (appdata.accounts[accountKey].email === email) {
            if (appdata.accounts[accountKey].clientActive) {
                accountAlreadyActive = true;
            }
            appdata.accounts[accountKey].clientActive = true;
        } else {
            appdata.accounts[accountKey].clientActive = false;
        }
    });
    if (!accountAlreadyActive) {
        appdataAccountsSaveToLocalStorage();
        updateSidebarAccounts();
        createNotification("Account",`Account <span class="font-bold">${email}</span> is now set as active`, "info", 5000);
    }
}
async function getAccountActive() {
    let activeAccount = null;
    if (Object.keys(appdata.accounts).length === 0) {
        // Create a guest account when no accounts exist
        try {
            const response = await fetch('https://' + appdata.apiServer + '.gofile.io/accounts', { method: 'POST' });
            
            if (!response.ok) {
                throw new Error(response.status);
            }
            
            const result = await response.json();
    
            if (result.status !== 'ok') {
                throw new Error(result.status);
            }
    
            const token = result.data.token;
            await getAccountByTokenAndSync(token);
        } catch (error) {
            throw new Error("getAccountActive "+error.message);
        }
    }

    // Find and track the active account, if any
    Object.keys(appdata.accounts).forEach(accountKey => {
        if (appdata.accounts[accountKey].clientActive) {
            if (activeAccount) {
                // Deactivate this one if there's already an active account
                appdata.accounts[accountKey].clientActive = false;
            } else {
                activeAccount = appdata.accounts[accountKey];
            }
        }
    });

    // If no active account was found, activate the first account
    if (!activeAccount && Object.keys(appdata.accounts).length > 0) {
        const firstAccountKey = Object.keys(appdata.accounts)[0];
        appdata.accounts[firstAccountKey].clientActive = true;
        activeAccount = appdata.accounts[firstAccountKey];
    }

    document.cookie = "accountToken=" + activeAccount.token + ";path=/;domain=gofile.io;SameSite=Lax;Secure;";
    return activeAccount;
}
function openAddAccountWindow() {
    createPopup({
        icon: 'fas fa-user-plus',
        title: 'Add Account',
        content: `
            <div class="min-h-full space-y-6">
                <!-- Header Section -->
                <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                    <div class="bg-blue-600 p-3 rounded-full">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Login to Your Account</h2>
                        <p class="text-gray-400 text-sm">Securely access your storage space</p>
                    </div>
                </div>
    
                <!-- Information Box -->
                <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                        <p class="text-gray-300 text-sm">
                            We'll send a secure login link to your email address. No password required!
                        </p>
                    </div>
                </div>
    
                <!-- Login Form -->
                <form id="popup_loginForm" class="space-y-4">
                    <div class="space-y-2">
                        <label for="popup_email" class="block text-sm font-medium text-gray-300">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="popup_email" 
                                name="email" 
                                placeholder="your.email@example.com" 
                                required 
                                class="w-full pl-10 pr-3 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none
                                       transition duration-200 text-white placeholder-gray-400"
                            >
                        </div>
                    </div>
    
                    <button 
                        type="submit" 
                        class="w-full py-3 bg-blue-600 rounded-lg hover:bg-blue-700 
                               transition duration-300 ease-in-out text-center text-white 
                               font-semibold flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-paper-plane"></i>
                        <span>Send Login Link</span>
                    </button>
                </form>
    
                <!-- Footer Information -->
                <div class="border-t border-gray-600 pt-4 mt-4">
                    <div class="flex items-start space-x-3 text-sm text-gray-400">
                        <i class="fas fa-shield-alt text-gray-500 mt-1"></i>
                        <div class="space-y-2">
                            <p>Multi-account support enabled:</p>
                            <ul class="list-disc list-inside pl-2 space-y-1">
                                <li>Connect multiple accounts seamlessly</li>
                                <li>Switch between accounts instantly</li>
                                <li>Manage separate storage spaces</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        `
    });     
    document.getElementById('popup_email').focus();
}
async function sendLoginLink(email) {
    if (!validateEmail(email)) {
        return createAlert('error','Invalid email address. Please check and try again.');
    }

    try {
        const response = await fetch('https://'+appdata.apiServer+'.gofile.io/accounts', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email })
        });
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return email
        } else {
            throw new Error(result.status);
        }
    } catch (error) {
        throw new Error("sendLoginLink "+error.message);
    }
}
async function getAccountByTokenAndSync(token) {
    try {
        const response = await fetch('https://'+appdata.apiServer+'.gofile.io/accounts/website', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();
        if (result.status === 'ok') {
            //Rewrite email for guest account as it's not supposed to be an email
            if (/^guest\d+@gofile\.io$/.test(result.data.email)) {
                result.data.email = result.data.email.replace(/@.*/, '');
            }
            //Get clientIcon and clientActive in memory if they exist to set them again after appdata.accounts[result.data.email] has been updated
            const clientIcon = appdata.accounts[result.data.email]?.clientIcon || blockies.create({
                seed: result.data.email,
                size: 16,
            }).toDataURL();
            const clientActive = appdata.accounts[result.data.email]?.clientActive || false;
            appdata.accounts[result.data.email] = {
                ...result.data,
                clientUpdatedAt: Math.floor(Date.now() / 1000),
                clientIcon,
                clientActive
            };
            appdataAccountsSaveToLocalStorage();
            return result.data.email
        } else {
            throw new Error(result.status);
        }
    } catch (error) {
        throw new Error("getAccountByTokenAndSync "+error.message);
    }
}
async function refreshAppdataAccountsAndSync(specificEmail = null) {
    const now = Math.floor(Date.now() / 1000);
    const emailsToRefresh = specificEmail ? [specificEmail] : Object.keys(appdata.accounts);

    for (const email of emailsToRefresh) {
        if (now - appdata.accounts[email]?.clientUpdatedAt > 10) {
            const token = appdata.accounts[email]?.token;
            try {
                await getAccountByTokenAndSync(token);
            } catch (error) {
                delete appdata.accounts[email];
                appdataAccountsSaveToLocalStorage();
                if (/^guest\d+$/.test(email)) {
                    //createNotification("Account",`Your guest account <span class="font-bold">${email.split("@")[0]}</span> has expired`, "info", 5000);
                }
                else {
                    throw new Error("refreshAppdataAccountsAndSync "+error.message);
                }
            }
        }
    }

    try {
        await getAccountActive();
    } catch (error) {
        throw new Error("refreshAppdataAccountsAndSync "+error.message);
    }
    
    appdataAccountsSaveToLocalStorage();
}

//Popup and alert
function createPopup({ title, content, icon = null, backgroundOpacity = true, showCloseButton = true }) {
    const existingPopup = document.querySelector('.popup-overlay');
    if (existingPopup) document.body.removeChild(existingPopup);

    const popupOverlay = document.createElement('div');
    const popup = document.createElement('div');
    const popupHeader = document.createElement('div');
    const popupTitle = document.createElement('h3');
    const popupContent = document.createElement('div');

    popupOverlay.className = `popup-overlay fixed inset-0 ${backgroundOpacity ? 'bg-gray-900 bg-opacity-80' : ''} flex items-center justify-center z-10 pointer-events-auto`;
    popup.className = `bg-gray-800 text-white rounded max-w-full max-h-full mx-4 my-4 min-w-[300px] pointer-events-auto ${showCloseButton ? 'border-2 border-gray-700 shadow-2xl drop-shadow-2xl' : ''}`;
    popupHeader.className = 'flex justify-between items-center border-b border-gray-700 px-2 py-1';
    popupTitle.className = 'text-md font-semibold';
    popupContent.className = 'overflow-y-auto max-h-[80vh] max-w-[90vw] p-4'; // Added padding to make the content more readable

    popupTitle.innerText = title;
    popupContent.innerHTML = content;

    if (icon) popupHeader.innerHTML += `<i class="${icon} text-md mr-2"></i>`; // Adding a text color to the icon
    popupHeader.appendChild(popupTitle);

    if (showCloseButton) {
        const popupClose = document.createElement('button');
        popupClose.className = 'text-gray-500 hover:text-white'; // Fixed hover class to match the color scheme
        popupClose.setAttribute('aria-label', 'Close Popup');
        popupClose.innerHTML = '<i class="fas fa-times"></i>';
        popupClose.onclick = () => document.body.removeChild(popupOverlay);
        popupHeader.appendChild(popupClose);

        popupOverlay.addEventListener('click', (e) => { if (e.target === popupOverlay) document.body.removeChild(popupOverlay); });
    }

    popup.append(popupHeader, popupContent);
    popupOverlay.appendChild(popup);
    document.body.appendChild(popupOverlay);
}
function closePopup() {
    document.querySelector('.popup-overlay')?.remove();
}
function createAlert(type, content) {
    const icons = {
        success: 'fas fa-check-circle text-green-500',
        error: 'fas fa-exclamation-circle text-red-500',
        info: 'fas fa-info-circle text-blue-500',
        loading: 'fas fa-spinner fa-spin text-blue-500'
    };

    const titles = {
        success: 'Success',
        error: 'Error',
        info: 'Information',
        loading: 'Loading'
    };

    // If type is loading, set showCloseButton to false
    const showCloseButton = type !== 'loading';

    createPopup({ 
        icon: icons[type],
        title: titles[type],
        content: `
            <div class="">
                <p>${content}</p>
            </div>
        `,
        showCloseButton: showCloseButton // Pass the showCloseButton parameter
    });
}

//Notification
function createNotification(title, message, type = 'success', duration = 3000) {
    const notificationContainer = document.getElementById('index_notification');
    const notification = document.createElement('div');

    // Notification styles
    let headerClasses = 'p-1 rounded-t-md flex items-center justify-between';
    let contentClasses = 'p-2 rounded-b-md bg-gray-950';
    
    if (type === 'success') headerClasses += ' bg-green-600 text-white border-green-700';
    else if (type === 'error') headerClasses += ' bg-red-600 text-white border-red-700';
    else if (type === 'warning') headerClasses += ' bg-yellow-600 text-black border-yellow-700';
    else if (type === 'info') headerClasses += ' bg-blue-600 text-white border-blue-700';

    let iconHTML = '';
    if (type === 'success') iconHTML = '<i class="fas fa-check-circle mr-2"></i>';
    else if (type === 'error') iconHTML = '<i class="fas fa-exclamation-circle mr-2"></i>';
    else if (type === 'warning') iconHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>';
    else if (type === 'info') iconHTML = '<i class="fas fa-info-circle mr-2"></i>';

    // Close button
    const closeButtonHTML = '<button class="text-white hover:text-gray-300 focus:outline-none" aria-label="Close"><i class="fas fa-times text-sm"></i></button>';

    // Creating header and content
    const header = `<div class="${headerClasses}">${iconHTML}<span class="font-bold">${title}</span>${closeButtonHTML}</div>`;
    const content = `<div class="${contentClasses}"><span class="font-medium text-sm">${message}</span></div>`;

    // Set notification classes and content
    notification.className = 'transform transition duration-500 ease-in-out opacity-0 -translate-y-4 rounded-md shadow-lg';
    notification.innerHTML = `${header}${content}`;

    // Append the notification
    notificationContainer.appendChild(notification);

    // Force reflow for the transition to trigger
    void notification.offsetWidth;
    
    // Transition to visible state
    notification.classList.replace('opacity-0', 'opacity-100');
    notification.classList.replace('-translate-y-4', 'translate-y-0');

    // Close button functionality
    notification.querySelector('button').addEventListener('click', () => {
        hideNotification(notification);
    });

    // Automatic hide after duration
    setTimeout(() => hideNotification(notification), duration);

    function hideNotification(notif) {
        notif.classList.replace('opacity-100', 'opacity-0');
        notif.classList.replace('translate-y-0', '-translate-y-4');
        setTimeout(() => notif.remove(), 500);
    }
}

//My profile
async function initProfilePage() {
    try {
        var accountActive = await getAccountActive() //Get the active account
        await refreshAppdataAccountsAndSync(accountActive.email); //Force refresh the active account info from backend
        accountActive = await getAccountActive() //Get new info in accountActive variable
        
        // Handle profile picture
        if (accountActive.clientIcon) {
            // Create new image element
            const profileImg = document.createElement('img');
            profileImg.src = accountActive.clientIcon;
            profileImg.className = 'w-full h-full rounded-full object-cover';
            
            // Get the profile picture container
            const profileContainer = document.querySelector('.myprofile_profile-picture');
            
            // Remove the default icon
            const defaultIcon = document.getElementById('myprofile_user_icon');
            if (defaultIcon) {
                defaultIcon.remove();
            }
            
            // Add the profile image
            profileContainer.appendChild(profileImg);
        } else {
            // Ensure default icon is visible if no profile picture
            document.getElementById('myprofile_user_icon').style.display = 'block';
        }

        // Hide loading spinner
        document.getElementById('myprofile_loading').classList.add('hidden');
        
        // Show account details
        document.getElementById('myprofile_account_details').classList.remove('hidden');
        
        // Set email and creation date
        document.getElementById("myprofile_email").textContent = accountActive.email;
        const createDate = new Date(accountActive.createTime * 1000);
        document.getElementById("myprofile_created_on").textContent = createDate.toLocaleDateString();

        // Show correct account tier
        document.querySelectorAll('.myprofile_account-tier').forEach(el => el.classList.add('hidden'));
        document.getElementById(`myprofile_account_tier_${accountActive.tier}`).classList.remove('hidden');

        // Handle upgrade button visibility
        if(accountActive.tier === "guest" || accountActive.tier === "standard") {
            document.getElementById('myprofile_upgrade_button').classList.remove('hidden');
        }

        // Show appropriate warning
        if(accountActive.tier === "guest") {
            document.getElementById("myprofile_guest_warning").classList.remove('hidden');
        } else if(accountActive.tier === "standard") {
            document.getElementById("myprofile_standard_warning").classList.remove('hidden');
        }
        
        // Premium Details
        if(accountActive.tier === "premium") {
            document.getElementById("myprofile_premium_details").classList.remove('hidden');
            document.getElementById("myprofile_premium_type").textContent = accountActive.premiumType;
            
            if(accountActive.premiumType === "credit") {
                document.querySelector('#myprofile_credit_balance').parentElement.classList.remove('hidden');
                document.getElementById("myprofile_credit_balance").textContent = accountActive.currencySign + accountActive.credit;
            }
            else if(accountActive.premiumType === "subscription") {
                // Show and fill provider information
                document.querySelector('#myprofile_premium_provider').parentElement.classList.remove('hidden');
                document.getElementById("myprofile_premium_provider").textContent = accountActive.subscriptionProvider;

                if(accountActive.subscriptionProvider === "internal") {
                    // Show and fill validity date
                    document.querySelector('#myprofile_premium_validity').parentElement.classList.remove('hidden');
                    const endDate = new Date(accountActive.subscriptionEndDate*1000);
                    document.getElementById("myprofile_premium_validity").textContent = endDate.toLocaleDateString();
                }
            }

            // Action Buttons Logic
            const renewButton = document.getElementById('myprofile_renew_button');
            const switchPaygButton = document.getElementById('myprofile_switch_payg_button');
            const cancelSubscriptionButton = document.getElementById('myprofile_cancel_subscription_button');
            const addCreditsButton = document.getElementById('myprofile_add_credits_button');

            // First, hide all buttons by default
            [renewButton, switchPaygButton, cancelSubscriptionButton, addCreditsButton].forEach(button => {
                button.classList.add('hidden');
            });

            // Show buttons based on conditions
            if (accountActive.premiumType === "credit") {
                // Show only add credits button for credit-based premium
                addCreditsButton.classList.remove('hidden');
            } 
            else if (accountActive.premiumType === "subscription") {
                if (accountActive.subscriptionProvider === "patreon") {
                    // Show cancel subscription and switch to PAYG for Patreon subscribers
                    cancelSubscriptionButton.classList.remove('hidden');
                    switchPaygButton.classList.remove('hidden');
                } 
                else if (accountActive.subscriptionProvider === "internal") {
                    // Show extend premium and switch to PAYG for internal subscribers
                    renewButton.classList.remove('hidden');
                    switchPaygButton.classList.remove('hidden');
                }
            }

            // Show chart buttons for premium users
            document.querySelectorAll('.myprofile_charts_button').forEach(button => {
                button.classList.remove('hidden');
            });
        }

        // Usage Details
        document.getElementById("myprofile_usage_details").classList.remove('hidden');
        const storageUsed = accountActive.statsCurrent.storage;
        const trafficUsed = accountActive.tier === "premium" 
            ? getTrafficLastXDays(accountActive.email, 29) 
            : accountActive.ipTrafficToday;
        
        document.getElementById('myprofile_storage_usage').textContent = humanFileSize(storageUsed, true);
        document.getElementById('myprofile_traffic_usage').textContent = humanFileSize(trafficUsed, true);
        document.getElementById('myprofile_file_count').textContent = accountActive.statsCurrent.fileCount;
        document.getElementById('myprofile_folder_count').textContent = accountActive.statsCurrent.folderCount;

        if (accountActive.tier === "premium") {
            if (accountActive.premiumType === "credit") {
                document.getElementById('myprofile_storage_limit').textContent = "∞";
                document.getElementById('myprofile_traffic_limit').textContent = "∞";
            } else if (accountActive.premiumType === "subscription") {
                // Storage limits and progress
                const storageLimit = humanFileSize(accountActive.subscriptionLimitStorage, true);
                document.getElementById('myprofile_storage_limit').textContent = storageLimit;
                const storageProgressPercent = (storageUsed / accountActive.subscriptionLimitStorage) * 100;
                document.getElementById('myprofile_storage_progress_bar').style.width = `${storageProgressPercent}%`;

                // Traffic limits and progress
                const trafficLimit = humanFileSize(accountActive.subscriptionLimitDirectTraffic, true);
                document.getElementById('myprofile_traffic_limit').textContent = trafficLimit;
                const trafficProgressPercent = (trafficUsed / accountActive.subscriptionLimitDirectTraffic) * 100;
                document.getElementById('myprofile_traffic_progress_bar').style.width = `${trafficProgressPercent}%`;
            }
        } else {
            document.getElementById('myprofile_storage_limit').textContent = "Temporary storage";
            document.getElementById('myprofile_traffic_limit').textContent = "...";
        }

        // Account preferences
        document.getElementById("myprofile_account_preferences").classList.remove('hidden');
        document.getElementById("myprofile_account_preferences_thumbnails").classList.remove('hidden');
        document.getElementById("myprofile_account_preferences_email").classList.remove('hidden');
        document.getElementById("myprofile_account_preferences_region").classList.remove('hidden');

        // Developer Information
        if(accountActive.tier !== "guest") {
            document.getElementById("myprofile_developer_info").classList.remove('hidden');
            document.getElementById("myprofile_account_id").textContent = accountActive.id;
            document.getElementById("myprofile_account_token").textContent = accountActive.token;
        }
    } catch (error) {
        console.error("Error in initProfilePage:", error);
        throw new Error("initProfilePage " + error.message);
    }
}
async function profileOpenCharts(eventTarget) {
    var account = await getAccountActive();
    let chartData = [];
    let chartLabels = [];
    
    if (eventTarget.id == "myprofile_credit_balance_history_button") {
        var creditConsumption = appdata.accounts[account.email].creditConsumption;
        var popupTitle = 'Credit chart history ('+account.currencySign+')';
        for (const year in creditConsumption) {
            for (const month in creditConsumption[year]) {
                for (const day in creditConsumption[year][month]) {
                    chartData.push(creditConsumption[year][month][day].credit);
                    chartLabels.push(new Date(`${year}-${month}-${day}`));
                }
            }
        }
    } else {
        var statsHistory = appdata.accounts[account.email].statsHistory;
        if (eventTarget.id == "myprofile_storage_history_button") {
            var popupTitle = 'Storage chart history (bytes)';
            for (const year in statsHistory) {
                for (const month in statsHistory[year]) {
                    for (const day in statsHistory[year][month]) {
                        chartData.push(statsHistory[year][month][day].storage);
                        chartLabels.push(new Date(`${year}-${month}-${day}`));
                    }
                }
            }
        } else if (eventTarget.id == "myprofile_traffic_history_button") {
            var popupTitle = 'Traffic chart history (bytes)';
            for (const year in statsHistory) {
                for (const month in statsHistory[year]) {
                    for (const day in statsHistory[year][month]) {
                        chartData.push(statsHistory[year][month][day].trafficDirectGenerated + statsHistory[year][month][day].trafficReqDownloaded + statsHistory[year][month][day].trafficWebDownloaded);
                        chartLabels.push(new Date(`${year}-${month}-${day}`));
                    }
                }
            }
        }
    }

    // Limit to last 30 days
    if (chartData.length > 30) {
        chartData = chartData.slice(-30);
        chartLabels = chartLabels.slice(-30);
    }

    // Helper function to calculate display value based on chart type
    function calculateDisplayValue(value) {
        if (eventTarget.id === "myprofile_traffic_history_button" || 
            eventTarget.id === "myprofile_storage_history_button") {
            return humanFileSize(value, true);
        }
        if (eventTarget.id === "myprofile_credit_balance_history_button") {
            return account.currencySign + value.toFixed(2);
        }
        return value;
    }

    // Open the popup with improved UI
    createPopup({
        icon: 'fas fa-chart-line',
        title: popupTitle,
        content: `
        <div class="flex flex-col gap-6 w-[85vw] mx-auto">
            <!-- Tabs -->
            <div class="flex justify-center gap-4">
                <button id="chartViewBtn" class="px-4 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition-colors">
                    <i class="fas fa-chart-line mr-2"></i>Chart View
                </button>
                <button id="tableViewBtn" class="px-4 py-2 rounded-lg bg-gray-700 text-white hover:bg-gray-600 transition-colors">
                    <i class="fas fa-table mr-2"></i>Table View
                </button>
            </div>

            <!-- Chart Container -->
            <div id="chartContainer" class="bg-gray-700/60 rounded-xl p-6 shadow-lg">
                <div class="h-[400px] w-full">
                    <canvas id="myprofile_charts_canvas"></canvas>
                </div>
            </div>

            <!-- Data Table Container -->
            <div id="tableContainer" class="hidden">
                <div class="bg-gray-700/60 rounded-xl p-6 shadow-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="px-4 py-3 text-left text-gray-400">Date</th>
                                    <th class="px-4 py-3 text-right text-gray-400">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${chartData.map((value, index) => {
                                    return `
                                    <tr class="border-b border-gray-700/50 hover:bg-gray-700/30 transition-colors">
                                        <td class="px-4 py-3 text-gray-300">
                                            ${chartLabels[index].toLocaleDateString()}
                                        </td>
                                        <td class="px-4 py-3 text-right font-mono text-gray-200">
                                            ${calculateDisplayValue(value)}
                                        </td>
                                    </tr>`;
                                }).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        `
    });

    // Add event listeners for tab switching
    document.getElementById('chartViewBtn').addEventListener('click', function() {
        this.classList.replace('bg-gray-700', 'bg-blue-500');
        this.classList.replace('hover:bg-gray-600', 'hover:bg-blue-600');
        document.getElementById('tableViewBtn').classList.replace('bg-blue-500', 'bg-gray-700');
        document.getElementById('tableViewBtn').classList.replace('hover:bg-blue-600', 'hover:bg-gray-600');
        document.getElementById('chartContainer').classList.remove('hidden');
        document.getElementById('tableContainer').classList.add('hidden');
    });

    document.getElementById('tableViewBtn').addEventListener('click', function() {
        this.classList.replace('bg-gray-700', 'bg-blue-500');
        this.classList.replace('hover:bg-gray-600', 'hover:bg-blue-600');
        document.getElementById('chartViewBtn').classList.replace('bg-blue-500', 'bg-gray-700');
        document.getElementById('chartViewBtn').classList.replace('hover:bg-blue-600', 'hover:bg-gray-600');
        document.getElementById('tableContainer').classList.remove('hidden');
        document.getElementById('chartContainer').classList.add('hidden');
    });

    // Load Chart.js adapter for date-fns
    if (typeof Chart === 'undefined') {
        const scriptChart = document.createElement('script');
        scriptChart.src = 'https://cdn.jsdelivr.net/npm/chart.js';
        const scriptAdapter = document.createElement('script');
        scriptAdapter.src = 'https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns';
        
        scriptChart.onload = () => {
            document.head.appendChild(scriptAdapter);
            scriptAdapter.onload = initializeCharts;
        };
        
        document.head.appendChild(scriptChart);
    } else {
        initializeCharts();
    }

    function initializeCharts() {
        const ctx = document.getElementById('myprofile_charts_canvas').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: popupTitle,
                    data: chartData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)',
                            callback: function(value) {
                                if (eventTarget.id === "myprofile_traffic_history_button" || 
                                    eventTarget.id === "myprofile_storage_history_button") {
                                    return humanFileSize(value, true);
                                }
                                if (eventTarget.id === "myprofile_credit_balance_history_button") {
                                    return account.currencySign + value;
                                }
                                return value;
                            }
                        }
                    }
                }
            }
        });
    }
}

//Premium
async function getCountriesList() {
    createAlert('loading', 'Loading countries list, please wait...');
    try {
        const response = await fetch('https://api.gofile.io/getCountries');
        const data = await response.json();
        
        if (data.status === 'ok' && Array.isArray(data.data)) {
            return data.data.map(country => 
                `<option value="${country.code}">${country.name}</option>`
            ).join('');
        }
        
        throw new Error('Invalid response format from countries API');
    } catch (error) {
        console.error('Error fetching countries:', error);
        throw new Error('Failed to load countries list. Please try again later.');
    }
}
async function showSubscriptionCancellation() {
    const account = await getAccountActive();

    if (account.subscriptionProvider === "patreon") {
        createPopup({
            icon: 'fab fa-patreon',
            title: 'Cancel Subscription',
            content: `
                <div class="max-w-md mx-auto text-center">
                    <!-- Patreon Icon -->
                    <div class="mb-6">
                        <i class="fab fa-patreon text-blue-500 text-5xl"></i>
                    </div>
                    
                    <!-- Message -->
                    <div class="mb-6">
                        <h3 class="text-xl text-white font-semibold mb-3">Subscription Managed by Patreon</h3>
                        <p class="text-gray-300 mb-4">
                            Your subscription is currently managed through Patreon. To cancel your subscription, you'll need to:
                        </p>
                        <ol class="text-left text-gray-300 space-y-2 mb-4">
                            <li class="flex items-start">
                                <span class="mr-2">1.</span>
                                <span>Visit your Patreon account settings</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">2.</span>
                                <span>Locate your Gofile membership</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">3.</span>
                                <span>Click on "Edit" or "Cancel membership"</span>
                            </li>
                        </ol>
                        <p class="text-gray-400 text-sm">
                            Your premium access will remain active until the end of your current billing period.
                        </p>
                    </div>

                    <!-- Action Button -->
                    <a href="https://www.patreon.com/gofile" 
                        target="_blank"
                        class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors mb-4">
                        <i class="fab fa-patreon mr-2"></i>
                        Go to Patreon
                    </a>

                    <!-- Additional Info -->
                    <div class="text-sm text-gray-400">
                        Need help? <a href="/contact" class="closePopup text-blue-400 hover:text-blue-300">Contact our support team</a>
                    </div>
                </div>
            `
        });
    } else {
        createPopup({
            icon: 'fas fa-info-circle',
            title: 'Subscription Information',
            content: `
                <div class="max-w-md mx-auto text-center">
                    <div class="mb-6">
                        <i class="fas fa-exclamation-circle text-blue-400 text-5xl"></i>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-xl text-white font-semibold mb-3">Unknown Subscription Provider</h3>
                        <p class="text-gray-300 mb-4">
                            We couldn't determine your subscription provider. Please contact our support team for assistance with cancellation.
                        </p>
                    </div>

                    <a href="/contact" 
                        class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Support
                    </a>
                </div>
            `
        });
    }
}
async function showSubscriptionDuration() {
    const account = await getAccountActive();
    
    let subscriptionInfo = '';
    if (account.premiumType === "subscription") {
        if (account.subscriptionProvider === "internal") {
            // Convert timestamp to date
            const endDate = new Date(account.subscriptionEndDate * 1000);
            const formattedDate = endDate.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
        
            subscriptionInfo = `
                <div class="mb-8">
                    <div class="bg-blue-500 bg-opacity-20 border-l-4 border-blue-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-400 mt-0.5"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-400">Active Subscription</h3>
                                <div class="mt-2 text-sm text-gray-300">
                                    <p>Your current subscription is active until <span class="text-blue-400 font-medium">${formattedDate}</span>. You can extend your premium access by purchasing another year, which will be added to your current subscription period.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        } else if (account.subscriptionProvider === "patreon") {
            subscriptionInfo = `
                <div class="mb-8">
                    <div class="bg-blue-500 bg-opacity-20 border-l-4 border-blue-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-400 mt-0.5"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-400">Active Patreon Subscription</h3>
                                <div class="mt-2 text-sm text-gray-300">
                                    <p>You currently have an active monthly subscription through Patreon. By choosing the annual plan, you'll receive one full year of premium access without requiring an active Patreon subscription.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    } else if (account.premiumType === "credit") {
        subscriptionInfo = `
            <div class="mb-8">
                <div class="bg-blue-500 bg-opacity-20 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400 mt-0.5"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-400">Pay As You Go Credits Active</h3>
                            <div class="mt-2 text-sm text-gray-300">
                                <p>Your account currently has <span class="text-blue-400 font-medium">${account.credit}$</span> available using the pay as you go model. If you choose to subscribe, your remaining credits will be used first.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    createPopup({
        icon: 'fas fa-crown',
        title: 'Choose Your Billing Period',
        content: `
            ${subscriptionInfo}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Monthly Plan -->
                <div class="bg-gray-700 bg-opacity-50 rounded-xl p-6 border border-gray-600 hover:border-blue-500 transition-colors">
                    <div class="text-center mb-4">
                        <h3 class="font-bold text-xl text-white">Monthly Billing</h3>
                        <div class="text-3xl font-bold text-white mt-2">$9<span class="text-lg text-gray-400">/month</span></div>
                        <div class="text-sm text-gray-400">Recurring monthly payment</div>
                    </div>
                    <ul class="text-gray-300 space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-blue-400 w-6"></i>Monthly billing</li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-400 w-6"></i>Cancel anytime</li>
                        <li class="flex items-center"><i class="fab fa-patreon text-blue-400 w-6"></i>Pay via Patreon</li>
                    </ul>
                    <button onclick="showSubscriptionPatreon()" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors text-center">
                        Subscribe via Patreon
                    </button>
                </div>

                <!-- Annual Plan -->
                <div class="bg-gray-700 bg-opacity-50 rounded-xl p-6 border border-gray-600 hover:border-green-500 transition-colors relative overflow-hidden">
                    <div class="absolute -right-12 top-6 bg-green-500 text-white px-12 py-1 rotate-45">
                        Save 17%
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="font-bold text-xl text-white">Annual Billing</h3>
                        <div class="text-3xl font-bold text-white mt-2">$90<span class="text-lg text-gray-400">/year</span></div>
                        <div class="text-sm text-gray-400">One-time payment (equals $7.50/month)</div>
                    </div>
                    <ul class="text-gray-300 space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-400 w-6"></i>Single payment for full year</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-400 w-6"></i>2 months free included</li>
                        <li class="flex items-center"><i class="fas fa-credit-card text-green-400 w-6"></i>Credit Card</li>
                        <li class="flex items-center"><i class="fab fa-paypal text-green-400 w-6"></i>PayPal</li>
                        <li class="flex items-center"><i class="fab fa-bitcoin text-green-400 w-6"></i>Cryptocurrencies</li>
                    </ul>
                    <button id="showSubscriptionDuration_year" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Choose Annual Plan
                    </button>
                </div>
            </div>

            <p class="text-gray-400 text-center mt-6 text-sm">
                Both billing periods include the same premium features.
            </p>
        `
    });
}
async function showGuestWarningPopup() {
    createPopup({
        icon: 'fas fa-user-circle',
        title: 'Quick Login Needed',
        content: `
            <div class="max-w-md mx-auto text-center">
                <!-- Info Icon -->
                <div class="mb-6">
                    <i class="fas fa-info-circle text-blue-500 text-5xl"></i>
                </div>
                
                <!-- Message -->
                <div class="mb-6">
                    <h3 class="text-xl text-white font-semibold mb-3">First Step to Premium</h3>
                    <p class="text-gray-300 mb-2">
                        To start the upgrade process to Premium, please log in with your email account.
                    </p>
                    <p class="text-gray-400 text-sm">
                        After logging in, you'll be able to choose your premium plan.
                    </p>
                </div>

                <!-- Action Button -->
                <button 
                    onclick="openAddAccountWindow()"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center mb-4">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    <span>Login to Continue</span>
                </button>

                <!-- Additional Info -->
                <div class="text-sm text-gray-400">
                    Login is required to start the upgrade process.
                </div>
            </div>
        `
    });
}
async function showSubscriptionPatreon() {
    const account = await getAccountActive();
    // Check if guest account
    if (account.tier === "guest") {
        showGuestWarningPopup();
        return;
    }
    createPopup({
        icon: 'fab fa-patreon',
        title: 'Subscribe via Patreon',
        content: `
            <div class="text-center">
                <div class="mb-6">
                    <i class="fab fa-patreon text-blue-400 text-5xl mb-4"></i>
                    <h3 class="text-xl text-white font-semibold mb-3">You will be redirected to Patreon</h3>
                    <p class="text-gray-300">Complete your subscription process on Patreon's website</p>
                </div>

                <div class="bg-blue-500 bg-opacity-10 border border-blue-500/30 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-400 mt-1 mr-3"></i>
                        <div class="text-left">
                            <p class="text-blue-400 font-semibold mb-1">Important Notice</p>
                            <p class="text-gray-300">Please ensure that you use the same email address on Patreon as your Gofile account:</p>
                            <p class="text-white font-semibold mt-1">${account.email}</p>
                        </div>
                    </div>
                </div>

                <a href="javascript:void(0)" 
                    onclick="closePopup(); window.open('https://www.patreon.com/gofile/membership', '_blank')"
                    class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        <i class="fab fa-patreon mr-2"></i>
                        Continue to Patreon
                </a>

                <p class="text-gray-400 text-sm mt-6">
                    Your premium access will be automatically activated once the subscription is completed.
                </p>
            </div>
        `
    });
}
async function showSubscriptionForm() {
    const account = await getAccountActive();
    // Check if guest account
    if (account.tier === "guest") {
        showGuestWarningPopup();
        return;
    }

    // Get countries list
    const countriesList = await getCountriesList();

    createPopup({
        icon: 'fas fa-crown',
        title: 'Annual Premium Subscription',
        content: `
            <div class="max-w-2xl mx-auto">
                <!-- Introduction -->
                <div class="text-center mb-8">
                    <div class="text-3xl font-bold text-white mb-2">$90<span class="text-lg text-gray-400">/year</span></div>
                    <p class="text-gray-300">Get 12 months of Premium access for the price of 10</p>
                    <div class="text-sm text-gray-400 mt-2">Price shown without VAT - Final price will be calculated based on your country</div>
                </div>

                <!-- Separator -->
                <hr class="border-gray-600 mb-8">

                <!-- Billing Form -->
                <form id="showSubscriptionForm_form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Account to Upgrade -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Account to Upgrade</label>
                            <input type="email" 
                                id="showSubscriptionForm_formEmail"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 cursor-not-allowed opacity-75"
                                value="${account.email}"
                                disabled>
                            <div class="text-sm text-gray-400 mt-1">This is the account that will receive the premium upgrade</div>
                        </div>

                        <!-- First Name -->
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">First Name</label>
                            <input type="text" 
                                id="showSubscriptionForm_formFirstname"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Last Name</label>
                            <input type="text" 
                                id="showSubscriptionForm_formLastname"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Country -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Country</label>
                            <select 
                                id="showSubscriptionForm_formCountry"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                                <option value="">Select your country</option>
                                ${countriesList}
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center">
                        <span>Continue to Payment</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>

                    <!-- Terms and Privacy -->
                    <div class="text-sm text-center text-gray-400">
                        By proceeding, you agree to our <a href="/terms" class="text-blue-400 hover:text-blue-300">Terms of Service</a> and acknowledge our <a href="/privacy" class="text-blue-400 hover:text-blue-300">Privacy Policy</a>
                    </div>

                    <!-- Support -->
                    <div class="text-sm text-center text-gray-400">
                        Need help? <a href="/contact" class="text-blue-400 hover:text-blue-300">Contact our support team</a>
                    </div>
                </form>
            </div>
        `
    });
}
async function showPayAsYouGoCredits() {
    const account = await getAccountActive();
    
    let subscriptionInfo = '';
    if (account.premiumType === "subscription") {
        subscriptionInfo = `
            <div class="mb-8">
                <div class="bg-blue-500 bg-opacity-20 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-400">Subscription Information</h3>
                            <div class="mt-2 text-sm text-gray-300">
                                <p>Your account currently has an active premium subscription. Adding credits will convert your account from the subscription model to the pay-as-you-go model. If you have any questions, please contact our support team.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    createPopup({
        icon: 'fas fa-coins',
        title: 'Purchase Premium Credits',
        content: `
            <div class="max-w-2xl mx-auto">
                ${subscriptionInfo}
                <!-- Introduction -->
                <div class="text-center mb-8">
                    <p class="text-gray-300">Purchase credits to use for storage and bandwidth.</p>
                    
                    <!-- Rates and Premium Info -->
                    <div class="mt-4 bg-gray-700 bg-opacity-50 rounded-lg p-4 inline-block">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-database text-blue-400"></i>
                                <span class="text-gray-300">Storage: $3/TB/month</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-exchange-alt text-blue-400"></i>
                                <span class="text-gray-300">Bandwidth: $2/TB</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-600 mt-3 pt-3 text-center">
                            <div class="text-xs text-gray-400">
                                Minimum monthly usage: $10
                            </div>
                            <div class="text-xs text-gray-400 mt-1 flex items-center justify-center space-x-1">
                                <i class="fas fa-crown text-yellow-400 text-xs"></i>
                                <span>Premium features active while credit balance > $0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credit Packages -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="showPayAsYouGoCredits_packages cursor-pointer bg-gray-700 bg-opacity-50 rounded-xl p-6 border-2 border-gray-600 hover:border-blue-500 transition-colors" data-amount="50">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">$50</div>
                        </div>
                    </div>

                    <div class="showPayAsYouGoCredits_packages cursor-pointer bg-gray-700 bg-opacity-50 rounded-xl p-6 border-2 border-gray-600 hover:border-blue-500 transition-colors" data-amount="100">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">$100</div>
                        </div>
                    </div>

                    <div class="showPayAsYouGoCredits_packages cursor-pointer bg-gray-700 bg-opacity-50 rounded-xl p-6 border-2 border-gray-600 hover:border-blue-500 transition-colors" data-amount="200">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">$200</div>
                        </div>
                    </div>

                    <div class="showPayAsYouGoCredits_packages cursor-pointer bg-gray-700 bg-opacity-50 rounded-xl p-6 border-2 border-gray-600 hover:border-blue-500 transition-colors" data-amount="400">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">$400</div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-8">
                    <h3 class="text-white font-semibold mb-4">Available Payment Methods</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-credit-card text-blue-400"></i>
                            <span>Credit Card</span>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fab fa-paypal text-blue-400"></i>
                            <span>PayPal</span>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fab fa-bitcoin text-blue-400"></i>
                            <span>Cryptocurrency</span>
                        </div>
                    </div>
                </div>
            </div>
        `
    });
}
async function showPayAsYouGoForm() {
    const account = await getAccountActive();
    // Check if guest account
    if (account.tier === "guest") {
        showGuestWarningPopup();
        return;
    }

    // Get countries list
    const countriesList = await getCountriesList();

    createPopup({
        icon: 'fas fa-coins',
        title: 'Purchase Premium Credits',
        content: `
            <div class="max-w-2xl mx-auto">
                <!-- Introduction -->
                <div class="text-center mb-8">
                    <div class="text-3xl font-bold text-white mb-2">$${appdata.billing.amount}<span class="text-lg text-gray-400"> credits</span></div>
                    <p class="text-gray-300">Premium credits for storage and bandwidth usage</p>
                    <div class="text-sm text-gray-400 mt-2">Price shown without VAT - Final price will be calculated based on your country</div>
                </div>

                <!-- Separator -->
                <hr class="border-gray-600 mb-8">

                <!-- Billing Form -->
                <form id="showPayAsYouGoForm_form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Account to Credit -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Account to Credit</label>
                            <input type="email" 
                                id="showPayAsYouGoForm_formEmail"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 cursor-not-allowed opacity-75"
                                value="${account.email}"
                                disabled>
                            <div class="text-sm text-gray-400 mt-1">Credits will be added to this account</div>
                        </div>

                        <!-- First Name -->
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">First Name</label>
                            <input type="text" 
                                id="showPayAsYouGoForm_formFirstname"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Last Name</label>
                            <input type="text" 
                                id="showPayAsYouGoForm_formLastname"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Country -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-300 text-sm font-medium mb-2">Country</label>
                            <select 
                                id="showPayAsYouGoForm_formCountry"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                required>
                                <option value="">Select your country</option>
                                ${countriesList}
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center">
                        <span>Continue to Payment</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>

                    <!-- Terms and Privacy -->
                    <div class="text-sm text-center text-gray-400">
                        By proceeding, you agree to our <a href="/terms" class="text-blue-400 hover:text-blue-300">Terms of Service</a> and acknowledge our <a href="/privacy" class="text-blue-400 hover:text-blue-300">Privacy Policy</a>
                    </div>

                    <!-- Support -->
                    <div class="text-sm text-center text-gray-400">
                        Need help? <a href="/contact" class="text-blue-400 hover:text-blue-300">Contact our support team</a>
                    </div>
                </form>
            </div>
        `
    });
}
async function showPremiumPayment() {
    const account = await getAccountActive();
    let title, description;

    // Set values based on plan
    if (appdata.billing.plan === "subscriptionAnnual") {
        title = "Annual Premium Subscription";
        description = "12 months of Premium access";
    } else if (appdata.billing.plan === "payAsYouGo") {
        title = "Premium Credits Purchase";
        description = "Premium credits for storage and bandwidth";
    } else {
        createAlert('error', 'Invalid billing plan selected');
        return;
    }

    // Show loading alert
    createAlert('loading', 'Creating your invoice...');
    
    // Call the API to create pending invoice
    try {
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/createinvoicePending`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: appdata.billing.email,
                clientType: "Individual",
                premiumType: appdata.billing.premiumType,
                firstname: appdata.billing.firstName,
                lastname: appdata.billing.lastName,
                country: appdata.billing.country,
                premiumPriceSelected: appdata.billing.amount,
                currency: "USD"
            })
        });

        const invoiceData = await response.json();
        
        if (invoiceData.status !== "ok") {
            createAlert('error', 'Failed to create invoice. Please try again.');
            throw new Error("Failed to create invoice");
        }

        const { priceFinal, priceVatRate, priceVat, priceFinalVAT } = invoiceData.data;

        if (priceFinal == null || priceVatRate == null || priceVat == null || priceFinalVAT == null) {
            createAlert('error', 'Invalid price data received from server');
            throw new Error("Invalid price data");
        }

        appdata.billing.id = invoiceData.data.id
        appdata.billing.priceFinalVAT = invoiceData.data.priceFinalVAT

        const vatRatePercentage = priceVatRate * 100;

        createPopup({
            icon: 'fas fa-credit-card',
            title: 'Complete Your Purchase',
            content: `
                <div class="max-w-2xl mx-auto">
                    <!-- Order Summary -->
                    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4">Order Summary</h3>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between text-gray-300">
                                <span class="mr-4">${description}</span>
                                <span class="flex-shrink-0">$${priceFinal.toFixed(2)}</span>
                            </div>
                            <div class="flex justify-between text-gray-300">
                                <span class="mr-4">VAT ${vatRatePercentage}% (${appdata.billing.country})</span>
                                <span class="flex-shrink-0">$${priceVat.toFixed(2)}</span>
                            </div>
                            <div class="border-t border-gray-600 pt-3">
                                <div class="flex justify-between text-white font-bold">
                                    <span class="mr-4">Total</span>
                                    <span class="flex-shrink-0">$${priceFinalVAT.toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Information -->
                    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4">Billing Information</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-400">Name:</span>
                                <span class="text-white ml-2">${appdata.billing.firstName} ${appdata.billing.lastName}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Email:</span>
                                <span class="text-white ml-2">${appdata.billing.email}</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Country:</span>
                                <span class="text-white ml-2">${appdata.billing.country}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-white mb-4">Select Payment Method</h3>
                        
                        <!-- Credit Card -->
                        <button onclick="handleCreditCardPayment()" 
                                class="w-full bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-lg flex items-center justify-between group transition-colors">
                            <div class="flex items-center">
                                <i class="fas fa-credit-card text-blue-400 text-xl mr-3"></i>
                                <span>Credit Card</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-white transition-colors"></i>
                        </button>

                        <!-- PayPal -->
                        <button onclick="handlePayPalPayment()" 
                                class="w-full bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-lg flex items-center justify-between group transition-colors">
                            <div class="flex items-center">
                                <i class="fab fa-paypal text-blue-400 text-xl mr-3"></i>
                                <span>PayPal</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-white transition-colors"></i>
                        </button>

                        <!-- Crypto -->
                        <button onclick="handleCryptoPayment()" 
                                class="w-full bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-lg flex items-center justify-between group transition-colors">
                            <div class="flex items-center">
                                <i class="fab fa-bitcoin text-blue-400 text-xl mr-3"></i>
                                <span>Cryptocurrency</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-white transition-colors"></i>
                        </button>
                    </div>

                    <!-- Security Notice -->
                    <div class="mt-8 flex items-center justify-center text-sm text-gray-400">
                        <i class="fas fa-lock mr-2"></i>
                        <span>All payments are secured and encrypted</span>
                    </div>
                </div>
            `
        });

    } catch (error) {
        console.error('Error creating invoice:', error);
        createAlert('error', 'An unexpected error occurred. Please try again later.');
    }
}
async function handlePayPalPayment() {
    // Function to load PayPal SDK
    const loadPayPalScript = () => {
        return new Promise((resolve, reject) => {
            // Check if PayPal SDK is already loaded
            if (window.paypal) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = `https://www.paypal.com/sdk/js?client-id=AUMhhKZsCLPzu-hHyF3nJWi3lCCmicQuLCxXPNrviw239k1_i1v9F1r1OOQKkrzu1y_JNUNEYx_0y3dv&currency=${appdata.billing.currency}`;
            // script.src = `https://www.paypal.com/sdk/js?client-id=AaapUQAnoG5IIAhlco1eJrMvN_wOeoj9XSPYGJQaHPPrBxPKU7ldF2QTGECfvxuWOpIyYKL295-vcWWK&currency=${appdata.billing.currency}`;
            script.onload = () => resolve();
            script.onerror = () => reject(new Error('Failed to load PayPal SDK'));
            document.body.appendChild(script);
        });
    };

    try {
        // Show loading state
        createAlert('loading', 'Preparing PayPal payment...');

        // Load PayPal SDK
        await loadPayPalScript();

        // Create popup with PayPal button container
        createPopup({
            icon: 'fab fa-paypal',
            title: 'PayPal Payment',
            content: `
                <div class="max-w-md mx-auto">
                    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-4">
                        <div class="text-center text-gray-300 mb-4">
                            Please complete your payment with PayPal
                        </div>
                        <div id="paypal-button-container" class="min-h-[150px]"></div>
                    </div>
                    
                    <div class="flex items-center justify-center text-sm text-gray-400">
                        <i class="fas fa-lock mr-2"></i>
                        <span>Secure payment processed by PayPal</span>
                    </div>
                </div>
            `
        });

        // Render PayPal buttons
        paypal.Buttons({
            fundingSource: paypal.FUNDING.PAYPAL,
            style: {
                layout: 'vertical',
                color: 'blue',
                shape: 'rect',
                label: 'pay'
            },
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: appdata.billing.priceFinalVAT
                        },
                        custom_id: appdata.billing.id
                    }],
                    application_context: {
                        shipping_preference: 'NO_SHIPPING'
                    }
                });
            },
            onApprove: (data, actions) => {
                // Show processing message
                // createAlert('loading', 'Processing your payment...');
                
                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    showPaymentSuccessPopup()
                });
            },
            onError: (err) => {
                console.error('PayPal Error:', err);
                createAlert('error', 'Payment failed. Please try again.');
            }
        }).render('#paypal-button-container');

    } catch (error) {
        console.error('PayPal setup error:', error);
        createAlert('error', 'Failed to initialize PayPal. Please try again later.');
    }
}
async function handleCreditCardPayment() {
    // Function to load PayPal SDK
    const loadPayPalScript = () => {
        return new Promise((resolve, reject) => {
            // Check if PayPal SDK is already loaded
            if (window.paypal) {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = `https://www.paypal.com/sdk/js?client-id=AUMhhKZsCLPzu-hHyF3nJWi3lCCmicQuLCxXPNrviw239k1_i1v9F1r1OOQKkrzu1y_JNUNEYx_0y3dv&currency=${appdata.billing.currency}`;
            // script.src = `https://www.paypal.com/sdk/js?client-id=AaapUQAnoG5IIAhlco1eJrMvN_wOeoj9XSPYGJQaHPPrBxPKU7ldF2QTGECfvxuWOpIyYKL295-vcWWK&currency=${appdata.billing.currency}`;
            script.onload = () => resolve();
            script.onerror = () => reject(new Error('Failed to load PayPal SDK'));
            document.body.appendChild(script);
        });
    };

    try {
        // Show loading state
        createAlert('loading', 'Preparing credit card payment...');

        // Load PayPal SDK
        await loadPayPalScript();

        // Create popup with credit card button container
        createPopup({
            icon: 'fas fa-credit-card',
            title: 'Credit Card Payment',
            content: `
                <div class="max-w-md mx-auto">
                    <div class="bg-gray-200 rounded-lg p-6 mb-4">
                        <div class="text-center text-gray-700 mb-4">
                            Please complete your payment with your credit card
                        </div>
                        <div id="card-button-container" class="min-h-[150px]"></div>
                    </div>
                    
                    <div class="flex items-center justify-center text-sm text-gray-600">
                        <i class="fas fa-lock mr-2"></i>
                        <span>Secure payment processed by PayPal</span>
                    </div>
                </div>
            `,
        });

        // Render Credit Card buttons
        paypal.Buttons({
            fundingSource: paypal.FUNDING.CARD,
            style: {
                layout: 'vertical',
                color: 'black',
                shape: 'rect',
                label: 'pay'
            },
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: appdata.billing.priceFinalVAT
                        },
                        custom_id: appdata.billing.id
                    }],
                    application_context: {
                        shipping_preference: 'NO_SHIPPING'
                    }
                });
            },
            onApprove: (data, actions) => {
                // Show processing message
                // createAlert('loading', 'Processing your payment...');
                
                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    showPaymentSuccessPopup()
                });
            },
            onError: (err) => {
                console.error('Credit Card Error:', err);
                createAlert('error', 'Payment failed. Please try again.');
            }
        }).render('#card-button-container');

    } catch (error) {
        console.error('Credit Card setup error:', error);
        createAlert('error', 'Failed to initialize credit card payment. Please try again later.');
    }
}
async function handleCryptoPayment() {
    try {
        // Show loading state
        createAlert('loading', 'Preparing cryptocurrency payment...');

        // Call the BTCPay API endpoint
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/createPaymentBtcpay`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                invoiceId: appdata.billing.id
            })
        });

        const data = await response.json();

        // Check for valid response
        if (data.status !== "ok" || !data.data.checkoutLink) {
            createAlert('error', 'Failed to create cryptocurrency payment. Please try again.');
            return;
        }

        // Create popup with crypto payment information
        createPopup({
            icon: 'fab fa-bitcoin',
            title: 'Cryptocurrency Payment',
            content: `
                <div class="max-w-md mx-auto">
                    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-4">
                        <div class="text-center text-gray-300 mb-6">
                            Click the button below to complete your payment with cryptocurrency
                        </div>
                        
                        <button onclick="window.open('${data.data.checkoutLink}', '_blank'); showCryptoFollowUpPopup();" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Open Payment Page
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-center text-sm text-gray-400">
                        <i class="fas fa-lock mr-2"></i>
                        <span>Secure payment processed by BTCPay</span>
                    </div>
                </div>
            `
        });

    } catch (error) {
        console.error('Crypto payment setup error:', error);
        createAlert('error', 'Failed to initialize cryptocurrency payment. Please try again later.');
    }
}
function showCryptoFollowUpPopup() {
    createPopup({
        icon: 'fas fa-info-circle',
        title: 'Complete Your Payment',
        content: `
            <div class="max-w-md mx-auto">
                <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6">
                    <div class="text-gray-300 space-y-4">
                        <p>
                            Please complete your payment on the page that just opened in a new tab.
                        </p>
                        <p>
                            Once your cryptocurrency payment is confirmed, you will receive a confirmation email.
                        </p>
                        <p>
                            You can safely close this page while waiting for confirmation.
                        </p>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-center">
                    <button onclick="closePopup()" 
                            class="bg-gray-600 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                        Got it
                    </button>
                </div>
            </div>
        `
    });
}
function showPaymentSuccessPopup() {
    createPopup({
        icon: 'fas fa-check-circle text-green-400',
        title: 'Payment Successful',
        content: `
            <div class="max-w-md mx-auto text-center">
                <!-- Success Animation -->
                <div class="mb-6 animate-bounce">
                    <i class="fas fa-check-circle text-green-400 text-5xl"></i>
                </div>

                <!-- Main Content -->
                <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6 mb-6">
                    <div class="space-y-4 text-gray-300">
                        <h3 class="text-xl font-semibold text-white mb-4">
                            Thank you for your purchase!
                        </h3>
                        
                        <p>
                            Your payment has been processed successfully.
                        </p>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="bg-gray-700 bg-opacity-50 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-white mb-3">
                        What's Next?
                    </h4>
                    <div class="text-gray-300 space-y-3">
                        <p>
                            Your account will be automatically updated within the next few minutes.
                        </p>
                        <p>
                            You can visit your <a href="/myprofile" class="text-blue-400 hover:text-blue-300 underline closePopup">profile page</a> to keep track of your account status.
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-6 text-sm text-gray-400">
                    <p>
                        Have questions? <a href="/contact" class="text-blue-400 hover:text-blue-300 underline closePopup">Contact our support team</a>
                    </p>
                </div>
            </div>
        `
    });
}

//Contact
async function initContactPage() {
    var account = await getAccountActive();
    document.querySelector('input[type="email"]').value = account.email;
}

//File manager
function appdataInitFilemanagerFromLocalStorage() {
    // Initialize sort settings
    if (localStorage.getItem('fileManagerSortField')) {
        appdata.fileManager.sortField = localStorage.getItem('fileManagerSortField');
    }
    if (localStorage.getItem('fileManagerSortDirection')) {
        appdata.fileManager.sortDirection = localStorage.getItem('fileManagerSortDirection');
    }
    
    // Initialize copy/move
    if (localStorage.getItem('fileManagerToCopy')) {
        appdata.fileManager.toCopy = localStorage.getItem('fileManagerToCopy');
    }
    if (localStorage.getItem('fileManagerToMove')) {
        appdata.fileManager.toMove = localStorage.getItem('fileManagerToMove');
    }
}
async function itemCheckboxChangeEvent(eventTarget, processDomGeneral, processDomCopyMove) {
    const itemId = eventTarget.closest('[data-item-id]').getAttribute('data-item-id');
    if (eventTarget.checked) {
        appdata.fileManager.contentsSelected[itemId] = true;
    } else {
        delete appdata.fileManager.contentsSelected[itemId];
    }

    if (appdata.pressedKeys[16] == true && appdata.fileManager.lastContentSelected.processing == false && appdata.fileManager.lastContentSelected.id) {
        appdata.fileManager.lastContentSelected.processing = true;

        // Must get position of lastContentSelected
        var lastIndex = Array.prototype.indexOf.call(document.querySelectorAll(".item_checkbox"), document.querySelector(`[data-item-id='${appdata.fileManager.lastContentSelected.id}']`).querySelector(".item_checkbox"));

        // Must get position of current clicked box
        var index = Array.prototype.indexOf.call(document.querySelectorAll(".item_checkbox"), document.querySelector(`[data-item-id='${itemId}']`).querySelector(".item_checkbox"));

        while (index != lastIndex) {
            document.querySelectorAll(".item_checkbox")[index].checked = appdata.fileManager.lastContentSelected.checked;
            document.querySelectorAll(".item_checkbox")[index].dispatchEvent(new Event('change', { bubbles: true }));
            // Get loop direction
            if (index > lastIndex) {
                index--;
            }
            else {
                index++;
            }
        }

        appdata.fileManager.lastContentSelected.processing = false;
    } else {
        appdata.fileManager.lastContentSelected.id = itemId;
        appdata.fileManager.lastContentSelected.checked = eventTarget.checked;
    }

    if(processDomGeneral == true) {
        if(Object.keys(appdata.fileManager.contentsSelected).length == document.querySelectorAll(".item_checkbox").length) {
            document.getElementById("filemanager_mainbuttons_checkboxAll_input").checked = true
        } else {
            document.getElementById("filemanager_mainbuttons_checkboxAll_input").checked = false
        }

        if(Object.keys(appdata.fileManager.contentsSelected).length == 0) {
            document.getElementById("filemanager_mainbuttons_checkboxAll_count").classList.add('hidden')
            document.getElementById("filemanager_mainbuttons_download").classList.add('hidden')
            document.getElementById("filemanager_mainbuttons_copy").classList.add('hidden')
            document.getElementById("filemanager_mainbuttons_move").classList.add('hidden')
            document.getElementById("filemanager_mainbuttons_delete").classList.add('hidden')
    
            if(appdata.fileManager.toCopy == null && appdata.fileManager.toMove == null) {
                hideMainButtons(false)
            }
        } else {
            var accountActive = await getAccountActive()
            hideMainButtons(true)
    
            document.getElementById("filemanager_mainbuttons_checkboxAll_count").classList.remove('hidden')
            document.getElementById("filemanager_mainbuttons_checkboxAll_countvalue").innerText = Object.keys(appdata.fileManager.contentsSelected).length;
            document.getElementById("filemanager_mainbuttons_download").classList.remove('hidden')
            if (appdata.fileManager.mainContent.data.isOwner == true) {
                document.getElementById("filemanager_mainbuttons_copy").classList.remove('hidden')
                document.getElementById("filemanager_mainbuttons_move").classList.remove('hidden')
                document.getElementById("filemanager_mainbuttons_delete").classList.remove('hidden')
            }
            if(accountActive.isCleaner) {
                document.getElementById("filemanager_mainbuttons_delete").classList.remove('hidden')
            }
        }
    }

    //Cancel the copy/move if it exist
    if(processDomCopyMove == true && (appdata.fileManager.toCopy != null || appdata.fileManager.toMove != null)) {
        cancelCopyMove()
    }
}
async function initFilemanager() {
    var account = await getAccountActive()
    document.getElementById("filemanager_loading").classList.add("hidden");

    appdata.fileManager.contentsSelected = {};

    if (appdata.fileManager.mainContent.status == "error-notFound") {
        document.head.innerHTML += '<meta name="prerender-status-code" content="404">';
        document.getElementById("filemanager_alert").classList.remove("hidden");
        document.getElementById("filemanager_alert").classList.replace("border-blue-500", "border-red-500");
        document.getElementById('filemanager_alert_icon').innerHTML = '<i class="fas fa-exclamation-triangle text-red-500 text-2xl mr-3"></i>';
        document.getElementById('filemanager_alert_message').innerHTML = '<span class="font-semibold">This content does not exist</span>';
        document.getElementById('filemanager_alert').innerHTML += `
            <div class="flex flex-col items-center justify-center text-sm text-gray-400 mt-2">
                <p>The content you are looking for could not be found. Possible reasons include:</p>
                <ul class="list-disc pl-5 mt-2">
                    <li>The content has been inactive for an extended period and has been automatically removed.</li>
                    <li>The content has been deleted by the owner.</li>
                </ul>
            </div>`;
        return;
    }
    if (appdata.fileManager.mainContent.data.canAccess == false && appdata.fileManager.mainContent.data.public == false) {
        document.getElementById("filemanager_alert").classList.remove("hidden");
        document.getElementById("filemanager_alert").classList.replace("border-blue-500", "border-yellow-500");
        document.getElementById('filemanager_alert_icon').innerHTML = '<i class="fas fa-globe text-yellow-500 text-2xl mr-3"></i>';
        document.getElementById('filemanager_alert_message').innerHTML = '<span class="font-semibold">This content is not publicly accessible</span>';
        document.getElementById('filemanager_alert').innerHTML += `
            <div class="flex flex-col items-center justify-center text-sm text-gray-400 mt-2">
                <p>To make this content publicly accessible, the owner must change its visibility settings.</p>
            </div>`;
        return;
    }

    if (appdata.fileManager.mainContent.data.canAccess == false && appdata.fileManager.mainContent.data.expire) {
        document.getElementById("filemanager_alert").classList.remove("hidden");
        document.getElementById("filemanager_alert").classList.replace("border-blue-500", "border-yellow-500");
        document.getElementById('filemanager_alert_icon').innerHTML = '<i class="fas fa-clock text-yellow-500 text-2xl mr-3"></i>';
        document.getElementById('filemanager_alert_message').innerHTML = '<span class="font-semibold">This content has expired</span>';
        document.getElementById('filemanager_alert').innerHTML += `
            <div class="flex flex-col items-center justify-center text-sm text-gray-400 mt-2">
                <p>The content you are trying to access has reached its expiration date set by the owner.</p>
                <p>Please contact the owner to regain access or for more information.</p>
            </div>`;
        return;
    }

    if (appdata.fileManager.mainContent.data.canAccess == false && appdata.fileManager.mainContent.data.password == true) {
        if (appdata.fileManager.mainContent.data.passwordStatus == "passwordRequired") {
            document.getElementById("filemanager_alert").classList.remove("hidden");
            document.getElementById('filemanager_alert_icon').innerHTML = '<i class="fas fa-lock text-blue-500 text-2xl mr-3"></i>';
            document.getElementById('filemanager_alert_message').innerHTML = '<span class="font-semibold">This content is password protected</span>';
            document.getElementById("filemanager_alert_passwordform").classList.remove("hidden");
            return;
        } else if (appdata.fileManager.mainContent.data.passwordStatus == "passwordWrong") {
            document.getElementById("filemanager_alert").classList.remove("hidden");
            document.getElementById('filemanager_alert_icon').innerHTML = '<i class="fas fa-exclamation-triangle text-red-500 text-2xl mr-3"></i>';
            document.getElementById('filemanager_alert_message').innerHTML = '<span class="font-semibold">Incorrect password. Please try again.</span>';
            document.getElementById("filemanager_alert_passwordform").classList.remove("hidden");
            return;
        }
    }

    var type = appdata.fileManager.mainContent.data.isRootRecycle ? "recycle" : "standard";

    //#filemanager_description
    if (appdata.fileManager.mainContent.data.description != undefined) {
        document.getElementById("filemanager_description").classList.remove("hidden");

        // Check if marked is already loaded
        if (typeof marked !== 'undefined') {
            document.getElementById("filemanager_description_value").innerHTML = marked.parse(appdata.fileManager.mainContent.data.description);
        } else {
            // Load marked.min.js if not already loaded
            var script = document.createElement('script');
            script.src = '/dist/js/marked.min.js';
            script.onload = function() {
                document.getElementById("filemanager_description_value").innerHTML = marked.parse(appdata.fileManager.mainContent.data.description);
            };
            document.head.appendChild(script);
        }
    }

    //#filemanager_maincontent
    document.getElementById("filemanager_maincontent").classList.remove("hidden");
    document.getElementById("filemanager_maincontent").setAttribute('data-item-id',appdata.fileManager.mainContent.data.id)
    if (type == "standard") {
        if(appdata.fileManager.mainContent.data.parentFolder || sessionStorage.getItem(appdata.fileManager.mainContent.data.id+"_parentFolder")) {
            document.getElementById("filemanager_maincontent_back").classList.remove("hidden");
        }
        document.getElementById("filemanager_maincontent_icon").innerHTML = '<i class="fas fa-folder-open text-yellow-400 text-2xl mr-2"></i>';
        document.getElementById("filemanager_maincontent_name").innerText = appdata.fileManager.mainContent.data.name
        document.getElementById("filemanager_maincontent_createtime").classList.remove("hidden");
        document.getElementById("filemanager_maincontent_createtimevalue").innerText = new Date(appdata.fileManager.mainContent.data.createTime * 1000).toLocaleString();

        document.getElementById("filemanager_maincontent_dropdown").classList.remove("hidden");
        document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_playallmedia").classList.remove("hidden");
        document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_download").classList.remove("hidden");
        if(appdata.fileManager.mainContent.data.isOwner) {
            document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_share").classList.remove("hidden");
            document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_rename").classList.remove("hidden");
            if(!appdata.fileManager.mainContent.data.isRoot) {
                document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_copy").classList.remove("hidden");
                document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_move").classList.remove("hidden");
            }
        } else {
            document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_import").classList.remove("hidden");
        }
        if(appdata.fileManager.mainContent.data.isOwner || account.isCleaner) {
            document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_delete").classList.remove("hidden");
        }
        document.getElementById("filemanager_maincontent_dropdown").querySelector(".item_properties").classList.remove("hidden");
    } else if (type == "recycle") {
        document.getElementById("filemanager_maincontent_icon").innerHTML = '<i class="fas fa-trash text-gray-400 text-2xl mr-2"></i>';
        document.getElementById("filemanager_maincontent_name").innerText = 'Recycle bin';
    }
    if(appdata.fileManager.mainContent.data.isOwner) {
        ['public', 'password', 'expire', 'tags'].forEach(prop => {
            if (appdata.fileManager.mainContent.data[prop]) {
                document.querySelector(`#filemanager_maincontent_properties_${prop}`).classList.remove('hidden');
            }
        });
    }
    if (appdata.fileManager.mainContent.data.directLinks && Object.keys(appdata.fileManager.mainContent.data.directLinks).length > 0) {
        const directLinksCount = Object.keys(appdata.fileManager.mainContent.data.directLinks).length;
        const directLinkText = `${directLinksCount} direct link${directLinksCount > 1 ? 's' : ''}`;
        document.querySelector('#filemanager_maincontent_properties_directlink_value').textContent = directLinkText;
        document.querySelector('#filemanager_maincontent_properties_directlink').classList.remove('hidden');
    }

    document.getElementById("filemanager_maincontent_itemscount").innerText = appdata.fileManager.mainContent.data.childrenCount

    //#filemanager_mainbuttons
    document.getElementById("filemanager_mainbuttons").classList.remove("hidden");
    if(appdata.fileManager.mainContent.data.childrenCount > 0) {
        document.getElementById("filemanager_mainbuttons_checkboxAll").classList.remove("hidden");
    }
    if (type == "standard") {
        document.getElementById("filemanager_mainbuttons_sort").classList.remove("hidden");
        document.getElementById("filemanager_mainbuttons_filter").classList.remove("hidden");
        document.getElementById("filemanager_mainbuttons_search").classList.remove("hidden");
        document.getElementById("filemanager_mainbuttons_refresh").classList.remove("hidden");
        if(appdata.fileManager.mainContent.data.isOwner) {
            document.getElementById("filemanager_mainbuttons_share").classList.remove("hidden");
            document.getElementById("filemanager_mainbuttons_createFolder").classList.remove("hidden");
            document.getElementById("filemanager_mainbuttons_uploadFiles").classList.remove("hidden");
        } else {
            document.getElementById("filemanager_mainbuttons_import").classList.remove("hidden");
        }

        if(appdata.fileManager.toCopy != null) {
            document.getElementById('filemanager_mainbuttons_copyhere_countvalue').innerText = appdata.fileManager.toCopy.split(",").length
            document.getElementById('filemanager_mainbuttons_copyhere').classList.remove('hidden');
            document.getElementById('filemanager_mainbuttons_copycancel').classList.remove('hidden');
            hideMainButtons(true)
        }
        if(appdata.fileManager.toMove != null) {
            document.getElementById('filemanager_mainbuttons_movehere_countvalue').innerText = appdata.fileManager.toMove.split(",").length
            document.getElementById('filemanager_mainbuttons_movehere').classList.remove('hidden');
            document.getElementById('filemanager_mainbuttons_movecancel').classList.remove('hidden');
            hideMainButtons(true)
        }
        
        // Update the sort icons according to appdata.fileManager.sortField and appdata.fileManager.sortDirection
        document.querySelectorAll('.sort-icon').forEach(icon => icon.innerHTML = '');
        document.querySelectorAll('.filemanager_mainbuttons_sort_value').forEach(link => {
            if (link.dataset.sort === appdata.fileManager.sortField) {
                const icon = link.querySelector('.sort-icon');
                if (appdata.fileManager.sortDirection === 1) {
                    icon.innerHTML = '<i class="fas fa-sort-up"></i>';
                } else {
                    icon.innerHTML = '<i class="fas fa-sort-down"></i>';
                }
            }
        });

        if (appdata.fileManager.contentFilter != "") {
            const element = document.getElementById("filemanager_mainbuttons_filter");
            element.classList.replace("bg-gray-600", "bg-yellow-600");
            element.classList.replace("hover:bg-gray-700", "hover:bg-yellow-700");
        }
    }

    //#filemanager_itemslist
    if(appdata.fileManager.contentFilter != "") {
        document.getElementById("filemanager_itemslist_filtered").classList.remove("hidden");
    }
    if(appdata.fileManager.mainContent.data.childrenCount == 0) {
        document.getElementById("filemanager_itemslist_empty").classList.remove("hidden");
    } else {
        Object.entries(appdata.fileManager.mainContent.data.children).forEach(([key, item]) => {
            buildFilemanagerItemHTML(item, account)
        });
    }
    
    document.getElementById("filemanager_itemslist").classList.remove("hidden");
    if(appdata.fileManager.mainContent.data.childrenCount == 1 && isItemPlayable(Object.entries(appdata.fileManager.mainContent.data.children)[0][1])) {
        playContent(Object.entries(appdata.fileManager.mainContent.data.children)[0][1].id)
    }

    if(appdata.fileManager.mainContent.metadata.totalPages > 1) {
        document.getElementById("filemanager_topbuttons_pagination").classList.remove("hidden");
        document.querySelectorAll(".filemanager_mainbuttons_pagination_details2").forEach(el => el.classList.remove("hidden"));
    }
    document.getElementById("filemanager_mainbuttons_pagination").classList.remove("hidden");
    document.querySelectorAll(".filemanager_mainbuttons_pagination_details").forEach(el => el.classList.remove("hidden"));
    document.querySelectorAll(".filemanager_mainbuttons_pagination_pagecurrent").forEach(element => {
        element.innerText = appdata.fileManager.mainContent.metadata.page;
    });
    document.querySelectorAll(".filemanager_mainbuttons_pagination_pagecount").forEach(element => {
        element.innerText = appdata.fileManager.mainContent.metadata.totalPages;
    });
    document.querySelectorAll(".filemanager_mainbuttons_pagination_itemcount").forEach(element => {
        element.innerText = appdata.fileManager.mainContent.metadata.pageSize;
    });
    document.querySelectorAll(".filemanager_mainbuttons_pagination_itemtotal").forEach(element => {
        element.innerText = appdata.fileManager.mainContent.data.childrenCount;
    });
    document.querySelectorAll('.filemanager_mainbuttons_pagination_pageinput').forEach(input => input.value = appdata.fileManager.mainContent.metadata.page);

    if(!appdata.fileManager.mainContent.data.isOwner && appdata.fileManager.mainContent.data.canAccess == true) {
        document.getElementById("filemanager_abuse").classList.remove("hidden")
        if(account.isCleaner) {
            document.getElementById("filemanager_abuse_remove_button").classList.remove("hidden")
        }
    }

    if(appdata.fileManager.mainContent.metadata.page > 1) {
        document.querySelectorAll(".filemanager_mainbuttons_pagination_previous").forEach(el => el.classList.remove("hidden"));
        updateURLParameter('page', appdata.fileManager.mainContent.metadata.page);
    } else {
        updateURLParameter('page', null);
    }
    if(appdata.fileManager.contentFilter == "") {
        updateURLParameter('filter', null);
    }
    if(appdata.fileManager.mainContent.metadata.page < appdata.fileManager.mainContent.metadata.totalPages) {document.querySelectorAll(".filemanager_mainbuttons_pagination_next").forEach(el => el.classList.remove("hidden"))}
    if(appdata.fileManager.mainContent.data?.type === "folder" && appdata.fileManager.mainContent.data?.public) {
        const newUrl = new URL(`https://${location.hostname}/d/${appdata.fileManager.mainContent.data.code}`);
        newUrl.search = location.search;
        history.replaceState({}, '', newUrl);
    }

    launchAds()
}
async function refreshFilemanager() {
    await loadPage('filemanager');
    await setContentToMainContent(appdata.fileManager.mainContent.data.id, appdata.fileManager.contentFilter, appdata.fileManager.mainContent.metadata.page, appdata.fileManager.mainContent.metadata.pageSize, appdata.fileManager.sortField, appdata.fileManager.sortDirection)
    initFilemanager();
}
function buildFilemanagerItemHTML(item, account) {
    const playableMedia = isItemPlayable(item);
    const iconClass = item.type === "file" ? getIconForMimeType(item.mimetype) : 'fas fa-folder text-yellow-400';

    const html = `
        <div class="border-b border-gray-600" data-item-id="${item.id}">
            <div class="flex items-center justify-between p-1 space-x-2">
                <div class="flex items-center overflow-auto">
                    <div class="min-w-4">
                        <input type="checkbox" class="item_checkbox text-blue-500 mr-2">
                    </div>
                    <div class="min-w-8">
                    ${item.type === "file" ? 
                        `<div class="relative inline-flex">
                            <i class="${iconClass} text-blue-400 text-2xl mr-2"></i>
                            ${item.isFrozen ? 
                                `<div class="absolute inline-flex items-center justify-center w-auto min-w-5 h-5 text-xs font-bold text-white bg-slate-400 border border-gray-900 rounded-full -bottom-1 -start-1">
                                    <i class="fas fa-snowflake"></i>
                                </div>` 
                                : ''
                            }
                        </div>` :
                        `<div class="relative inline-flex">
                            <i class="fas fa-folder text-yellow-400 text-2xl mr-2"></i>
                            <div class="absolute inline-flex items-center justify-center w-auto min-w-5 h-5 text-xs font-bold text-white ${item.canAccess ? 'bg-gray-500' : 'bg-red-500'} border border-gray-900 rounded-full -bottom-1 -start-1">
                                ${item.canAccess ? item.childrenCount : '<i class="fas fa-lock"></i>'}
                            </div>
                        </div>`}
                    </div>
                    <div class="truncate">
                        <a href="${item.type === 'folder' ? `/d/${item.id}` : 'javascript:void(0);'}" class="item_open font-semibold text-sm text-white hover:underline">${item.name}</a>
                        <div class="flex flex-col text-xs text-gray-400 mt-1">
                            <div class="min-w-24"><span>${new Date(item.createTime * 1000).toLocaleString()}</span></div>
                            ${item.type === "file" ? `<div class="min-w-24"><span>${humanFileSize(item.size, true)}</span></div>` : ''}
                            ${item.type === "file" && item.isOwner ? `<div class="min-w-24"><span>${item.downloadCount} downloads</span></div>` : ''}
                        </div>
                        ${item.isOwner ? `
                        <div class="text-xs text-white flex flex-row mt-1">
                            ${item.public ? '<span class="bg-gray-500 text-white rounded px-1 py-0.5 mr-1"><i class="fas fa-globe mr-1"></i>public</span>' : ''}
                            ${item.password ? '<span class="bg-gray-500 text-white rounded px-1 py-0.5 mr-1"><i class="fas fa-lock mr-1"></i>protected</span>' : ''}
                            ${item.expire ? '<span class="bg-gray-500 text-white rounded px-1 py-0.5 mr-1"><i class="fas fa-hourglass-end mr-1"></i>expire</span>' : ''}
                            ${item.tags ? '<span class="bg-gray-500 text-white rounded px-1 py-0.5 mr-1"><i class="fas fa-tag mr-1"></i>tags</span>' : ''}
                            ${(item.directLinks && Object.keys(item.directLinks).length > 0) ? `<span class="bg-gray-500 text-white rounded px-1 py-0.5 mr-1"><i class="fas fa-link mr-1"></i>${Object.keys(item.directLinks).length} direct link${Object.keys(item.directLinks).length > 1 ? 's' : ''}</span>` : ''}
                        </div>
                        ` : ''}
                        ${item.thumbnail ? `<div class="thumbnail mt-2">
                            <img class="item_thumbnail max-h-36" src="${item.thumbnail}" alt="Thumbnail" loading="lazy">
                        </div>` : ''}
                    </div>
                </div>
                <div>
                    <div class="flex flex-row space-x-2">
                        ${item.type === "folder" ? 
                            `<button class="item_open border border-gray-600 text-white text-sm px-2 py-1 rounded shadow hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-folder-open mr-1"></i>
                                    <span class="hidden lg:inline">Open</span>
                            </button>` : ''}
                        ${playableMedia ? 
                            `<button class="item_play border border-gray-600 text-white text-sm px-2 py-1 rounded shadow hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-play mr-1"></i>
                                    <span class="hidden lg:inline">Play</span>
                            </button>
                            <button class="item_close hidden border border-gray-600 text-white text-sm px-2 py-1 rounded shadow hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-times mr-1"></i>
                                    <span class="hidden lg:inline">Close</span>
                            </button>` : ''}
                        <button class="item_download border border-gray-600 text-white text-sm px-2 py-1 rounded shadow hover:bg-gray-700 flex items-center">
                            <i class="fas fa-download mr-1"></i>
                            <span class="hidden lg:inline">Download</span>
                        </button>
                        <div class="relative">
                            <button class="dropdown-toggle border border-gray-600 text-sm px-2 py-1 rounded hover:bg-gray-700">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown absolute z-10 right-0 bg-gray-700 mt-1 rounded shadow border w-52 border-gray-600 hidden">
                                ${item.type === "folder" ? `<a href="/d/${item.id}" class="item_open p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-folder-open"></i>Open</a>` : ''}
                                <a href="javascript:void(0)" class="item_download p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-download"></i>Download</a>
                                ${(!item.isOwner) ? `<a href="javascript:void(0)" class="item_import p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-file-import"></i>Import</a>` : ''}
                                ${(item.isOwner && item.type === "folder") ? `<a href="javascript:void(0)" class="item_share p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-share-alt"></i>Share</a>` : ''}
                                ${playableMedia ? `<a href="javascript:void(0)" class="item_play p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-play"></i>Play</a>
                                <a href="javascript:void(0)" class="item_close p-2 flex items-center gap-2 hover:bg-gray-600 hidden"><i class="fas fa-times"></i>Close</a>` : ''}
                                <hr class="border-gray-600">
                                ${item.isOwner ? `
                                    <a href="javascript:void(0)" class="item_rename p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-pencil-alt"></i>Rename</a>
                                    <a href="javascript:void(0)" class="item_copy p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-copy"></i>Copy</a>
                                    <a href="javascript:void(0)" class="item_move p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-arrows-alt"></i>Move</a>
                                ` : ''}
                                ${(item.isOwner || account.isCleaner) ? '<a href="javascript:void(0)" class="item_delete p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-trash"></i>Delete</a>' : ''}
                                <hr class="border-gray-600">
                                <a href="javascript:void(0)" class="item_properties p-2 flex items-center gap-2 hover:bg-gray-600"><i class="fas fa-info-circle"></i>Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    document.getElementById('filemanager_itemslist').insertAdjacentHTML('beforeend', html);
}
async function getContent(contentId, contentFilter, page = 1, pageSize = 1000, sortField = "createTime", sortDirection = -1) {
    try {
        const accountActive = await getAccountActive();
        const url = new URL(`https://${appdata.apiServer}.gofile.io/contents/${contentId}`);
        const params = new URLSearchParams({ wt: appdata.wt, contentFilter, page, pageSize, sortField, sortDirection});

        const password = sessionStorage.getItem(`password|${contentId}`);
        if (password) params.append('password', password);

        url.search = params.toString();

        const response = await fetch(url, {
            headers: { 'Authorization': `Bearer ${accountActive.token}` }
        });

        if (!response.ok) throw new Error(response.status);

        const fetchResult = await response.json();
        if (fetchResult.status !== "ok" && fetchResult.status !== "error-notFound") {
            throw new Error(fetchResult.status);
        }

        if(fetchResult.data.password && fetchResult.data.passwordStatus == "passwordWrong") {
            sessionStorage.removeItem(`password|${contentId}`);
        }

        return fetchResult;
    } catch (error) {
        throw new Error("getContent " + error.message);
    }
}
async function deleteContents(contentsId, proof, confirmed = false) {
    const numContents = contentsId.split(',').length;
    
    if (!confirmed) {
        createPopup({
            icon: 'fas fa-exclamation-triangle',
            title: 'Confirm Deletion',
            content: `
                <div class="min-h-full">
                    <p class="mb-4">You are about to delete ${numContents} content item(s). Are you sure you want to proceed?</p>
                    <div class="space-y-6 text-center">
                        <button id="popup_confirmdelete" class="py-1 px-3 bg-red-600 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out text-center text-white font-semibold mt-4">
                            Confirm Deletion
                        </button>
                    </div>
                </div>
            `
        });
        document.getElementById('popup_confirmdelete').addEventListener('click', function() {
            deleteContents(contentsId, proof, true);
        });
        return;
    }
    
    try {
        createAlert('loading', 'Deleting contents...');
        await deleteContentsFetch(contentsId, proof);
        createAlert('success', `${numContents} content item(s) deleted successfully.`);
        await refreshFilemanager()
    } catch (error) {
        if (error.message.includes("error-proofNeeded")) {
            createPopup({
                icon: 'fas fa-exclamation-triangle',
                title: 'Proof Required',
                content: `
                    <div class="min-h-full">
                        <p class="mb-4">Please provide a justification for the content deletion:</p>
                        <textarea id="deletion_proof" rows="4" class="w-full p-2 rounded bg-gray-700"></textarea>
                        <div class="space-y-6 text-center">
                            <button id="popup_submitproof" class="py-1 px-3 bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out text-center text-white font-semibold mt-4">
                                Submit Proof
                            </button>
                        </div>
                    </div>
                `
            });
            document.getElementById('popup_submitproof').addEventListener('click', function() {
                const justification = document.getElementById('deletion_proof').value;
                if (justification.trim()) {
                    deleteContents(contentsId, justification, true);
                } else {
                    createAlert('error', 'Proof cannot be empty.');
                }
            });
        } else {
            createAlert('error', error.message);
        }
    }
}
async function deleteContentsFetch(contentsId, proof) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch('https://'+appdata.apiServer+'.gofile.io/contents', {
            method: 'DELETE',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                contentsId: contentsId,
                proof: proof,
            })
        });
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result
        } else {
            throw new Error(result.status);
        }
    } catch (error) {
        throw new Error("deleteContent "+error.message);
    }
}
async function setContentToMainContent(contentId, contentFilter, page = 1, pageSize = 1000, sortField = appdata.fileManager.sortField, sortDirection = -1) {
    try {
        var getContentResult = await getContent(contentId, contentFilter, page, pageSize, sortField, sortDirection)
        if (getContentResult.status != "ok" && getContentResult.status != "error-notFound"){
            throw new Error(getContentResult.status);
        }
        appdata.fileManager.mainContent = getContentResult
        console.log(appdata.fileManager.mainContent)
    } catch (error) {
        throw new Error("setContentToMainContent "+error.message);
    }
}
async function downloadContent(contentId) {
    var contentType
    if(contentId == appdata.fileManager.mainContent.data.id) {
        contentType = appdata.fileManager.mainContent.data.type
    } else if (appdata.fileManager.mainContent.data.children[contentId] != undefined){
        contentType = appdata.fileManager.mainContent.data.children[contentId].type
    }
    
    if(contentType == "folder") {
        try {
            createAlert('loading', 'Creating download link ...');
            await getContent(contentId) //Need to launch getContent here to trigger the authDownload for the folder
            await downloadBulkContents(contentId)
        } catch (error) {
            createAlert('error', error.message);
        }
    } else {
        if(appdata.fileManager.mainContent.data.children[contentId].overloaded) {
            return createPopup({
                icon: 'fas fa-server text-yellow-500',
                title: 'High Traffic Alert',
                content: `
                    <div class="flex flex-col p-5 space-y-5">
                        <!-- File Info -->
                        <div class="flex items-center gap-4 p-4 bg-gray-800/60 rounded-xl border border-gray-700/50 shadow-sm">
                            <i class="${getIconForMimeType(appdata.fileManager.mainContent.data.children[contentId].mimetype)} text-2xl text-gray-300"></i>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-semibold text-gray-200 truncate">
                                    ${appdata.fileManager.mainContent.data.children[contentId].name}
                                </h3>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium text-gray-400 bg-gray-700/50 rounded">
                                        Server ${appdata.fileManager.mainContent.data.children[contentId].serverSelected}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Message -->
                        <div class="text-center space-y-2">
                            <p class="text-sm text-gray-300">
                                We're experiencing higher than normal traffic at the moment.
                            </p>
                            <p class="text-sm text-gray-400">
                                This file is temporarily unavailable on the free tier.
                            </p>
                        </div>
            
                        <!-- Suggestion -->
                        <div class="p-3 bg-yellow-500/10 border border-yellow-500/20 rounded-lg">
                            <p class="text-sm text-yellow-400 text-center">
                                <i class="fas fa-lightbulb mr-2"></i>
                                Upgrade to Premium for priority access and dedicated server resources
                            </p>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex gap-3 pt-2">
                            <button 
                                onclick="refreshFilemanager(); closePopup();"
                                class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-300 bg-gray-700/70 hover:bg-gray-700 rounded-lg transition-colors duration-200 flex items-center justify-center"
                            >
                                <i class="fas fa-clock mr-2"></i>Try Again Later
                            </button>
                            
                            <a 
                                href="/premium"
                                class="closePopup flex-1 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-yellow-600 to-yellow-500 hover:from-yellow-500 hover:to-yellow-400 rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg shadow-yellow-500/20"
                            >
                                <i class="fas fa-crown mr-2"></i>Upgrade to Premium
                            </a>
                        </div>
                    </div>
                `
            });
        }
        var tempLink = document.createElement("a");
        tempLink.setAttribute("href", appdata.fileManager.mainContent.data.children[contentId].link);
        tempLink.click();
    }
}
function openContent(contentId) {
    var contentType
    if(contentId == appdata.fileManager.mainContent.data.id) {
        contentType = appdata.fileManager.mainContent.data.type
    } else if (appdata.fileManager.mainContent.data.children[contentId] != undefined){
        contentType = appdata.fileManager.mainContent.data.children[contentId].type
    }

    if(contentType == "folder") {
        loadUrl("/d/"+contentId)
    } else {
        downloadContent(contentId)
    }
}
function playAllContent() {
    document.querySelectorAll('.item_play').forEach(button => {
        const closestElement = button.closest('[data-item-id]');
        if (closestElement) {
            const uuid = closestElement.getAttribute('data-item-id');
            playContent(uuid);
        }
    });
    document.querySelector('.item_closeallmedia').classList.remove('hidden');
    document.querySelector('.item_playallmedia').classList.add('hidden');
}
async function playContent(contentId, scroll) {
    const item = appdata.fileManager.mainContent.data.children[contentId];
    if (!item || item.type !== "file") {
        return createAlert("error", "Not a file");
    }

    if(item.overloaded) {
        return createPopup({
            icon: 'fas fa-server text-yellow-500',
            title: 'High Traffic Alert',
            content: `
                <div class="flex flex-col p-5 space-y-5">
                    <!-- File Info -->
                    <div class="flex items-center gap-4 p-4 bg-gray-800/60 rounded-xl border border-gray-700/50 shadow-sm">
                        <i class="${getIconForMimeType(appdata.fileManager.mainContent.data.children[contentId].mimetype)} text-2xl text-gray-300"></i>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-200 truncate">
                                ${appdata.fileManager.mainContent.data.children[contentId].name}
                            </h3>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium text-gray-400 bg-gray-700/50 rounded">
                                    Server ${appdata.fileManager.mainContent.data.children[contentId].serverSelected}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Message -->
                    <div class="text-center space-y-2">
                        <p class="text-sm text-gray-300">
                            We're experiencing higher than normal traffic at the moment.
                        </p>
                        <p class="text-sm text-gray-400">
                            This file is temporarily unavailable on the free tier.
                        </p>
                    </div>
        
                    <!-- Suggestion -->
                    <div class="p-3 bg-yellow-500/10 border border-yellow-500/20 rounded-lg">
                        <p class="text-sm text-yellow-400 text-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Upgrade to Premium for priority access and dedicated server resources
                        </p>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex gap-3 pt-2">
                        <button 
                            onclick="closePopup();"
                            class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-300 bg-gray-700/70 hover:bg-gray-700 rounded-lg transition-colors duration-200 flex items-center justify-center"
                        >
                            <i class="fas fa-clock mr-2"></i>Try Again Later
                        </button>
                        
                        <a 
                            href="/premium"
                            class="closePopup flex-1 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-yellow-600 to-yellow-500 hover:from-yellow-500 hover:to-yellow-400 rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg shadow-yellow-500/20"
                        >
                            <i class="fas fa-crown mr-2"></i>Upgrade to Premium
                        </a>
                    </div>
                </div>
            `
        });
    }

    if (item.mimetype.startsWith('text/') && item.size > 1024 * 1024) { // 1MB in bytes
        return createAlert("error", "Text content is too large to display");
    }

    let element = document.querySelector(`[data-item-id='${contentId}']`);
    if (!element) {
        return createAlert("error", "Element not found");
    }

    // Remove any existing media player div
    element.querySelector('.item-mediaplayer')?.remove();

    const mediaPlayerDiv = document.createElement('div');
    mediaPlayerDiv.className = 'item-mediaplayer mt-2 max-h-screen w-full flex flex-col items-center justify-center';

    const loadingSpinner = document.createElement('div');
    loadingSpinner.className = 'animate-spin rounded-full h-8 w-8 border-t-4 border-blue-500';
    mediaPlayerDiv.appendChild(loadingSpinner);
    element.appendChild(mediaPlayerDiv);

    let mediaElement;

    if (item.mimetype.startsWith('image/')) {
        mediaElement = new Image();
        mediaElement.src = item.link;
        mediaElement.alt = item.name;
        mediaElement.loading = 'lazy';
        mediaElement.className = 'max-h-[90vh] max-w-full';
        if (mediaElement) mediaPlayerDiv.appendChild(mediaElement);
        mediaElement.onload = () => {
            loadingSpinner.remove();
            if(scroll) {
                mediaElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        };
    } else if (item.mimetype.startsWith('video/') || item.mimetype.startsWith('audio/')) {
        mediaElement = document.createElement(item.mimetype.startsWith('video/') ? 'video' : 'audio');
        mediaElement.controls = true;
        if (item.mimetype.startsWith('video/') && item.thumbnail) mediaElement.poster = item.thumbnail;
        
        const source = document.createElement('source');
        source.src = item.link;
        source.type = item.mimetype;
        
        // Add error handling for codec support on the source element
        source.addEventListener('error', () => {
            const errorContainer = document.createElement('div');
            errorContainer.className = 'text-red-500 text-sm mt-2 text-center';
            errorContainer.innerHTML = `
                Your browser doesn't support playing this ${mediaElement.tagName.toLowerCase()} format.<br>
                You can download it to play locally.
            `;
            mediaPlayerDiv.appendChild(errorContainer);
        });
    
        mediaElement.className = 'max-h-[90vh] max-w-full min-w-80';
        mediaElement.appendChild(source);
    
        // Wait for metadata to be loaded before scrolling
        mediaElement.addEventListener('loadedmetadata', () => {
            if(scroll) {
                mediaElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    
        // Remove loading spinner and append media element
        loadingSpinner.remove();
        mediaPlayerDiv.appendChild(mediaElement);
    } else if (item.mimetype.startsWith('text/')) {
    
        const loadPrismResources = async () => {
            if (!document.querySelector('link[href="/plugins/prism/prism.css"]')) {
                const link = document.createElement('link');
                link.rel = 'stylesheet';
                link.href = '/plugins/prism/prism.css';
                document.head.appendChild(link);
                await new Promise(resolve => link.onload = resolve);
            }

            if (!document.querySelector('script[src="/plugins/prism/prism.js"]')) {
                const script = document.createElement('script');
                script.src = '/plugins/prism/prism.js';
                document.head.appendChild(script);
                await new Promise(resolve => script.onload = resolve);
            }
        };

        try {
            const response = await fetch(item.link, { credentials: 'include' });
            const text = await response.text();
            await loadPrismResources();

            mediaElement = document.createElement('pre');
            mediaElement.className = 'language-text max-h-screen max-w-full';
            mediaElement.textContent = text;
            Prism.highlightElement(mediaElement);
            loadingSpinner.remove();
            if (mediaElement) mediaPlayerDiv.appendChild(mediaElement);
            if(scroll) mediaPlayerDiv.scrollIntoView({ behavior: 'smooth' });
        } catch (error) {
            loadingSpinner.remove();
            createAlert("error", "Failed to load text content");
        }
    } else if (item.mimetype === 'application/pdf') {
        mediaElement = document.createElement('iframe');
        mediaElement.src = `/plugins/pdfjs/web/viewer.html?file=${item.link}`;
        mediaElement.className = 'w-full h-[90vh]';
        mediaElement.style.border = 'none';
        loadingSpinner.remove();
        if (mediaElement) mediaPlayerDiv.appendChild(mediaElement);
        if(scroll) mediaPlayerDiv.scrollIntoView({ behavior: 'smooth' });
    }

    element.querySelectorAll('.item_play, .thumbnail').forEach(elem => {
        elem.classList.add('hidden');
    });
    
    element.querySelectorAll('.item_close').forEach(closeButton => {
        closeButton.classList.remove('hidden');
    });
}
function closeAllContent() {
    document.querySelectorAll('.item_close').forEach(button => {
        const closestElement = button.closest('[data-item-id]');
        if (closestElement) {
            const uuid = closestElement.getAttribute('data-item-id');
            closeContent(uuid);
        }
    });
    document.querySelector('.item_playallmedia').classList.remove('hidden');
    document.querySelector('.item_closeallmedia').classList.add('hidden');
}
function closeContent(contentId) {
    let element = document.querySelector(`[data-item-id='${contentId}']`);
    if (element === null) {
        createAlert("error", "Element not found");
        return;
    }

    // Find and remove all media player divs
    element.querySelectorAll('.item-mediaplayer').forEach(mediaPlayer => {
        mediaPlayer.remove();
    });

    // Find and hide all close buttons
    element.querySelectorAll('.item_close').forEach(closeButton => {
        closeButton.classList.add('hidden');
    });

    // Find and show all play buttons
    element.querySelectorAll('.item_play').forEach(playButton => {
        playButton.classList.remove('hidden');
    });

    // Find and show all thumbnails
    element.querySelectorAll('.thumbnail').forEach(thumbnail => {
        thumbnail.classList.remove('hidden');
    });
}
async function downloadBulkContents(contentId, childrenIds) {
    try {
        const accountActive = await getAccountActive();
        if(accountActive.tier != "premium") {
            return createPopup({
                icon: 'fas fa-crown text-yellow-500',
                title: 'Premium Account Required',
                content: `
                    <div class="flex flex-col items-center space-y-6 p-6">
                        <div class="text-center space-y-3">
                            <p class="text-gray-300 text-lg">
                                Bulk download is a Premium feature
                            </p>
                            <p class="text-gray-400 text-sm">
                                Upgrade to Premium to download multiple files at once and unlock all premium features!
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                            <a href="/premium" 
                                class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-rocket mr-2"></i>
                                Upgrade to Premium
                            </a>
                            
                            <button onclick="closePopup()" 
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-clock mr-2"></i>
                                Maybe Later
                            </button>
                        </div>
                    </div>
                `
            });              
        }

        let data = {
            contentIdsToZip: childrenIds,
            expireTime: Math.floor(Date.now() / 1000) + (5 * 60),
            isReqLink: true
        };
          
        if (sessionStorage['password|' + appdata.fileManager.mainContent.data.id]) {
            data.password = sessionStorage['password|' + appdata.fileManager.mainContent.data.id];
        }
          
        let createDirectLinkResult = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${contentId}/directlinks`, {
            method: "POST",
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });

        if (!createDirectLinkResult.ok) {
            throw new Error(createDirectLinkResult.status);
        }

        let result = await createDirectLinkResult.json();

        if (result.status !== "ok") {
            throw new Error(result.status);
        }
        
        var tempLink = document.createElement("a");
        tempLink.setAttribute("href", result.data.directLink);
        tempLink.click();
        closePopup()
        
    } catch (error) {
        throw new Error("downloadBulkContents "+error.message);
    }
}
async function createFolderFetch(parentFolderId, folderName, public) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch('https://'+appdata.apiServer+'.gofile.io/contents/createfolder', {
            method: 'POST',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                parentFolderId: parentFolderId,
                folderName: folderName,
                public: public
            })
        });
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("createFolder "+error.message);
    }
}
async function searchFetch(contentId, searchedString) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/search?contentId=${contentId}&searchedString=${encodeURIComponent(searchedString)}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accountActive.token}`,
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(response.status);
        }

        const result = await response.json();

        if (result.status === 'ok') {
            return result;
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("searchFetch " + error.message);
    }
}
async function renameContent(contentId) {
    var contentName;
    if(contentId == appdata.fileManager.mainContent.data.id) {
        contentName = appdata.fileManager.mainContent.data.name;
    } else if (appdata.fileManager.mainContent.data.children[contentId] != undefined) {
        contentName = appdata.fileManager.mainContent.data.children[contentId].name;
    }
    
    createPopup({
        icon: 'fas fa-edit',
        title: 'Rename Content',
        content: `
            <div class="min-h-full">
                <p class="mb-4">Please enter a new name for the content:</p>
                <form id="popup_renameForm">
                    <input id="popup_newContentName" type="text" class="w-full p-2 rounded bg-gray-700" value="${contentName}">
                    <div class="space-y-6 text-center">
                        <button type="submit" id="popup_submitrename" class="py-1 px-3 bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out text-center text-white font-semibold mt-4">
                            Rename Content
                        </button>
                    </div>
                </form>
            </div>
        `
    });
    
    document.getElementById('popup_newContentName').focus();
    document.getElementById('popup_newContentName').setSelectionRange(contentName.length, contentName.length);

    document.getElementById('popup_renameForm').addEventListener('submit', async function(event) {
        event.preventDefault();
        const newContentName = document.getElementById('popup_newContentName').value.trim();
        if (newContentName) {
            try {
                createAlert('loading', 'Renaming content...');
                const result = await renameContentFetch(contentId, newContentName);
                createAlert('success', `Content renamed successfully to "${newContentName}".`);
                await refreshFilemanager()
            } catch (error) {
                createAlert('error', error.message);
            }
        } else {
            createAlert('error', 'Content name cannot be empty.');
        }
    });
}
async function renameContentFetch(contentId, contentName) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${contentId}/update`, {
            method: 'PUT',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                attribute: "name",
                attributeValue: contentName
            })
        });
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result;
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("renameContent " + error.message);
    }
}
function showProperties(contentId) {
    var content;
    if (contentId == appdata.fileManager.mainContent.data.id) {
        content = appdata.fileManager.mainContent.data;
    } else if (appdata.fileManager.mainContent.data.children[contentId] !== undefined) {
        content = appdata.fileManager.mainContent.data.children[contentId];
    }

    const isFile = content.type !== 'folder';
    const iconClass = isFile ? getIconForMimeType(content.mimetype) : 'fas fa-folder text-yellow-400';
    const createTime = new Date(content.createTime * 1000).toLocaleString(); // Convert seconds to human-readable date

    createPopup({
        icon: `${iconClass}`,
        title: `${isFile ? 'File' : 'Folder'} Details`,
        content: `
        <div class="min-h-full space-y-4" data-item-id="${content.id}">
            <!-- Header with Icon and Name -->
            <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                <i class="${iconClass} text-4xl"></i>
                <h2 class="text-xl font-bold text-white">${content.name}</h2>
            </div>
    
            <!-- General Information -->
            <div class="pb-4 border-b border-gray-600">
                <div class="flex items-center mb-2">
                    <i class="fas fa-info-circle text-blue-400 text-3xl"></i>
                    <h3 class="font-bold text-white ml-2">General Information</h3>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center space-x-3 text-gray-300">
                        <i class="fas fa-tag"></i>
                        <span class="font-medium">Type:</span>
                        <p>${content.type}</p>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-300">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="font-medium">Created:</span>
                        <p>${createTime}</p>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-300">
                        <i class="fas fa-id-badge"></i>
                        <span class="font-medium">ID:</span>
                        <span id="content_id" class="font-semibold text-white">${content.id}</span>
                        <button class="popover-trigger copy-button bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded inline-flex items-center" data-popover="Copy the ID." data-copy-target="#content_id" data-copy-popover="ID copied!">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Specific Information -->
            <div class="pb-4 border-b border-gray-600">
                <div class="flex items-center mb-2">
                    <i class="fas fa-file-alt text-orange-400 text-3xl"></i>
                    <h3 class="font-bold text-white ml-2">${isFile ? 'File Information' : 'Folder Information'}</h3>
                </div>
                <div class="space-y-2 text-sm">
                    ${isFile ? `
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-file-alt"></i>
                            <span class="font-medium">Size:</span>
                            <p>${humanFileSize(content.size, true)}</p>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-download"></i>
                            <span class="font-medium">Downloads:</span>
                            <p>${content.downloadCount}</p>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-file-code"></i>
                            <span class="font-medium">MIME Type:</span>
                            <p>${content.mimetype}</p>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-hashtag"></i>
                            <span class="font-medium">MD5:</span>
                            <span id="content_md5" class="font-semibold text-white">${content.md5}</span>
                            <button class="popover-trigger copy-button bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded inline-flex items-center" data-popover="Copy the MD5." data-copy-target="#content_md5" data-copy-popover="MD5 copied!">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-server"></i>
                            <span class="font-medium">Servers:</span>
                            <p>${content.servers}</p>
                        </div>
                    ` : `
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-folder"></i>
                            <span class="font-medium">Children:</span>
                            <p>${content.childrenCount}</p>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-300">
                            <i class="fas fa-link"></i>
                            <span class="font-medium">Short Link:</span>
                            <span id="content_shortlink" class="font-semibold text-white">https://${window.location.host}/d/${content.code}</span>
                            <button class="popover-trigger copy-button bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded inline-flex items-center mr-1" data-popover="Copy the link." data-copy-target="#content_shortlink" data-copy-popover="Link copied!">
                                <i class="fas fa-copy"></i>
                            </button>
                            <button id="content_share" class="popover-trigger bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded inline-flex items-center" data-popover="Share this folder">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    `}
                </div>
            </div>
    
            ${content.isOwner ? `
            <!-- Settings Information -->
            <div class="pb-4">
                <div class="flex items-center mb-2">
                    <i class="fas fa-cogs text-green-400 text-3xl"></i>
                    <h3 class="font-bold text-white ml-2">Settings</h3>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between text-gray-300">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-link"></i>
                            <span class="font-medium">Direct Links:</span>
                            <p>${content.directLinks ? Object.keys(content.directLinks).length : 0}</p>
                        </div>
                        <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="directLinks">
                            <i class="fas fa-cogs mr-1"></i> Configure
                        </button>
                    </div>
                    ${isFile ? '' : `
                        <div class="flex items-center justify-between text-gray-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-globe"></i>
                                <span class="font-medium">Public:</span>
                                <p>${content.public ? 'Yes' : 'No'}</p>
                            </div>
                            <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="public">
                                <i class="fas fa-cogs mr-1"></i> Configure
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-gray-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-lock"></i>
                                <span class="font-medium">Password Protected:</span>
                                <p>${content.password ? 'Yes' : 'No'}</p>
                            </div>
                            <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="password">
                                <i class="fas fa-cogs mr-1"></i> Configure
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-gray-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-align-left"></i>
                                <span class="font-medium">Description:</span>
                                <p>${(content.description && content.description.length > 30) ? content.description.substring(0, 30) + '...' : content.description || 'N/A'}</p>
                            </div>
                            <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="description">
                                <i class="fas fa-cogs mr-1"></i> Configure
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-gray-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-clock"></i>
                                <span class="font-medium">Expires:</span>
                                <p>${content.expire ? new Date(content.expire * 1000).toLocaleString() : 'N/A'}</p>
                            </div>
                            <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="expire">
                                <i class="fas fa-cogs mr-1"></i> Configure
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-gray-300">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-tags"></i>
                                <span class="font-medium">Tags:</span>
                                <p>${(content.tags && content.tags.length > 30) ? content.tags.substring(0, 30) + '...' : content.tags || 'N/A'}</p>
                            </div>
                            <button class="item_settings bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded inline-flex items-center" data-setting="tags">
                                <i class="fas fa-cogs mr-1"></i> Configure
                            </button>
                        </div>
                    `}
                </div>
            </div>
            ` : ''}
        </div>
        `
    });
    document.getElementById('content_share')?.addEventListener('click', () => shareContent(content));
    initPopover();
}
async function showSettings(contentId, setting) {
    var content;
    if (contentId === appdata.fileManager.mainContent.data.id) {
        content = appdata.fileManager.mainContent.data;
    } else if (appdata.fileManager.mainContent.data.children[contentId] !== undefined) {
        content = appdata.fileManager.mainContent.data.children[contentId];
    }

    const accountActive = await getAccountActive();
    const isFile = content.type !== 'folder';
    const iconClass = isFile ? getIconForMimeType(content.mimetype) : 'fas fa-folder text-yellow-400';

    if (setting === "directLinks") {
        if(accountActive.tier != "premium") {
            return createPopup({
                icon: 'fas fa-crown text-yellow-500',
                title: 'Premium Account Required',
                content: `
                    <div class="flex flex-col items-center space-y-6 p-6">
                        <div class="text-center space-y-3">
                            <p class="text-gray-300 text-lg">
                                Direct Links is a Premium feature
                            </p>
                            <p class="text-gray-400 text-sm">
                                Upgrade to Premium to create direct download links for your content and share them effortlessly with others!
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                            <a href="/premium" 
                                class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-rocket mr-2"></i>
                                Upgrade to Premium
                            </a>
                            
                            <button onclick="closePopup()" 
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-clock mr-2"></i>
                                Maybe Later
                            </button>
                        </div>
                    </div>
                `
            });                          
        }        
        const directLinks = content.directLinks || {};
    
        function generateLinkHTML(directLinks) {
            return Object.entries(directLinks).map(([id, linkInfo]) => `
                <div class="mb-6 bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                        <i class="fas fa-link text-blue-400"></i>
                        <div class="flex-grow">
                            <div class="flex items-center space-x-2">
                                <input type="text" value="${linkInfo.directLink}" readonly 
                                    class="popup_setting_directlink_value bg-gray-900 border border-gray-700 text-blue-400 px-3 py-2 rounded-lg flex-grow text-sm font-mono">
                                    <button class="popover-trigger copy-button bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200 text-sm" 
                                        data-copy-target=".popup_setting_directlink_value" 
                                        data-popover="Copy Link" 
                                        data-copy-popover="Link copied!">
                                        <i class="fas fa-copy"></i>
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div data-id="${id}" class="editable-content space-y-4">
                        ${generateStaticContent(linkInfo)}
                    </div>
                    <div class="flex space-x-2 mt-4 pt-3 border-t border-gray-700">
                        <button data-id="${id}" class="modify-direct-link bg-yellow-600 hover:bg-yellow-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200 text-sm">
                            <i class="fas fa-edit mr-1.5"></i> Modify
                        </button>
                        <button data-id="${id}" class="apply-direct-link hidden bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200 text-sm">
                            <i class="fas fa-check mr-1.5"></i> Apply
                        </button>
                        <button data-id="${id}" class="cancel-direct-link hidden bg-gray-600 hover:bg-gray-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200 text-sm">
                            <i class="fas fa-times mr-1.5"></i> Cancel
                        </button>
                        <button data-id="${id}" class="delete-direct-link bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200 text-sm">
                            <i class="fas fa-trash-alt mr-1.5"></i> Delete
                        </button>
                    </div>
                </div>
            `).join('');
        }
    
        function generateStaticContent(linkInfo) {
            function formatValues(values) {
                return values.map(value => 
                    `<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200">
                        ${value}
                    </span>`
                ).join(' ');
            }
        
            return `
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-clock text-yellow-400"></i>
                            <span class="font-medium text-gray-300">Expire Time:</span>
                        </div>
                        <i class="fas fa-question-circle popover-trigger text-gray-400" 
                           data-popover="Setting an expiration date makes the link inactive after the specified time."></i>
                        <div class="w-2/3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200">
                                ${new Date(linkInfo.expireTime * 1000).toLocaleString()}
                            </span>
                        </div>
                    </div>
        
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-network-wired text-green-400"></i>
                            <span class="font-medium text-gray-300">Source IPs:</span>
                        </div>
                        <i class="fas fa-question-circle popover-trigger text-gray-400" 
                           data-popover="If set, the link will only work from the specified source IPs. Multiple IPs can be set, separated by spaces."></i>
                        <div class="w-2/3">
                            ${linkInfo.sourceIpsAllowed.length ? formatValues(linkInfo.sourceIpsAllowed) : 
                            '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200">Any</span>'}
                        </div>
                    </div>
        
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-globe text-blue-400"></i>
                            <span class="font-medium text-gray-300">Domains:</span>
                        </div>
                        <i class="fas fa-question-circle popover-trigger text-gray-400" 
                           data-popover="If set, the link will work only from the specified domains. We use CORS and Referer checks. Note: This solution is not foolproof but greatly limits the potential for unauthorized use. Multiple domains can be set, separated by spaces."></i>
                        <div class="w-2/3">
                            ${linkInfo.domainsAllowed.length ? formatValues(linkInfo.domainsAllowed) : 
                            '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200">Any</span>'}
                        </div>
                    </div>
        
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-key text-purple-400"></i>
                            <span class="font-medium text-gray-300">Auth:</span>
                        </div>
                        <i class="fas fa-question-circle popover-trigger text-gray-400" 
                           data-popover="If set, HTTP Basic authentication will be required to use the link. Format: login:password. Multiple credentials can be set, separated by spaces."></i>
                        <div class="w-2/3">
                            ${linkInfo.auth.length ? formatValues(linkInfo.auth) : 
                            '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200">None</span>'}
                        </div>
                    </div>
                </div>
            `;
        }
    
        function generateEditableContent(linkInfo) {
            const expireDate = new Date(linkInfo.expireTime * 1000);
            const adjustedExpireTime = new Date(expireDate.getTime() - expireDate.getTimezoneOffset() * 60000);
    
            return `
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-clock text-yellow-400"></i>
                            <span class="font-medium text-gray-300">Expire Time:</span>
                        </div>
                        <div class="w-2/3">
                            <input type="datetime-local" 
                                value="${adjustedExpireTime.toISOString().slice(0, 16)}" 
                                class="edit-expireTime bg-gray-900 border border-gray-700 text-white px-3 py-2 rounded-lg w-full">
                        </div>
                    </div>
    
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-network-wired text-green-400"></i>
                            <span class="font-medium text-gray-300">Source IPs:</span>
                        </div>
                        <div class="w-2/3">
                            <input type="text" 
                                value="${linkInfo.sourceIpsAllowed.join(' ')}" 
                                class="edit-sourceIpsAllowed bg-gray-900 border border-gray-700 text-white px-3 py-2 rounded-lg w-full"
                                placeholder="Enter IPs separated by spaces">
                        </div>
                    </div>
    
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-globe text-blue-400"></i>
                            <span class="font-medium text-gray-300">Domains:</span>
                        </div>
                        <div class="w-2/3">
                            <input type="text" 
                                value="${linkInfo.domainsAllowed.join(' ')}" 
                                class="edit-domainsAllowed bg-gray-900 border border-gray-700 text-white px-3 py-2 rounded-lg w-full"
                                placeholder="Enter domains separated by spaces">
                        </div>
                    </div>
    
                    <div class="flex items-center space-x-2">
                        <div class="w-1/3 flex items-center space-x-2">
                            <i class="fas fa-key text-purple-400"></i>
                            <span class="font-medium text-gray-300">Auth:</span>
                        </div>
                        <div class="w-2/3">
                            <input type="text" 
                                value="${linkInfo.auth.join(' ')}" 
                                class="edit-auth bg-gray-900 border border-gray-700 text-white px-3 py-2 rounded-lg w-full"
                                placeholder="Enter credentials (login:password) separated by spaces">
                        </div>
                    </div>
                </div>
            `;
        }
    
        const directLinksHTML = generateLinkHTML(directLinks);
    
        createPopup({
            icon: 'fas fa-link',
            title: 'Direct Link Settings',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Description -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Direct links provide a streamlined method for users to download content without visiting the website. 
                                You can create multiple direct links with different options for the same content.
                            </p>
                        </div>
                    </div>
    
                    <!-- Direct Links List -->
                    <div class="space-y-4">
                        ${directLinksHTML ? directLinksHTML : 
                        '<div class="text-center py-8 text-gray-400"><i class="fas fa-link text-4xl mb-3"></i><p>No direct links available.</p></div>'}
                    </div>
    
                    <!-- Create New Link Button -->
                    <div class="flex justify-center">
                        <button id="create_direct_link" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200">
                            <i class="fas fa-plus-circle mr-2"></i> Create New Direct Link
                        </button>
                    </div>
                </div>
            `
        });
    
        document.querySelectorAll('.delete-direct-link').forEach(button => {
            button.addEventListener('click', async function() {
                const directLinkId = this.getAttribute('data-id');
                createAlert('loading', 'Deleting direct link...');
                try {
                    const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/directlinks/${directLinkId}`, {
                        method: 'DELETE',
                        headers: { 'Authorization': `Bearer ${accountActive.token}` }
                    });
                    if (response.ok) {
                        await refreshFilemanager()
                        showSettings(contentId, "directLinks");
                    } else {
                        createAlert('error', 'Failed to delete the direct link.');
                    }
                } catch (error) {
                    createAlert('error', 'An error occurred while deleting the direct link.');
                }
            });
        });
    
        document.getElementById('create_direct_link').addEventListener('click', async function() {
            createAlert('loading', 'Creating direct link...');
            try {
                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/directlinks`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({}) // Add any required body parameters here
                });
    
                if (response.ok) {
                    await refreshFilemanager()
                    showSettings(contentId, "directLinks");
                } else {
                    createAlert('error', 'Failed to create the direct link.');
                }
            } catch (error) {
                createAlert('error', 'An error occurred while creating the direct link.');
            }
        });
    
        document.querySelectorAll('.modify-direct-link').forEach(button => {
            button.addEventListener('click', function() {
                const directLinkId = this.getAttribute('data-id');
                const container = document.querySelector(`.editable-content[data-id="${directLinkId}"]`);
                const linkInfo = directLinks[directLinkId];
    
                container.innerHTML = generateEditableContent(linkInfo);
    
                toggleButtonStates(directLinkId, { modify: 'hidden', apply: '', cancel: '', delete: 'hidden' });
            });
        });
    
        document.querySelectorAll('.apply-direct-link').forEach(button => {
            button.addEventListener('click', async function() {
                const directLinkId = this.getAttribute('data-id');
                const container = document.querySelector(`.editable-content[data-id="${directLinkId}"]`);
    
                const expireTimeValue = container.querySelector('.edit-expireTime').value;
                const sourceIpsAllowedValue = container.querySelector('.edit-sourceIpsAllowed').value.trim();
                const domainsAllowedValue = container.querySelector('.edit-domainsAllowed').value.trim();
                const authValue = container.querySelector('.edit-auth').value.trim();
    
                const expireTime = new Date(expireTimeValue).getTime() / 1000;
                const sourceIpsAllowed = sourceIpsAllowedValue ? sourceIpsAllowedValue.split(' ').map(ip => ip.trim()) : undefined;
                const domainsAllowed = domainsAllowedValue ? domainsAllowedValue.split(' ').map(domain => domain.trim()) : undefined;
                const auth = authValue ? authValue.split(' ').map(auth => auth.trim()) : undefined;
    
                createAlert('loading', 'Applying changes...');
                try {
                    const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/directlinks/${directLinkId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${accountActive.token}`
                        },
                        body: JSON.stringify({ expireTime, sourceIpsAllowed, domainsAllowed, auth })
                    });
    
                    if (response.ok) {
                        await refreshFilemanager()
                        showSettings(contentId, "directLinks");
                    } else {
                        createAlert('error', 'Failed to modify the direct link.');
                    }
                } catch (error) {
                    createAlert('error', 'An error occurred while modifying the direct link.');
                }
            });
        });
    
        document.querySelectorAll('.cancel-direct-link').forEach(button => {
            button.addEventListener('click', function() {
                const directLinkId = this.getAttribute('data-id');
                const container = document.querySelector(`.editable-content[data-id="${directLinkId}"]`);
                const linkInfo = directLinks[directLinkId];
    
                container.innerHTML = generateStaticContent(linkInfo);
    
                toggleButtonStates(directLinkId, { modify: '', apply: 'hidden', cancel: 'hidden', delete: '' });
                initPopover();
            });
        });
    
        function toggleButtonStates(id, states) {
            document.querySelector(`.modify-direct-link[data-id="${id}"]`).classList.toggle('hidden', states.modify === 'hidden');
            document.querySelector(`.apply-direct-link[data-id="${id}"]`).classList.toggle('hidden', states.apply === 'hidden');
            document.querySelector(`.cancel-direct-link[data-id="${id}"]`).classList.toggle('hidden', states.cancel === 'hidden');
            document.querySelector(`.delete-direct-link[data-id="${id}"]`).classList.toggle('hidden', states.delete === 'hidden');
        }
    } else if (setting === "public") {
        createPopup({
            icon: 'fas fa-globe',
            title: 'Public Setting',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Description -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Control who can access your content. Public content is accessible to anyone with the link, 
                                while private content is only accessible to you.
                            </p>
                        </div>
                    </div>
    
                    <!-- Current Status Card -->
                    <div class="bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                            <i class="${content.public ? 'fas fa-eye text-green-400' : 'fas fa-eye-slash text-red-400'}"></i>
                            <h3 class="text-lg font-medium text-white">Current Status</h3>
                        </div>
    
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-300">Visibility:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        ${content.public ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200'}">
                                        ${content.public ? 'Public' : 'Private'}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-400">
                                    <i class="fas fa-users"></i>
                                    <span>${content.public ? 'Anyone with the link can access' : 'Only you can access'}</span>
                                </div>
                            </div>
    
                            <!-- Toggle Button -->
                            <div class="flex justify-center mt-6">
                                <button id="popup_setting_public" 
                                    class="bg-blue-600 hover:bg-blue-700 
                                    text-white px-2 py-1 rounded-md inline-flex items-center transition duration-200">
                                    <i class="${content.public ? 'fas fa-eye-slash' : 'fas fa-eye'} mr-2"></i>
                                    ${content.public ? 'Make Private' : 'Make Public'}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `
        });
    
        document.getElementById('popup_setting_public').addEventListener('click', async function() {
            const newPublicState = !content.public;
            createAlert('loading', `Making content ${newPublicState ? 'public' : 'private'}...`);
            try {
                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/update`, {
                    method: "PUT",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({
                        attribute: "public",
                        attributeValue: newPublicState
                    })
                });
                
                if (response.ok) {
                    await refreshFilemanager()
                    showSettings(contentId, "public");
                } else {
                    createAlert('error', 'Failed to update visibility settings. Please try again.');
                }
            } catch (error) {
                createAlert('error', 'An error occurred while updating visibility settings.');
            }
        });
    } else if (setting === "password") {
        createPopup({
            icon: 'fas fa-key',
            title: 'Password Setting',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Description -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Protect your content with a password. Users will need to enter this password to access the content. 
                                Leave the password field empty to remove password protection.
                            </p>
                        </div>
                    </div>
    
                    <!-- Current Status Card -->
                    <div class="bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                            <i class="${content.password ? 'fas fa-lock text-yellow-400' : 'fas fa-lock-open text-gray-400'}"></i>
                            <h3 class="text-lg font-medium text-white">Current Status</h3>
                        </div>
    
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-300">Protection:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        ${content.password ? 'bg-yellow-900 text-yellow-200' : 'bg-gray-700 text-gray-300'}">
                                        ${content.password ? 'Password Protected' : 'No Password'}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-400">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>${content.password ? 'Password required for access' : 'Anyone can access'}</span>
                                </div>
                            </div>
    
                            <!-- Password Form -->
                            <form id="popup_password-form" class="mt-6 space-y-4">
                                <div class="relative">
                                    <label for="popup_password" class="block text-sm font-medium text-gray-300 mb-2">
                                        ${content.password ? 'Change Password' : 'Set Password'}
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                            id="popup_password" 
                                            name="password" 
                                            class="w-full px-3 py-2 bg-gray-700 text-white rounded-md border border-gray-600 
                                            focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                            placeholder="${content.password ? '••••••••' : 'Enter new password'}"
                                        >
                                        <button type="button" 
                                            id="toggle-password" 
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-300">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
    
                                <div class="flex justify-center pt-4">
                                    <button type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded-md 
                                        inline-flex items-center transition duration-200">
                                        <i class="fas fa-save mr-2"></i>
                                        ${content.password ? 'Update Password' : 'Set Password'}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            `
        });
    
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('popup_password');
            const toggleIcon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    
        // Handle form submission
        document.getElementById('popup_password-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const newPassword = document.getElementById('popup_password').value;
            createAlert('loading', 'Updating password setting...');
            try {
                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/update`, {
                    method: "PUT",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({
                        attribute: "password",
                        attributeValue: newPassword
                    })
                });
        
                if (response.ok) {
                    await refreshFilemanager();
                    showSettings(contentId, "password");
                } else {
                    createAlert('error', 'Failed to update the password. Please try again.');
                }
            } catch (error) {
                createAlert('error', 'An error occurred while updating the password.');
            }
        });
    } else if (setting === "description") {
        createPopup({
            icon: 'fas fa-pen',
            title: 'Description Setting',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Description Info Box -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Add a description to provide context or additional information to viewers. 
                                The text supports markdown syntax for formatting. Leave empty to disable the description.
                            </p>
                        </div>
                    </div>
    
                    <!-- Description Editor Card -->
                    <div class="bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                            <i class="fas fa-edit text-purple-400"></i>
                            <h3 class="text-lg font-medium text-white">Description Editor</h3>
                        </div>
    
                        <form id="popup_description-form" class="space-y-4">
                            <!-- Current Status -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-300">Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        ${content.description ? 'bg-green-900 text-green-200' : 'bg-gray-700 text-gray-300'}">
                                        ${content.description ? 'Description Set' : 'No Description'}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-400">
                                    <i class="fas fa-paragraph"></i>
                                    <span>${content.description ? 'Description visible to viewers' : 'No description shown'}</span>
                                </div>
                            </div>
    
                            <!-- Textarea with better styling -->
                            <div class="relative">
                                <label for="popup_description" class="block text-sm font-medium text-gray-300 mb-2">
                                    Description Content
                                </label>
                                <textarea 
                                    id="popup_description" 
                                    name="description"
                                >${content.description || ''}</textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-center pt-4">
                                <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md 
                                    inline-flex items-center transition duration-200">
                                    <i class="fas fa-save mr-2"></i>
                                    Save Description
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            `
        });

        // Function to initialize EasyMDE
        const initializeEditor = () => {
            const easyMDE = new EasyMDE({
                element: document.getElementById('popup_description'),
                spellChecker: false,
                autofocus: true,
                theme: 'dark',
                status: ['lines', 'words'],
                minHeight: '200px',
                maxHeight: '400px',
                toolbar: [
                    'bold', 'italic', 'heading', '|',
                    'quote', 'unordered-list', 'ordered-list', '|',
                    'link', 'image', '|',
                    'preview', 'side-by-side', 'fullscreen', '|',
                    'guide'
                ],
                previewRender: (text) => marked.parse(text),
            });
        
            // Add custom CSS after initialization
            const customCSS = `
                .EasyMDEContainer {
                    background-color: #1f2937;
                }
                .EasyMDEContainer .CodeMirror {
                    background-color: #1f2937;
                    color: #e5e7eb;
                    border: 1px solid #4b5563;
                    border-radius: 0.375rem;
                }
                .EasyMDEContainer .CodeMirror-cursor {
                    border-color: #e5e7eb;
                }
                .EasyMDEContainer .CodeMirror-selected {
                    background: #4b5563 !important;
                }
                .EasyMDEContainer .CodeMirror-line::selection,
                .EasyMDEContainer .CodeMirror-line > span::selection,
                .EasyMDEContainer .CodeMirror-line > span > span::selection {
                    background: #4b5563;
                }
                .editor-toolbar {
                    background-color: #1f2937;
                    border: 1px solid #4b5563;
                    border-radius: 0.375rem;
                    margin-bottom: 8px;
                }
                .editor-toolbar button {
                    color: #e5e7eb !important;
                }
                .editor-toolbar button:hover {
                    background: #374151;
                    border-color: #4b5563;
                }
                .editor-toolbar.fullscreen {
                    background: #1f2937;
                }
                .editor-preview {
                    background: #1f2937;
                    color: #e5e7eb;
                }
                .editor-preview pre {
                    background: #374151;
                    border: 1px solid #4b5563;
                }
                .editor-preview table td,
                .editor-preview table th {
                    border: 1px solid #4b5563;
                }
                .editor-statusbar {
                    color: #9ca3af;
                }
                .editor-toolbar.disabled-for-preview button:not(.no-disable) {
                    background: #374151;
                }
                .editor-preview-side {
                    background: #1f2937;
                    border-color: #4b5563;
                }
                .editor-toolbar.fullscreen::before,
                .editor-toolbar.fullscreen::after {
                    background: transparent;
                }
                .CodeMirror-focused {
                    border-color: #3b82f6 !important;
                    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.25);
                }
                .editor-toolbar button.active {
                    background: #3b82f6;
                    color: white !important;
                }
            `;
        
            const styleElement = document.createElement('style');
            styleElement.textContent = customCSS;
            document.head.appendChild(styleElement);
        
            return easyMDE;
        };

        // Check if EasyMDE is already loaded
        if (typeof EasyMDE !== 'undefined') {
            const editor = initializeEditor();
        } else {
            // Load CSS
            const cssLink = document.createElement('link');
            cssLink.rel = 'stylesheet';
            cssLink.href = 'https://unpkg.com/easymde/dist/easymde.min.css';
            document.head.appendChild(cssLink);

            // Load JavaScript
            const script = document.createElement('script');
            script.src = 'https://unpkg.com/easymde/dist/easymde.min.js';
            script.onload = function() {
                const editor = initializeEditor();
            };
            document.head.appendChild(script);
        }
        
        // Modify the form submission to use EasyMDE's value
        document.getElementById('popup_description-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const editor = document.querySelector('.EasyMDEContainer').querySelector('.CodeMirror').CodeMirror.getValue();
            createAlert('loading', 'Updating description setting...');
            try {
                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/update`, {
                    method: "PUT",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({
                        attribute: "description",
                        attributeValue: editor
                    })
                });
        
                if (response.ok) {
                    await refreshFilemanager();
                    createAlert('success', `Description successfully updated for <i class="fas fa-folder text-yellow-400 mr-1"></i><strong>${content.name}</strong>`);
                } else {
                    createAlert('error', 'Failed to update the description. Please try again.');
                }
            } catch (error) {
                createAlert('error', 'An error occurred while updating the description.');
            }
        });
    } else if (setting === "expire") {
        const expirationSet = content.expire ? true : false;
        const defaultExpirationDateTime = new Date(Date.now() + 24 * 60 * 60 * 1000).toISOString().slice(0, 16);
    
        createPopup({
            icon: 'fas fa-clock',
            title: 'Expiration Setting',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Info Box -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Set an expiration date and time for your content. After this time, the content will be automatically deleted.
                                Remove the expiration to keep the content indefinitely.
                            </p>
                        </div>
                    </div>
    
                    <!-- Expiration Settings Card -->
                    <div class="bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                            <i class="fas fa-hourglass-half text-orange-400"></i>
                            <h3 class="text-lg font-medium text-white">Expiration Status</h3>
                        </div>
    
                        <!-- Current Status -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-300">Status:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    ${expirationSet ? 'bg-orange-900 text-orange-200' : 'bg-gray-700 text-gray-300'}">
                                    ${expirationSet ? 'Expiration Set' : 'No Expiration'}
                                </span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-gray-400">
                                <i class="fas fa-calendar-alt"></i>
                                <span>${expirationSet ? `Expires: ${new Date(content.expire * 1000).toLocaleString()}` : 'No expiration date set'}</span>
                            </div>
                        </div>
    
                        <!-- Form -->
                        <form id="popup_expire-form" class="space-y-4">
                            ${expirationSet ? `
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md 
                                        inline-flex items-center transition duration-200">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        Remove Expiration
                                    </button>
                                </div>
                            ` : `
                                <div class="relative">
                                    <label for="popup_expire" class="block text-sm font-medium text-gray-300 mb-2">
                                        Set Expiration Date & Time
                                    </label>
                                    <input type="datetime-local" 
                                        id="popup_expire" 
                                        name="expire" 
                                        class="w-full px-3 py-2 bg-gray-700 text-white rounded-md border border-gray-600 
                                        focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        value="${defaultExpirationDateTime}"
                                    >
                                </div>
                                <div class="flex justify-center pt-4">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md 
                                        inline-flex items-center transition duration-200">
                                        <i class="fas fa-save mr-2"></i>
                                        Set Expiration
                                    </button>
                                </div>
                            `}
                        </form>
                    </div>
                </div>
            `
        });
    
        document.getElementById('popup_expire-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            try {
                const expireTimestamp = expirationSet ? null : Math.floor(new Date(document.getElementById('popup_expire').value).getTime() / 1000);
                createAlert('loading', 'Updating expiration setting...');

                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/update`, {
                    method: "PUT",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({
                        attribute: "expiry",
                        attributeValue: expireTimestamp
                    })
                });
    
                if (response.ok) {
                    await refreshFilemanager();
                    createAlert('success', `Expiration ${expireTimestamp ? 'set' : 'removed'} successfully for <i class="${iconClass}"></i> <strong>${content.name}</strong>`);
                } else {
                    throw new Error('Failed to update expiration');
                }
            } catch (error) {
                createAlert('error', 'Failed to update the expiration setting. Please try again.');
            }
        });
    } else if (setting === "tags") {
        createPopup({
            icon: 'fas fa-tags',
            title: 'Tags Setting',
            content: `
                <div class="min-h-full space-y-6">
                    <!-- Header with Icon and Name -->
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-600">
                        <i class="${iconClass} text-4xl"></i>
                        <h2 class="text-xl font-bold text-white">${content.name}</h2>
                    </div>
    
                    <!-- Info Box -->
                    <div class="bg-blue-900 bg-opacity-20 border border-blue-800 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-400 text-xl"></i>
                            <p class="text-gray-300 text-sm">
                                Tags help organize and classify your content. Add multiple tags by separating them with commas.
                                Tags can be used with the filter and search functions.
                            </p>
                        </div>
                    </div>
    
                    <!-- Tags Editor Card -->
                    <div class="bg-gray-800 bg-opacity-50 border border-gray-700 p-4 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-700">
                            <i class="fas fa-tags text-yellow-400"></i>
                            <h3 class="text-lg font-medium text-white">Tags Editor</h3>
                        </div>
    
                        <form id="popup_tags-form" class="space-y-4">
                            <!-- Current Status -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-300">Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        ${content.tags ? 'bg-yellow-900 text-yellow-200' : 'bg-gray-700 text-gray-300'}">
                                        ${content.tags ? 'Tags Set' : 'No Tags'}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-400">
                                    <i class="fas fa-tag"></i>
                                    <span>${content.tags ? 'Tags applied' : 'No tags applied'}</span>
                                </div>
                            </div>
    
                            <!-- Tags Input -->
                            <div class="relative">
                                <label for="popup_tags" class="block text-sm font-medium text-gray-300 mb-2">
                                    Tag List
                                </label>
                                <input type="text" 
                                    id="popup_tags" 
                                    name="tags" 
                                    class="w-full px-4 py-3 bg-gray-700 text-white rounded-md border border-gray-600 
                                    focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200 
                                    placeholder-gray-400 text-sm"
                                    placeholder="Enter tags separated by commas (e.g., important, work, personal)"
                                    value="${content.tags || ''}"
                                >
                            </div>
    
                            <!-- Submit Button -->
                            <div class="flex justify-center pt-4">
                                <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md 
                                    inline-flex items-center transition duration-200">
                                    <i class="fas fa-save mr-2"></i>
                                    Save Tags
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            `
        });
    
        document.getElementById('popup_tags-form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const newTags = document.getElementById('popup_tags').value;
            createAlert('loading', 'Updating tags setting...');
            
            try {
                const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/${content.id}/update`, {
                    method: "PUT",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accountActive.token}`
                    },
                    body: JSON.stringify({
                        attribute: "tags",
                        attributeValue: newTags
                    })
                });
    
                if (response.ok) {
                    await refreshFilemanager();
                    createAlert('success', `Tags successfully updated for <i class="${iconClass}"></i> <strong>${content.name}</strong>`);
                } else {
                    throw new Error('Failed to update tags');
                }
            } catch (error) {
                createAlert('error', 'Failed to update the tags. Please try again.');
            }
        });
    }
    initPopover();
}
async function copyContent(items) {
    const accountActive = await getAccountActive();
    if(accountActive.tier != "premium") {
        return createPopup({
            icon: 'fas fa-crown text-yellow-500',
            title: 'Premium Account Required',
            content: `
                <div class="flex flex-col items-center space-y-6 p-6">
                    <div class="text-center space-y-3">
                        <p class="text-gray-300 text-lg">
                            Copy/Move is a Premium feature
                        </p>
                        <p class="text-gray-400 text-sm">
                            Upgrade to Premium to copy or move your content between folders and unlock all premium features!
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                        <a href="/premium" 
                            class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-rocket mr-2"></i>
                            Upgrade to Premium
                        </a>
                        
                        <button onclick="closePopup()" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-clock mr-2"></i>
                            Maybe Later
                        </button>
                    </div>
                </div>
            `
        });                          
    }

    var itemsString = Object.keys(items).join(',');
    appdata.fileManager.toCopy = itemsString;
    localStorage.setItem('fileManagerToCopy', appdata.fileManager.toCopy);
    
    document.getElementById('filemanager_mainbuttons_copyhere_countvalue').innerText = Object.keys(items).length;
    document.getElementById('filemanager_mainbuttons_copyhere').classList.remove('hidden');
    document.getElementById('filemanager_mainbuttons_copycancel').classList.remove('hidden');

    createPopup({
        icon: 'fas fa-copy',
        title: 'Copy Items',
        content: `
            <div class="text-center">
                <p class="mb-4"><strong class="text-yellow-500">${Object.keys(items).length}</strong> items are ready to be copied.</p>
                <p>Navigate to the destination folder and use the <strong class="text-yellow-500">"Copy"</strong> button to complete the action.</p>
            </div>
        `
    });
}
async function moveContent(items) {
    const accountActive = await getAccountActive();
    if(accountActive.tier != "premium") {
        return createPopup({
            icon: 'fas fa-crown text-yellow-500',
            title: 'Premium Account Required',
            content: `
                <div class="flex flex-col items-center space-y-6 p-6">
                    <div class="text-center space-y-3">
                        <p class="text-gray-300 text-lg">
                            Copy/Move is a Premium feature
                        </p>
                        <p class="text-gray-400 text-sm">
                            Upgrade to Premium to copy or move your content between folders and unlock all premium features!
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                        <a href="/premium" 
                            class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-rocket mr-2"></i>
                            Upgrade to Premium
                        </a>
                        
                        <button onclick="closePopup()" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-clock mr-2"></i>
                            Maybe Later
                        </button>
                    </div>
                </div>
            `
        });                          
    }

    var itemsString = Object.keys(items).join(',');
    appdata.fileManager.toMove = itemsString
    localStorage.setItem('fileManagerToMove', appdata.fileManager.toMove);

    document.getElementById('filemanager_mainbuttons_movehere_countvalue').innerText = Object.keys(items).length
    document.getElementById('filemanager_mainbuttons_movehere').classList.remove('hidden');
    document.getElementById('filemanager_mainbuttons_movecancel').classList.remove('hidden');

    createPopup({
        icon: 'fas fa-arrows-alt',
        title: 'Move Items',
        content: `
            <div class="text-center">
                <p class="mb-4"><strong class="text-yellow-500">${Object.keys(items).length}</strong> items are ready to be moved.</p>
                <p>Navigate to the destination folder and use the <strong class="text-yellow-500">"Move"</strong> button to complete the action.</p>
            </div>
        `
    });
}
async function importContent(content) {
    const accountActive = await getAccountActive();
    if(accountActive.tier != "premium") {
        return createPopup({
            icon: 'fas fa-crown text-yellow-500',
            title: 'Premium Account Required',
            content: `
                <div class="flex flex-col items-center space-y-6 p-6">
                    <div class="text-center space-y-3">
                        <p class="text-gray-300 text-lg">
                            Import is a Premium feature
                        </p>
                        <p class="text-gray-400 text-sm">
                            Upgrade to Premium to import content into your account and unlock all premium features!
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                        <a href="/premium" 
                            class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-rocket mr-2"></i>
                            Upgrade to Premium
                        </a>
                        
                        <button onclick="closePopup()" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                            <i class="fas fa-clock mr-2"></i>
                            Maybe Later
                        </button>
                    </div>
                </div>
            `
        });                          
    }

    const isFile = content.type !== 'folder';
    const iconClass = isFile ? getIconForMimeType(content.mimetype) : 'fas fa-folder text-yellow-400';
    const itemType = isFile ? 'file' : 'folder';
    
    createPopup({
        icon: 'fas fa-file-import',
        title: 'Import content',
        content: `
            <div class="text-center px-6">
                <div class="mb-6">
                    <i class="${iconClass} ${itemType === 'folder' ? 'text-yellow-400' : 'text-blue-400'} text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-white mb-2">Import ${itemType}</h3>
                    <p class="text-gray-300 mb-3">You're about to import <span class="font-semibold ${itemType === 'folder' ? 'text-yellow-400' : 'text-blue-400'}">${content.name}</span> into your Gofile account.</p>
                    <p class="text-sm text-gray-400">The ${itemType} will be imported into your root folder. You can move it later.</p>
                </div>
                
                <div class="border-t border-gray-700 pt-6">
                    <button id="popup_confirmimport" class="transition-all duration-200 py-2.5 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold inline-flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        Confirm Import
                    </button>
                </div>
            </div>
        `
    });
           
        
    document.getElementById('popup_confirmimport').addEventListener('click', async function() {
        createAlert('loading', `Importing <i class="${iconClass}"></i> <span class="font-semibold">${content.name}</span>, please wait...`);
        try {
            await importContentFetch(content.id);
            createPopup({
                icon: 'fas fa-check-circle text-green-500',
                title: 'Successfully Imported!',
                content: `
                    <div class="flex flex-col items-center space-y-6 p-6">
                        <div class="text-center space-y-3">
                            <p class="text-gray-300 text-lg">
                                ${itemType.charAt(0).toUpperCase() + itemType.slice(1)} successfully imported!
                            </p>
                            <div class="flex items-center justify-center gap-2 my-3">
                                <i class="${iconClass} ${itemType === 'folder' ? 'text-yellow-400' : 'text-blue-400'} text-2xl"></i>
                                <span class="font-semibold text-gray-300">${content.name}</span>
                            </div>
                            <p class="text-gray-400 text-sm">
                                The ${itemType} has been imported to your root folder and is now ready to use.
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center w-full max-w-md mx-auto">
                            <a href="/myfiles" 
                                class="closePopup w-full sm:w-auto px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-folder-open mr-2"></i>
                                View My Files
                            </a>
                            
                            <button onclick="closePopup()" 
                                class="w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gray-600 hover:bg-gray-700 text-gray-300 transition-all duration-200 flex items-center justify-center transform hover:scale-105">
                                <i class="fas fa-times mr-2"></i>
                                Close
                            </button>
                        </div>
                    </div>
                `
            });            
        } catch (error) {
            createAlert('error', error.message);
        }
    });
}
async function shareContent(content) {
    const isFile = content.type !== 'folder';
    const iconClass = isFile ? getIconForMimeType(content.mimetype) : 'fas fa-folder text-yellow-400';
    const itemType = isFile ? 'file' : 'folder';
    const shareUrl = `https://${window.location.host}/d/${content.code}`;

    // If content is not public, show warning popup
    if (!content.public) {
        createPopup({
            icon: 'fas fa-shield-alt text-yellow-500',
            title: 'Private Content',
            content: `
                <div class="flex flex-col items-center space-y-6 p-4">
                    <div class="relative w-16 h-16 bg-yellow-500/10 rounded-full flex items-center justify-center mb-2">
                        <i class="fas fa-lock text-2xl text-yellow-500"></i>
                    </div>
                    
                    <div class="text-center space-y-3 max-w-sm">
                        <h3 class="text-xl font-semibold text-gray-200">
                            Make this ${itemType} public?
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            This ${itemType} is currently private. To share it with others, you'll need to make it public first. This will allow anyone with the link to access it.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-3 justify-center w-full max-w-md mx-auto">
                        <button onclick="showSettings('${content.id}', 'public')" 
                            class="group w-full sm:w-auto px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-medium transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-cog mr-2 group-hover:rotate-90 transition-transform duration-300"></i>
                            Change Visibility
                        </button>
                        
                        <button onclick="closePopup()" 
                            class="w-full sm:w-auto px-6 py-2.5 rounded-lg border border-gray-600 hover:bg-gray-700 text-gray-300 transition-all duration-200 flex items-center justify-center">
                            Cancel
                        </button>
                    </div>
                </div>
            `
        });
        return;
    }

    // Show sharing popup
    createPopup({
        icon: 'fas fa-share-alt text-blue-500',
        title: 'Share Content',
        content: `
            <div class="flex flex-col items-center space-y-6 p-4">
                <div class="relative w-16 h-16 bg-blue-500/10 rounded-full flex items-center justify-center mb-2">
                    <i class="${iconClass} text-2xl text-blue-500"></i>
                </div>
                
                <div class="text-center space-y-4 w-full max-w-md">
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-200">${content.name}</h3>
                        <p class="text-sm text-gray-400">Share this ${itemType} with anyone using the link below</p>
                    </div>
                    
                    <div class="bg-gray-800 rounded-lg p-1 w-full max-w-[calc(100vw-2rem)] sm:max-w-md">
                        <div class="flex gap-2">
                            <input type="text" value="${shareUrl}" 
                                id="shareUrlInput"
                                class="flex-1 min-w-0 bg-gray-900 rounded-lg px-2 sm:px-4 py-2.5 text-gray-300 text-sm focus:ring-2 focus:ring-blue-500/50 focus:outline-none overflow-x-auto" 
                                readonly>
                            <button class="popover-trigger copy-button shrink-0 bg-blue-600 hover:bg-blue-700 text-white w-10 h-10 rounded flex items-center justify-center"
                                data-popover="Copy the share link"
                                data-copy-target="#shareUrlInput"
                                data-copy-popover="Link copied! 🎉">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>

                    ${content.password ? `
                        <div class="mt-4 bg-yellow-500/10 border border-yellow-500/20 rounded-lg p-4 text-left">
                            <div class="flex items-start space-x-3">
                                <div class="shrink-0 mt-0.5">
                                    <i class="fas fa-lock text-yellow-500"></i>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="font-medium text-yellow-500">Password Protected</h4>
                                    <p class="text-sm text-gray-400 leading-relaxed">
                                        This ${itemType} is password protected. Anyone with the link will need to enter the correct password to access the content.
                                    </p>
                                </div>
                            </div>
                        </div>
                    ` : ''}
                </div>
    
                <div class="w-full max-w-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-gray-700 to-transparent"></div>
                        <span class="px-4 text-sm text-gray-400">QR Code</span>
                        <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-gray-700 to-transparent"></div>
                    </div>
                    
                    <div class="flex justify-center">
                        <div id="qrcode-share-${content.id}" class="p-4 bg-white rounded-lg">
                            <!-- QR code will be generated here -->
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-md pt-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-gray-700 to-transparent"></div>
                        <span class="px-4 text-sm text-gray-400">Share on social media</span>
                        <div class="h-[1px] flex-1 bg-gradient-to-r from-transparent via-gray-700 to-transparent"></div>
                    </div>

                    <div class="flex flex-wrap justify-center gap-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#4267B2] to-[#233977] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-facebook-f text-white text-lg"></i>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#25D366] to-[#128C7E] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-whatsapp text-white text-lg"></i>
                        </a>

                        <!-- X (formerly Twitter) -->
                        <a href="https://x.com/intent/tweet?url=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-black to-[#141414] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fa-brands fa-x-twitter text-white text-lg"></i>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#0077b5] to-[#004569] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-linkedin-in text-white text-lg"></i>
                        </a>

                        <!-- Pinterest -->
                        <a href="https://pinterest.com/pin/create/button/?url=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#E60023] to-[#AB001B] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-pinterest-p text-white text-lg"></i>
                        </a>

                        <!-- Telegram -->
                        <a href="https://t.me/share/url?url=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#0088cc] to-[#005580] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-telegram-plane text-white text-lg"></i>
                        </a>

                        <!-- Reddit -->
                        <a href="https://reddit.com/submit?url=${encodeURIComponent(shareUrl)}" 
                            target="_blank"
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-[#FF4500] to-[#CC3700] hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fab fa-reddit-alien text-white text-lg"></i>
                        </a>

                        <!-- Email -->
                        <a href="mailto:?body=${encodeURIComponent(shareUrl)}" 
                            class="w-11 h-11 rounded-full bg-gradient-to-br from-gray-600 to-gray-700 hover:opacity-90 flex items-center justify-center transform hover:scale-105 transition-all duration-200 shadow-lg">
                            <i class="fas fa-envelope text-white text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <button onclick="closePopup()" 
                    class="mt-4 px-6 py-2.5 rounded-lg border border-gray-600 hover:bg-gray-700 text-gray-300 transition-all duration-200 flex items-center justify-center">
                    Done
                </button>
            </div>
        `
    });
    try {
        await loadQRCodeScript();
        
        const qrContainer = document.getElementById(`qrcode-share-${content.id}`);
        if (qrContainer) {
            qrContainer.innerHTML = '';
            new QRCode(qrContainer, {
                text: shareUrl,
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
    } catch (error) {
        console.error('Failed to generate QR code:', error);
        const qrContainer = document.getElementById(`qrcode-share-${content.id}`);
        if (qrContainer) {
            qrContainer.innerHTML = `
                <div class="text-red-500 text-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    Failed to generate QR code
                </div>
            `;
        }
    }
    initPopover();
}
async function copyHere() {
    const itemCount = appdata.fileManager.toCopy.split(",").length;
    createAlert('loading', `Copying <strong class="text-yellow-500">${itemCount}</strong> item(s), please wait...`);
    try {
        await copyContentFetch(appdata.fileManager.toCopy, appdata.fileManager.mainContent.data.id );
        createAlert('success', `<strong class="text-green-500">${itemCount}</strong> item(s) copied successfully.`);
        cancelCopyMove()
        await refreshFilemanager();
    } catch (error) {
        createAlert('error', error.message);
    }
}
async function moveHere() {
    const itemCount = appdata.fileManager.toMove.split(",").length;
    createAlert('loading', `Moving <strong class="text-yellow-500">${itemCount}</strong> item(s), please wait...`);
    try {
        await moveContentFetch(appdata.fileManager.toMove, appdata.fileManager.mainContent.data.id);
        createAlert('success', `<strong class="text-green-500">${itemCount}</strong> item(s) moved successfully.`);
        cancelCopyMove();
        await refreshFilemanager();
    } catch (error) {
        createAlert('error', error.message);
    }
}
async function copyContentFetch(contentsId, folderDestId) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/copy`, {
            method: 'POST',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                contentsId: contentsId,
                folderId: folderDestId
            })
        });
        
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result;
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("copyContent " + error.message);
    }
}
async function moveContentFetch(contentsId, folderDestId) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/move`, {
            method: 'PUT',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                contentsId: contentsId,
                folderId: folderDestId
            })
        });
        
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result;
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("moveContent " + error.message);
    }
}
async function importContentFetch(contentsId) {
    try {
        const accountActive = await getAccountActive();
        const response = await fetch(`https://${appdata.apiServer}.gofile.io/contents/import`, {
            method: 'POST',
            headers: {
                "Authorization": `Bearer ${accountActive.token}`,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                contentsId: contentsId
            })
        });
        
        if (!response.ok) {
            throw new Error(response.status);
        }
        const result = await response.json();

        if (result.status === 'ok') {
            return result;
        } else {
            throw new Error(result);
        }
    } catch (error) {
        throw new Error("importContent " + error.message);
    }
}
function cancelCopyMove() {
    appdata.fileManager.toCopy = null
    localStorage.removeItem('fileManagerToCopy'); // Remove from localStorage
    document.getElementById('filemanager_mainbuttons_copyhere').classList.add('hidden');
    document.getElementById('filemanager_mainbuttons_copycancel').classList.add('hidden');
    
    appdata.fileManager.toMove = null
    localStorage.removeItem('fileManagerToMove'); // Remove from localStorage
    document.getElementById('filemanager_mainbuttons_movehere').classList.add('hidden');
    document.getElementById('filemanager_mainbuttons_movecancel').classList.add('hidden');
    
    hideMainButtons(false)
}
async function processAllCheckboxes(checked, processDomCopyMove) {
    const checkboxes = document.querySelectorAll('.item_checkbox');
    const lastIndex = checkboxes.length - 1;
    if (checked) {
        for (const [index, checkbox] of checkboxes.entries()) {
            checkbox.checked = true;
            await itemCheckboxChangeEvent(checkbox, index === lastIndex, processDomCopyMove);
        }
    } else {
        for (const [index, checkbox] of checkboxes.entries()) {
            checkbox.checked = false;
            await itemCheckboxChangeEvent(checkbox, index === lastIndex, processDomCopyMove);
        }
    }
}
function hideMainButtons(hide = true) {
    if(hide) {
        if(appdata.fileManager.mainContent.data.isOwner) {
            document.getElementById("filemanager_mainbuttons_share").classList.add('hidden', 'lg:flex');
            document.getElementById("filemanager_mainbuttons_createFolder").classList.add('hidden', 'lg:flex');
            document.getElementById("filemanager_mainbuttons_uploadFiles").classList.add('hidden', 'lg:flex');
        } else {
            document.getElementById("filemanager_mainbuttons_import").classList.add('hidden', 'lg:flex');
        }
        document.getElementById("filemanager_mainbuttons_sort").classList.add('hidden', 'lg:flex');
        document.getElementById("filemanager_mainbuttons_filter").classList.add('hidden', 'lg:flex');
        document.getElementById("filemanager_mainbuttons_search").classList.add('hidden', 'lg:flex');
        document.getElementById("filemanager_mainbuttons_refresh").classList.add('hidden', 'lg:flex');
    } else {
        if(appdata.fileManager.mainContent.data.isOwner) {
            document.getElementById("filemanager_mainbuttons_share").classList.remove('hidden')
            document.getElementById("filemanager_mainbuttons_createFolder").classList.remove('hidden')
            document.getElementById("filemanager_mainbuttons_uploadFiles").classList.remove('hidden')
        } else {
            document.getElementById("filemanager_mainbuttons_import").classList.remove('hidden')
        }
        document.getElementById("filemanager_mainbuttons_sort").classList.remove('hidden')
        document.getElementById("filemanager_mainbuttons_filter").classList.remove('hidden')
        document.getElementById("filemanager_mainbuttons_search").classList.remove('hidden')
        document.getElementById("filemanager_mainbuttons_refresh").classList.remove('hidden')
    }
}
async function refreshUploadServers() {
    while (appdata.servers.state === 'progress') {
        await new Promise(resolve => setTimeout(resolve, 100));
    }

    if (!appdata.servers.timestamp || (Date.now() - appdata.servers.timestamp > 10000)) {
        appdata.servers.state = 'progress';
        try {
            const response = await fetch('https://'+appdata.apiServer+'.gofile.io/servers');
            const data = await response.json();
            
            if (data.status !== 'ok') {
                throw new Error(data.status);
            }

            appdata.servers.serversList = data.data.servers;
            appdata.servers.timestamp = Date.now();
        } catch (error) {
            throw new Error('refreshUploadServers ' + error.message);
        } finally {
            appdata.servers.state = 'idle';
        }
    }

    return appdata.servers.serversList
}
async function newRequestToUploadQueue(files) {
    const accountActive = await getAccountActive();
    var requestUploadObjectId = uuidv4();
    const folderData = appdata.fileManager.mainContent.data || {};
    const isEmptyMainContent = Object.keys(appdata.fileManager.mainContent).length === 0;
    
    const requestUploadObject = {
        id: requestUploadObjectId,
        state: "pending",
        account: accountActive,
        showSuccessDetails: isEmptyMainContent, // Set to true if mainContent is empty
        folderDest: isEmptyMainContent ? null : folderData.id,
        folderDestName: isEmptyMainContent ? null : folderData.name,
        folderCode: isEmptyMainContent ? null : folderData.code,
        fileList: {},
        activeFiles: 0,
        server: null,
        serverZone: null,
        startTime: null,
        lastCalcTime: null,
        totalBytes: 0,
        bytesUploaded: 0,
        bytesRemaining: 0,
        speed: 0,
        percentComplete: 0,
    };

    for (let i = 0; i < files.length; i++) {
        const fileObjectId = uuidv4();
        const fileObject = {
            id: fileObjectId,
            state: "pending",
            server: null,
            serverZone: null,
            startTime: null,
            bytesUploaded: 0,
            bytesRemaining: files[i].size,
            speed: 0,
            percentComplete: 0,
            file: files[i],
        };
        requestUploadObject.fileList[fileObjectId] = fileObject;
        requestUploadObject.totalBytes += files[i].size;
    }
    appdata.uploads[requestUploadObjectId] = requestUploadObject;
    domInitRequestUploadObject(requestUploadObject);
    processNextRequestUploadObject();
}
function processNextRequestUploadObject() {
    Object.values(appdata.uploads).forEach(upload => {
        if (upload.state == "pending" && appdata.uploads.activeUploads < 2) {
            processRequestUploadObject(upload);
            return
        }
    });
}
async function processRequestUploadObject(requestUploadObject) {
    appdata.uploads.activeUploads++
    appdata.uploads[requestUploadObject.id].state = "progress";

    const destinationElement = document.querySelector(`[data-id='${requestUploadObject.id}'] #destinationFolder`);

    if (!requestUploadObject.folderDest || !requestUploadObject.folderDestName) {
        destinationElement.innerHTML = '<div class="animate-spin rounded-full h-4 w-4 border-t-4 border-blue-500"></div>';
        const account = await getAccountActive();
        const response = await createFolderFetch(account.rootFolder,undefined,true);
        requestUploadObject.folderDest = response.data.id;
        requestUploadObject.folderDestName = response.data.name;
        requestUploadObject.folderCode = response.data.code;
    }
    destinationElement.textContent = requestUploadObject.folderDestName;

    processNextFileObject(requestUploadObject)
}
async function processNextFileObject(requestUploadObject) {
    for (const fileObject of Object.values(requestUploadObject.fileList)) {
        if (fileObject.state == "pending" && requestUploadObject.activeFiles < 2) {
            requestUploadObject.activeFiles++;
            await processFileObject(requestUploadObject, fileObject);
            return processNextFileObject(requestUploadObject)
        }
    }
    var pendingInQueue = false;
    var progressInQueue = false;
    Object.values(requestUploadObject.fileList).forEach(fileObject => {
        if (fileObject.state == "pending") {
            pendingInQueue = true;
        }
        if (fileObject.state == "progress") {
            progressInQueue = true;
        }
    })
    if (pendingInQueue == false && progressInQueue == false) {
        appdata.uploads.activeUploads--
        if(requestUploadObject.state == "canceled") {
            removeRequestUploadObject(requestUploadObject);
        }
        else if (appdata.fileManager.mainContent.data && appdata.fileManager.mainContent.data.id === requestUploadObject.folderDest) {
            removeRequestUploadObject(requestUploadObject);
            refreshFilemanager();
        } else {
            domCreateUploadSuccess(requestUploadObject)
        }
        processNextRequestUploadObject();
    }
}
function domInitRequestUploadObject(requestUploadObject) {
    const indexUploadDiv = document.getElementById('index_upload');
    const newCard = document.createElement('div');
    newCard.setAttribute('data-id', requestUploadObject.id);
    newCard.className = 'p-4 bg-gray-700 bg-opacity-60 rounded-lg relative';

    const generalInfoDiv = document.createElement('div');
    generalInfoDiv.className = 'mb-4 pb-4 border-b border-gray-500';
    generalInfoDiv.innerHTML = `
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 text-white">
            <div class="flex flex-col">
                <div class="flex items-center mb-1">
                    <i class="fas fa-folder text-yellow-500 text-lg mr-2"></i>
                    <span class="font-semibold">Destination:</span>
                </div>
                <span id="destinationFolder" class="text-gray-400 text-xs">Pending...</span>
            </div>
            <div class="flex flex-col">
                <div class="flex items-center mb-1">
                    <i class="fas fa-file-alt text-blue-500 text-lg mr-2"></i>
                    <span class="font-semibold">Queue:</span>
                </div>
                <span id="fileQueueCount" class="text-gray-400 text-xs">${Object.keys(requestUploadObject.fileList).length} files</span>
            </div>
            <div class="flex flex-col">
                <div class="flex items-center mb-1">
                    <i class="fas fa-tachometer-alt text-green-500 text-lg mr-2"></i>
                    <span class="font-semibold">Avg Speed:</span>
                </div>
                <span id="uploadSpeedAvg" class="text-gray-400 text-xs">0MB/s</span>
            </div>
            <div class="flex flex-col">
                <div class="flex items-center mb-1">
                    <i class="fas fa-clock text-red-500 text-lg mr-2"></i>
                    <span class="font-semibold">Remaining Time:</span>
                </div>
                <span id="remainingTimeTotal" class="text-gray-400 text-xs">00:00:00</span>
            </div>
            <div class="flex flex-col">
                <div class="flex items-center mb-1">
                    <i class="fas fa-percentage text-blue-500 text-lg mr-2"></i>
                    <span class="font-semibold">Progress:</span>
                </div>
                <span id="globalProgress" class="text-gray-400 text-xs">0%</span>
            </div>
        </div>
    `;

    newCard.appendChild(generalInfoDiv);

    const fileListDiv = document.createElement('div');
    fileListDiv.id = 'fileList';
    fileListDiv.className = 'space-y-6';
    newCard.appendChild(fileListDiv);

    const filesInQueueDiv = document.createElement('div');
    filesInQueueDiv.id = 'filesStillInQueue';
    filesInQueueDiv.className = 'text-gray-400 text-xs mt-2';
    filesInQueueDiv.textContent = `${Object.keys(requestUploadObject.fileList).length} more files in the queue`;
    newCard.appendChild(filesInQueueDiv);

    const cancelButton = document.createElement('button');
    cancelButton.className = 'requestUploadObjectCancel mt-2 bg-gray-500 text-white py-0.5 px-1 rounded hover:bg-gray-600 text-xs';
    cancelButton.textContent = 'Cancel';
    newCard.appendChild(cancelButton);

    indexUploadDiv.appendChild(newCard);
    indexUploadDiv.classList.remove('hidden');

    newCard.scrollIntoView({ behavior: 'smooth' });
}
function removeRequestUploadObject(requestUploadObject) {
    // Remove the upload request from appdata
    if (appdata.uploads[requestUploadObject.id]) {
        delete appdata.uploads[requestUploadObject.id];
    }

    // Remove the corresponding DOM element
    const requestElement = document.querySelector(`[data-id='${requestUploadObject.id}']`);
    if (requestElement) {
        requestElement.remove();
    }

    // If there are no more uploads, hide the container
    const indexUploadDiv = document.getElementById('index_upload');
    if (!indexUploadDiv.hasChildNodes() || indexUploadDiv.children.length === 0) {
        indexUploadDiv.classList.add('hidden');
    }
}
async function processFileObject(requestUploadObject, fileObject) {
    appdata.uploads[requestUploadObject.id].fileList[fileObject.id].state = "progress";
    domInitFileObject(requestUploadObject, fileObject);
    
    const uploadCard = document.querySelector(`div[data-id='${requestUploadObject.id}']`);
    const filesQueue = uploadCard.querySelector('#filesStillInQueue');
    const remainingFiles = Object.values(appdata.uploads[requestUploadObject.id].fileList).filter(file => file.state === 'pending').length;
    filesQueue.textContent = `${remainingFiles} more files in the queue`;

    const fileElement = uploadCard.querySelector(`div[data-id='${fileObject.id}']`); // Select file element using data-id

    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append("token", requestUploadObject.account.token);
    formData.append("folderId", requestUploadObject.folderDest);
    formData.append("file", fileObject.file);

    xhr.upload.onprogress = (e) => {
        if(requestUploadObject.state == "canceled") {
            return xhr.abort();
        }
        //Calc the stats of the file object
        if(fileObject.bytesUploaded == 0) {
            fileObject.startTime = Date.now();
        }
        if (e.lengthComputable) {
            const elapsedTime = (Date.now() - fileObject.startTime) / 1000;
            fileObject.bytesUploaded = e.loaded;
            fileObject.bytesRemaining = fileObject.file.size - fileObject.bytesUploaded;
            fileObject.percentComplete = (fileObject.bytesUploaded / fileObject.file.size) * 100;
            fileObject.speed = fileObject.bytesUploaded / elapsedTime;
            const timeRemaining = fileObject.bytesRemaining / fileObject.speed;
            const hours = Math.floor(timeRemaining / 3600);
            const minutes = Math.floor((timeRemaining % 3600) / 60);
            const seconds = Math.floor(timeRemaining % 60);

            fileElement.querySelector('.file-progressbar').style.width = `${fileObject.percentComplete}%`;
            fileElement.querySelector('.file-speed').textContent = humanFileSize(fileObject.speed, true)+ '/s';
            fileElement.querySelector('.file-progress').textContent = `${fileObject.percentComplete.toFixed(2)}%`;
            fileElement.querySelector('.file-remaining').textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        //Calc the stats of the global upload object
        if(requestUploadObject.startTime == null) {
            requestUploadObject.startTime = Date.now()
        }
        if(requestUploadObject.lastCalcTime == null || Date.now() - requestUploadObject.lastCalcTime > 300) {
            let totalBytesUploaded = 0;
            let totalBytesRemaining = 0;
            Object.values(requestUploadObject.fileList).forEach(file => {
                totalBytesUploaded += file.bytesUploaded;
                totalBytesRemaining += file.bytesRemaining;
            });
            requestUploadObject.bytesUploaded = totalBytesUploaded;
            requestUploadObject.bytesRemaining = totalBytesRemaining;
            requestUploadObject.percentComplete = (requestUploadObject.bytesUploaded / requestUploadObject.totalBytes) * 100;
    
            const elapsedTime = (Date.now() - requestUploadObject.startTime) / 1000;
            requestUploadObject.speed = totalBytesUploaded / elapsedTime;

            // Update the DOM
            const avgSpeedElement = uploadCard.querySelector('#uploadSpeedAvg');
            const remainingTimeElement = uploadCard.querySelector('#remainingTimeTotal');
            const progressElement = uploadCard.querySelector('#globalProgress');

            avgSpeedElement.textContent = humanFileSize(requestUploadObject.speed, true) + '/s';
            const globalHours = Math.floor(requestUploadObject.bytesRemaining / requestUploadObject.speed / 3600);
            const globalMinutes = Math.floor((requestUploadObject.bytesRemaining / requestUploadObject.speed % 3600) / 60);
            const globalSeconds = Math.floor(requestUploadObject.bytesRemaining / requestUploadObject.speed % 60);
            remainingTimeElement.textContent = `${globalHours.toString().padStart(2, '0')}:${globalMinutes.toString().padStart(2, '0')}:${globalSeconds.toString().padStart(2, '0')}`;
            progressElement.textContent = `${requestUploadObject.percentComplete.toFixed(2)}%`;

            requestUploadObject.lastCalcTime = Date.now();
        }
    };

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            appdata.uploads[requestUploadObject.id].fileList[fileObject.id].state = "done";
            fileElement.remove()
            requestUploadObject.activeFiles--;
            processNextFileObject(requestUploadObject)
        } else {
            appdata.uploads[requestUploadObject.id].fileList[fileObject.id].state = "failed";
            fileElement.remove()
            requestUploadObject.activeFiles--;
            processNextFileObject(requestUploadObject)
            
            // Add error alert
            let errorMessage = `Upload failed for file "${fileObject.file.name}"<br>`;
            errorMessage += `Server returned status ${xhr.status}<br>`;
            errorMessage += `Response: ${xhr.responseText}`;
            createAlert('error', errorMessage);
        }
    };

    xhr.onabort = () => {
        appdata.uploads[requestUploadObject.id].fileList[fileObject.id].state = "canceled";
        fileElement.remove()
        requestUploadObject.activeFiles--;
        processNextFileObject(requestUploadObject)
    };

    xhr.onerror = () => {
        appdata.uploads[requestUploadObject.id].fileList[fileObject.id].state = "failed";
        fileElement.remove()
        requestUploadObject.activeFiles--;
        processNextFileObject(requestUploadObject)
    };

    try {
        await refreshUploadServers();
    } catch (error) {
        appdata.uploads.activeUploads--
        removeRequestUploadObject(requestUploadObject);
        createAlert('error', error.message + "<br><br>An error happened while loading the upload servers. Please try again later.");
        return;
    }
    const randomServer = appdata.servers.serversList[Math.floor(Math.random() * appdata.servers.serversList.length)];
    appdata.uploads[requestUploadObject.id].fileList[fileObject.id].server = randomServer.name;
    if (window.location.hostname.includes('dev')) {
        appdata.uploads[requestUploadObject.id].fileList[fileObject.id].server = "store-eu-gra-dev-1";
    }
    appdata.uploads[requestUploadObject.id].fileList[fileObject.id].serverZone = randomServer.zone;
    fileElement.querySelector('.file-server').textContent = appdata.uploads[requestUploadObject.id].fileList[fileObject.id].serverZone + " " + appdata.uploads[requestUploadObject.id].fileList[fileObject.id].server

    xhr.open("POST", `https://${appdata.uploads[requestUploadObject.id].fileList[fileObject.id].server}.gofile.io/uploadfile`, true);
    xhr.send(formData);
}
function domInitFileObject(requestUploadObject, fileObject) {
    const uploadCard = document.querySelector(`div[data-id='${requestUploadObject.id}']`);
    const fileListDiv = uploadCard.querySelector('#fileList');

    const fileItem = document.createElement('div');
    fileItem.className = 'file-item';
    fileItem.setAttribute('data-id', fileObject.id); // Add data-id attribute

    fileItem.innerHTML = `
        <div class="flex flex-wrap justify-between items-center mb-2 text-xs">
            <div class="flex flex-col">
                <p class="text-white font-semibold flex items-center mr-2">
                    <i class="fas fa-file mr-1"></i>
                    <span>${fileObject.file.name}</span>
                </p>
                <span class="text-gray-400">${humanFileSize(fileObject.file.size, true)}</span>
            </div>
            <div class="flex space-x-2">
                <p class="flex items-center">
                    <i class="fas fa-server text-blue-500 mr-1"></i>
                    <span class="file-server">Pending ...</span>
                </p>
                <p class="flex items-center">
                    <i class="fas fa-tachometer-alt text-green-500 mr-1"></i>
                    <span class="file-speed">0MB/s</span>
                </p>
                <p class="flex items-center">
                    <i class="fas fa-clock text-red-500 mr-1"></i>
                    <span class="file-remaining">00:00:00</span>
                </p>
                <span class="text-gray-400 file-progress">0%</span>
            </div>
        </div>
        <div class="bg-gray-600 h-2 rounded-full">
            <div class="file-progressbar bg-green-500 h-2 rounded-full" style="width: 0%;"></div>
        </div>
    `;
    fileListDiv.appendChild(fileItem);
}
function loadQRCodeScript() {
    return new Promise((resolve, reject) => {
        // Check if QRCode is already defined
        if (window.QRCode) {
            resolve();
            return;
        }

        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js'; // or your preferred QR code library
        script.async = true;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error('Failed to load QR Code library'));
        document.head.appendChild(script);
    });
}
async function domCreateUploadSuccess(requestUploadObject) {
    // Find the existing div with the matching data-id
    const existingDiv = document.querySelector(`div[data-id="${requestUploadObject.id}"]`);
    if (!existingDiv) {
        console.error('Could not find existing upload div to replace');
        return;
    }

    // Calculate total size of uploaded files
    const totalSize = humanFileSize(requestUploadObject.totalBytes, true);
    const fileCount = Object.keys(requestUploadObject.fileList).length;
    const folderName = requestUploadObject.folderDestName;
    const folderCode = requestUploadObject.folderCode;
    
    // Update the existing div's content
    existingDiv.className = 'p-4 bg-gray-700 bg-opacity-60 rounded-lg relative';
    if (!requestUploadObject.showSuccessDetails) {
        // Minimal version
        existingDiv.innerHTML = `
            <!-- Close Button -->
            <button class="absolute top-2 right-2 text-gray-400 hover:text-white closeSuccessCard" title="Close">
                <i class="fas fa-times"></i>
            </button>

            <!-- Upload Complete Header -->
            <div class="flex justify-center mb-3">
                <div class="text-center">
                    <h2 class="text-white text-xl font-semibold">Upload Complete</h2>
                    <div class="h-1 w-24 bg-green-500 rounded mt-1 mx-auto"></div>
                </div>
            </div>

            <!-- Upload Statistics -->
            <div class="flex flex-wrap items-center justify-center mb-4 gap-2">
                <div class="flex flex-wrap items-center justify-center text-gray-300 text-sm gap-2">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                        <span>${fileCount} file${fileCount > 1 ? 's' : ''}</span>
                    </div>
                    <span class="hidden sm:block mx-2">•</span>
                    <div class="flex items-center">
                        <i class="fas fa-database text-purple-500 mr-2"></i>
                        <span>${totalSize}</span>
                    </div>
                    <span class="hidden sm:block mx-2">•</span>
                    <div class="flex items-center">
                        <i class="fas fa-folder text-yellow-500 mr-2"></i>
                        <span>${folderName}</span>
                    </div>
                </div>
            </div>

            <!-- Access Button -->
            <div class="flex justify-center">
                <a href="${window.location.origin}/d/${requestUploadObject.folderCode}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded flex items-center gap-2 linkSuccessCard">
                    <i class="fas fa-folder-open"></i>
                    Access Folder
                </a>
            </div>
        `;
    } else {
        existingDiv.innerHTML = `
            <!-- Close Button -->
            <button class="absolute top-2 right-2 text-gray-400 hover:text-white closeSuccessCard" title="Close">
                <i class="fas fa-times"></i>
            </button>

            <!-- Upload Complete Header -->
            <div class="flex justify-center mb-3">
                <div class="text-center">
                    <h2 class="text-white text-xl font-semibold">Upload Complete</h2>
                    <div class="h-1 w-24 bg-green-500 rounded mt-1 mx-auto"></div>
                </div>
            </div>

            <!-- Upload Statistics -->
            <div class="flex flex-wrap items-center justify-center mb-6 gap-2">
                <div class="flex flex-wrap items-center justify-center text-gray-300 text-sm gap-2">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                        <span>${fileCount} file${fileCount > 1 ? 's' : ''}</span>
                    </div>
                    <span class="hidden sm:block mx-2">•</span>
                    <div class="flex items-center">
                        <i class="fas fa-database text-purple-500 mr-2"></i>
                        <span>${totalSize}</span>
                    </div>
                    <span class="hidden sm:block mx-2">•</span>
                    <div class="flex items-center">
                        <i class="fas fa-folder text-yellow-500 mr-2"></i>
                        <span>${folderName}</span>
                    </div>
                </div>
            </div>

            <!-- Folder Link and QR Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <!-- Folder Link Section -->
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-folder-open text-blue-400 mr-2"></i>
                        <span class="text-white">Folder Link</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <a href="${window.location.origin}/d/${requestUploadObject.folderCode}" 
                            class="text-blue-400 hover:text-blue-300 hover:underline truncate linkSuccessCard">
                            ${window.location.origin}/d/${requestUploadObject.folderCode}
                        </a>
                        <span class="showSuccessDetails_folderLink hidden">${window.location.origin}/d/${requestUploadObject.folderCode}</span>
                        <button class="ml-2 popover-trigger copy-button bg-gray-600 hover:bg-gray-700 text-white px-2 py-1 rounded inline-flex items-center text-xs" data-popover="Copy the folder link" data-copy-target=".showSuccessDetails_folderLink" data-copy-popover="Folder link copied!">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- QR Code Section -->
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-qrcode text-blue-400 mr-2"></i>
                        <span class="text-white">QR Code</span>
                    </div>
                    <div class="flex justify-center">
                        <div class="bg-white p-3 rounded">
                            <div id="qrcode-${requestUploadObject.id}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Access Information -->
            <div class="bg-blue-500 bg-opacity-10 border border-blue-500 rounded-lg p-4 mb-4">
                <div class="flex flex-col sm:flex-row items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    <p class="text-gray-300 text-sm">
                        Your files have been stored in the newly created folder <i class="fas fa-folder text-yellow-500 mr-1"></i><span class="font-semibold">${folderName}</span>.<br>
                        This folder has been configured as publicly accessible through the generated link above.<br>
                        To set additional options (password, expiration date, description text, etc.), visit the folder in your file manager and access its settings.
                    </p>
                </div>
            </div>

            ${requestUploadObject.account.tier !== "premium" ? `
                <!-- Expiration Warning -->
                <div class="bg-yellow-500 bg-opacity-10 border border-yellow-500 rounded-lg p-4">
                    <div class="flex flex-col sm:flex-row items-start gap-3">
                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                        <p class="text-gray-300 text-sm">
                            Files that haven't been downloaded in 10 days will be automatically archived. Active files that are being downloaded regularly will remain available.
                            <a href="/premium" target="_blank" class="text-blue-400 hover:text-blue-300">Upgrade to Premium</a>
                            for unlimited storage duration and enhanced features.
                        </p>
                    </div>
                </div>
            ` : ''}
        `;
    }

    try {
        await loadQRCodeScript();

        const qrContainer = document.getElementById(`qrcode-${requestUploadObject.id}`);
        if (qrContainer) {
            qrContainer.innerHTML = '';
            const folderUrl = `${window.location.origin}/d/${requestUploadObject.folderCode}`;
            new QRCode(qrContainer, {
                text: folderUrl,
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }
    } catch (error) {
        console.error('Failed to generate QR code:', error);
        const qrContainer = document.getElementById(`qrcode-${requestUploadObject.id}`);
        if (qrContainer) {
            qrContainer.innerHTML = `
                <div class="text-red-500 text-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    Failed to generate QR code
                </div>
            `;
        }
    }
    
    initPopover()
    return existingDiv;
}
function showAbuseReportPopup() {
    createPopup({
        icon: 'fas fa-flag',
        title: 'Report Content',
        content: `
            <div class="space-y-6">
                <!-- Info message -->
                <div class="bg-blue-500 bg-opacity-10 border border-blue-500/30 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-400 mt-1 mr-3"></i>
                        <p class="text-gray-300 text-sm">
                            Help us maintain a safe environment by reporting inappropriate content. Your report will be reviewed by our team.
                        </p>
                    </div>
                </div>

                <!-- Report Form -->
                <form id="popup_abuseForm" class="space-y-4">
                    <div class="space-y-2">
                        <label for="popup_abuse_type" class="block text-sm font-medium text-gray-300">
                            Reason for Report
                        </label>
                        <select 
                            id="popup_abuse_type" 
                            name="type" 
                            required 
                            class="w-full px-3 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none
                                   text-white"
                        >
                            <option value="">Select a reason...</option>
                            <option value="copyright">Copyright Infringement</option>
                            <option value="child_abuse">Child Abuse</option>
                            <option value="terrorism">Terrorism</option>
                            <option value="harassment">Harassment</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="popup_abuse_email" class="block text-sm font-medium text-gray-300">
                            Your Email
                        </label>
                        <input 
                            type="email" 
                            id="popup_abuse_email" 
                            name="email" 
                            placeholder="your.email@example.com" 
                            required 
                            class="w-full px-3 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none
                                   text-white placeholder-gray-400"
                        >
                    </div>

                    <div class="space-y-2">
                        <label for="popup_abuse_description" class="block text-sm font-medium text-gray-300">
                            Description
                        </label>
                        <textarea 
                            id="popup_abuse_description" 
                            name="description" 
                            rows="4" 
                            required 
                            placeholder="Please provide details about your report..."
                            class="w-full px-3 py-2 bg-gray-700 rounded-lg border border-gray-600 
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none
                                   text-white placeholder-gray-400"
                        ></textarea>
                    </div>

                    <button 
                        type="submit" 
                        id="popup_abuse_submit"
                        class="w-full py-2 bg-blue-600 rounded-lg hover:bg-blue-700 
                               transition duration-300 ease-in-out text-white font-medium
                               flex items-center justify-center space-x-2"
                    >
                        <i class="fas fa-paper-plane"></i>
                        <span>Submit Report</span>
                    </button>
                </form>

                <p class="text-gray-400 text-xs text-center">
                    Your report will be handled confidentially
                </p>
            </div>
        `
    });
}
async function launchAds() {
    var currentTimestamp = Math.floor(new Date().getTime() / 1000)
    const accountActive = await getAccountActive();
    if(accountActive.tier == "premium" || appdata.fileManager.mainContent.data.totalDownloadCount < 10) {
        return
    }

    document.getElementById('index_ads').classList.remove('hidden');
    if ((appdata.random > 0) && (localStorage.getItem('clickaduTimestamp') == undefined || currentTimestamp - localStorage.getItem('clickaduTimestamp') > 43200) && document.referrer.match(/simpcity|socialmediagirls|phica|leakimedia/)) {
        //Clickadu ATF
        if(document.getElementById("index_ads").innerHTML == "") {
            document.getElementById("index_ads").innerHTML = '<small class="mb-2">To disable ads, <a href="/premium" class="text-blue-500 hover:text-blue-700 underline">upgrade</a> your account to Premium</small>';
            appdata.ads.mustLoadClickadu = true
        }
    }
    else if ((appdata.random > 0) && (localStorage.getItem('aadsTimestamp') == undefined || currentTimestamp - localStorage.getItem('aadsTimestamp') > 43200)) {
        //Aads ATF
        if(document.getElementById("index_ads").innerHTML == "")
        {
            document.getElementById("index_ads").innerHTML = '<small class="mb-2">To disable ads, <a href="/premium" class="text-blue-500 hover:text-blue-700 underline">upgrade</a> your account to Premium</small><iframe data-aa="2059298" src="//ad.a-ads.com/2059298?size=300x250" style="width:300px; height:250px; border:0px; padding:0; overflow:hidden; background-color: transparent;"></iframe>';
            localStorage.setItem('aadsTimestamp', currentTimestamp);
        }
    }
    else if(appdata.random > 0.95) {
        //adskeeper ATF
        if(document.getElementById("index_ads").innerHTML == "")
        {
            document.getElementById("index_ads").innerHTML = '<small class="mb-2">To disable ads, <a href="/premium" class="text-blue-500 hover:text-blue-700 underline">upgrade</a> your account to Premium</small><div data-type="_mgwidget" data-widget-id="1708361"></div>'
            appdata.ads.mustLoadAdskeeper = true
        }
    }
    else if(appdata.random > 0) {
        //Clickadu2 ATF
        if(document.getElementById("index_ads").innerHTML == "")
        {
            document.getElementById("index_ads").innerHTML = '<small class="mb-2">To disable ads, <a href="/premium" class="text-blue-500 hover:text-blue-700 underline">upgrade</a> your account to Premium</small>'
            appdata.ads.mustLoadClickadu2 = true
        }
    }

    if(appdata.ads.mustLoadClickadu == true && appdata.ads.clickaduScriptLoaded == false) {
        var adScript = document.createElement('script');
        adScript.setAttribute('data-cfasync','false');
        adScript.setAttribute('class','__clb-2023524');
        adScript.setAttribute('src','//qnp16tstw.com/lv/esnk/2023524/code.js');
        document.getElementById("index_ads").appendChild(adScript);
        appdata.ads.clickaduScriptLoaded = true
    }
    if(appdata.ads.mustLoadAdskeeper == true && appdata.ads.adskeeperScriptLoaded == false) {
        var adScript = document.createElement('script');
        adScript.setAttribute('async', true);
        adScript.setAttribute('src', 'https://jsc.adskeeper.com/site/690245.js');
        document.head.appendChild(adScript);
        (function(w,q){w[q]=w[q]||[];w[q].push(["_mgc.load"])})(window,"_mgq");
        appdata.ads.adskeeperScriptLoaded = true;
    }
    if(appdata.ads.mustLoadClickadu2 == true && appdata.ads.clickadu2ScriptLoaded == false) {
        var adScript = document.createElement('script');
        adScript.setAttribute('data-cfasync','false');
        adScript.setAttribute('class','__clb-2035294'); 
        adScript.setAttribute('src','//brittlesturdyunlovable.com/lv/esnk/2035294/code.js');
        document.getElementById("index_ads").appendChild(adScript);
        appdata.ads.clickadu2ScriptLoaded = true
    }
}

//Init the app
window.onload = async function() {
    //Tracking code
    var adScript = document.createElement('script');
    adScript.setAttribute('data-domain','gofile.io');
    adScript.setAttribute('src','/dist/js/script.js');
    document.head.appendChild(adScript);

    try {
        sidebarHandleResize();
        appdataInitAccountsFromLocalStorage();
        appdataInitFilemanagerFromLocalStorage()
        await refreshAppdataAccountsAndSync();
        updateSidebarAccounts();
        if (location.pathname) {
            await loadUrl(location.pathname);
        }
        window.prerenderReady = true
    } catch (error) {
        createAlert('error', error.message);
    }
};