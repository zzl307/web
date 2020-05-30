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
                    @if (!isset($previousNewsID) && !isset($nextNewsId))
                        <li>上一篇：没有了</li>                            
                        <li>下一篇：没有了</li>
                    @elseif(!isset($previousNewsID))
                        <li>上一篇：没有了</li>
                        <li>下一篇：<a href='{{ route('details', ['id' => $nextNewsId, 'slug' => $nextNewsTitle['slug']]) }}'>{{ $nextNewsTitle['title'] }}</a></li>
                    @elseif(!isset($nextNewsId))
                        <li>上一篇：<a href='{{ route('details', ['id' => $previousNewsID ?? '', 'slug' => $previousNewsTitle['slug'] ?? '']) }}'>{{ $previousNewsTitle['title'] ?? '' }}</a></li>
                        <li>下一篇：没有了</li>
                    @else
                        <li>上一篇：<a href='{{ route('details', ['id' => $previousNewsID ?? '', 'slug' => $previousNewsTitle['slug']]) }}'>{{ $previousNewsTitle['title'] }}</a></li>
                        <li>下一篇：<a href='{{ route('details', ['id' => $nextNewsId, 'slug' => $nextNewsTitle['slug']]) }}'>{{ $nextNewsTitle['title'] }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="siderbar mt2">
            <div class="banner_300">
                <div class="stage1">
                    @if (count($links))
                        <div class="stage1-width stage1_c left" style="border-radius: 5px;margin-top: 15px;">
                            <div class="stage1Title">
                                <span class="fonts"><a href='' title="">推荐阅读</a></span>
                            </div>
                            <div class="expertSlide relative">
                                <ul class='list on'>
                                    @foreach ($links as $key => $vo)
                                        <li>
                                            <em>{{ $key+1 }}.</em><a href="{{ $vo->link() }}" class="titlen">&nbsp;{{ $vo->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>                            
                    @endif
                    <div class="stage2_width stage3_c left" style="border-radius: 5px;margin-top: 15px;">
                        <div class="stage1Title">
                            <span class="fonts">最新文章</span>
                        </div>
                        <div style='overflow: hidden;'>
                            <img src="{{ $new->avatar }}" alt="{{ $new->keyword }}" style="width: 276px;height: 215px;border-radius: 5px;">
                        </div>
                        <p class="fonts">
                            {{ make_excerpt($new->description) }}
                        </p>
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