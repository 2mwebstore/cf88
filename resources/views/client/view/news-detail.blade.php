<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
    <meta property="og:url"           content="{{$data['url']}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$data['title']}}" />
    <meta property="og:description"   content="{{$data['description']}}" />
    <meta property="og:image"         content="{{$data['image']}}" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel='stylesheet' href='/plugins/sweetalert2.min.css'></link>  
    <link rel="icon" href="/icon/SB24-1.png" />
	<script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/plugins/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  
	<link rel="stylesheet" href="/plugins/aos.css" />
	<style>
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
		.client-navbar{
			overflow-x: auto;
			white-space: nowrap;
		}
		.client-navbar::-webkit-scrollbar {
			display: none;
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
		a:hover , a{
			text-decoration: none;
		}
		ul,li , ul li{
		   list-style-type: none !important;
		}
		.text-big{
			text-transform: uppercase!important;
		}
		.text_uper{
			text-transform: uppercase!important;
		}
		.bg-color-brand {
			background-color: #283046;
		}
		.bg-sub-color-brand {
			background-color: #2f2151;
		}
		.sub-color-brand {
			color: #6f4b98;
		}
        
		html,body {
		   color: #B4B7BD;
			background-color: #161D31;
		}
        .sb-text{
            color: #6f4b98 !important;
        }
        .text-golde {
            color: #cbb074!important;
        }
        .wrapper {
            display: grid;
            grid-template-columns: 2fr 0.7fr ;
            grid-gap: 30px;
        }

        .brd-5 {
            border-radius: 5px;
        }
        .null-title{
            height: 2rem;
            background-color: grey;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
        }
        .null-date{
            height: 1.5rem;
            background-color: grey;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
            width: 30%;
        }
        .null-image{
            height: 20rem;
            background-color: grey;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 5px;
        }
        @media screen and (max-width: 1000px) {
            .wrapper {
                display: grid;
                grid-template-columns: 1fr !important;
                grid-gap: 8px;
            }
            .limit-block{
                display: none !important;
            }
            .null-title{
                height: 1.4rem;
            }
            .null-date{
                height: 0.9rem;
            }
            .null-image{
                height: 16rem;
            }
        }
        @media screen and (max-width: 900px) {
            .title-size {
                font-size: 19px;
            }
            .detail-size {
                font-size: 16px;
            }
            .date-size {
                font-size: 14px;
            }
            .null-title{
                height: 1.3rem;
            }
            .null-date{
                height: 0.8rem;
            }
            .null-image{
                height: 15rem;
            }
        }
        @media screen and (max-width: 800px) {
            .title-size {
                font-size: 17px;
            }
            .detail-size {
                font-size: 16px;
            }
            .date-size {
                font-size: 14px;
            }
            .null-title{
                height: 1.2rem;
            }
            .null-date{
                height: 0.7rem;
            }
            .null-image{
                height: 14rem;
            }
        }
        @media screen and (max-width: 700px) {
            .title-size {
                font-size: 16px;
            }
            .detail-size {
                font-size: 15px;
            }
            .date-size {
                font-size: 13px;
            }
            .null-title{
                height: 1.1rem;
            }
            .null-date{
                height: 0.6rem;
            }
            .null-image{
                height: 13rem;
            }
        }
        @media screen and (max-width: 600px) {
            .title-size {
                font-size: 15px;
            }
            .detail-size {
                font-size: 14px;
            }
            .date-size {
                font-size: 12px;
            }
            .null-title{
                height: 1rem;
            }
            .null-date{
                height: 0.5rem;
            }
            .null-image{
                height: 12rem;
            }
        }
        @media screen and (max-width: 500px) {
            .title-size {
                font-size: 14px;
            }
            .detail-size {
                font-size: 13px;
            }
            .date-size {
                font-size: 11px;
            }
            .null-title{
                height: 1rem;
            }
            .null-date{
                height: 0.5rem;
            }
            .null-image{
                height: 11rem;
            }
        }
        @media screen and (max-width: 400px) {
            .title-size {
                font-size: 13px;
            }
            .detail-size {
                font-size: 12px;
            }
            .date-size {
                font-size: 10px;
            }
            .null-title{
                height: 1rem;
            }
            .null-date{
                height: 0.5rem;
            }
            .null-image{
                height: 10rem;
            }
        }
        @media screen and (max-width: 300px) {
            .title-size {
                font-size: 12px;
            }
            .detail-size {
                font-size: 11px;
            }
            .date-size {
                font-size: 9px;
            }
            .null-title{
                height: 1rem;
            }
            .null-date{
                height: 0.5rem;
            }
            .null-image{
                height: 10rem;
            }
        }
    
    </style>
    
<body class="contain">
	<!-- ========start-header============ -->
		@include('client.layouts.navbar')
		<!-- Main Content -->
        <div class="container mt-75">
            <div class="wrapper">
                <div>
                    <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                        <div class="d-flex justify-content-between">
                            <div><i class="fas fa-list-alt"></i>     @lang('home.news')</div>
                            <div><a href="/news" class="text-white">    @lang('home.back')</a></div>
                        </div>
                    </div>
        
                   @foreach ($Article as $row) 
                     <div class="text-white date-title" data-aos="zoom-in" data-aos-duration="800">{{$row->title}}</div>
                     {{-- <div class="color-brand date-size" data-aos="zoom-in" data-aos-duration="800"> {{$row->date}}</div> --}}
                     <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo}}" width="100%" class="brd-5" data-aos="zoom-in" data-aos-duration="800">
                     <div class="color-brand date-size" data-aos="zoom-in" data-aos-duration="800">
                        {{-- {{$row->date}} --}}
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
                           </span></div>
                           <div>
                               <span class="post-meta">
                                   <i class="far fa-eye"></i>
                                   {{$row->view}}
                               </span>
                           </div>
                       </div>
                       </div>
                   {!! $Facebook !!}
                     <div class="color-brand detail-size">{{$row->detail}}</div>
                        @if ($row->photo1) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo1}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail1}}</div>
                        @if ($row->photo2) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo2}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail2}}</div>
                        @if ($row->photo3) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo3}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail3}}</div>
                        @if ($row->photo4) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo4}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail4}}</div>
                        @if ($row->photo5) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo5}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail5}}</div>
                        @if ($row->photo6) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo6}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail6}}</div>
                        @if ($row->photo7) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo7}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail7}}</div>
                        @if ($row->photo8) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo8}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail8}}</div>
                        @if ($row->photo9) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo9}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail9}}</div>
                        @if ($row->photo10) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo10}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail10}}</div>
                        @if ($row->photo11) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo11}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail11}}</div>
                        @if ($row->photo12) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo12}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail12}}</div>
                        @if ($row->photo13) 
                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{$row->photo13}}" width="100%" class="brd-5 mt-1" data-aos="zoom-in" data-aos-duration="800">
                        @endif
                     <div class="color-brand detail-size">{{$row->detail13}}</div>
                   @endforeach
                </div>
                @include('client.layouts.telegram')
                @include('client.modal.modal')
            </div>
        </div>
		<!-- End of Main Content -->
	<!-- ========start-footer============ -->
	@include('client.layouts.footer')
	<!-- ========start-footer============ -->

</body>
<script src="/plugins/aos.js"></script>
<script>
    var url = "{{$data['url']}}";
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
</html>
