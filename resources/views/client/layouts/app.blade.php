<!DOCTYPE html>
<html lang="{{app()->getlocale()}}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COCK88</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <link rel="icon" href="/icon/SB24-1.png" />
	<script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/plugins/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/plugins/aos.css" />
	<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <title>{{$data['title'] ?? ''}}</title>
    <meta property="og:url"           content="{{$data['url'] ?? ''}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$data['title'] ?? ''}}" />
    <meta property="og:description"   content="{{$data['description'] ?? ''}}" />
    <meta property="og:image"         content="{{$data['image'] ?? ''}}" />

	<link href="/videojs/video-js.css" rel="stylesheet"> </link>  
	<script src="/videojs/video.js"></script>
	<script src="/videojs/videojs-http-streaming.js"></script>
	<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
	
	<style>
		.btn-next {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
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
		body {
		   color: #B4B7BD;
			background-color: #161D31;
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
		.color-brand {
			color: #6f4b98;
		}
		.sub-color-brand {
			color: #2f2151;
		}
	</style>
	<body class="contain">
		<!-- @include('layouts.component.alert-dismissible') -->
		@include('sweetalert::alert')
	<!-- ========start-header============ -->
		@include('client.layouts.navbar')
		<!-- Main Content -->
                    @yield('content')
		<!-- End of Main Content -->
	<!-- ========start-footer============ -->
	@include('client.layouts.footer')
	@include('client.modal.modal')
	<!-- ========start-footer============ -->
	{{-- <!-- ========start-modal============ -->

	<!-- ========end-modal============ --> --}}
</body>
</html>
