@extends('common.layouts')

@section('style')
	<link href="{{ asset('static/css/city-picker.css') }}" rel="stylesheet" type="text/css" />
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
	新闻分类
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
						新闻分类
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
									新建分类
								</span>
							</a>
						</div>
					</div>
				</div>
				
				<div class="widget-content no-padding">
					<form class="form-horizontal" action="{{ url('site/index') }}" method="get">
						<input type="hidden" name="area" value="">
						<div class="form-group" style="margin-top: 15px;">
	   						<div class="col-md-2">
								<input class="form-control" name="key" value="" type="text" placeholder="分类名称">
							</div>
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
                                    分类ID
                                </th>
                                <th class="col-md-2">
                                    分类名称
                                </th>
                                <th id="th_auth_type" class="col-md-2">
                                    所属分类
								</th>
								<th>
                                    发布状态
                                </th>
                                <th>
                                    分类新闻数
								</th>
                                <th>
                                    更新时间
                                </th>
                                <th>
                                    发布时间
                                </th>
								<th>
									
								</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginator as $vo)
                                <tr>
                                    <td>
                                        {{ $vo['id'] }}
                                    </td>
                                    <td>
                                        {{ $vo['name'] }}
                                    </td>
                                    <td>
                                        <span class="label label-danger">
											{{ $vo['cid_name'] }}
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
										{{-- <a href="" class="btn btn-xs bs-tooltip" title="详情"><i class="icon-eye-open"></i></a> --}}
										<a href="" class="btn btn-xs bs-tooltip" title="修改">
											<i class="icon-edit">
											</i>
										</a>
										<a href="" class="btn btn-xs bs-tooltip" title="删除" onclick="if(confirm('确定删除?') == false) return false;">
											<i class="icon-trash">
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
                            <strong>总计： {{ $total }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_paginate paging_bootstrap">
                            @if(isset($paginator))
                                {{ $paginator->render() }}
							@endif
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="advancedSearchModal">
		<div class="modal-dialog" style="width: 1200px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						新建分类
					</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal row-border" action="{{ route('news.categoryStore') }}" method="post">

						{{ csrf_field() }}

						<input type="hidden" name="id" value="{{ isset($data['id']) ? $data['id'] : '' }}">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td>
										分类名称
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="name" value="" type="text" placeholder="分类名称" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										所属分类
									</td>
									<td>
										<div class="col-md-6">
											<select class="select2-select-00 col-md-12 full-width-fix" name="cid" required>
												<option value="1" selected>一级分类</option>
												@foreach ($data as $vo)
													<option value="{{ $vo['cid'] }}" {{ isset($vo) && $vo['cid'] == 1 ? 'selected' : '' }}>{{ $vo['name'] }}</option>
												@endforeach
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
@stop

@section('javascript')
	<script src="{{ asset('static/js/city-picker.data.js') }}"></script>
	<script src="{{ asset('static/js/city-picker.js') }}"></script>
	<script src="{{ asset('static/js/main.js') }}"></script>
	<script type="text/javascript">
		function showSiteDetailModal(data)
		{
			var rows = "";
			var html = "";

			if(data.sync_time == '0000-00-00 00:00:00'){
				$('#showSiteDetailModal_timestamp').html('null');
			}else{
				$('#showSiteDetailModal_timestamp').html(data.sync_time);
			}
		    if(data.sync_status == 1){
		    	$('#showSiteDetailModal_sync_status').html('<span class="label label-success">更新成功</span>');
		    }else if(data.sync_status == 0){
		    	$('#showSiteDetailModal_sync_status').html('<span class="label label-warning">没有数据</span>');
		    }else{
		    	$('#showSiteDetailModal_sync_status').html('<span class="label label-danger">更新失败</span>');
		    }

			$('#showSiteDetailModal_site_id').html(data.site_id);
			$('#showSiteDetailModal_site_name').html(data.site_name);
			$('#showSiteDetailModal_site_area').html(data.site_area);

			if (data.auth_type == 1)
				$('#showSiteDetailModal_auth_type_1').prop('checked', true);
			else if (data.auth_type == 2)
				$('#showSiteDetailModal_auth_type_2').prop('checked', true);
			else if (data.auth_type == 3)
				$('#showSiteDetailModal_auth_type_3').prop('checked', true);
			else
				$('#showSiteDetailModal_auth_type_0').prop('checked', true);

			$("input[name='showSiteDetailModal_auth_type']").prop('disabled', true);
			@can('site_manage')
				$("input[name='showSiteDetailModal_auth_type']").prop('disabled', false);
			@endcan

			$('#showSiteDetailModal_ip_address').html(data.ip_address);
			$('#showSiteDetailModal_online_users').html(data.online_users);
			$('#showSiteDetailModal_update_time').html(datetime(data.update_time));
			$('#showSiteDetailModal_gateway_mac').html(data.gateway_mac);
			if (data.update_time + 600 > data.timestamp)
				$('#showSiteDetailModal_update_time').append("&nbsp;<span class='label label-success'>在线</span>");
			else
				$('#showSiteDetailModal_update_time').append("&nbsp;<span class='label label-danger'>离线</span>");

			$('#showSiteDetailModal_login_query_rcvd').html(data.stats.login_query_rcvd);
			$('#showSiteDetailModal_login_query_failed').html(data.stats.login_query_failed);
			$('#showSiteDetailModal_login_udp_rcvd').html(data.stats.login_udp_rcvd);
			$('#showSiteDetailModal_login_portal_rcvd').html(data.stats.login_portal_rcvd);
			$('#showSiteDetailModal_login_radius_auth_rcvd').html(data.stats.login_radius_auth_rcvd);
			$('#showSiteDetailModal_login_radius_acct_rcvd').html(data.stats.login_radius_acct_rcvd);
			$('#showSiteDetailModal_login_vendor_rcvd').html(data.stats.login_vendor_rcvd);
			$('#showSiteDetailModal_login_center_rcvd').html(data.stats.login_center_rcvd);
			$('#showSiteDetailModal_login_center_failed').html(data.stats.login_center_failed);
			$('#showSiteDetailModal_login_cached_rcvd').html(data.stats.login_cached_rcvd);

			$('#showSiteDetailModal_login_udp_flag').prop('checked', false);
			if (data.login_udp_flag > 0)
				$('#showSiteDetailModal_login_udp_flag').prop('checked', true);

			$('#showSiteDetailModal_login_radius_flag').prop('checked', false);
			if (data.login_radius_flag > 0)
				$('#showSiteDetailModal_login_radius_flag').prop('checked', true);

			$('#showSiteDetailModal_login_udp_flag').prop('disabled', true);
			$('#showSiteDetailModal_login_radius_flag').prop('disabled', true);
			@can('site_manage')
				$('#showSiteDetailModal_login_udp_flag').prop('disabled', false);
				$('#showSiteDetailModal_login_radius_flag').prop('disabled', false);
			@endcan

			rows = "";
			html = "";
			for (var i=0; i<data.devices.length; i++)
			{
				if (data.devices[i].devtype == 'secdev')
				{
					rows += "<tr>";
					rows += "<td>";
					rows += "<a href='javascript:;' style='color: #555;' onclick=\"showDeviceConfig('" + data.devices[i].device_id + "')\">" + data.devices[i].device_id + "</a>";
					rows += "</td>";
					rows += "<td>" + data.devices[i].version + "</td>";
					rows += "<td>" + data.devices[i].vendor + "</td>";
					rows += "<td>" + data.devices[i].modal + "</td>";
					rows += "<td>" + datetime(data.devices[i].update_time) + "</td>";
					rows += "<td>";
					if (data.devices[i].registered == 1)
					{
						rows += "<span style='float: right;'><i class='icon-star'></i></span>";
					}
					else
					{
						@can('site_manage')
							rows += "<span style='float: right;'><a href='javascript:;' onclick=\"deleteSiteDevice('"+data.site_id+"', '"+data.devices[i].device_id+"')\"><i class='icon-trash'></span>";
						@endcan
					}
					rows += "</td>";
					rows += "</tr>";
				}
			}
			if (rows != "")
			{
				html += "<table class='table table-highlight-head'>";
				html += "<thead>";
				html += "<tr>";
				html += "<th class='col-md-2'>设备号</th>";
				html += "<th class='col-md-2'>版本</th>";
				html += "<th class='col-md-2'>设备类型</th>";
				html += "<th class='col-md-2'>设备型号</th>";
				html += "<th class='col-md-2'>在线时间</th>";
				html += "<th class='col-md-2'></th>";
				html += "</tr>";
				html += "</thead>";
				html += "<tbody>" + rows + "</tbody>";
			}
			$('#showSiteDetailModal_devices').html(html);

			rows = "";
			html = "";
			for (var i=0; i<data.devices.length; i++)
			{
				if (data.devices[i].devtype == 'ap')
				{
					rows += "<tr>";
					rows += "<td>" + data.devices[i].device_id + "</td>";
					rows += "<td>" + data.devices[i].vendor + "</td>";
					rows += "<td>" + data.devices[i].modal + "</td>";
					rows += "<td>" + datetime(data.devices[i].last_user_time) + "</td>";
					if (data.update_time + 600 < data.timestamp)
						rows += "<td>" + data.devices[i].login_rcvd + "</td>";
					else if (data.devices[i].last_user_time + 36000 >= data.timestamp)
						rows += "<td>" + data.devices[i].login_rcvd + "</td>";
					else
						rows += "<td><span class='label label-warning'>异常</td>";
					rows += "<td>" + datetime(data.devices[i].last_wls_time) + "</td>";
					if (data.update_time + 600 < data.timestamp)
						rows += "<td>" + data.devices[i].wls_rcvd + "</td>";
					else if (data.devices[i].last_wls_time + 3600 >= data.timestamp)
						rows += "<td>" + data.devices[i].wls_rcvd + "</td>";
					else
						rows += "<td><span class='label label-warning'>异常</td>";
					rows += "<td>";
					if (data.devices[i].registered == 1)
					{
						rows += "<span style='float: right;'><i class='icon-star'></i></span>";
					}
					else
					{
						@can('site_manage')
							rows += "<span style='float: right;'><a href='javascript:;' onclick=\"deleteSiteDevice('"+data.site_id+"', '"+data.devices[i].device_id+"')\"><i class='icon-trash'></span>";
						@endcan
					}
					rows += "</td>";
					rows += "</tr>";
				}
			}
			if (rows != "")
			{
				html += "<table class='table table-highlight-head'>";
				html += "<thead>";
				html += "<tr>";
				html += "<th class='col-md-2'>APMAC</th>";
				html += "<th>设备类型</th>";
				html += "<th>设备型号</th>";
				html += "<th class='col-md-2'>实名时间</th>";
				html += "<th>实名数据量</th>";
				html += "<th class='col-md-2'>感知时间</th>";
				html += "<th>感知数据量</th>";
				html += "<th></th>";
				html += "</tr>";
				html += "</thead>";
				html += "<tbody>" + rows + "</tbody>";
			}
			$('#showSiteDetailModal_aplist').html(html);

			html = "";
			html += "<table class='table table-highlight-head'>";
			html += "<thead>";
			html += "<tr>";
			html += "<th style='text-align: center;'>用户实名</th>";
			html += "<th style='text-align: center;'>虚拟身份</th>";
			html += "<th style='text-align: center;'>上网数据</th>";
			html += "<th style='text-align: center;'>上网日志</th>";
			html += "<th style='text-align: center;'>无线嗅探</th>";
			html += "</tr>";
			html += "</thead>";
			html += "<tbody>";
			html += "<tr>";
			html += "<td style='text-align: center;'>" + datetime(data.last_user_time) + "</td>";
			html += "<td style='text-align: center;'>" + datetime(data.last_vid_time) + "</td>";
			html += "<td style='text-align: center;'>" + datetime(data.last_data_time) + "</td>";
			html += "<td style='text-align: center;'>" + datetime(data.last_conn_time) + "</td>";
			html += "<td style='text-align: center;'>" + datetime(data.last_wls_time) + "</td>";
			html += "</tr>";
			if (data.update_time + 600 > data.timestamp)
			{
				html += "<tr>";
				html += "<td style='text-align: center;'>" + (data.last_user_time + 3600 > data.timestamp ? "<span class='label label-success'>正常</span>" : "<span class='label label-warning'>异常</span>") + "</td>";
				html += "<td style='text-align: center;'>" + (data.last_vid_time + 3600 > data.timestamp ? "<span class='label label-success'>正常</span>" : "<span class='label label-warning'>异常</span>") + "</td>";
				html += "<td style='text-align: center;'>" + (data.last_data_time + 3600 > data.timestamp ? "<span class='label label-success'>正常</span>" : "<span class='label label-warning'>异常</span>") + "</td>";
				html += "<td style='text-align: center;'>" + (data.last_conn_time + 3600 > data.timestamp ? "<span class='label label-success'>正常</span>" : "<span class='label label-warning'>异常</span>") + "</td>";
				html += "<td style='text-align: center;'>" + (data.last_wls_time + 600 > data.timestamp ? "<span class='label label-success'>正常</span>" : "<span class='label label-warning'>异常</span>") + "</td>";
				html += "</tr>";
			}
			html += "</tbody>";
			html += "</table>";
			$('#showSiteDetailModal_status').html(html);

			html = "";
			html += "<table class='table table-highlight-head'>";
			html += "<thead>";
			html += "<tr>";
			html += "<th colspan='2'></th>";
			html += "<th style='text-align: center;'>用户登录</th>";
			html += "<th style='text-align: center;'>用户登出</th>";
			html += "<th style='text-align: center;'>虚拟身份</th>";
			html += "<th style='text-align: center;'>上网数据</th>";
			html += "<th style='text-align: center;'>上网日志</th>";
			html += "<th style='text-align: center;'>无线嗅探</th>";
			html += "</tr>";
			html += "</thead>";
			html += "<tbody>";
			html += "<tr>";
			html += "<td rowspan='2' style='vertical-align: middle;'>审计</td>";
			html += "<td>接收</td>";
			html += "<td style='text-align: center;'>" + data.stats.login_rcvd + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.logout_rcvd + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.vid_rcvd + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.data_rcvd + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.conn_rcvd + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.wls_rcvd + "</td>";
			html += "</tr>";
			html += "<tr>";
			html += "<td>发送</td>";
			html += "<td style='text-align: center;'>" + data.stats.login_sent + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.logout_sent + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.vid_sent + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.data_sent + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.conn_sent + "</td>";
			html += "<td style='text-align: center;'>" + data.stats.wls_sent + "</td>";
			html += "</tr>";
			for (var i=0; i<data.vendors.length; i++)
			{
				html += "<tr>";
				html += "<td rowspan='2' style='vertical-align: middle;'>" + data.vendors[i].vendor + "</br>" + data.vendors[i].server + "</td>";
				html += "<td>接收</td>";
				if(data.vendors[i].login_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].login_rcvd + "</td>";
				}
				if(data.vendors[i].logout_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].logout_rcvd + "</td>";
				}
				if(data.vendors[i].vid_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].vid_rcvd + "</td>";
				}
				if(data.vendors[i].data_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].data_rcvd + "</td>";
				}
				if(data.vendors[i].conn_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].conn_rcvd + "</td>";
				}
				if(data.vendors[i].wls_rcvd == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].wls_rcvd + "</td>";
				}
				html += "</tr>";
				html += "<tr>";
				html += "<td>发送</td>";
				if(data.vendors[i].login_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].login_sent + "</td>";
				}
				if(data.vendors[i].logout_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].logout_sent + "</td>";
				}
				if(data.vendors[i].vid_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].vid_sent + "</td>";
				}
				if(data.vendors[i].data_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].data_sent + "</td>";
				}
				if(data.vendors[i].conn_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].conn_sent + "</td>";
				}
				if(data.vendors[i].wls_sent == -1){
					html += "<td style='text-align: center;'>N/A</td>";
				}else{
					html += "<td style='text-align: center;'>" + data.vendors[i].wls_sent + "</td>";
				}
				html += "</tr>";
			}
			html += "</tbody>";
			html += "</table>";
			$('#showSiteDetailModal_stats').html(html);

			$('#showSiteDetailModal').modal();
		}

		function showSiteDetail(site_id)
		{
			$.getJSON('{{ url('site/getSiteInfo') }}', {site_id: site_id}, function(data)
			{
				if (data)
				{	
					showSiteDetailModal(data);
					$('#showSiteDetailModal').on('hidden.bs.modal', function () {
						$('#site_id_'+site_id).css('color', '#908f90');
					});
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
