@extends('layouts.common')

@section('style')
    <style>
        #mapContainer {
            width: 296px;
            height: 300px;
        }
    </style>
@endsection

@section('content')
<div id="list">
    <div class="list_left">
        <div class="list_tit" style="border-radius: 5px;">
            <div class="bt">{{ $category_title->name }}</div>
        </div>
        <ul class="list_name">
            @foreach ($new_category as $vo)
                <li style="border-radius: 5px;">
                    <a href="{{ route('news.list', ['id' => $vo->id]) }}" title="{{ $vo->name }}">{{ $vo->name }}</a><em>></em>
                </li>
            @endforeach
        </ul>

        <div class="list_tit" style="border-radius: 5px;margin-top: 15px">
            <div class="bt">医院地址</div>
        </div>
        <div id="mapContainer"></div>
    </div>

    <div class="list_right">
        <a href="#">
            <img style="border-radius: 5px;" src="{{ asset('image') }}/878.png" class="lson_banner">
        </a>
        <div class="list_scon">
            <ul>
                @foreach ($new as $vo)
                    <li style="border-radius: 5px;">
                        <h4 style="border-radius: 5px;">
                            <a href="{{ route('details', ['id' => $vo->id, 'slug' => $vo->slug]) }}" class="info" title="{{ $vo->title }}">{{ $vo->title }}</a>
                        </h4>
                        <div class="ls_con" style="margin-top: 12px;">
                            <img style="border-radius: 5px;" style="width: 260px;height: 260px;" src="{{ $vo->avatar }}" alt="{{ $vo->keyword }}">
                            <div class="ls_hover">
                                <a href="{{ route('details', ['id' => $vo->id, 'slug' => $vo->slug]) }}" class="info" title="{{ $vo->title }}"></a>
                            </div>
                        </div>
                        <div class="yongtu">
                            <p>
                                {{ make_excerpt($vo->description) }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="https://webapi.amap.com/maps?v=1.4.15&key=4e5555120b4d8108ced47cc0bcb81b91"></script>
    <script type="text/javascript" >
        var map = new AMap.Map('mapContainer',{
            zoom: 18,
            center: [118.783414,32.0252]
        });
        var toolbar = new AMap.ToolBar();
        map.plugin(toolbar);
    </script>
@endsection
