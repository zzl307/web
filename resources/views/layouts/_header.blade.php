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
            <a href="#">案例展示</a>
            <a href="#/">关于我们</a>
            <a href="#">案例展示</a>
        </div>
    </div>
</section>

<section class='menuBoxs wPub' id='menuBoxs'>
    <div id='navlist' class='navlist clearfix absolute'>
        <div class='subNav subNav01'>
            <a href='/ybzx' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>眼部整形</span>
            </a>
        </div>
        <div class='subNav subNav02'>
            <a href='/bbzx' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>鼻部整形</span>
            </a>
        </div>
        <div class='subNav subNav03'>
            <a href='/xbzx' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>胸部整形</span>
            </a>
        </div>
        <div class='subNav subNav04'>
            <a href='/ebzx' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>面部轮廓</span>
            </a>
        </div>
        <div class='subNav subNav05'>
            <a href='/xzjf' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>脂肪管理</span>
            </a>
        </div>
        <div class='subNav subNav06'>
            <a href='/kslmr/' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>抗衰老</span>
            </a>
        </div>
        <div class='subNav subNav07'>
            <a href='/wzx/' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>微整形</span>
            </a>
        </div>
        <div class='subNav subNav08'>
            <a href='/pfmrzx/' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>皮肤面容</span>
            </a>
        </div>
        <div class='subNav subNav09'>
            <a href='swt' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>在线客服</span>
            </a>
        </div>
        <div class='subNav subNav10'>
            <a href='swt' target='_blank' class='iBlock'>
                <em class='iBlock fourIcon translateX'></em>
                <span>联系我们</span>
            </a>
        </div>
    </div>
    <div class='navbox absolute' id='navbox' style='height:0;overflow: hidden;'>
        <div class='subMenu clearfix' style='height:350px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo1'>眼部整形 <em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/syp' target='_blank' class='iBlock'>双眼皮<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/kyj' target='_blank' class='iBlock'>双眼皮<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/qyd' target='_blank' class='iBlock'>双眼皮<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/tmqm' target='_blank' class='iBlock'>双眼皮</a></li>
                        <li><a href='/slxc' target='_blank' class='iBlock'>双眼皮</i></a></li>
                    </ul>
                    <ul>
                        <li><a href='/jgqyx' target='_blank' class='iBlock'>双眼皮</a></li>
                        <li><a href='/fyw' target='_blank' class='iBlock'>双眼皮</a></li>
                        <li><a href='/hyq' target='_blank' class='iBlock'>双眼皮</a></li>
                        <li><a href='/syp' target='_blank' class='iBlock'>双眼皮<i
                                    class='iBlock fourIcon new'></i></i></a></li>
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
        <div class='subMenu clearfix' style='height:355px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo2'>鼻部整形<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/ztrglb' target='_blank' class='iBlock'>假体隆鼻<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/jtlb' target='_blank' class='iBlock'>假体隆鼻<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/btbjjz' target='_blank' class='iBlock'>假体隆鼻</a></li>
                        <li><a href='/byzx' target='_blank' class='iBlock'>假体隆鼻<i
                                    class='iBlock fourIcon hot'></i></a></li>
                    </ul>
                    <ul>
                        <li><a href='/zslb' target='_blank' class='iBlock'>假体隆鼻</a></li>
                        <li><a href='/wbjz' target='_blank' class='iBlock'>假体隆鼻</a></li>
                        <li><a href='/kbjz' target='_blank' class='iBlock'>假体隆鼻</a></li>
                        <li><a href='/lbxf' onClick='openZoosUrl();return false;' class='iBlock'>假体隆鼻</a></li>
                        <li><a href='/ctb' target='_blank' class='iBlock'>假体隆鼻</a></li>
                    </ul>
                    <ul>
                        <li><a href='/bkzx' target='_blank' class='iBlock'>假体隆鼻<i
                                    class='iBlock fourIcon hot'></i></a></li>
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
        <div class='subMenu clearfix' style='height:350px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo3'>胸部整形<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/jtfx' target='_blank' class='iBlock'>假体隆胸<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/ztzffx' target='_blank' class='iBlock'>假体隆胸<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/furuquchu' target='_blank' class='iBlock'>假体隆胸</a></li>
                        <li><a href='/rfxc' target='_blank' class='iBlock'>假体隆胸</a></li>
                        <li><a href='/lxxf' target='_blank' class='iBlock'>假体隆胸</a></li>
                    </ul>
                    <ul>
                        <li><a href='/rtnxjz' target='_blank' class='iBlock'>假体隆胸</a></li>
                        <li><a href='/gtfx' target='_blank' class='iBlock'>假体隆胸<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/rtsx' target='_blank' class='iBlock'>假体隆胸<i
                                    class='iBlock fourIcon hot'></i></a></li>
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
        <div class='subMenu clearfix' style='height:355px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo4'>面部整形<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/xbzx' target='_blank' class='iBlock'>面部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/fengetou' target='_blank' class='iBlock'>面部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/fmg' target='_blank' class='iBlock'>面部吸脂</a></li>
                        <li><a href='/slz' target='_blank' class='iBlock'>面部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                    </ul>
                    <ul>
                        <li><a href='/fpgj' target='_blank' class='iBlock'>面部吸脂</a></li>
                        <li><a href='/qjzd' target='_blank' class='iBlock'>面部吸脂</a></li>
                        <li><a href='/mbxx' target='_blank' class='iBlock'>面部吸脂</a></li>
                        <li><a href='/sxbxz' target='_blank' class='iBlock'>面部吸脂֬</a></li>
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
        <div class='subMenu clearfix' style='height:350px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo5'>脂肪管理<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/yfbxz' target='_blank' class='iBlock'>腰部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/yfbxz' target='_blank' class='iBlock'>腰部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/sbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/dtxz' target='_blank' class='iBlock'>腰部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/xtxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                    </ul>
                    <ul>
                        <li><a href='/tbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/bbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/xbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/mbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/sxbxz' target='_blank' class='iBlock'>腰部吸脂</a></li>
                    </ul>
                    <ul>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂<i
                                    class='iBlock fourIcon hot'></i></a></li>
                    </ul>
                    <ul>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>腰部吸脂<i
                                    class='iBlock fourIcon hot'></i></a>
                        </li>
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
        <div class='subMenu clearfix' style='height:355px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo6'>抗衰老<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/yww' target='_blank' class='iBlock'>鱼尾纹<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='//ttw' target='_blank' class='iBlock'>鱼尾纹<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/mjw' target='_blank' class='iBlock'>鱼尾纹</a></li>
                        <li><a href='/zjw' target='_blank' class='iBlock'>鱼尾纹</a></li>
                        <li><a href='/flw' target='_blank' class='iBlock'>鱼尾纹<i class='iBlock fourIcon hot'></i></a>
                        </li>
                    </ul>
                    <ul>
                        <li><a href='/lgjw' target='_blank' class='iBlock'>鱼尾纹 </a></li>
                        <li><a href='/mbjsc' target='_blank' class='iBlock'>鱼尾纹</a></li>
                        <li><a href='/lt' target='_blank' class='iBlock'>鱼尾纹<i class='iBlock fourIcon hot'></i></a>
                        </li>
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
        <div class='subMenu clearfix' style='height:350px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo7'>微整形<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/slz' target='_blank' class='iBlock'>隆鼻<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/stz' target='_blank' class='iBlock'>隆鼻<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/zslb' target='_blank' class='iBlock'>隆鼻<i class='iBlock fourIcon hot'></i></a>
                        </li>
                    </ul>
                    <ul>
                        <li><a href='/swt' target='_blank' class='iBlock'>隆鼻</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>隆鼻</a></li>
                        <li><a href='/swt' target='_blank' class='iBlock'>隆鼻<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/swt' target='_blank' class='iBlock'>隆鼻</a></li>
                    </ul>
                    <ul>
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
        <div class='subMenu clearfix' style='height:355px;'>
            <div class='subMenuTxts fl'>
                <div class='menuLogo menuLogo8'>面部皮肤<em class='iBlock fourIcon'></em></div>
                <div class='subMenuTxt'>
                    <ul>
                        <li><a href='/rcw/' target='_blank' class='iBlock'>脱毛<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/qb' target='_blank' class='iBlock'>脱毛<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/hhb' target='_blank' class='iBlock'>脱毛<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/shaiban' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/lnb' target='_blank' class='iBlock'>脱毛<i class='iBlock fourIcon hot'></i></a>
                        </li>
                    </ul>
                    <ul>
                        <li><a href='/qd' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/tuomao/' target='_blank' class='iBlock'>脱毛<i
                                    class='iBlock fourIcon hot'></i></a></li>
                        <li><a href='/bahen/' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/taiji/' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/meibai' target='_blank' class='iBlock'>脱毛</a></li>
                    </ul>
                    <ul>
                        <li><a href='/hyq' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/hxs' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/mkcd' target='_blank' class='iBlock'>脱毛</a></li>
                        <li><a href='/spcz' target='_blank' class='iBlock'>脱毛<i class='iBlock fourIcon hot'></i></a>
                        </li>
                        <li><a href='/wx/' target='_blank' class='iBlock'>脱毛</a></li>
                    </ul>
                    <ul>
                        <li><a href='/hgxqp/' target='_blank' class='iBlock'>脱毛<i
                                    class='iBlock fourIcon new'></i></a></li>
                        <li><a href='/hgyez/' target='_blank' class='iBlock'>脱毛<i
                                    class='iBlock fourIcon new'></i></a></li>
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
    </div>
</section>