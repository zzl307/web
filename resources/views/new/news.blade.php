@extends('common.layouts')

@section('style')
	<link href="{{ asset('static/css/city-picker.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
		.simditor-body img {
			max-width:100%;
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
                            <a data-toggle="modal" onclick="storeNews()" style="text-decoration: none;float: right;">
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
								<th class="col-md-2">
									描述
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
										<a onclick="showNewsDetail('{{ $vo['id'] }}')" class="btn btn-xs bs-tooltip" title="详情" id="news_id_{{ $vo['id'] }}">
											<i class="icon-eye-open"></i>
										</a>
										<a onclick="storeNews('{{ $vo['id'] }}')" class="btn btn-xs bs-tooltip" title="修改">
											<i class="icon-edit">
											</i>
										</a>
										<a onclick="deleteNews('{{ $vo['id'] }}')" class="btn btn-xs bs-tooltip" title="删除">
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
                            <strong>总计：{{ $total }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_paginate paging_bootstrap">
                            @if(isset($paginator))
                                {{ $paginator->links() }}
                            @endif
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
					<form class="form-horizontal row-border" action="{{ route('news.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

						{{ csrf_field() }}

						<input type="hidden" name="id" id="id" value="">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td>
										新闻标题
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="title" id="title" value="" type="text" placeholder="新闻标题" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻关键词
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="keyword" id="keyword" value="" type="text" placeholder="已逗号隔开" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻描述
									</td>
									<td>
										<div class="col-md-6">
											<textarea rows="8" cols="5" name="description" id="description" class="limited form-control" data-limit="200" required></textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻分类
									</td>
									<td>
										<div class="col-md-6">
											<select class="select2-select-00 col-md-12 full-width-fix" name="cid" id="cid" required>
												@foreach ($type as $vo)
													<option value="{{ $vo['id'] }}">{{ $vo['title'] }}</option>
												@endforeach
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="col-md-1">
										新闻详情
									</td>
									<td class="col-md-12">
										<div class="col-md-12">
											<textarea rows="15" cols="5" id="editor" name="content" class="form-control" required>{{ isset($data['content']) ? $data['content'] : '' }}</textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										新闻封面
									</td>
									<td>
										<div class="col-md-6">
											<input type="file" name="avatar" class="form-control-file" required>
											{{-- @if($data['avatar']) --}}
												<br>
												<img class="thumbnail img-responsive" id="avatar" src="" width="200" />
											{{-- @endif --}}
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
					<div class="col-md-12" id="news">

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
				toolbar: ['title', 'bold','italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'code', 'table', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment'],
				upload: {
					url: '{{ route('news.upload_image') }}',
					params: {
						_token: '{{ csrf_token() }}'
					},
					fileKey: 'upload_file',
					connectionCount: 3,
					leaveConfirm: '文件上传中，关闭此页面将取消上传。'
				},
				pasteImage: true,
			});
		});

		function showNewsDetail(news_id)
		{
			$.getJSON('{{ url('news/getNewsInfo') }}', {news_id: news_id}, function(data) {
				if (data) {	
					$('#news').html(data.content);
					$('#showNewsDetail').modal();
				}
			});
		}

		function deleteNews(id){
			if (confirm('确定删除选择的场所?') == false) {
				return false;
			}

			$.getJSON('{{ url('news/deleteNews') }}', {id: id}, function(data){
				if (data == 1) {
					alert('删除成功');
					location.reload();
				}
			});
		}

		function storeNews(id){
			$.getJSON('{{ url('news/newStore') }}', {id: id}, function(data){
				if(data == 1){
					$('#title').val('');
					$('#keyword').val('');
					$('#description').html();
					$('.simditor-body').html('');
					$('#avatar').attr('src', '');
					$('#id').val('');
					$('#editor').val('');

					$('#advancedSearchModal').modal();
				}else{
					$('#title').val(data.title);
					$('#keyword').val(data.keyword);
					$('#description').html(data.description);
					$('.simditor-body').html(data.content);
					$('#avatar').attr('src', data.avatar);
					$('#id').val(data.id);
					$('#editor').val(data.content);
					$(".select2-select-00").append("<option value="+data.cid+" selected>"+data.new_type+"</option>");
					$(".select2-select-00").trigger('change');

					$('#advancedSearchModal').modal();
				}
			});
		}
	</script>
@stop
