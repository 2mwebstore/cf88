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
        .d-clock-list{
            margin-top: 10px;
            background: #283046;
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            padding: 5px;
        }
        .d-clock-list:hover{
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            padding: 5px;
        }
        @media screen and (max-width: 1000px) {
            .fb-plugin {
                display: none !important;
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
    </style>
    <div class="container">
        <div class="wrapper">
            <div>
                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                    <i class="fas fa-list-alt"></i> @lang('home.list feeds')
                </div>
                @foreach ($Article as $item) 
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
                                            <?php
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
                                            
                                            ?>
                                            
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
                @endforeach

            </div>
            @include('client.layouts.telegram')
        </div>
        <div class="mt-2 mb-2">
            @if ($Article->total() > 10) 
                @if ($Article->currentPage() === 1) 
                    <button class="btn text-white bg-color-brand" disabled >
                        @lang('home.previous')
                    </button>
                @else 
                    <a href="/newsfeed?page={{$Article->currentPage()-1}}">
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
                    <a href="/newsfeed?page={{$Article->currentPage()+1}}">
                        <button class="btn text-white bg-color-brand ml-5">
                            @lang('home.next')
                        </button>
                    </a>
                @endif
            @endif
        </div>
    </div>
    <script src="/plugins/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
        })
    </script>
@endsection
