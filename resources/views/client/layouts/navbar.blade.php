
<script>
    $(document).ready(function() {
           $('.language-wrapper').hover(function() {
                $('#language-list__wrapper').addClass('selected');
           }, function() {
                $('#language-list__wrapper').removeClass('selected');
           });

           $('.profile-wrapper').hover(function() {
                $('#profile-wrapper').addClass('selected');
           }, function() {
                $('#profile-wrapper').removeClass('selected');
           });
    });
</script>
<nav class="navbar d-flex justify-content-between align-items-center position-fixed w-100 top-0" style="z-index: 99">
    <div class="container bg-color-26" >
        <div class="flex-item ">
            <div class="client-navbar">
                <a href="/" class="btn text-white font-18">
                    <img src="/icon/logo.jpg" width="150" class="brd">
                </a>
                <span class="max-nav">
                    <a href="/feeds" class="btn text-white font-18 @yield('client-feeds')">
                        <span>@lang('home.feeds')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a>
                    <a href="/listfight" class="btn text-white font-18 @yield('client-listfight')">
                        <span>@lang('home.list fight')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a>
                    <a href="/channels" class="btn text-white font-18 @yield('client-channels')">
                        <span>@lang('home.channels')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a>
                    <a href="/news" class="btn text-white font-18 @yield('client-news')">
                        <span>@lang('home.news')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a>
                    <a href="/livestreams" class="btn text-white font-18 @yield('client-livestreams')">
                        <span>@lang('home.livestream')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a>
                    {{-- <a href="/highlights" class="btn text-white font-18 @yield('client-highlights')">
                        <span>@lang('home.highlights')</span>
                        <div class="home-nav__child-indicator"></div>
                    </a> --}}
                </span>
            </div>
        </div>

        <div class="flex-item" style="display: flex;">

            @if (Auth::guest())
            <div class="btn-line btn text-white btn-next btn-modal-size" style="margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                @lang('home.login')
            </div>
            {{-- <div class="btn-line btn text-white btn-next btn-modal-size" style="margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">
                @lang('home.register')
            </div> --}}
            @else
            <div class="name-login-hi">
                <div class="centered">Hi, {{Auth::user()->name}}</div>
            </div>
            <div class="profile-wrapper" style="margin-left: 5px;">
                <div class="langauge-selection">
                    <img src="/icon/null.png" style="width: 100%;">
                    {{-- <i class="fas fa-globe text-white"></i> --}}
                </div>
                <div class="language-list__wrapper " id="profile-wrapper" >
                    <a href="/profile">
                        <div class="language-list__container">
                            <div class="language-list__name">
                                <span> <i class="fas fa-user"></i> @lang('home.profile')</span>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void" onclick="$('#logout-form').submit();">
                        <div class="language-list__container">
                            <div class="language-list__name">
                                <span> <i class="fas fa-sign-out-alt"></i> @lang('home.logout')</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
                {{-- <a href="/profile">
                    <div class="btn-line btn text-white btn-next btn-modal-size" style="margin-left: 5px;">
                        <i class="fas fa-user text-white"></i> @lang('home.profile')
                    </div>
                </a> --}}
            @endif
            {{-- @if (Auth::guest())
            <div class="btn-modal-size-mobile">
                <div class="register-lable" style="right: 128px;">
                    <img src="/icon/login.png" style="width: 60px;height: 25px;" alt="">
                </div>
                <div class="register-lable">
                    <img src="/icon/register.png" style="width: 60px;height: 25px;" alt="">
                </div>
            </div>
            @endif --}}
            <div class="language-wrapper" style="margin-left: 5px;">
                <div class="langauge-selection">
                    <i class="fas fa-globe text-white"></i>
                </div>
                <div class="language-list__wrapper " id="language-list__wrapper">

                    <a href="/locale/kh">
                        <div class="language-list__container">
                            <div class="language-list__name">
                                <img class="img-contain language-list__name-icon" src="/icon/kh.png">
                                <span style="font-family: 'nida' ">@lang('home.khmer')</span>
                            </div>
                        </div>
                    </a>
                    <a href="/locale/vn">
                        <div class="language-list__container">
                            <div class="language-list__name">
                                <img class="img-contain language-list__name-icon" src="/icon/vn.png">
                                <span>@lang('home.Vietnamese')</span>
                            </div>
                        </div>
                    </a>
                    <a href="/locale/en">
                        <div class="language-list__container">
                            <div class="language-list__name">
                                
                                <img class="img-contain language-list__name-icon" src="/icon/en.png">
                                <span>@lang('home.english')</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

<nav class="mobile-nav">
    <div>
        <div class="navbarstk">
            
            <a href="/feeds"  class="item @yield('client-feeds')">
                <div class="item-wrapper listfight">
                    @lang('home.feeds')
                    {{-- <img src="/footer/livestream.png" style="width: 100%;" alt=""> --}}
                    {{-- @if(app()->getLocale() == 'en')
                        <img src="/footer/mb/feeds.png" style="width: 100%;" alt="">
                    @elseif(app()->getLocale() == 'kh')
                        <img src="/footer/feeds_kh.png" style="width: 100%;" alt="">
                    @endif --}}
                    {{-- <img src="/icon/live.png " style="width: 25px;height: 25px;" alt=""> @lang('home.livestream') --}}
                </div>
            </a>
            <a href="/listfight" class="item @yield('client-listfight')">
                <div class="item-wrapper listfight">
                    @lang('home.list fight')
                </div>
            </a>
            <a href="/channels" class="item @yield('client-channels')">
                <div class="item-wrapper">
                    {{-- <img src="/footer/channel.png" style="width: 100%;" alt=""> --}}
                    {{-- @if(app()->getLocale() == 'en')
                    <img src="/footer/mb/channels.png" style="width: 100%;" alt="">

                    @elseif(app()->getLocale() == 'kh')
                        <img src="/footer/mb/channels-kh.png" style="width: 100%;" alt="">
                    @endif --}}
                    {{-- <i class="fas fa-tv"></i> @lang('home.channels') --}}
                    @lang('home.channels')
                </div>
            </a>

            <a href="/news" class="item @yield('client-news')">
                <div class="item-wrapper">
                    {{-- <img src="/footer/news.png" style="width: 100%;" alt=""> --}}
                    {{-- @if(app()->getLocale() == 'en')
                        <img src="/footer/mb/news.png" style="width: 100%;" alt="">

                    @elseif(app()->getLocale() == 'kh')
                        <img src="/footer/news-kh.png" style="width: 100%;" alt="">
                    @endif --}}
                    {{-- <i class="fas fa-list-alt"></i> @lang('home.news') --}}
                    @lang('home.news')
                </div>
            </a>
            <style>
                .item.active,.item:hover{
                    /* background:#ffffffe3;
                    backdrop-filter: blur(15px);
                    border: 1px solid rgb(255 255 255 / 30%); */
                    border-radius: 30px;
                    background: rgb(74 75 106);
                    backdrop-filter: blur(15px);
                    border: 1px solid rgb(74 75 106);
              
                }
                .livebots-dot {
                    width: 10px;
                    height: 10px;
                    background-color: red;
                    border-radius: 50%;
                    margin-right: 6px;
                    animation: blink 1s infinite;
                    position: absolute;
                    left: -8px;
                }
                .livebots-text {
                    position: relative;
                    left: 8px;
                }
                @keyframes  blink {
                    0%, 50%, 100% { opacity: 1; }
                    25%, 75% { opacity: 0; }
                }
            </style>
            <a href="/livestreams" class="item @yield('client-livestreams')">
                <div class="item-wrapper d-flex flex-column justify-content-center position-relative">
                    <span class="livebots-dot"></span>
                    <span class="livebots-text">@lang('home.livestream')</span>
                    
                    {{-- @if(app()->getLocale() == 'en')
                        <img src="/footer/mb/livestreams.png" style="width: 100%;" alt="">

                    @elseif(app()->getLocale() == 'kh')
                        <img src="/footer/mb/livestreams-kh.png" style="width: 100%;" alt="">
                    @endif --}}
                </div>
            </a>
            {{-- <a href="/highlights">
                <div class="item-wrapper">
                    @if(app()->getLocale() == 'en')
                    <img src="/footer/highlight.png" style="width: 100%;" alt="">

                    @elseif(app()->getLocale() == 'kh')
                    <img src="/footer/highlight-kh.png" style="width: 100%;" alt="">
                    @endif
                
                </div>
            </a> --}}
        </div>
    </div>

</nav>


<style>
    .mt-75{
        margin-top: 75px;
    }
    .bg-color-26{
        background: #161d3191;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
        border-radius: 30px;
    }
    .client-navbar .active span {
        color: #7367f0 !important;
    }
    .btn-modal-size-mobile {
        display: none;
    }

    .register-lable {
        position: absolute;
        top: 8%;
        right: 55px;
        margin-top: 0.1rem;
        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
        padding: 0.5rem 0.3rem;
        border-radius: 0.5rem;
        transform: scale(1);
        transform-origin: 11.5rem 0;
        transition: all .3s;
    }

    .btn-modal-size {
        text-transform: uppercase
    }
    .name-login-hi{
        position: relative;
    }
    .name-login-hi .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 100px;
        overflow: hidden;
        margin-left: -50px;
        font-weight: 400;
        color: white;
    }
    .client-navbar a img {
        width: 150px
    }
    .client-navbar a{
        padding-left: 0px;
    }
    @media screen and (max-width: 400px) {
    
        .client-navbar a img {
            width: 120px
        }
        .client-navbar a{
            padding-top: 0px;
        }
        .langauge-selection {
            width: 2rem !important;
            height: 2rem !important;
            border-radius: 50% !important;
            padding: 0.2rem !important;
        }
        .btn-next.btn-modal-size {
            border-radius: 40px;
            padding: 5px 20px;
            font-size: 12px
        }
    }

    .navbarstk {
        position: fixed;
        z-index: 99;
        width: 98%;
        max-width: 1300px;
        height: 60px;
        left: 0;
        right: 0;
        border-radius: 30px;
        padding: 5px;
        display: flex ;   
        transition: all .3s;
        bottom: 0;
        background: #161d3191;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
        margin-left: 1%;
        margin-right: 1%;
        margin-bottom: 10px;
        gap: 2px
    }

    .navbarstk a {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #fff;
        position: relative;
    }






    .max-nav a {
        margin-top: 12px !important;
    }

    .language-list__container:hover {
        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
        border-radius: 5px;
    }

    /* .bg-navbar{
           background-color: #6f4b98;
       } */
    .font-18 {
        text-transform: uppercase !important;
        font-size: 20px;
    }

    a:hover span {
        color: #7367f0 !important
    }

    .brd {
        border-radius: 50px;
    }

    .langauge-selection {
        position: relative;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        padding: 0.3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
        cursor: pointer;
    }

    .client-navbar {
        overflow-x: auto;
        white-space: nowrap;
    }

    .mobile-nav {
        display: none;
    }
    @media screen and (max-width: 1000px) {
        .font-18 {
            font-size: 15px;
        }
    }

    @media screen and (max-width: 777px) {
        .position-fixed.w-100.top-0{
            position: relative !important
        }
        .mt-75{
            margin-top: 0 !important;
        }
        .bg-color-26{
            max-width: 98% !important;
            box-shadow: unset !important;
        }
        .max-nav {
            display: none;
        }

        .mobile-nav {
            display: block !important;
        }

        .font-18 {
            text-transform: uppercase !important;
            font-size: 14px;
        }

        .remove-padding {
            padding: 0px;
        }

        html[lang="vn"] .item .item-wrapper.listfight , html[lang="vn"] .livebots-text{
            display: -webkit-box;
            -webkit-line-clamp: 1; /* number of lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            width:65px
        }
    }
    @media screen and (max-width: 650px) {
        .navbarstk a,.livebots-text{
            font-size: 14px !important;
        }
        .item.active, .item:hover{
            border-radius: 25px;
        }

    }
    @media screen and (max-width: 550px) {
        .navbarstk a{
            font-size: 12px !important;
        }
    }
    @media screen and (max-width: 450px) {
        .navbarstk a ,.livebots-text{
            font-size: 13px !important;
        }
        .livebots-dot {
            width: 5px;
            height: 5px;
            left: -4px;
        }
        .livebots-text {
            position: relative;
            left: 4px;
        }
        .navbarstk {
            height: 55px;
        }
    }
    @media screen and (max-width: 350px) {
        .navbarstk a ,.livebots-text{
            font-size: 11px !important;
        }
    }

    a:hover .language-list__name span {
        color: #283046 !important;
    }

    .btn-check:focus+.btn,
    .btn:focus {
        outline: 0;
        box-shadow: unset;
    }

    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        border-color: transparent !important;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .app-redirect img {
        width: 100%;
        height: 100%;
        -o-object-fit: contain;
        object-fit: contain;
    }

    .app-redirect {
        font-size: .625rem;
        line-height: .875rem;
        font-weight: 700;
        margin-right: 0.75rem;
        display: flex;
        align-items: center;
        position: relative;
    }

    .app-redirect__icon {
        width: 2.375rem;
    }

    .app-redirect__icon-bounce_live_small {
        width: 2.4rem;
        position: absolute;
        top: -0.5rem;
        left: -2rem;
    }

    .home-nav__child-indicator {
        width: 80%;
        height: 0.2rem;
        /* background-color: #6f4b98; */
        border-radius: 1rem;
        margin-top: 0.3rem;
        text-align: center;
        margin: 0 auto;
        margin-top: 0.2rem;
        display: block !important;
    }

    .language-list__wrapper.selected {
        transform: scale(1);
    }

    .language-list__container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.3rem 0.5rem;
        cursor: pointer;
        transition: all .3s;
    }

    .language-list__name {
        display: flex;
        align-items: center;
        font-size: .88rem;
    }

    .language-list__name-icon {
        -o-object-fit: contain;
        object-fit: contain;
        margin-right: 0.7rem;
        width: 1.5rem;
        height: 1.5rem;
    }

    .language-list__name span {
        color: #fff;
    }

    .profile-wrapper {
        position: relative;
    }
    .language-wrapper {
        position: relative;
    }
    .language-list__wrapper {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 0.1rem;
        min-width: 12rem;
        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
        padding: 0.5rem 0.3rem;
        border-radius: 0.5rem;
        transform: scale(0);
        transform-origin: 11.5rem 0;
        transition: all .3s;
        z-index: 1000;
        overflow: hidden;
    }
    .langauge-selection img{
        border-radius: 1.5rem;
    }
</style>
<!-- ========end-Header============ -->
