<ul class="navbar-nav bg-gradient-sila sidebar sidebar-dark accordion" id="accordionSidebar">



    <!-- Sidebar - Brand -->

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">

        <div class="sidebar-brand-icon">

            {{-- <i class="fab fa-laravel"></i> --}}

            <img src="/icon/logo.jpg" alt="logo" width="100%" style="border-radius: 50px">

        </div>

        {{-- <div class="sidebar-brand-text mx-3">CF88</div> --}}

    </a>



    <!-- Divider -->

    <hr class="sidebar-divider my-0">
    
    <li class="nav-item  @yield('file')">
        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#file"
            aria-expanded="true" aria-controls="file">
            <i class="fas fa-sitemap"></i>
            <span>File</span>
        </a>
        <div id="file" class="collapse @yield('file-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-gradient-bg py-2 collapse-inner rounded">
                {{-- <a class="collapse-item @yield('list-file-light')"  href="{{ route('files') }}">List File</a> --}}
                <a class="collapse-item @yield('list-file-light')"  href="/d" target="_blank">List File</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    @can('highlight')
    <li class="nav-item  @yield('list-hight-light')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#highlight"

            aria-expanded="true" aria-controls="highlight">

            <i class="fas fa-fw fa-cog"></i>

            <span>HighLight</span>

        </a>

        <div id="highlight" class="collapse @yield('highlight-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">
                @can('highlight-list')
                <a class="collapse-item @yield('highlight')"  href="{{ route('highlight') }}">List HighLight</a>
                @endcan
                @can('highlight-create')
                <a class="collapse-item @yield('add-hight-light')" href="{{ route('highlight/create') }}">Add HighLight</a>
                @endcan
            </div>

        </div>

    </li>
    @endcan
    @can('channel')
    <li class="nav-item  @yield('channel')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#channel"

            aria-expanded="true" aria-controls="channel">

            <i class="fas fa-fw fa-cog"></i>

            <span>Channel</span>

        </a>

        <div id="channel" class="collapse @yield('channel-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">
                @can('channel-list')
                <a class="collapse-item @yield('list-channel')"  href="{{ route('channel') }}">List Channel</a>
                @endcan
                @can('channel-create')
                <a class="collapse-item @yield('add-channel')" href="{{ route('channel/create') }}">Add Channel</a>
                @endcan
            </div>

        </div>

    </li>
    @endcan
    <!-- Nav Item - Pages Collapse Menu -->

    {{-- <li class="nav-item  @yield('livestream')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#livestream"

            aria-expanded="true" aria-controls="livestream">

            <i class="fas fa-fw fa-cog"></i>

            <span>Livestream</span>

        </a>

        <div id="livestream" class="collapse @yield('livestream-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list-hight-light')"  href="{{ route('livestream') }}">List Livestream</a>

                <a class="collapse-item @yield('add-hight-light')" href="{{ route('livestream/create') }}">Add Livestream</a>

            </div>

        </div>

    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    @can('article')
    <li class="nav-item  @yield('article')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#article"

            aria-expanded="true" aria-controls="article">

            <i class="fas fa-fw fa-cog"></i>

            <span>Article</span>

        </a>

        <div id="article" class="collapse @yield('article-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">
                @can('article-list')
                <a class="collapse-item @yield('list-article-light')"  href="{{ route('article') }}">List Article</a>
                @endcan
                @can('article-create')
                <a class="collapse-item @yield('add-article-light')" href="{{ route('article/create') }}">Add Article</a>
                @endcan
            </div>

        </div>

    </li>
    @endcan

    {{-- @can('newsfeed') --}}
        <li class="nav-item  @yield('newsfeed')">
            <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#newsfeed"
                aria-expanded="true" aria-controls="newsfeed">
                <i class="fas fa-fw fa-cog"></i>
                <span>Newsfeed</span>
            </a>
            <div id="newsfeed" class="collapse @yield('newsfeed-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-bg py-2 collapse-inner rounded">
                    {{-- @can('feed-list') --}}
                    <a class="collapse-item @yield('list-newsfeed-light')"  href="{{ route('newsfeed') }}">List Newsfeed</a>
                    {{-- @endcan --}}
                    {{-- @can('feed-create') --}}
                    <a class="collapse-item @yield('add-newsfeed-light')" href="{{ route('newsfeed/create') }}">Add Newsfeed</a>
                    {{-- @endcan --}}
                </div>

            </div>
        </li>
    {{-- @endcan --}}

    {{-- @can('fight') --}}
        <li class="nav-item  @yield('fight')">
            <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#fight"
                aria-expanded="true" aria-controls="fight">
                <i class="fas fa-fw fa-cog"></i>
                <span>Fight</span>
            </a>
            <div id="fight" class="collapse @yield('fight-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-bg py-2 collapse-inner rounded">
                    {{-- @can('feed-list') --}}
                    <a class="collapse-item @yield('list-fight-light')"  href="{{ route('fights') }}">List fight</a>
                    {{-- @endcan --}}
                    {{-- @can('feed-create') --}}
                    <a class="collapse-item @yield('add-fight-light')" href="{{ route('fights.create') }}">Add fight</a>
                    {{-- @endcan --}}
                </div>

            </div>
        </li>
    {{-- @endcan --}}

    {{-- @can('video') --}}
        <li class="nav-item  @yield('video')">
            <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#video"
                aria-expanded="true" aria-controls="video">
                <i class="fas fa-fw fa-cog"></i>
                <span>Video</span>
            </a>
            <div id="video" class="collapse @yield('video-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-bg py-2 collapse-inner rounded">
                    {{-- @can('feed-list') --}}
                    <a class="collapse-item @yield('list-video-light')"  href="{{ route('video') }}">List video</a>
                    {{-- @endcan --}}
                    {{-- @can('feed-create') --}}
                    <a class="collapse-item @yield('add-video-light')" href="{{ route('video.create') }}">Add video</a>
                    {{-- @endcan --}}
                </div>

            </div>
        </li>
    {{-- @endcan --}}
      <!-- Nav Item - Pages Category Menu -->
    @can('setting')
      <li class="nav-item @yield('Setting-active')">

        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#Category"

            aria-expanded="true" aria-controls="Category">

                  <i class="fas fa-fw fa-cog"></i>

            <span>Settings</span>

        </a>

        <div id="Category" class="collapse @yield('Setting')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">
                @can('bot')
                <a class="collapse-item @yield('list_Bot')" href="{{ route('bot') }}">Bot</a>
                @endcan
                @can('category')
                <a class="collapse-item @yield('list_Category')" href="{{ route('category') }}">Categories</a>
                @endcan
                @can('banner')
                <a class="collapse-item @yield('list_Banner')" href="{{ route('banner') }}">Banner</a>
                @endcan
                @can('logo')
                <a class="collapse-item @yield('list_Logo')" href="{{ route('logo') }}">Logo</a>
                @endcan
                @can('social')
                <a class="collapse-item @yield('list_social')" href="{{ route('social') }}">Social</a>
                @endcan
            
                {{-- <a class="collapse-item @yield('list_Footer')" href="{{ route('footer') }}">Footer</a> --}}
                @can('user')
                <a class="collapse-item @yield('list_User')" href="{{ route('user') }}">User</a>
                @endcan
                {{-- @can('topic') --}}
                <a class="collapse-item @yield('list_Topic')" href="{{ route('topic') }}">Topic</a>
                {{-- @endcan --}}
                {{-- <a class="collapse-item @yield('list_Telegram')" href="{{ route('telegram') }}">Telegram</a> --}}
                {{-- <a class="collapse-item @yield('list_Roles')" href="{{ route('roles.index') }}">Roles</a> --}}
      

            </div>

        </div>

    </li>

    @endcan

    <!-- Nav Item - Pages Collapse Menu -->

    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"

            aria-expanded="true" aria-controls="collapseTwo">

            <i class="fas fa-fw fa-cog"></i>

            <span>Components</span>

        </a>

        <div id="collapseTwo" class="collapse @yield('Components')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header text-write">Custom Components:</h6>

                <a class="collapse-item @yield('Buttons')" href="{{ route('buttons') }}">Buttons</a>

                <a class="collapse-item @yield('Cards')"  href="{{ route('cards') }}">Cards</a>

            </div>

        </div>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"

            aria-expanded="true" aria-controls="collapseUtilities">

            <i class="fas fa-fw fa-wrench"></i>

            <span>Utilities</span>

        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"

            data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header">Custom Utilities:</h6>

                <a class="collapse-item" href="{{ route('utilities-colors') }}">Colors</a>

                <a class="collapse-item" href="{{ route('utilities-borders') }}">Borders</a>

                <a class="collapse-item" href="{{ route('utilities-animations') }}">Animations</a>

                <a class="collapse-item" href="{{ route('utilities-other') }}">Other</a>

            </div>

        </div>

    </li>



    <!-- Divider -->

    <hr hidden class="sidebar-divider">



    <!-- Heading -->

    <div hidden class="sidebar-heading">

        Addons

    </div>



    <!-- Nav Item - Pages Collapse Menu -->
{{-- 
    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"

            aria-expanded="true" aria-controls="collapsePages">

            <i class="fas fa-fw fa-folder"></i>

            <span>Pages</span>

        </a>

        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header">Login Screens:</h6>

                <a class="collapse-item" href="{{ route('login') }}">Login</a>

                <a class="collapse-item" href="{{ route('register') }}">Register</a>

                <div class="collapse-divider"></div>

                <h6 class="collapse-header">Other Pages:</h6>

                <a class="collapse-item" href="{{ route('404-page') }}">404 Page</a>

                <a class="collapse-item" href="{{ route('blank-page') }}">Blank Page</a>

            </div>

        </div>

    </li> --}}



    <!-- Nav Item - Charts -->

    <li hidden class="nav-item">

        <a class="nav-link" href="{{ route('chart') }}">

            <i class="fas fa-fw fa-chart-area"></i>

            <span>Charts</span></a>

    </li>



    <!-- Nav Item - Tables -->

    <li hidden class="nav-item" >

        <a class="nav-link" href="{{ route('tables') }}">

            <i class="fas fa-fw fa-table"></i>

            <span>Tables</span></a>

    </li>

    <!-- Divider -->

    <hr  class="sidebar-divider d-none d-md-block">



    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>

</ul>