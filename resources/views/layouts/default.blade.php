<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="">
	<meta name="description" content="">
    <title>@yield('title', '安安美容整形') - 安安美容整形</title>
    
    {{-- Styles --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
	{{-- <script type="text/javascript" src="./static/js/yixingswt.js"></script> --}}
	<script type="text/javascript">
		try {
			var urlhash = window.location.hash;
			if (!urlhash.match("fromapp")) {
				if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
					window.location = "";
				}
			}
		} catch (err) {}
	</script>
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
</body>

</html>
