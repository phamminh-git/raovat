@extends('adminlte::page')

@section('title', 'User manage')

@section('content_header')
	<h1>Danh sach user</h1>
@stop

@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title">User list</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th style="width: 10px">#</th>
			<th>Username</th>
            <th style="width: 40px">Trang thai</th>
			<th style="width: 40px"></th>
		  </tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
                <td>{{$loop->iteration}}</td>
				<td>{{$user->username}}</td>
                <td>
                    @if (!$user->blocked)
                    <span class="badge bg-danger">Da khoa</span>
                    @else
                    <span class="badge bg-success">Dang hoat dong</span>
                    @endif
                </td>
				<td>
                    @if (!$user->blocked)
                    <form action="{{ route('admin.blockUser', ['user'=> $user]) }}">
                        <button class="btn btn-default btn-sm" type="submit">Block</button>
                    </form>
                    @else
                    <form action="{{ route('admin.unblockUser', ['user'=> $user]) }}">
                        <button class="btn btn-default btn-sm" type="submit">Unblock</button>
                    </form>
                    @endif

                </td>
			</tr>
			@endforeach
		</tbody>
	  </table>
	</div>
	<!-- /.card-body -->
	<div class="card-footer clearfix">
	  <ul class="pagination pagination-sm m-0 float-right">
		<li class="page-item"><a class="page-link" href="#">«</a></li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">»</a></li>
	  </ul>
	</div>
  </div>
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
	<script> console.log('Hi!'); </script>
@stop
