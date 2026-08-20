{{-- @section('client-highlights-detail', 'active') --}}
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
	<link href="{{asset('/template/backend/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/icon/SB24-1.png" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="/videojs/video-js.css" rel="stylesheet"> </link>  
	<script src="/videojs/video.js"></script>
	<script src="/videojs/videojs-http-streaming.js"></script>
	<style>
        .btn-next {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
        }
        @font-face {
			font-family: "nida";
			src: url(/fonts/nida.ttf);
		}
		html[lang='kh'] body{
			font-family: 'nida';
		}
        @font-face {
			font-family: "en";
			src: url(/fonts/en.ttf);
		}
		html[lang='en'] body{
			font-family: 'en';
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
		.client-navbar{
			overflow-x: auto;
			white-space: nowrap;
		}
		.client-navbar::-webkit-scrollbar {
			display: none;
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
	</style>
    {{-- @extends('client.layouts.app') --}}
    <style>
        .sb-text {
            color: #6f4b98 !important;
        }

        .text-golde {
            color: #cbb074 !important;
        }

        .wrapper {
            display: grid;
            grid-template-columns: 2fr 0.7fr;
            grid-gap: 30px;
        }

        /* .date-title {
            font-weight: bold;
        } */

        .bennertitle img {
            width: 25px;
            border-radius: 50%;
            margin-right: 5px;
            height: 25px;
        }

        .brd-5 {
            border-radius: 5px;
        }

        .null-title {
            height: 2rem;
            background-color: grey;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .null-date {
            height: 1.5rem;
            background-color: grey;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
            width: 30%;
        }

        .null-image {
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

            .limit-block {
                display: none !important;
            }

            .null-title {
                height: 1.4rem;
            }

            .null-date {
                height: 0.9rem;
            }

            .null-image {
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

            .null-title {
                height: 1.3rem;
            }

            .null-date {
                height: 0.8rem;
            }

            .null-image {
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

            .null-title {
                height: 1.2rem;
            }

            .null-date {
                height: 0.7rem;
            }

            .null-image {
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

            .null-title {
                height: 1.1rem;
            }

            .null-date {
                height: 0.6rem;
            }

            .null-image {
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

            .null-title {
                height: 1rem;
            }

            .null-date {
                height: 0.5rem;
            }

            .null-image {
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

            .null-title {
                height: 1rem;
            }

            .null-date {
                height: 0.5rem;
            }

            .null-image {
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

            .null-title {
                height: 1rem;
            }

            .null-date {
                height: 0.5rem;
            }

            .null-image {
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

            .null-title {
                height: 1rem;
            }

            .null-date {
                height: 0.5rem;
            }

            .null-image {
                height: 10rem;
            }
        }
        .radus-5px{
            border-radius: 5px
        }
    </style>
<body class="contain">
    @section('client-highlights', 'active')
	<!-- ========start-header============ -->
		@include('client.layouts.navbar')
    <div class="container mt-75">
        <div class="wrapper">
            <div style="overflow: hidden;">
                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-list-alt"></i> 
                            @lang('home.highlights')
                        </div>
                        <div>
                            <a href="/highlights" class="text-white" href="/highlights">
                                @lang('home.back')
                            </a>
                        </div>
                    </div>
                </div>

               @foreach ($Highlight as $row) 
                     <div class="text-white date-title" data-aos="zoom-in" data-aos-duration="800">{{$row->title}}</div>
                   
                     {{-- <video controls width="100%" data-aos="zoom-in" data-aos-duration="1200">
                         <source src="{{$row->video}}" type="video/mp4" >
                     </video> --}}
                    <video id="my_video_1" class="video-js vjs-default-skin vjs-16-9" muted controls width="100%" height="350">
                        <source src="{{$row->video}}" type="video/mp4">
                    </video>
                    <script>
                        var player = videojs('my_video_1');
                    </script>
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
                     <div class="color-brand date-detail mt-1 mb-1" data-aos="zoom-in">{{$row->detail}}</div>
                     <img onerror="this.onerror=null; this.src='/icon/null-image.gif'" data-aos="zoom-in" data-aos-duration="1200" src="{{$row->photo}}" width="100%" class="radus-5px">
               @endforeach
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
                    .format-icon{
                        font-size: 25px !important;
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
                    .format-icon{
                        font-size: 20px !important;
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
                .format-icon{
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    color: #fff;
                    font-size: 35px;
                    transition: .43s cubic-bezier(.47,.13,.16,.72) 0s;
                }
           </style>
               <div class="grid-highligh mt-2">
                @foreach ($ListHighlight  as $key => $row)
                <span class="box-highligh" style="position: relative;">
                    <a class="home-hover" href="/highlights/{{ $row->id }}">
                        <div class="img-hover"></div>
                        <img class="w-full new-height radis-5px  ng-lazyloaded" src="{{ $row->photo }}"
                            onerror="this.onerror=null; this.src='/icon/null-image.gif'">
                            <span class="format-icon format-video">
                                <i class="far fa-play-circle"></i>
                            </span>
                        <div class=" get_name">{{ $row->title }}</div>
                        {{-- <span class="post-meta">
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
                        </span> --}}
                        
                    </a>
                </span>
                @endforeach
            </div>
            </div>
            @include('client.layouts.telegram')
            @include('client.modal.modal')
        </div>

    </div>
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
