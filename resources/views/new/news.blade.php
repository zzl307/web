@extends('common.layouts')

@section('style')
	<link href="{{ asset('static/css/city-picker.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
	<style>
		.widget-content.no-padding .dataTables_header{
			border-top: 1px solid #ddd;
		}
		code{
			display: block;
			float: left;
			padding: 0 8px;
			margin: 5px 5px 5px 5px;
			line-height: 23px;
			font-size: 11px;
			border: 0px;
			background: #fff;
		}
	</style>
@stop

@section('menu')
	新闻管理
@stop

@section('content')

	<div class="row">
		<div class="col-md-12">

			@include('common.message')
			
			<div class="widget box">
				<div class="widget-header">
					<h4>
						<i class="icon-reorder">
						</i>
						新闻列表
					</h4>
					<div class="toolbar no-padding">
						<div class="btn-group">
							<span class="btn btn-xs widget-refresh">
								<i class="icon-refresh">
								</i>
								刷新
                            </span>
                            <a data-toggle="modal" href="#advancedSearchModal" style="text-decoration: none;float: right;">
								<span class="btn btn-xs btn-info" style="border-left: 0px;">
									<i class="icon-edit">
									</i>
									发布新闻
								</span>
							</a>
						</div>
					</div>
				</div>
				
				<div class="widget-content no-padding">
					<form class="form-horizontal" action="{{ url('site/index') }}" method="get">
						<input type="hidden" name="area" value="">
						<div class="form-group" style="margin-top: 15px;">
	   						<div class="col-md-4">
								<input class="form-control" name="key" value="" type="text" placeholder="新闻名称 新闻关键词">
							</div>
							<div class="col-md-2" style="margin-left: -15px;">
								<select class="select2-select-00 col-md-12 full-width-fix" name="type">
									<option value="0" selected>全部</option>
									<option value="1" >吸脂</option>
								</select>
							</div>
							{{-- <div class="col-md-1" style="margin-left: -15px;">
								<select class="select2-select-00 col-md-12 full-width-fix" name="list">
									<option value="0">分页显示</option>
									<option value="15" {{ isset($data) && $data['list'] == 15 ? 'selected' : '' }}>15</option>
									<option value="25" {{ isset($data) && $data['list'] == 25 ? 'selected' : '' }}>25</option>
									<option value="50" {{ isset($data) && $data['list'] == 50 ? 'selected' : '' }}>50</option>
									<option value="100" {{ isset($data) && $data['list'] == 100 ? 'selected' : '' }}>100</option>
								</select>
							</div> --}}
							<button class="btn btn-sm btn-info" style="padding: 5px 16px;">搜索</button>
						</div>
					</form>
				</div>

                <div class="widget-content no-padding">
                    <table class="table table-hover table-striped table-bordered table-highlight-head table-checkable" style="border-top: 1px solid #ddd;">
                        <thead>
                            <tr>
                                @can('site_manage')
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform" onchange="onSiteSelectionChange()">
                                    </th>
                                @endcan
                                <th id="td_delete_sites">
                                    新闻ID
                                </th>
                                <th class="col-md-2">
                                    新闻名称
                                </th>
                                <th id="th_auth_type" class="col-md-2">
                                    关键词
                                </th>
                                <th>
                                    所属分类
                                </th>
                                <th>
                                    发布状态
                                </th>
                                <th>
                                    浏览次数
								</th>
                                <th>
                                    发布时间
								</th>
								<th>
                                    更新时间
                                </th>
								<th>
									
								</th>
                            </tr>
                        </thead>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                        <tbody>
                            @foreach($data as $vo)
                                <tr>
                                    <td>
                                        {{ $vo['id'] }}
                                    </td>
                                    <td>
                                        {{ $vo['title'] }}
                                    </td>
                                    <td>
										{{ $vo['keyword'] }}
                                    </td>
                                    <td>
                                        <span class="label label-danger">
											{{ $vo['type_name'] }}
										</span>
                                    </td>
                                    <td>
                                        {{ $vo['status'] }}
                                    </td>
                                    <td>
                                        {{ $vo['post_count'] }}
                                    </td>
                                    <td>
                                        {{ $vo['created_at'] }}
                                    </td>
                                    <td>
                                        {{ $vo['updated_at'] }}
									</td>
									<td>
										<a href="javascript:;" onclick="showNewsDetail('{{ $vo['id'] }}')" class="btn btn-xs bs-tooltip" title="详情" id="news_id_{{ $vo['id'] }}">
											<i class="icon-eye-open"></i>
										</a>
										<a href="" class="btn btn-xs bs-tooltip" title="删除" onclick="if(confirm('确定删除?') == false) return false;">
											<i class="icon-trash">
											</i>
										</a>
										<a href="" class="btn btn-xs bs-tooltip" title="修改">
											<i class="icon-edit">
											</i>
										</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
					</table>
                </div>
                <div class="dataTables_footer clearfix" style="padding: 12px 0;border-top: 1px solid #ddd;">
                    <div class="col-md-6">
                        <div class="dataTables_info">
                            <strong>总计：</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_paginate paging_bootstrap">
                            {{-- @if(isset($paginator))
                                {{ $paginator->links() }}
                            @endif --}}
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

	{{-- 发布新闻 --}}
	<div class="modal fade" id="advancedSearchModal">
		<div class="modal-dialog" style="width: 1500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						发布新闻
					</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal row-border" action="{{ route('news.store') }}" method="post">

						{{ csrf_field() }}

						<input type="hidden" name="id" value="{{ isset($data['id']) ? $data['id'] : '' }}">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td>
										新闻标题
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="title" value="" type="text" placeholder="新闻标题" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻关键词
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="keyword" value="" type="text" placeholder="已逗号隔开" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻分类
									</td>
									<td>
										<div class="col-md-6">
											<select class="select2-select-00 col-md-12 full-width-fix" name="cid" required>
												<option value="0" selected>全部</option>
												@foreach ($type as $vo)
													<option value="{{ $vo['id'] }}">{{ $vo['name'] }}</option>
												@endforeach
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻详情
									</td>
									<td>
										<div class="col-md-12">
											<textarea rows="15" cols="5" id="editor" name="description" class="form-control" placeholder="新闻详情" required>{{ isset($data['description']) ? $data['description'] : '' }}</textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										分页显示
									</td>
									<td>
										<div class="col-md-6">
											<select class="select2-select-00 col-md-12 full-width-fix" name="list">
												<option value="0">分页显示</option>
												{{-- <option value="15" {{ isset($data) && $data['list'] == 15 ? 'selected' : '' }}>15</option>
												<option value="25" {{ isset($data) && $data['list'] == 25 ? 'selected' : '' }}>25</option>
												<option value="50" {{ isset($data) && $data['list'] == 50 ? 'selected' : '' }}>50</option>
												<option value="100" {{ isset($data) && $data['list'] == 100 ? 'selected' : '' }}>100</option> --}}
											</select>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="modal-footer table-bordered">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
							</button>
							<button type="submit" class="btn btn-primary">
								确定
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	{{-- 详情 --}}
	<div class="modal fade" id="showNewsDetail">
		<div class="modal-dialog" style="width: 1500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						新闻详情
					</h4>
				</div>
				<div class="modal-body">
					<div class="dataTables_info" id="news">

					</div>
					<div class="modal-footer table-bordered">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							返回
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var editor = new Simditor({
				textarea: $('#editor'),
			});
		});

		function showNewsDetail(news_id)
		{
			$.getJSON('{{ url('news/getNewsInfo') }}', {news_id: news_id}, function(data) {
				if (data) {	
					$('#news').html(data.description);
					$('#showNewsDetail').modal();
					// $('#advancedFindModal').on('hidden.bs.modal', function () {
					// 	$('#site_id_'+site_id).css('color', '#908f90');
					// });
				}
			});
		}

		function syncSiteInfo(){
			var site_id = $('#showSiteDetailModal_site_id').html();
			$.getJSON('{{ url('site/syncSiteInfo') }}', {site_id: site_id}, function(data){
				showSiteDetailModal(data);
			});
		}

		// $('#showSiteDetailModal_site_name').dblclick(function()
		// {	
		// 	var val = $('#showSiteDetailModal_site_name').html();
		// 	var site_name = 'site_name';
		// 	var site_id = $('#showSiteDetailModal_site_id').html();
		// 	$('#showSiteDetailModal_site_name').html("<input type='text' id='"+site_name+"' name='"+site_name+"' value='"+val+"' class='form-control'>");
		// 	$('#site_name').focus()
		// 	$('#site_name').blur(function() {
		// 		var siteName = $(this).val();
		// 		if (siteName == '') {
		// 			$('#dbName').remove();
		// 			$(this).val('没有数据');
		// 		}else {
		// 			$('#dbName').remove();
		// 			$.post('{{ url('site/getSiteNameInfo') }}', {_token: '{{ csrf_token() }}', site_name: siteName, site_id: site_id}, function (data) {
		// 				$('#showSiteDetailModal_site_name').html(data);
		// 			});
		// 		}
		// 	});
		// });

		$('#closeButton').click(function() {
			var site_device = $('#showSiteDetailModal_devices').html();
			var site_aplist = $('#showSiteDetailModal_aplist').html();
			if(site_device == '' && site_aplist == ''){
				history.go(0);
			}
		});

		function deleteSiteDevice(site_id, device_id)
		{
			$.getJSON('{{ url('site/deleteSiteDevice') }}', {site_id: site_id, device_id: device_id}, function(data)
			{
				if (data)
				{	
					showSiteDetailModal(data);
					$('#showSiteDetailModal_modified').val('1');
				}
			});
		}

		$('#showSiteDetailModal').on('hidden.bs.modal', function () {
			var modified = $('#showSiteDetailModal_modified').val();
			if (modified != 0)
				history.go(0);
		});

		function changeSiteAuthType()
		{
			var site_id = $('#showSiteDetailModal_site_id').html();
			var auth_type = $('input[name=showSiteDetailModal_auth_type]:checked').val();

			$.getJSON('{{ url('site/setSiteAuthType') }}', {site_id: site_id, auth_type: auth_type}, function(data)
			{
				if (data)
				{	
					showSiteDetailModal(data);
					$('#showSiteDetailModal_modified').val('1');
				}
			});
		}

		function changeSiteLoginFlags()
		{
			var site_id = $('#showSiteDetailModal_site_id').html();
			var login_udp_flag = 0;
			var login_radius_flag = 0;

			if ($('#showSiteDetailModal_login_udp_flag').is(":checked"))
				login_udp_flag = 1;
			if ($('#showSiteDetailModal_login_radius_flag').is(":checked"))
				login_radius_flag = 1;

			$.getJSON('{{ url('site/setSiteFlags') }}', {site_id: site_id, login_udp_flag: login_udp_flag, login_radius_flag: login_radius_flag}, function(data)
			{
				if (data)
				{	
					showSiteDetailModal(data);
					$('#showSiteDetailModal_modified').val('1');
				}
			});
		}

		function showDeviceConfig(device_id)
		{
			$.getJSON('{{ url('site/getDeviceConfig') }}', {device_id: device_id}, function(data){
				alert(data);
			})
		}

		function onSiteSelectionChange()
		{
			var a = $("input[name='site_id']:checked");  
			var b = '认证';
			var c = '实名获取';
			var d = '场所号';

			if (a.length > 0)
			{
				b += '<span style="float: right;"><a href="javascript:;" onclick="showChangeSitesAuthTypeModal()"><i class="icon-edit"></i></a></span>';
				c += '<span style="float: right;"><a href="javascript:;" onclick="showChangeSitesLoginFlagsModal()"><i class="icon-edit"></i></a></span>';
				d += '<span style="float: right;"><a href="javascript:;" onclick="deleteSites()"><i class="icon-trash"></i></a></span>';
			}

			$('#th_auth_type').html(b);
			$('#th_login_flags').html(c);
			$('#td_delete_sites').html(d);
		}

		function showChangeSitesAuthTypeModal()
		{
			$('input[name=changeSitesAuthTypeModal_auth_type]').prop('checked', false);
			$('#changeSitesAuthTypeModal').modal();
		}

		function changeSitesAuthType()
		{
			var a = $("input[name='site_id']:checked");
			var v = $('input[name=changeSitesAuthTypeModal_auth_type]:checked').val();

			var site_id='';
			for (i=0;i<a.length;i++)
			{
				if (site_id != '')
					site_id += ',';
				site_id+=a[i].value;
			}

			$.getJSON('{{ url('site/setSiteAuthType') }}', {site_id: site_id, auth_type: v}, function(data){ history.go(0); });
		}

		function showChangeSitesLoginFlagsModal()
		{
			$('#changeSitesLoginFlagsModal_login_udp_flag').prop('checked', false);
			$('#changeSitesLoginFlagsModal_login_radius_flag').prop('checked', false);
			$('#changeSitesLoginFlagsModal').modal();
		}

		function changeSitesLoginFlags()
		{
			var a = $("input[name='site_id']:checked");
			var site_id='';
			for (i=0;i<a.length;i++)
			{
				if (site_id != '')
					site_id += ',';
				site_id+=a[i].value;
			}

			var login_udp_flag = 0;
			var login_radius_flag = 0;

			if ($('#changeSitesLoginFlagsModal_login_udp_flag').is(":checked"))
				login_udp_flag = 1;
			if ($('#changeSitesLoginFlagsModal_login_radius_flag').is(":checked"))
				login_radius_flag = 1;

			$.getJSON(
				'{{ url('site/setSiteFlags') }}', {site_id: site_id, login_udp_flag: login_udp_flag, login_radius_flag: login_radius_flag}, function(data){
				history.go(0);
			});
		}

		function deleteSites(){
			var a = $("input[name='site_id']:checked");  
			var sites = "";

			for (var i=0; i<a.length;i++)
			{
				if (sites != "")
					sites += ",";
				sites += a[i].value;  
			}
			if (confirm('确定删除选择的场所?') == false)
				return false;

			$.getJSON('{{ url('site/deleteSites') }}', {sites: sites}, function(data){
				alert('场所'+sites+'删除成功');
				location.reload();
			});
		}
	</script>
@stop
