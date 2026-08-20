@section('client-livestreams', 'active')
@extends('client.layouts.app')
@section('content')
<style>
    .wrapper {
        display: grid;
        grid-template-columns: 2fr 0.7fr;
        grid-gap: 30px;
    }
    .btn-next {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
        }
    @font-face {
			font-family: "en";
			src: url(/fonts/en.ttf);
		}
		html[lang='en'] body{
			font-family: 'en';
		}
    @font-face {
			font-family: "nida";
			src: url(/fonts/nida.ttf);
		}
		html[lang='kh'] body{
			font-family: 'nida';
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

    .brd-5 {
        border-radius: 5px;
    }
    .text-title{
        font-size: 25px;
    }

    .image-container {
        position: relative;
    }
    .text-overlay-start {
        position: absolute;
        color: black;
        background-color: #fcd44c;
        top: 25%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 5px;
        border-radius: 10px;
        font-size: 35px;
    }
    .text-overlay-start-date {
        position: absolute;
        color: black;
        background-color: #fcd44c;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 5px;
        border-radius: 10px;
        font-size: 25px;
    }
    .text-overlay {
        position: absolute;
        color: black;
        background-color: #fcd44c;
        top: 66%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 5px;
        border-radius: 10px;
        font-size: 15px;
    }
    @media screen and (max-width: 1400px) {
    .time-segment {
        font-size: 45px !important;
    }

    }
    @media screen and (max-width: 1200px) {
    .time-segment {
        font-size: 25px !important;
    }
    }
    @media screen and (max-width: 1000px) {

        .text-overlay-start {
            font-size: 20px;
        }
        .text-overlay-start-date {
            font-size: 18px;
        }
        .text-overlay {
            font-size: 16px;
        }
        .fb-plugin {
            display: none !important;
        }
        .wrapper {
            display: grid;
            grid-template-columns: 1fr !important;
        }
        .text-title{
            font-size: 20px !important;
        }
    }
    @media screen and (max-width: 900px) {
        .text-title{
            font-size: 19px !important;
        }
    }
    @media screen and (max-width: 800px) {
        .text-title{
            font-size: 18px !important;
        }
        .segment-display__top{
        padding: 5px !important;
    }
    }
    @media screen and (max-width: 700px) {
        .text-title{
            font-size: 17px !important;
        }
        .segment-display__top{
        padding: 5px !important;
    }
    }
    @media screen and (max-width: 600px) {
        .text-title{
            font-size: 16px !important;
        }
        .grid-3-live .rm-bg{
            font-size: 15px !important;
        }
    }
    @media screen and (max-width: 500px) {
        .time-segment{
            font-size: 15px!important;
        }
        .grid-3-live .rm-bg{
            font-size: 10px !important;
        }
        .text-title{
            font-size: 15px !important;
        }
        .text-overlay-start{
            font-size: 16px;
        }
        .text-overlay-start-date{
            font-size: 12px;
        }
        .text-overlay{
            font-size: 12px;
        }
    }
    @media screen and (max-width: 400px) {
        .text-title{
            font-size: 14px !important;
        }
        .text-overlay-start{
            font-size: 15px;
        }
        .text-overlay-start-date{
            font-size: 11px;
        }
        .text-overlay{
            font-size: 10px;
        }
    }
        
    .grid-3-live {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 0px 20px;
        position: absolute;
        top: 70%;
        left: 50%;
        gap: 5px 20px;
        transform: translate(-50%, -50%);
        padding: 5px;

    }
    .grid-2-live {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 2px;
    }

    .grid-3-live div{
        text-align: center;
    }
    .grid-3-live div #date-time{
        padding: 5px;
        font-size: 30px;
        text-align: center;
        margin: 2px;
    }
    .grid-3-live .rm-bg{
        padding-top: 10px;
        background: transparent !important;
        color: white;
        font-size: 25px;
    }

    .time-segment {
        font-weight: 900;
        font-size: 50px;
        width: 100%;
    }

    .segment-display {
    position: relative;
    height: 100%;
    }

    .segment-display__top,
    .segment-display__bottom {
    overflow: hidden;
    text-align: center;
    width: 100%;
    height: 50%;
    position: relative;
    }

    .segment-display__top {
    line-height: 1.5;
    color: black;
    background-color: #fcd44c;
    padding: 15px;
    border-radius: 5px 5px 0px 0px;
    }

    .segment-display__bottom {
    line-height: 0;
    color: black;
    background-color: #cc9e00;
    border-radius: 0px 0px 5px 5px;
    }

    .segment-overlay {
    position: absolute;
    top: 0;
    height: 100%;
    }

    .segment-overlay__top,
    .segment-overlay__bottom {
    position: absolute;
    overflow: hidden;
    text-align: center;
    width: 100%;
    height: 50%;
    }

    .segment-overlay__top {
    top: 0;
    line-height: 1.5;
    color: #fff;
    background-color: #111;
    transform-origin: bottom;
    }

    .segment-overlay__bottom {
    bottom: 0;
    line-height: 0;
    color: #eee;
    background-color: #333;
    border-top: 2px solid black;
    transform-origin: top;
    }

    .segment-overlay.flip .segment-overlay__top {
    animation: flip-top 0.8s linear;
    }

    .segment-overlay.flip .segment-overlay__bottom {
    animation: flip-bottom 0.8s linear;
    }

    @keyframes flip-top {
    0% {
        transform: rotateX(0deg);
    }
    50%,
    100% {
        transform: rotateX(-90deg);
    }
    }

    @keyframes flip-bottom {
    0%,
    50% {
        transform: rotateX(90deg);
    }
    100% {
        transform: rotateX(0deg);
    }
    }

    .time-segment {
    display: block;
    }
</style>
    <div class="container mt-75">
        <div class="wrapper">
            <div>
                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                    <div class="d-flex justify-content-between">
                        <div><i class="fas fa-video"></i> @lang('home.livestream')</div>
                        <div><a href="/livestreams" class="text-white"> @lang('home.back')</a></div>
                    </div>
                </div>
                    @foreach ($Livestream as $row) 
                        @if ($row->live_id) 
                            <iframe src="https://player.castr.com/{{$row->live_id}}" width="100%" style="aspect-ratio: 16/9; min-height: 340px;"
                                frameborder="0" scrolling="no" allow="autoplay" allowfullscreen webkitallowfullscreen
                                mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
                        @else 
                        <div class="image-container">
                            <img src="/upload/{{$row->photo}}" width="100%" onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                            <div class="text-overlay-start">
                               the match will start at
                            </div>
                            <div class="text-overlay-start-date">
                                today time
                            </div>
                            <div class="grid-3-live ">
                                <div>
                                    <div class="time-group grid-2-live">
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="frist-days">0</span></div>
                                            <div class="segment-display__bottom"><span class="frist-days">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="frist-days">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="frist-days">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="last-days">0</span></div>
                                            <div class="segment-display__bottom"><span class="last-days">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="last-days">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="last-days">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="time-group grid-2-live">
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="frist-hours">0</span></div>
                                            <div class="segment-display__bottom"><span class="frist-hours">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="frist-hours">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="frist-hours">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="last-hours">0</span></div>
                                            <div class="segment-display__bottom"><span class="last-hours">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="last-hours">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="last-hours">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="time-group grid-2-live">
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="frist-minutes">0</span></div>
                                            <div class="segment-display__bottom"><span class="frist-minutes">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="frist-minutes">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="frist-minutes">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="last-minutes">0</span></div>
                                            <div class="segment-display__bottom"><span class="last-minutes">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="last-minutes">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="last-minutes">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="time-group grid-2-live">
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="frist-seconds">0</span></div>
                                            <div class="segment-display__bottom"><span class="frist-seconds">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="frist-seconds">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="frist-seconds">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="time-segment">
                                          <div class="segment-display">
                                            <div class="segment-display__top"><span class="last-seconds">0</span></div>
                                            <div class="segment-display__bottom"><span class="last-seconds">0</span></div>
                                            <div class="segment-overlay flip">
                                              <div class="segment-overlay__top"><span class="last-seconds">0</span></div>
                                              <div class="segment-overlay__bottom"><span class="last-seconds">0</span></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rm-bg"> Days</div>
                                <div class="rm-bg"> Hours</div>
                                <div class="rm-bg"> Minutes</div>
                                <div class="rm-bg"> Seconds</div>
                            </div>
                        </div>
                            <div class="mx-auto w-full">
                                <div class="items-start justify-start">
                                    <div class="flex items-center">
                                        <h2 class="pt-1 text-title">
                                            {{$row->title}}
                                        </h2>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="flex text-sm">
                                                <span id="date-time">
                                                    {{$row->date}}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
            </div>
            @include('client.layouts.telegram')
        </div>
    </div>
    <script src="/plugins/aos.js"></script>
    <script>
        var endDate = new Date($('#date-time').text());

        var timer = setInterval(function() {
            var now = new Date().getTime();
            var distance = endDate.getTime() - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $('.frist-days').text(Math.floor(days / 10) || 0);
            $('.last-days').text(days % 10 || 0);
            $('.frist-hours').text(Math.floor(hours / 10) || 0);
            $('.last-hours').text(hours % 10 || 0);
            $('.frist-minutes').text(Math.floor(minutes / 10) || 0);
            $('.last-minutes').text(minutes % 10 || 0);
            $('.frist-seconds').text(Math.floor(seconds / 10) || 0);
            $('.last-seconds').text(seconds % 10 || 0);
            if (distance < 0) {
                clearInterval(timer);
                $('.frist-days').text('0');
                $('.last-days').text('0');
                $('.frist-hours').text('0');
                $('.last-hours').text('0');
                $('.frist-minutes').text('0');
                $('.last-minutes').text('0');
                $('.frist-seconds').text('0');
                $('.last-seconds').text('0');
            }
        }, 1000);

        AOS.init({
            duration: 1200,
        })
    </script>
@endsection
