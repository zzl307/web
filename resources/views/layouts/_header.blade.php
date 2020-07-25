<section class="fullSlide">
    <div class="bd">
        <ul>
            @foreach ($data as $vo)
                <li _src="url({{ $vo->avatar }})" style="background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;"><a target="_blank" href="#"></a></li>
            @endforeach
        </ul>
        </div>
        <div class="hd">
            <ul>
            </ul>
        </div>
        <span class="prev"></span> <span class="next"></span>
    </div>
</div>
    <div class="topIdex absolute">
        <img style="width: 277px; height: 40px;" src="{{ asset('image/logo2.png') }}" alt="">
        <div class="topNav fr">
            <a href="/">首页</a>
            <a href="#" rel="nofollow">企业文化</a>
            <a href="#" rel="nofollow">专家团队</a>
            <a href="#">新闻资讯</a>
            <a href="#">案例展示</a>
            <a href="#">关于我们</a>
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
