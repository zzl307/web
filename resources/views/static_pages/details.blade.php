@extends('layouts.common')
@section('content')
<div class="body">
    <div class="body_con mt2">
        <!-- list -->
        <div class="viewbox">
            <div class="title">
                <h1>{{ $data->title }}</h1>
            </div>
            <div class="info">
                <span>发布时间：</span>{{ $data->created_at }}
                <span>本文关键词:</span><a href="" style="color: #6a9bd3;font-size: 15px"> {{ $data->keyword }} </a>
                <span> 文章来源:</span><a href="#" style="color: #6a9bd3;font-size: 15px"> 安安美容整形</a>
            </div>
            <div class="content">
                {!! $data->description !!}
            </div>
            <div class="zx_ol" style="width:406px; margin:0 auto;"> <img src="" border="0" usemap="#Map2" />
                <map name="Map2" id="Map2">
                    <area shape="rect" coords="3,3,192,37" href="/swt" target="_blank" />
                    <area shape="rect" coords="214,4,406,39" href="/swt" />
                </map>
            </div>
            <div class="context">
                <ul>
                    <li>上一篇：<a href='{{ route('details', ['id' => $previousNewsID]) }}'>{{ $previousNewsTitle['title'] }}</a> </li>
                    <li>下一篇：<a href='{{ route('details', ['id' => $nextNewsId]) }}'>{{ $nextNewsTitle['title'] }}</a> </li>
                </ul>
            </div>
        </div>
        <div class="siderbar mt2">
            <div class="banner_300">
                <div class="stage1">
                    <div class="stage1-width stage1_c left" style="border-radius: 5px;margin-top: 15px;">
                        <div class="stage1Title">
                            <span class="fonts"><a href='' title="">推荐阅读</a></span>
                        </div>
                        <div class="expertSlide relative">
                            <ul class='list on'>
                                <li><em>1.</em><a href="/syp/1312.html" class="titlen">南京做双眼皮多久能恢复？</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="stage2_width stage3_c left" style="border-radius: 5px;margin-top: 15px;">
                        <div class="stage1Title"> <span class="fonts">最新文章</span> </div>
                        <div style='overflow: hidden;'><img src="/statics/images/hj01.jpg" alt="安安医疗美容大厦" /></div>
                        <p class="fonts">
                            安安整形美容美丽只要私人定制的技术及服务理念。安安医疗美容医院的成立为爱美者提供了时尚，舒适的医美服务</p>
                    </div>
                    <div class="contactUsBox left" style="border-radius: 5px;margin-top: 15px;">
                        <div class="contactUsTitle fonts">联系我们</div>
                        <div class="contactWrapper"><img src="{{ asset('image/308.png') }}" alt="安安整形地址"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection