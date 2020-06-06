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
                                <th>
                                    分类名称
								</th>
								<th class="col-md-3">
                                    分类关键词
								</th>
								<th class="col-md-3">
                                    分类描述
                                </th>
                                <th id="th_auth_type">
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
                                        {{ $vo['title'] }}
									</td>
									<td>
                                        {{ $vo['keyword'] }}
									</td>
									<td>
                                        {{ $vo['description'] }}
									</td>
                                    <td>
                                        <span class="label label-info">
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
										<div class="col-md-12">
											<input class="form-control" name="title" value="" type="text" placeholder="分类名称" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										分类关键词
									</td>
									<td>
										<div class="col-md-12">
											<input class="form-control" name="keyword" value="" type="text" placeholder="分类名称" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										分类描述
									</td>
									<td>
										<div class="col-md-12">
											<textarea rows="3" cols="5" name="description" id="description" class="limited form-control" data-limit="200" required></textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										所属分类
									</td>
									<td>
										<div class="col-md-12">
											<select class="select2-select-00 col-md-12 full-width-fix" name="cid" required>
												<option value="0" selected>一级分类</option>
												@foreach ($data as $vo)
													<option value="{{ $vo['id'] }}" {{ isset($vo) && $vo['id'] == 1 ? 'selected' : '' }}>{{ $vo['title'] }}</option>
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
	
@stop
