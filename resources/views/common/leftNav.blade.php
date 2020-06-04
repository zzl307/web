<style>
	#sidebar{
		width: 206px;
	}
	#sidebar ul#nav ul.sub-menu a{
		padding: 12px 15px 12px 46px;
	}
	#content{
        margin-left: 206px;
    }
    .table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td{
        vertical-align: middle;
    }
</style>

<!-- 左侧导航栏 -->
<ul id="nav">
	<li class="@if(Request::segment(1) == 'system') current @endif">
		<a href="javascript:void(0)">
			<i class="icon-dashboard">
			</i>
			系统设置
		</a>
		<ul class="sub-menu">
			<li class="{{Request::segment(2) == 'banner' ? 'current' : ''}}">
				<a href="{{ url('system/banner') }}">
					<i class="icon-caret-right">
					</i>
					网站Banner
				</a>
			</li>
			<li class="{{Request::segment(2) == 'keyword' ? 'current' : ''}}">
				<a href="{{ url('system/keyword') }}">
					<i class="icon-caret-right">
					</i>
					网站优化
				</a>
			</li>
		</ul>
	</li>
	<li class="@if(Request::segment(1) == 'news') current @endif">
		<a href="javascript:void(0)">
			<i class="icon-building">
			</i>
			新闻管理
		</a>
		<ul class="sub-menu">
			<li class="{{Request::segment(2) == 'index' ? 'current' : ''}}">
				<a href="{{ url('news/index') }}">
					<i class="icon-caret-right">
					</i>
					新闻列表
				</a>
			</li>
			<li class="{{Request::segment(2) == 'category' ? 'current' : ''}}">
				<a href="{{ url('news/category') }}">
					<i class="icon-caret-right">
					</i>
					新闻分类
				</a>
			</li>
		</ul>
	</li>
	
	<li class="{{Request::segment(1) == 'user' ? 'current' : ''}}">
		<a href="javascript:void(0);">
			<i class="icon-group">
			</i>
			用户管理
		</a>
		<ul class="sub-menu">
			<li class="{{Request::segment(2) == 'list' ? 'current' : ''}}">
				<a href="{{ url('user/list') }}">
					<i class="icon-caret-right">
					</i>
					用户列表
				</a>
			</li>
			<li class="{{Request::segment(2) == 'roles' ? 'current' : ''}}">
				<a href="{{url('user/roles')}}">
					<i class="icon-caret-right">
					</i>
					角色设置
				</a>
			</li>
			<li class="{{Request::segment(2) == 'permission' ? 'current' : ''}}">
				<a href="{{url('user/permission')}}">
					<i class="icon-caret-right">
					</i>
					权限设置
				</a>
			</li>
		</ul>
	</li>
</ul>
