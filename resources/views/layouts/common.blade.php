<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="{{ $data->keyword }}">
	<meta name="description" content="{{ $data->description }}">
    <title>@yield('title', '安安医疗美容') - {{ $data->title }}</title>
    
    {{-- Styles --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base_info1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <link href="{{ asset('weisucss/css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('weisucss/dh/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    
    @yield('style')

    <script>
        var _hmt = _hmt || [];
        (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?5599e16982e75cd6a40f87bbeb6ba8ee";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>

<body>
	<section class="headerAll" id="headerAll">
        <section class="bannerBz">
            <div class="bannerPic relative">
                <img src="{{ asset('image') }}/534.jpg" alt="" />
            </div>
            <div class="topIdex absolute">
                <img style="width: 277px; height: 40px;" src="{{ asset('image') }}/logo2.png" alt="">
                <div class="topNav fr">
                    <a href="/">首页</a>
                    <a href="#" rel="nofollow">企业文化</a>
                    <a href="#" rel="nofollow">专家团队</a>
                    <a href="#">案例展示</a>
                    <a href="#">关于我们</a>
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
                            <span>{{ $vo->title }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class='navbox absolute' id='navbox' style='height:0;overflow: hidden;'>
                @foreach ($tree as $vo)
                    <div class='subMenu clearfix' style='height:350px;'>
                        <div class='subMenuTxts fl'>
                            <div class='menuLogo menuLogo1'>{{ $vo['title'] }} <em class='iBlock fourIcon'></em></div>
                            <div class='subMenuTxt'>
                                <ul>
                                    @foreach ($vo['children'] as $v)
                                        <li>
                                            <a href='{{ route('news.list', ['id' => $v['id']]) }}' target='_blank' class='iBlock'>{{ $v['title'] }}<i class='iBlock fourIcon hot'></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class='subMenuPics fr'>
                            <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock'>
                                <img src='{{ asset('image/143.jpg') }}' style="width: 520px;height: 143px;" />
                            </a>
                            <div class='clearfix'>
                                <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock fl'>
                                    <img src='{{ asset('image/2541.jpg') }}' style="width: 254px;height: 143px;" />
                                </a>
                                <a href='javascript:void(0)' onClick='openZoosUrl();return false;' class='iBlock fr'>
                                    <img src='{{ asset('image/2542.jpg') }}' style="width: 254px;height: 143px;" />
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
