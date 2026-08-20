@section('client-feeds', 'active')
@extends('client.layouts.app')
@section('content')
    <style>
        .wrapper {
            display: grid;
            grid-template-columns: 2fr 0.7fr;
            grid-gap: 30px;
        }

        .brd-5 {
            border-radius: 5px;
        }

        .news-2 {
            display: grid;
            grid-template-columns: 0.9fr 2fr;
            grid-gap: 10px;
        }

        .news-2-null {
            display: grid;
            grid-template-columns: 0.9fr 2fr;
            grid-gap: 10px;
        }

        .font-title {
            font-size: 18px;
        }

        .font-detail {
            font-size: 12px;
            font-style: italic;
        }

        .text-limit-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            overflow: hidden;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        .text-limit-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            overflow: hidden;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        .font-title {
            font-size: 21px;
        }

        .img-news {
            height: 9rem;
            border-radius: 5px;
        }

        .over-hide {
            overflow: hidden;
            border-radius: 5px;
        }

        /* .news-2:hover { */
        .news-2 {
            .font-title {
                color: #FFF !important;
            }

            .font-detail {
                color: #ffffff94 !important;
            }

            .font-date {
                color: #ffffff94 !important;
            }

            .about-text {
                /* background-color: #6f4b98; */
                border-radius: 5px;
                padding: 3px;
            }

            .img-news {
                transform: scale(1.05);
                transition: all .3s ease-out;
            }
        }

        .img-news {
            transition: all .3s ease-out;
        }

        .bg-null {
            background: grey;
            overflow: hidden;
        }

        .text-null {
            color: #EEE;
        }

        .title-null {
            height: 1.5rem;
            background: #EEE;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .detail-null {
            height: 1rem;
            background: #EEE;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .date-null {
            height: 0.8rem;
            background: #EEE;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
            width: 30%;
            position: absolute;
            bottom: 0;
            margin-bottom: 10px;
        }

        .d-clock-list {
            margin-top: 10px;
            background: #283046;
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            padding: 5px;
        }

        .d-clock-list:hover {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            padding: 5px;
        }

        .fb-plugin1 {
            display: none !important;
        }

        @media screen and (max-width: 1000px) {

            .fb-plugin {
                display: none !important;
            }

            .fb-plugin1 {
                display: block !important;
            }

            .wrapper {
                display: grid;
                grid-template-columns: 1fr !important;
            }

            .news-2 {
                display: grid;
                grid-template-columns: 1.2fr 2fr;
                grid-gap: 10px;
            }

            .news-2-null {
                display: grid;
                grid-template-columns: 1.2fr 2fr;
                grid-gap: 10px;
            }

            .font-title {
                font-size: 19px;
            }

            .font-detail {
                font-size: 16px;
                font-style: italic;
            }

            .font-date {
                font-size: 15px;
            }

            .img-news {
                height: 8rem;
            }
        }

        @media screen and (max-width: 900px) {
            .font-title {
                font-size: 18px;
            }

            .font-detail {
                font-size: 16px;
                font-style: italic;
            }

            .font-date {
                font-size: 14px;
            }

            .img-news {
                height: 8rem;
            }
        }

        @media screen and (max-width: 800px) {
            .font-title {
                font-size: 17px;
            }

            .font-detail {
                font-size: 15px;
                font-style: italic;
            }

            .font-date {
                font-size: 13px;
            }

            .img-news {
                height: 7rem;
            }

            .title-null {
                height: 1rem;
            }

            .detail-null {
                height: 0.8rem;
            }

            .date-null {
                height: 0.7rem;
            }
        }

        @media screen and (max-width: 700px) {
            .font-title {
                font-size: 16px;
            }

            .font-detail {
                font-size: 14px;
                font-style: italic;
            }

            .font-date {
                font-size: 12px;
            }

            .img-news {
                height: 6.5rem;
            }
        }

        @media screen and (max-width: 600px) {
            .font-title {
                font-size: 15px;
            }

            .font-detail {
                font-size: 13px;
                font-style: italic;
            }

            .font-date {
                font-size: 11px;
            }

            .img-news {
                height: 6rem;
            }

            .title-null {
                height: 0.8rem;
            }

            .detail-null {
                height: 0.6rem;
            }

            .date-null {
                height: 0.5rem;
            }
        }

        @media screen and (max-width: 500px) {
            .font-title {
                font-size: 14px;
            }

            .font-detail {
                font-size: 12px;
                font-style: italic;
            }

            .font-date {
                font-size: 10px;
            }

            .img-news {
                height: 5.5rem;
            }
        }

        @media screen and (max-width: 400px) {
            .font-title {
                font-size: 13px;
            }

            .font-detail {
                font-size: 11px;
                font-style: italic;
            }

            .font-date {
                font-size: 9px;
            }

            .img-news {
                height: 5rem;
            }

            .title-null {
                height: 0.7rem;
            }

            .detail-null {
                height: 0.5rem;
            }

            .date-null {
                height: 0.4rem;
            }
        }

        .card-post {
            padding: 0px;
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
        border-radius: 5px;
        margin-bottom: 15px
            }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px 0px 0px;
        }

        .post-author-info {
            display: flex;
            align-items: center;
        }

        .post-author-info img {
            width: 40px;
            height: 40px;
            border-radius: 1000px;
            margin-right: 8px;
        }

        .post-author-info .author-name {
            font-size: 15px;
            font-weight: 600;
            line-height: 20px;
            margin-right: 5.5px;
        }

        .post-author-info .details {
            font-size: 13px;
            font-weight: 400;
            line-height: 16px;
        }

        .post-body {
            font-weight: 400;
            font-size: 15px;
            line-height: 20px;

        }

        .post-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .post-image .excerpt {
            width: 100%;
            background: var(--comment-background);
            padding: 12px 10px;
            position: relative;
        }

        .post-image .excerpt label {
            font-size: 13px;
            font-weight: 400;
            line-height: 16px;
            line-height: 20px;
            text-transform: uppercase;
        }

        .post-image .excerpt h3 {
            color: var(--primary-text);
            font-size: 17px;
            font-weight: 600;
            line-height: 20px;
            /* margin: 5px 0; */
        }

        .post-image .excerpt span {
            line-height: 20px;
            font-weight: 400;
            font-size: 15px;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .post-info-icon-wrap {
            width: 28px;
            height: 28px;
            border-radius: 1000px;
            border: 1px solid var(--media-inner-border);
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--always-white);
            position: absolute;
            right: 14px;
            top: 0;
            transform: translateY(-50%);
        }

        .card-header {
            border-bottom: unset !important;
        }

        .post-reactions {
            display: flex;
            justify-content: space-between;
            padding-right: 16px;
            padding-left: 16px;
        }

        .post-reactions .reactions {
            display: flex;
            align-items: center;
        }

        .post-reactions .reactions .emojis {
            display: flex;
            flex-direction: row-reverse;
        }

        .post-reactions .reactions img {
            width: 22px;
            height: 22px;
            display: block;
            margin-left: -4px;
        }

        .post-reactions .reactions span {
            font-size: 15px;
            padding-left: 6px;
        }

        .post-reactions .comment-share {
            display: flex;
        }

        .post-reactions .comment-share span {
            font-size: 15px;
            font-weight: 400;
        }

        .post-reactions .comment-share .shares {
            margin-left: 7px;
        }

        .post-actions {
            display: flex;
            font-size: 15px;
            font-weight: 600;
            height: 10px;
        }

        .post-actions .actions {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
        }

        .post-actions .action {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 6px 2px;
            cursor: pointer;
        }

        .post-actions .action i,
        .post-actions .action span {
            padding: 6px 4px;
        }

        .post-actions .interact-as {
            display: flex;
            align-items: center;
        }

        .post-actions .interact-as img {
            width: 20px;
            height: 20px;
            border-radius: 1000px;
            margin-right: 2px;
        }
        .wrapper .card{
            border: transparent !important

        }

        .new-post-types {
            display: flex;
            justify-content: space-evenly;
            font-size: 15px;
            font-weight: 600;
            color: var(--secondary-text);
        }

        .new-post-types .post-type {
            padding: 8px;
            display: flex;
            align-items: center;
        }

        .new-post-types {
            cursor: pointer;
        }

        .new-post-types .post-type i {
            margin-right: 8px;
        }
    </style>
    <div class="container mt-75">
        <div class="wrapper">
            <div>
                <div class="bennertitle mt-2" style="padding: 11px;">
                    <i class="fas fa-list-alt"></i> @lang('home.list feeds')
                </div>
                @if (!Auth::guest())
                    <div class="card" style="background: transparent">
                        <div class="new-post-types">
                            <div class="post-type text-white">
                                <img style="padding-right: 5px"
                                    src="https://static.xx.fbcdn.net/rsrc.php/v3/yr/r/c0dWho49-X3.png?_nc_eui2=AeHNWPjRzX4K3dT0krmw4eAIVnUPE18ZZ-dWdQ8TXxln5wzVN-KGOKUH0xMTdxAS4FS-UTTpuP8qf8xs05fR7q6q"
                                    alt="">
                                Reload
                            </div>
                            <div class="post-type text-white" data-bs-toggle="modal" data-bs-target="#PostModal">
                                <img style="padding-right: 5px"
                                    src="https://static.xx.fbcdn.net/rsrc.php/v3/y7/r/Ivw7nhRtXyo.png?_nc_eui2=AeFJo6usHydhE_DqvZ5OEGcJPL4YoeGsw5I8vhih4azDkukD8oCP3eXZNicSQvusMT7Wp5-R50_0annwGcJmqrTI"
                                    alt="">
                                Photo/Video
                            </div>
                            <div class="post-type">
                                <a href="/profile" class="text-white">
                                    <img style="width: 40px"
                                        src="https://cdn4.iconfinder.com/data/icons/instagram-ui-twotone/48/Paul-18-512.png"
                                        alt="">
                                    Profile
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @include('layouts.alert')
                @foreach ($Article as $item)
                  <style>
                            .bg-26{
                                background: rgba(115, 103, 240, 0.1);
                                border-radius: 20px;
                                backdrop-filter: blur(15px);
                                border: 1px solid rgba(115, 103, 240, 0.3);
                                box-shadow: 0 8px 25px rgba(115, 103, 240, 0.15);
                            }
                        </style>
                        <div class="modal fade" id="imageModal{{$item->id}}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 1320px; margin: 0 auto;">
                                <div class="modal-content bg-26">
                                <div class="modal-body text-center">
                                    <img src="{{ $item->photo }}" onerror="this.onerror=null; this.src='/icon/null-image.gif'" alt="Preview" class="img-fluid rounded w-100">
                                </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-post">
                        <div class="card-header">
                            <a href="#">
                                <div class="post-author-info">
                                    <img src="{{ $item->photoauth }}"
                                        onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                                    <div>
                                        <div>
                                            <span class="author-name text-white">{{ $item->name ?? '' }} </span>
                                            <i class="verified-icon"></i>
                                        </div>
                                        <div class="details">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/feeds/{{ $item->id }}">
                                <p class="post-body mt-2 text-white">{{ $item->title }} </p>
                            </a>
                                <div class="post-image" data-bs-toggle="modal" data-bs-target="#imageModal{{$item->id}}">
                                    <img src="{{ $item->photo }}"
                                        onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                                </div>
                        </div>
                        <div class="post-reactions text-white">
                            <div class="reactions">
                                <div class="emojis">
                                    <i style="padding-right: 5px" class="far fa-clock"></i>
                                </div>
                                <span> <?php
                                $timezone = new DateTimeZone('Asia/Phnom_Penh');
                                $specificDate = new DateTime($item->date, $timezone);
                                $currentDate = new DateTime('now', $timezone);
                                
                                $diff = $currentDate->diff($specificDate);
                                $agoStatement = '';
                                
                                if ($diff->y > 0) {
                                    $agoStatement = $diff->y . ' years ago';
                                } elseif ($diff->m > 0) {
                                    $agoStatement = $diff->m . ' months ago';
                                } elseif ($diff->d > 0) {
                                    $agoStatement = $diff->d . ' days ago';
                                } elseif ($diff->h > 0) {
                                    $agoStatement = $diff->h . ' hours ago';
                                } elseif ($diff->i > 0) {
                                    $agoStatement = $diff->i . ' minutes ago';
                                } elseif ($diff->s > 0) {
                                    $agoStatement = $diff->s . ' seconds ago';
                                }
                                echo $agoStatement;
                                ?></span>
                            </div>
                            <div class="comment-share">
                                <div class="shares">
                                    <span> {{ $item->view }}</span>
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
                {{-- @foreach ($Article as $item) 
                    <div data-aos="zoom-in" data-aos-duration="800" class="d-clock-list">
                        <a href="/feeds/{{$item->id}}">
                            <div class="news-2">
                                <div class="over-hide">
                                    <img width="100%" class="img-news ng-lazyloaded" src="{{$item->photo}}" onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                                </div>
                                <div class="about-text">
                                    <div class="text-limit-1 font-title text-white">
                                        {{$item->title}} 
                                    </div>
                                    <div class="text-limit-3 font-detail text-muted"> 
                                        {{$item->detail}} 
                                    </div>
                
                                    <div class="d-flex justify-content-between">
                                        <div class="font-date text-muted ">
                                            <i class="far fa-clock"></i>
                                    
                                        </div>
                                        <div class="font-date text-muted fix-button">
                                            <i class="far fa-eye"></i>
                                            {{$item->view}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach --}}
            </div>
            <div class="telegram">
                <style>
                    #social-links span a i{
                        font-size: 45px;
                        transition: all .3s;
                        color: white;
                    }
                </style>
                <div id="social-links">
                    <span>
                        <a href="{{$facebook->name}}" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </span>
                    <span>
                        <a href="https://t.me/{{$telegram->name}}" target="_blank">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </span>
                    {{-- <ul>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://cf88.news/feeds/8"
                                class="social-button " id="" title="" rel=""><span
                                    class="fab fa-facebook-square"></span></a></li>
                        <li><a target="_blank"
                                href="https://telegram.me/share/url?url=https://cf88.news/feeds/8&amp;text=Nice"
                                class="social-button " id="" title="" rel=""><span
                                    class="fab fa-telegram"></span></a></li>
                        <li><a href="https://cf88.news/feeds/8" class="social-button copy-button"><span
                                    class="fas fa-link"></span></a></li>
                    </ul> --}}
                </div>
            </div>
            <div class="fb-plugin1">

                <div class="bennertitle mt-2 mb-2">

                    Go to our Telegram Group </div>
                <div class="tgme_page_action">
                    <style>
                        .bennertitle {
                            padding: 10px;
                            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
                            color: white;
                            top: 5px;
                            border-radius: 10px 10px 0 0;
                        }

                        .tgme_page_action {
                            text-align: center;
                            line-height: 0;
                        }

                        a.tgme_action_button_img {
                            font-size: 14px;
                            line-height: 17px;
                            font-weight: bold;
                            -webkit-font-smoothing: antialiased;
                            color: #FFF;
                            border-radius: 22px;
                            overflow: hidden;
                            display: inline-block;
                            text-transform: uppercase;
                        }

                        .bennertitle img {
                            width: 25px;
                            border-radius: 50%;
                            margin-right: 5px;
                            height: 25px;
                        }

                        .container-telelgram {
                            position: relative;
                            text-align: center;
                            color: white;
                        }

                        .centere-tele {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-30%, -50%);
                            font-size: 25px;
                            font-weight: bold;
                            -webkit-font-smoothing: antialiased;
                            color: #FFF;
                        }

                        @media screen and (max-width: 1200px) {
                            .centere-tele {
                                font-size: 20px;
                            }
                        }

                        .telegram {
                            display: none;

                        }

                        @media screen and (max-width: 1000px) {
                            .wrapper {
                                display: grid;
                                grid-template-columns: 1fr !important;
                            }

                            .fb-plugin1 {
                                display: none !important
                            }

                            .telegram {
                                display: unset;

                            }
                        }
                    </style>
                    <div class="container-telelgram ">
                        <a class="tgme_action_button_img" href="tg://resolve?domain=CocksFight88">
                            <img src="/icon/IMG_9933.png" alt="Snow" style="width:100%;">
                            <div class="centere-tele">CocksFight88</div>
                        </a>
                    </div>
                </div>
                <div class="bennertitle mt-2 mb-2">
                    Go to our Facebook page </div>
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/CocksFight88&amp;tabs=timeline&amp;small_header=true&amp;
                adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=739646733933031"
                    height="500" width="100%" scrolling="no" frameborder="0" allowfullscreen="" data-lazy="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" data-v-7c44f5d2=""
                    style="border: none; overflow: hidden;">
                </iframe>
            </div>
            @include('client.layouts.telegram')
        </div>

        <div class="mt-2 mb-2">
            @if ($Article->total() > 10)
                @if ($Article->currentPage() === 1)
                    <button class="btn text-white bg-color-brand" disabled>
                        @lang('home.previous')
                    </button>
                @else
                    <a href="/feeds?page={{ $Article->currentPage() - 1 }}">
                        <button class="btn text-white bg-color-brand">
                            @lang('home.previous')
                        </button>
                    </a>
                @endif
                @if ($Article->currentPage() === $Article->total())
                    <button class="btn text-white bg-color-brand ml-5" disabled>
                        @lang('home.next')
                    </button>
                @else
                    <a href="/feeds?page={{ $Article->currentPage() + 1 }}">
                        <button class="btn text-white bg-color-brand ml-5">
                            @lang('home.next')
                        </button>
                    </a>
                @endif
            @endif
        </div>
    </div>
    @if (!Auth::guest())
        <!-- ========start-Post============ -->
        <div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="PostModalLabel"
            aria-hidden="true">
        

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-color-brand">
                    <div class="modal-header grid-header">
                        <div></div>
                        <div style="text-align:center;" class="text-white">
                            @lang('home.create_post')
                        </div>
                        <div></div>
                        <button type="button" class="btn btn-secondary" hidden data-bs-dismiss="modal"
                            id="post-close">Close</button>
                    </div>

                    @if($status_post)
                        <form id="PostMedia" method="POST" action="{{ route('feeds.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <textarea class="form-control border-0 shadow-none" id="title" name="title" type="text" required
                                        style="background: transparent;color:white;resize: none;" autofocus
                                        placeholder="@lang('home.Whats_on_your_mind') {{ auth()->user()->name }}?" onInput="auto_height(this)"> </textarea>
                                </div>
                                <div class="con-modal">
                                    <div class="modal-img-modal"
                                        onclick="document.getElementById('logo-input').value=''; document.getElementById('logo-input').click();">
                                        <div class="centered">
                                            <center>
                                                <div class="i">
                                                    {{-- <i class="fas fa-photo-video text-white"></i> --}}
                                                    <img src="/icon/post.png" alt="" width="80px" height="80px">
                                                </div>
                                                <div class="mt-1 text-post text-white"> @lang('home.add/photo/video')</div>
                                                <small class="text-white">or drang and drop </small>
                                            </center>
                                        </div>
                                    </div>
                                    <div id="imagePreview" style="display: none">
                                        <img id="img-upload"
                                            onclick="document.getElementById('logo-input').value=''; document.getElementById('logo-input').click();"
                                            src="" title="Upload Profile" class="img-fluid"
                                            style="cursor: pointer;width:100%">
                                    </div>
                                    <input type="file" id="logo-input" name="photo" accept="image/*" hidden src="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-line text-white btn-next button" type="submit" style="width:100%">
                                    @lang('home.post') </button>
                            </div>
                        </form>
                    @else
                        <center class="px-4 py-4">
                            <small class="text-danger">Please contact the admin to request an upgrade to premium.</small>
                        </center>
                    @endif

                </div>
            </div>
        </div>
        <!-- ========end-Post============ -->
    @endif
    <script src="/plugins/aos.js"></script>
    <script>
        // var currentDate = new Date();
        // var day = ("0" + currentDate.getDate()).slice(-2);
        // var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
        // var year = currentDate.getFullYear();
        // var hours = ("0" + currentDate.getHours()).slice(-2);
        // var minutes = ("0" + currentDate.getMinutes()).slice(-2);
        // var seconds = ("0" + currentDate.getSeconds()).slice(-2);
        // username = 'newsfeed';
        // password = 'Chan@80331';
        // var token = btoa(username + ':' + password);
        // var formattedDateTime = day + '-' + month + '-' + year + ' ' + hours + ':' + minutes + ':' + seconds;

        // $("#PostMedia").submit(function(e) {
        //     e.preventDefault();
        //     var fileInput = $('#logo-input')[0];
        //     if (fileInput.files.length === 0) {
        //         alert('Please select a file to upload.');
        //         return;
        //     }
        //     var file = fileInput.files[0];
        //     var formData = new FormData();
        //     formData.append('file', file);
        //     $('#btnPostModal').addClass('disabled');
            // $.ajax({
            //     url: 'https://server.2m-sport.com/wp-json/user/v1/media_upload',
            //     method: 'POST',
            //     beforeSend: function(xhr) {
            //         xhr.setRequestHeader('Authorization', 'Basic ' + token);
            //     },
            //     data: new FormData(this),
            //     processData: false,
            //     contentType: false,
            //     success: function(response_media) {
            //         if (response_media.success) {
            //             var formData = {
            //                 id: $('#userid').val(),
            //                 title: $('#title').val(),
            //                 date: formattedDateTime,
            //                 photo: response_media.data.sizes.full.url,
            //                 post_id: response_media.data.id,
            //             };
            //             $.ajax({
            //                 type: 'POST',
            //                 url: '/api/post',
            //                 data: formData,
            //                 dataType: 'json',
            //                 success: function(response) {
            //                     location.reload();
            //                 },
            //                 error: function(xhr, status, error) {
            //                     console.error(xhr.responseText);
            //                 }
            //             });
            //         } else {
            //             alert('Media upload failed');
            //         }
            //     },
            //     error: function(response_media) {
            //         console.log('Media upload failed:', response);
            //         alert('Media upload failed:', response);
            //     }
            // });
        // });

        function auto_height(elem) {
            /* javascript */
            elem.style.height = '1px';
            elem.style.height = `${elem.scrollHeight}px`;
        }
        $("#PostModal").on("show.bs.modal", function(event) {
            $("#title").text('').focus();
        })
        $('#logo-input').change(function() {
            previewImage(this);
            $("#imagePreview").show()
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').html('<img src="' + e.target.result +
                        '" onclick="document.getElementById(\'logo-input\').value=\'\'; document.getElementById(\'logo-input\').click();" title="Upload Profile" class="img-fluid" style="cursor: pointer;width:100%">'
                        );
                };
                reader.readAsDataURL(input.files[0]);
                $(".modal-img-modal").hide()
            }
        }
        // $('.data-id').on('click', function() {
        //     var postID = $(this).attr('data-id');
        //     $.ajax({
        //         url: 'https://server.2m-sport.com/wp-json/user/v1/post_delete/' + postID,
        //         method: 'DELETE',
        //         beforeSend: function(xhr) {
        //             xhr.setRequestHeader('Authorization', 'Basic ' + token);
        //         },
        //         success: function(response) {
        //             console.log(response);
        //         },
        //         error: function(response) {
        //             console.log("Error deleting media item:", response);
        //         }
        //     });
        // });
        AOS.init({
            duration: 1200,
        })
    </script>
@endsection
