<section class="bannerIndex">
    <div class="swiper-container bannerSwiper">
        <div class="swiper-wrapper">
            @foreach ($data as $vo)
                <div class="swiper-slide">
                    <a href="#" class="iBlock">
                        <img src="{{ $vo->avatar }}" alt="{{ $vo->title }}" />
                    </a>
                </div>                   
            @endforeach
        </div>
        <div class="swiper-button-prev bannerButton borderCircle ani">
            <em class="fourIcon iBlock"></em>
        </div>
        <div class="swiper-button-next bannerButton borderCircle ani">
            <em class="fourIcon iBlock"></em>
        </div>
    </div>
    <div class="topIdex absolute">
        <img style="width: 277px; height: 40px;" src="{{ asset('image/logo2.png') }}" alt="">
        <div class="topNav fr">
            <a href="/">首页</a>
            <a href="#">企业文化</a>
            <a href="#">专家团队</a>
            <a href="#">新闻资讯</a>
            <a href="#">案例展示</a>
            <a href="#/">关于我们</a>
        </div>
    </div>
</section>

<section class='menuBoxs wPub' id='menuBoxs'>
    <div id='navlist' class='navlist clearfix absolute'>
        @foreach ($category_status as $key => $vo)
            <div class='subNav subNav0{{ $key+1 }}'>
                <a href='#' target='_blank' class='iBlock'>
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
                                    <a href='/syp' target='_blank' class='iBlock'>{{ $v['name'] }}<i class='iBlock fourIcon hot'></i></a>
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
