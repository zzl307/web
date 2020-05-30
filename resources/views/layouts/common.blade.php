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
    <link href="{{ asset('css/base_info1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <link href="{{ asset('weisucss/css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('weisucss/dh/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
	{{-- <script type="text/javascript" src="./static/js/yixingswt.js"></script> --}}
	<script type="text/javascript">
		try {
			var urlhash = window.location.hash;
			if (!urlhash.match("fromapp")) {list.css
				if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
					window.location = "";
				}
			}
		} catch (err) {}
    </script>
    
    @yield('style')

</head>

<body>
	<section class="headerAll" id="headerAll">
        <section class="bannerBz">
            <div class="bannerPic relative">
                <img src="{{ asset('image') }}/534.png" alt="" />
            </div>
            <div class="topIdex absolute">
                <img style="width: 277px; height: 40px;" src="{{ asset('image') }}/logo2.png" alt="">
                <div class="topNav fr">
                    <a href="/">首页</a>
                    <a href="#">企业文化</a>
                    <a href="#">专家团队</a>
                    <a href="#">案例展示</a>
                    <a href="#/">关于我们</a>
                    <a href="#">案例展示</a>
                </div>
            </div>
        </section>
        <section class='menuBoxs wPub' id='menuBoxs'>
            <div id='navlist' class='navlist clearfix absolute'>
                @foreach ($category_status as $key => $vo)
                    <div class='subNav subNav0{{ $key+1 }}'>
                        <a href='{{ route('news.list', ['id' => $vo->id]) }}' target='_blank' class='iBlock'>
                            <em class='iBlock fourIcon translateX'></em>
                            <span>{{ $vo->name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class='navbox absolute' id='navbox' style='height:0;overflow: hidden;'>
                @foreach ($tree as $vo)
                    <div class='subMenu clearfix' style='height:350px;'>
                        <div class='subMenuTxts fl'>
                            <div class='menuLogo menuLogo1'>{{ $vo['name'] }} <em class='iBlock fourIcon'></em></div>
                            <div class='subMenuTxt'>
                                <ul>
                                    @foreach ($vo['children'] as $v)
                                        <li>
                                            <a href='{{ route('news.list', ['id' => $v['id']]) }}' target='_blank' class='iBlock'>{{ $v['name'] }}<i class='iBlock fourIcon hot'></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class='subMenuPics fr'>
                            <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock'>
                                <img src='{{ asset('image/143.png') }}' />
                            </a>
                            <div class='clearfix'>
                                <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock fl'>
                                    <img src='{{ asset('image/254.png') }}' />
                                </a>
                                <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock fr'>
                                    <img src='{{ asset('image/254.png') }}' />
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>

    @yield('content')
    
    @include('layouts._footer')

	{{-- Scripts --}}
	<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('js/swiper.min.js') }}"></script>
	<script src="{{ asset('js/jquery.SuperSlide.2.1.1.js') }}"></script>
	<script src="{{ asset('js/common.js') }}"></script>
	<script src="{{ asset('weisucss/js/menu.js') }}"></script>
	<script src="{{ asset('weisucss/js/jquery-ui-1.8.18.custom.min.js') }}"></script>
    <script src="{{ asset('weisucss/js/common.js') }}"></script>
    
    @yield('javascript')
</body>

</html>
