<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baidu-site-verification" content="8s5Foxgted" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="安安整形,安安美容,安安医疗美容,医疗美容,安安整形医院,安安美容医院,南京整形美容,南京美容整形,南京整形医院,南京整形美容医院,南京安安整形医院">
	<meta name="description" content="南京安安医疗美容,南京安安美容,安安医疗美容,南京安安整形医院,南京安安美容整形医院,是南京整形美容,南京整形医院,南京整容医院,江苏好的整形医院,好的医疗美容医院,好的医疗美容,提供丰胸,隆胸,隆鼻整形,吸脂减肥,双眼皮,祛斑,祛痘,无创美容,等南京美容整形医院的服务">
    <title>@yield('title', '南京安安医疗美容【官网】安安美容整形医院_医疗美容_安安整形_安安美容_安安医疗_南京整形医院_南京整形美容医院') - 安安医疗美容</title>
    
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
	<script>
		(function(){
			var bp = document.createElement('script');
			var curProtocol = window.location.protocol.split(':')[0];
			if (curProtocol === 'https'){
			bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
			}
			else{
			bp.src = 'http://push.zhanzhang.baidu.com/push.js';
			}
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(bp, s);
		})();
	</script>
</body>

</html>
