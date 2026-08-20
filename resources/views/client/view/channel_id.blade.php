@section('client-channels', 'active')

@extends('client.layouts.app')

@section('content')

<style>

    .wrapper {

        display: grid;

        grid-template-columns: 2fr 0.7fr ;

        grid-gap: 30px;

    }

  

    .brd-5 {

        border-radius: 5px;

    }

    .news-2 {

    display: grid;

    grid-template-columns: 0.9fr 2fr ;

    grid-gap: 10px;

    }

    .news-2-null {

    display: grid;

    grid-template-columns: 0.9fr 2fr ;

    grid-gap: 10px;

    }

    .font-title{

    font-size: 18px;

    }

    .font-detail{

    font-size: 14px;

    font-style: italic;

    }

    .text-limit-1{

    display: -webkit-box;

    -webkit-line-clamp: 1;

    overflow: hidden;

    -webkit-box-orient: vertical;

    text-overflow: ellipsis;

    }

    .text-limit-3{

    display: -webkit-box;

    -webkit-line-clamp: 3;

    overflow: hidden;

    -webkit-box-orient: vertical;

    text-overflow: ellipsis;

    }



    .font-title{

    font-size: 21px;

    }

    .font-date{

    font-size: 17px;

    }

    .img-news{

    height: 9rem;

    border-radius: 5px;

    }

    .over-hide{

    overflow: hidden;

    border-radius: 5px;

    }



    .news-2:hover{

    .font-title{

        color: #FFF !important;

    }

    .font-detail{

        color: #ffffff94 !important;

    }

    .font-date{

        color: #ffffff94 !important;

    }

    .about-text{

        /* background-color: #6f4b98; */

        border-radius: 5px;

    }

    .img-news {

        transform: scale(1.05);

        transition: all .3s ease-out;

    }



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

    .img-news {

        transform: scale(1.05);

        transition: all .3s ease-out;

    }

    .bg-null{

        background: grey;

        overflow: hidden;

    }

    .text-null{

    color: #EEE;

    }

    .title-null{

    height: 1.5rem;

    background: #EEE;

    margin-left: 10px;

    margin-right: 10px;

    border-radius: 10px;

    }

    .detail-null{

    height: 1rem;

    background: #EEE;

    margin-left: 10px;

    margin-right: 10px;

    border-radius: 10px;

    }

    .date-null{

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

    .format-icon{

    position: absolute;

    top: 50%;

    left: 50%;

    transform: translate(-50%, -50%);

    color: #fff;

    font-size: 35px;

    transition: .43s cubic-bezier(.47,.13,.16,.72) 0s;

    }

    .relative{

    position: relative;

    }

    .format-icon.format-video{

    padding-left: 2px;

    }

    @media screen and (max-width: 1000px) {

    .fb-plugin{

        display: none !important;

    }

    .format-icon{

            font-size: 25px !important;

    }

    .wrapper {

        display: grid;

        grid-template-columns: 1fr !important;

    }

    .news-2 {

        display: grid;

        grid-template-columns: 1.2fr 2fr ;

        grid-gap: 10px;

    }

    .news-2-null {

        display: grid;

        grid-template-columns: 1.2fr 2fr ;

        grid-gap: 10px;

    }

    .font-title{

        font-size: 19px;

    }

    .font-detail{

        font-size: 16px;

        font-style: italic;

    }

    .font-date{

        font-size: 15px;

    }

    .img-news{

        height: 8rem;

    }

    }

    @media screen and (max-width: 900px) {

    .font-title{

        font-size: 18px;

    }

    .font-date{

        font-size: 14px;

    }

    .img-news{

        height: 8rem;

    }

    }

    @media screen and (max-width: 800px) {

    .font-title{

        font-size: 17px;

    }

    .font-detail{

        font-size: 13px;

        font-style: italic;

    }

    .font-date{

        font-size: 11px;

    }

    .img-news{

        height: 7rem;

    }

    .title-null{

        height: 1rem;

    }

    .detail-null{

        height: 0.8rem;

    }

    .date-null{

        height: 0.7rem;

    }

    }

    @media screen and (max-width: 700px) {

        .format-icon{

            font-size: 20px !important;

        }



    .font-date{

        font-size: 12px;

    }

    .img-news{

        height: 6.5rem;

    }

    }

    @media screen and (max-width: 600px) {

    .font-title{

        font-size: 15px;

    }

    .img-news{

        height: 6rem;

    }

    .title-null{

        height: 0.8rem;

    }

    .detail-null{

        height: 0.6rem;

    }

    .date-null{

        height: 0.5rem;

    }

    }

    @media screen and (max-width: 500px) {

    .font-title{

        font-size: 11px;

    }

    .font-detail{

        font-size: 9px;

        font-style: italic;

    }

    .font-date{

        font-size: 10px;

    }

    .img-news{

        height: 5.5rem;

    }

    }

    @media screen and (max-width: 400px) {

    .font-date{

        font-size: 9px;

    }

    .img-news{

        height: 5rem;

    }

    .title-null{

        height: 0.7rem;

    }

    .detail-null{

        height: 0.5rem;

    }

    .date-null{

        height: 0.4rem;

    }

    }



</style>



    <div class="container mt-75">

        <div class="wrapper">

            <div style="overflow: hidden">

                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">

                    <i class="fas fa-list-alt"></i>

                    @lang('home.list channels')

                </div>

                <div class="param-show " > 

                <div class="text-white date-title aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">{{$ChannelsPlay->title ?? ''}}</div>



                    <video id="my_video_1" class="video-js vjs-default-skin vjs-16-9" muted preload="auto" controls width="100%" height="350">

                        <source src="{{$ChannelsPlay->video ?? '/icon/null-image.gif'}}" type="video/mp4">

                    </video>

                    <style>

                        .grid-highligh{

                            white-space: nowrap;

                            overflow-y: scroll;

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



                        /* .post-meta {

                            text-align: left;

                            font-size: 10px;

                            color: #aaa !important;

                        } */



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

                        .mr-1 {

                            margin-right: 10px;

                        }

                        #social-links ul {

                            padding-left: 0;

                            width: 100%;

                            height: auto;

                            text-align: left;

                            display: block;

                        }

                        #social-links ul li {

                            display: inline-block;

                            padding-right: 15px

                        }

                        #social-links ul li a {

                            font-size: 45px;

                            transition: all .3s;

                            color: white

                        }

                        #social-links ul li a:hover {

                            cursor: pointer;

                            color: #7367f0 !important

                        }
                        .btn-next-category {
                            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
                            font-weight: 400;
                            border-radius: 4px;
                        }
                        .btn-next-category:hover , .active-btn-category {
                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
                            background: linear-gradient(118deg, #283046, rgb(3 3 5));
                            font-weight: 400;
                            border-radius: 4px;
                        }
                        .post-meta {
                    text-align: left;
                    font-size: 10px;
                    color: #aaa !important;
                }
                   </style>

                   <div class="color-brand date-size aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">

                        

                    <div class="d-flex justify-content-between">

                       <div>

                           <span class="post-meta text-white">

                           <i class="far fa-clock text-white"></i>

                           <?php

                           $timezone = new DateTimeZone('Asia/Phnom_Penh');

                           $specificDate = new DateTime($ChannelsPlay->date ?? '', $timezone);

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

                           

                           ?>              </span></div>

                       <div>

                           <span class="post-meta text-white">

                               <i class="far fa-eye text-white"></i>

                               {{$ChannelsPlay->view ?? ''}}

                           </span>

                       </div>

                   </div>

                </div>

                {!! $FacebookTelegram !!}

                <div class="d-flex pt-2 pb-2 " style="margin-left: 5px;margin-top: -30px;">

                    <div class="d-flex " style="max-width: 100%; overflow-x: auto; white-space: nowrap;">

                        @foreach ($ChannelByCategory as $key => $row)

                            <a href="/channels/category/{{$row->category_id}}" class="text-white mr-1" href="/news"> 

                                <div class="btn-line btn text-white btn-next-category {{ $id != $row->category_id ? '' : 'active-btn-category' }}">

                                    <i class="fas fa-tv"></i> {{$row->category_name}}

                                </div>

                            </a>

                        @endforeach

                    </div>

                </div>

                   <div class="color-brand date-detail text-white mt-1 mb-1 aos-init aos-animate " data-aos="zoom-in">

                    {{$ChannelsPlay->detail ?? ''}}

                   </div>



                    <div class="grid-highligh mt-2">

                        @foreach ($ListChannel  as $key => $row)

                        <span class="box-highligh" style="position: relative;">

                            <a class="home-hover" href="/channels/{{ $row->id }}">

                                <div class="img-hover"></div>

                                <img class="w-full new-height radis-5px  ng-lazyloaded" src="{{ $row->photo }}"

                                    onerror="this.onerror=null; this.src='/icon/null-image.gif'">

                                    <span class="format-icon format-video">

                                        <i class="far fa-play-circle"></i>

                                    </span>

                                <div class=" get_name">{{ $row->title }}</div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="post-meta">
                                        <i class="far fa-clock"></i>
                                        <?php
                                        $timezone = new DateTimeZone('Asia/Phnom_Penh');
                                        $specificDate = new DateTime($row->date, $timezone);
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

                        </span>

                        @endforeach

                    </div>

                </div>

                <script>

                    var player = videojs('my_video_1', {

                        playbackRates: [0.5, 1, 1.5, 2],

                    });

                </script>

            </div>

            @include('client.layouts.telegram')

        </div>

    </div>

    <script src="/plugins/aos.js"></script>

    <script>
    var url = window.location.href;;
    var className = "copy-button";
    var listItem = `<li><a href="${url}" class="social-button ${className}"><span class="fas fa-link"></span></a></li>`;
    $('#social-links ul').append(listItem);
    $(document).on('click', '.copy-button', function(event) {
        event.preventDefault();
        var urlToCopy = $(this).attr('href');
        navigator.clipboard.writeText(urlToCopy).then(function() {
            alert('URL copied to clipboard: ' + urlToCopy);
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    });
        AOS.init({

            duration: 1200,

        })

    </script>

@endsection

