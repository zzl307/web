<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="baidu-site-verification" content="8s5Foxgted" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="{{ $system->keyword }}">
	<meta name="description" content="{{ $system->description }}">
    <title>@yield('title', '安安医疗美容') - {{ $system->title }}</title>
    
    {{-- Styles --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
	<style>
		.navlist .subNav010 em,
		.navlist .subNav010.on em {
			width: 24px;
			height: 24px;
			background-position: -373px -55px;
			margin-top: 18px;
		}
	</style>
</head>

<body>
	@include('layouts._header')

	@yield('content')
	
	@include('layouts._footer')

	{{-- Scripts --}}
	<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('js/swiper.min.js') }}"></script>
	<script src="{{ asset('js/jquery.SuperSlide.2.1.1.js') }}"></script>
	<script src="{{ asset('js/common.js') }}"></script>

	<script>
		var _hmt = _hmt || [];
		(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?d49dede791e020c065cae66d89af5d06";
		var s = document.getElementsByTagName("script")[0]; 
		s.parentNode.insertBefore(hm, s);
		})();
	</script>
</body>

</html>
