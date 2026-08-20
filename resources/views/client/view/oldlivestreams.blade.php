@section('client-livestreams', 'active')
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
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }
    .grid-2 img{
        border-radius: 5px;
    }
    .line-1{
        display: -webkit-box;
        -webkit-line-clamp: 1;
        overflow: hidden;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        font-size: 20px;
    }

    .image-container {
        position: relative;
    }
    .text-overlay {
        position: absolute;
        left: 0;
        color: black;
        padding: 10px;
        bottom: 30px;
        background-color: #fcd44c;
    }
    @media screen and (max-width: 1000px) {
        .fb-plugin {
            display: none !important;
        }
        .wrapper {
            display: grid;
            grid-template-columns: 1fr !important;
        }
        .line-1{
            font-size: 19px !important;
        }
        .text-overlay {
            bottom: 28.5px;
        }
    }
    @media screen and (max-width: 900px) {
        .line-1{
            font-size: 18px !important;
        }
        .text-overlay {
            bottom: 27px;
        }
    }
    @media screen and (max-width: 700px) {
        .line-1{
            font-size: 17px !important;
        }
        .text-overlay {
            bottom: 25.5px;
        }
    }
    @media screen and (max-width: 500px) {
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr !important;
        }
    }
    @media screen and (max-width: 400px) {
    
    }
    a:hover .color-brand {
        color: #2f2151 !important;
    }
    a:hover .text-overlay, a:hover #format-date{
        color: #2f2151 !important;
    }
</style>
    <div class="container">
        <div class="wrapper">
            <div>
                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                    <i class="fas fa-television"></i>
                    @lang('home.list livestream')
                </div>

                <div class="grid-2">
                    @foreach ($Livestream as $row) 
                        <div data-aos="zoom-in" data-aos-duration="800">
                            <a href="/livestreams/{{$row->id}}">
                                <img src="/upload/{{$row->photo}}" width="100%" class="image-container" onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                                <span class="text-overlay">
                                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px;"><path fill="currentColor" d="M4.93,4.93C3.12,6.74 2,9.24 2,12C2,14.76 3.12,17.26 4.93,19.07L6.34,17.66C4.89,16.22 4,14.22 4,12C4,9.79 4.89,7.78 6.34,6.34L4.93,4.93M19.07,4.93L17.66,6.34C19.11,7.78 20,9.79 20,12C20,14.22 19.11,16.22 17.66,17.66L19.07,19.07C20.88,17.26 22,14.76 22,12C22,9.24 20.88,6.74 19.07,4.93M7.76,7.76C6.67,8.85 6,10.35 6,12C6,13.65 6.67,15.15 7.76,16.24L9.17,14.83C8.45,14.11 8,13.11 8,12C8,10.89 8.45,9.89 9.17,9.17L7.76,7.76M16.24,7.76L14.83,9.17C15.55,9.89 16,10.89 16,12C16,13.11 15.55,14.11 14.83,14.83L16.24,16.24C17.33,15.15 18,13.65 18,12C18,10.35 17.33,8.85 16.24,7.76M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z"></path></svg> 
                                    <span id="format-date" >{{$row->date}}</span>
                                     more hours
                                </span>
                                <div class="flex flex-col">
                                    <span class="text-sm line-1 color-brand"> 
                                        {{$row->title}}
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            
            </div>
            @include('client.layouts.telegram')
        </div>
    </div>
    <script src="/plugins/aos.js"></script>
    <script>
        function formartdate(date){
            const now = new Date();
            const end = new Date(date);
            const distance = end.getTime() - now.getTime();
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);
            return hours
        };
        $('#format-date').text(formartdate($("#format-date").text()));
        AOS.init({
            duration: 1200,
        })
    </script>
@endsection
