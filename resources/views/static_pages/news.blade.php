@extends('layouts.common')
@section('content')
<div id="list">
    <div class="list_left">
        <div class="list_tit" style="border-radius: 5px;">
            <div class="bt">眼部整形</div>
        </div>
        <ul class="list_name">
            <li style="border-radius: 5px;"><a href="/tuomao/" title="脱毛">脱毛</a><em>></em></li>
            <li style="border-radius: 5px;"><a href="/qudou/" title="祛痘">祛痘</a><em>></em></li>
        </ul>

            <div class="list_tit" style="border-radius: 5px;margin-top: 15px">
                <div class="bt">医院地址</div>
            </div>
            <img style="margin-left: 15px;" src="{{ asset('image') }}/260.png" alt="">
    </div>

    <div class="list_right">
        <a href="/swt"><img style="border-radius: 5px;" src="{{ asset('image') }}/878.png" class="lson_banner"></a>
        <div class="list_scon">
            <ul>
                <li style="border-radius: 5px;">
                    <h4 style="border-radius: 5px;"><a href="/tuomao/" class="info" title="脱毛">脱毛</a></h4>
                    <div class="ls_con">
                        <img style="border-radius: 5px;" src="{{ asset('image') }}/260.png" alt="">
                        <div class="ls_hover"><a href="" class="info" title="脱毛"></a></div>
                    </div>
                    <div class="yongtu">
                        <p>一双修长的双腿会使我们看起来更加的有魅力，更加的有气质，但是...</p>
                    </div>
                    <div class="dianzan"><span class="zxzj"><a href="">了解更多</a></span><span class="lmxq"><a
                                href="">栏目详情</a><span></div>
                </li>
                <li style="border-radius: 5px;">
                    <h4 style="border-radius: 5px;"><a href="/tuomao/" class="info" title="脱毛">脱毛</a></h4>
                    <div class="ls_con">
                        <img style="border-radius: 5px;" src="{{ asset('image') }}/260.png" alt="">
                        <div class="ls_hover"><a href="" class="info" title="脱毛"></a></div>
                    </div>
                    <div class="yongtu">
                        <p>一双修长的双腿会使我们看起来更加的有魅力，更加的有气质，但是...</p>
                    </div>
                    <div class="dianzan"><span class="zxzj"><a href="">了解更多</a></span><span class="lmxq"><a
                                href="">栏目详情</a><span></div>
                </li>
                <li style="border-radius: 5px;">
                    <h4 style="border-radius: 5px;"><a href="/tuomao/" class="info" title="脱毛">脱毛</a></h4>
                    <div class="ls_con">
                        <img style="border-radius: 5px;" src="{{ asset('image') }}/260.png" alt="">
                        <div class="ls_hover"><a href="" class="info" title="脱毛"></a></div>
                    </div>
                    <div class="yongtu">
                        <p>一双修长的双腿会使我们看起来更加的有魅力，更加的有气质，但是...</p>
                    </div>
                    <div class="dianzan"><span class="zxzj"><a href="">了解更多</a></span><span class="lmxq"><a
                                href="">栏目详情</a><span></div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection