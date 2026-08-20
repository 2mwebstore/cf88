@section('client-dashboard', 'active')
@extends('client.layouts.app')
@section('content')
    <style>
    

        .text-next-page:hover a {
            color: #7367f0 !important;
        }

        .grid-d-4 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-gap: 20px;
        }

        @media screen and (max-width: 1000px) {
            .mb-hide {
                display: none
            }

            .grid-d-4 {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 15px;
            }
        }

        @media screen and (max-width: 767px) {
            .item-img {
                height: 7rem !important
            }

            /* .btn {
                font-size: 0.7rem !important;
            } */
        }

        @media screen and (max-width: 555px) {
            .grid-d-4 {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 5px;
            }

            .post-header h3.post-title {
                line-height: 11px !important;
                margin-top: 0px !important;
                margin-bottom: 5px !important
            }

            .post-header .post-title a {
                font-size: 11px !important;
                font-weight: unset !important;
            }

            .post-header .post-meta,
            .post-header .post-meta a,
            .post-meta a {
                color: #aaa;
                font-size: 8px !important;
            }

            .post-header .post-meta i {
                font-size: 8px;
                color: #c5c5c5;
                margin-right: 3px;
            }
        }

        @media screen and (max-width: 400px) {
            .item-img {
                height: 5rem !important
            }

            .widget .post-title {
                max-height: 3.2rem !important;
            }

            .post-header .post-title a {
                font-size: 10px !important;
            }

            .post-header h3.post-title {
                line-height: 11px !important;
                margin-top: -5px !important;
                margin-bottom: -5px !important;
            }

            .widget .post-title {
                max-height: 2rem !important;
            }

            .post-header .post-meta,
            .post-header .post-meta a,
            .post-meta a {
                font-size: 7px !important;
            }

            .post-header .post-meta i {
                font-size: 7px !important;
            }

            .btn-category .btn-next {
                font-size: 0.5rem !important;
            }
        }

        .hentry {
            position: relative;
        }

        .item-img {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 10rem
        }

        .item-img::before {
            padding-top: 56.25%;
            display: block;
            content: ""
        }

        .item-img img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            border: 0
        }

        .video-section .item img,
        .widget .item img {
            height: 100%;
            width: 100%;
        }

        .widget .post-header {
            margin-top: 5px;
        }

        .post-header h3.post-title {
            line-height: 15px;
            margin-top: 10px;
        }

        .widget .post-title {
            display: -webkit-box;
            max-height: 3.2rem;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            -webkit-line-clamp: 2 !important;
            line-height: 1.6rem;
        }

        .post-header .post-title a {
            color: #f3f2fd;
            font-size: 14px;
            font-weight: 700;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            -webkit-line-clamp: 2;
        }

        .post-header .post-meta,
        .post-header .post-meta a,
        .post-meta a {
            color: #aaa;
            font-size: 12px;
        }

        .post-header .post-meta i {
            font-size: 14px;
            color: #c5c5c5;
            margin-right: 3px;
        }

        article {
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            padding: 5px;
            border-radius: 7px;
        }

        article:hover {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
        }

        .img-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000 url(images/play-icon.png) no-repeat center center;
            opacity: 0;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateZ(0) scale(1, 1)
        }

        .img-hover.big {
            background: #000 url(images/play-icon-big.png) no-repeat center center
        }

        .item-img:hover>a .img-hover,
        .img-hover.active {
            opacity: .75;
            z-index: 2
        }

        .post-title {
            -ms-word-wrap: break-word;
            word-wrap: break-word
        }
        .mr-1{
            margin-right: 10px;
        }
        .btn-next-category {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));

            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
        }
        .btn-next-category:hover , .active-btn-category {
                            background: linear-gradient(118deg, #283046, rgb(3 3 5));
                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
                            font-weight: 400;
                            border-radius: 4px;
                        }
    </style>
    <div class="container mt-75">
        @include('sweetalert::alert')
        <img src="/upload/{{ $Banner->photo ?? 'null.jpg' }}" alt="" width="100%">

        <video id="my_video_1" class="video-js vjs-default-skin vjs-16-9" muted controls width="100%" height="350">
            <source  src="{{$ChannelsPlay->video ?? ''}}" type="video/mp4">
        </video>
        <script>
            var player = videojs('my_video_1');
        </script>

<div class="d-flex pt-2 pb-2">
    <div class="d-flex " style="max-width: 100%; overflow-x: auto; white-space: nowrap;">
        @foreach ($ChannelByCategory as $key => $row)
            <a href="/channels/category/{{$row->category_id}}" class="text-white mr-1 btn-category" href="/news"> 
                <div class="btn-line btn text-white btn-next-category">
                    <i class="fas fa-tv"></i> {{$row->category_name}}
                </div>
            </a>
        @endforeach
    </div>
</div>
        @if($Channel != '[]')
        <div class="d-flex pt-2 pb-2">
            <a href="/channels" class="text-white " href="/channels"> 
                <div class="btn text-white ">
                    <i class="fas fa-list-alt"></i> @lang('home.channels')
                </div>
            </a>
        </div>
        @endif
        <div class="grid-highligh">
            @foreach ($Channel as $key => $row)
                <div class="box-highligh ">
                    <a class="home-hover " href="/channels/{{ $row->id }}">
                        <div class="position-relative">
                        <img class="w-full new-height radis-5px  ng-lazyloaded" src="{{ $row->photo }}"
                            onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                            <style>
                                .format-icon {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    color: #fff;
                                    font-size: 35px;
                                    transition: .43s 
                                cubic-bezier(.47, .13, .16, .72) 0s;
                                }
                            </style>

                            <span class="format-icon format-video">
                                <i class="far fa-play-circle"></i>
                            </span>

                        </div>
                        <div class=" get_name">{{ $row->title }}</div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="post-meta">
                                <i class="far fa-clock"></i>
                                {{-- @php
                                    $specificDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$row->date, 'Asia/Phnom_Penh');
                                    $currentDateTime = \Carbon\Carbon::now('Asia/Phnom_Penh');
                                    $timeUntil = $currentDateTime->diffForHumans($specificDateTime);
                                @endphp --}}
                                {{-- {{ $timeUntil }} --}}
                                {{-- {{ $timeAgo }} --}}
                                {{ \Carbon\Carbon::parse($row->date)->diffForHumans() }}
                                {{-- {{ \Carbon\Carbon::parse($row->date)->diffForHumans(\Carbon\Carbon::now('Asia/Phnom_Penh')) }} --}}


                            </span>
                        </div>
                            <div>
                                <span class="post-meta">
                                    <i class="far fa-eye"></i>
                                    {{$row->view}}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @if($Article != '[]')
            <div class="d-flex pt-2 pb-2">
                <a href="/news" class="text-white " href="/news"> 
                    <div class="btn text-white ">
                        <i class="fas fa-list-alt"></i> @lang('home.news')
                    </div>
                </a>
            </div>
        @endif
        <div class=" mt-1 widget ">

            <div class="grid-highligh">
                @foreach ($Article as $key => $row)
                    <div class="box-highligh">
                        <a class="home-hover" href="/news/{{ $row->id }}">
                            <img class="w-full new-height radis-5px  ng-lazyloaded" src="{{ $row->photo }}"
                                onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                            <div class=" get_name">{{ $row->title }}</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="post-meta">
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($row->date)->diffForHumans() }}
                                </span>
                            </div>
                                <div>
                                    <span class="post-meta">
                                        <i class="far fa-eye"></i>
                                        {{$row->view}}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- @if($Highlight != '[]')
                <div class="d-flex justify-content-between pt-3 pb-2">
                    <a href="/highlights" class="text-white " href="/highlights">
                        <div class="btn text-white">
                            <i class="fas fa-video"></i> @lang('home.highlights')
                        </div>
                    </a>
                </div>
            @endif
            <div class="grid-highligh mt-2">
                @foreach ($Highlight as $row)
                    <div class="box-highligh" style="position: relative;">
                        <a class="home-hover" href="/highlights/{{ $row->id }}">
                            <div class="img-hover"></div>
                            <img class="w-full new-height radis-5px  ng-lazyloaded" src="{{ $row->photo }}"
                                onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                            <div class=" get_name">{{ $row->title }}</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="post-meta">
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($row->date)->diffForHumans() }}

                                    
                                </span>
                            </div>
                                <div>
                                    <span class="post-meta">
                                        <i class="far fa-eye"></i>
                                        {{$row->view}}
                                    </span>
                                </div>
                            </div>
                            
                        </a>
                    </div>
                @endforeach
            </div> --}}
        </div>

        <style>
            .grid-highligh {
                cursor: grab;
                cursor: -webkit-grab;
                overflow-x: auto;
                white-space: nowrap;
                overflow-y: scroll;
                margin-bottom: -5px;
            }

            .box-highligh {
                box-shadow: none;
                display: inline-block;
                float: none;
                white-space: normal;
                width: 301px;
                vertical-align: top;
                box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
                margin: 10px;
                padding: 5px;
                border-radius: 3px;
                overflow: hidden;
            }

            @media screen and (max-width: 1400px) {
                .box-highligh {
                    width: 256px;
                }
            }

            @media screen and (max-width: 1200px) {
                .box-highligh {
                    width: 211px;
                }
            }

            @media screen and (max-width: 990px) {
                .box-highligh {
                    width: 209px;
                }
            }

            @media screen and (max-width: 767px) {
                .box-highligh {
                    width: 153px;
                }

                .new-height {
                    height: 90px !important;
                    width: 100% !important;
                }

                .get_name {
                    font-size: 12px
                }
            }

            @media screen and (max-width: 676px) {
                .box-highligh {
                    width: 151px;
                }
            }

            @media screen and (max-width: 565px) {
                .box-highligh {
                    width: 127px;
                    box-shadow: 0 0 5px 1px rgba(115, 103, 240, 0.7);
                    margin: 3px !important;
                }

                .new-height {
                    height: 60px !important;
                    width: 100% !important;
                }

                .get_name {
                    font-size: 8px;
                }
            }

            @media screen and (max-width: 375px) {
                .box-highligh {
                    width: 127px;
                    box-shadow: 0 0 5px 1px rgba(115, 103, 240, 0.7);
                    margin: 3px !important;
                }

                .new-height {
                    height: 60px !important;
                    width: 100% !important;
                }

                .get_name {
                    font-size: 8px;
                }
            }

            .box-highligh:hover {
                background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            }

            .box-highligh:hover .post-meta {
                color: #aaa !important;
            }

            .post-meta {
                text-align: left;
                font-size: 10px;
                color: #aaa !important;
            }

            .new-height {
                height: 150px;
                width: 100%
            }

            .get_name {
                white-space: nowrap;
                text-overflow: ellipsis;
                max-width: 286px;
                overflow: hidden;
                color: white
            }

            .box-highligh:hover>a .img-hover{
                opacity: .75;
                z-index: 2;
            }
        </style>
    @endsection
