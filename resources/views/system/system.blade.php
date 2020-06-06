@extends('common.layouts')

@section('style')
    
@endsection

@section('menu')
	网站优化
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
						网站优化
					</h4>
					<div class="toolbar no-padding">
						<div class="btn-group">
							<span class="btn btn-xs widget-refresh">
								<i class="icon-refresh">
								</i>
								刷新
                            </span>
						</div>
					</div>
				</div>
				
                <div class="widget-content">
                    <form class="form-horizontal row-border" action="{{ route('system.keyword') }}" method="post">
			
						{{ csrf_field() }}

						<input type="hidden" name="id" value="{{ $data->id }}">
						<table class="table table-hover table-striped table-bordered table-highlight-head">
							<tbody>
								<tr>
									<td class="col-md-2">
										网站Title
									</td>
									<td>
										<div class="col-md-10">
											<textarea rows="3" cols="5" name="title" class="limited form-control" data-limit="80" required>{{ $data->title }}</textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td class="col-md-2">
										网站Keyword
									</td>
									<td>
										<div class="col-md-10">
											<textarea rows="5" cols="5" name="keyword" class="limited form-control" data-limit="100" required>{{ $data->keyword }}</textarea>
										</div>
									</td>
								</tr>
								<tr>
									<td class="col-md-2">
										网站Description
									</td>
									<td>
										<div class="col-md-10">
											<textarea rows="8" cols="5" name="description" class="limited form-control" data-limit="200" required>{{ $data->description }}</textarea>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="modal-footer table-bordered">
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
