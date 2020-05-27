@extends('common.layouts')

@section('style')
    
@endsection

@section('menu')
    系统设置
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">

			@include('common.message')
			
			<div class="widget box">
				<div class="widget-header">
					<h4>
						<i class="icon-reorder">
						</i>
						Banner管理
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
									发布Banner
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
								<input class="form-control" name="key" value="" type="text" placeholder="Banner名称">
							</div>
							<div class="col-md-2" style="margin-left: -15px;">
								<select class="select2-select-00 col-md-12 full-width-fix" name="type">
									<option value="0" selected>全部</option>
									<option value="1" >已发布</option>
									<option value="2" >未发布</option>
								</select>
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
                                    BannerID
                                </th>
                                <th class="col-md-2">
                                    Banner名称
                                </th>
                                <th class="col-md-3">
                                    详情
                                </th>
                                <th>
                                    发布状态
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
                                        {{ $vo->id }}
                                    </td>
                                    <td>
                                        {{ $vo->title }}
                                    </td>
                                    <td>
                                        <img class="thumbnail img-responsive" src="{{ $vo->avatar }}" style="width:500px; height:80px;" />
                                    </td>
                                    <td>
                                        <span class="label label-danger">
											{{ \App\Banners::status($vo->status) }}
										</span>
                                    </td>
                                    <td>
                                        {{ $vo->created_at }}
                                    </td>
                                    <td>
                                        {{ $vo->updated_at }}
                                    </td>
									<td>
										<a onclick="storeStatus('{{ $vo->id }}')" class="btn btn-xs bs-tooltip" title="修改发布状态">
											<i class="icon-edit">
											</i>
										</a>
										<a onclick="deleteDanners('{{ $vo->id }}')" class="btn btn-xs bs-tooltip" title="删除">
											<i class="icon-trash">
											</i>
										</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
					</table>
                </div>
                @if (isset($paginator))
                    <div class="dataTables_footer clearfix" style="padding: 12px 0;border-top: 1px solid #ddd;">
                        <div class="col-md-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                {{-- @if(isset($paginator))
                                    {{ $paginator->links() }}
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @endif
			</div>
		</div>
	</div>

	{{-- 发布Banner --}}
	<div class="modal fade" id="advancedSearchModal">
		<div class="modal-dialog" style="width: 1200px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						发布Banner
					</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal row-border" action="{{ route('banner.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

						{{ csrf_field() }}

                        <input type="hidden" name="id" value="">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td>
										Banner名称
									</td>
									<td>
										<div class="col-md-6">
											<input class="form-control" name="title" value="" type="text" placeholder="Banner名称" required>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										发布状态
									</td>
									<td>
										<div class="col-md-6">
											<select class="select2-select-00 col-md-12 full-width-fix" name="status">
                                                <option value="1" selected>发布</option>
                                                <option value="2">不发布</option>
                                            </select>
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
    
    {{-- 修改状态 --}}
    <div class="modal fade" id="storeStatus">
		<div class="modal-dialog" style="width: 700px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title">
						修改发布状态
					</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal row-border" action="{{ route('banner.store') }}" method="post">

						{{ csrf_field() }}

						<input type="hidden" name="id" id="id" value="">
						<input type="hidden" name="avatar" id="avatar" value="">
						<input type="hidden" name="title" id="title" value="">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td class="col-md-2">
										发布状态
									</td>
									<td class="col-md-6">
										<div id="status_store">
											<select class="select2-select-00 col-md-12 full-width-fix" name="status" id="status">
                                                
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
	<script type="text/javascript">
		function deleteDanners(id){
			if (confirm('确定删除选择的场所?') == false) {
				return false;
			}

			$.getJSON('{{ route('banner.deleteDanners') }}', {id: id}, function(data){
				if (data == 1) {
					alert('删除成功');
					location.reload();
				}
			});
		}

		function storeStatus(id){
			$.getJSON('{{ url('system/storeStutas') }}', {id: id}, function(data){
                if(data.status == 1){
                    var option = '<option value="1" selected>发布</option>';
                        option += '<option value="2">不发布</option>';
                    var title = '发布';
                }else{
                    var option = '<option value="1">发布</option>';
                        option += '<option value="2" selected>不发布</option>';
                    var title = '未发布';
                }
                $('#id').val(data.id);
                $('#status').html(option);
                $('#status_store .select2-chosen').html(title);
                $('#avatar').val(data.avatar);
                $('#title').val(data.title);

                $('#storeStatus').modal();
			});
		}
	</script>
@stop
