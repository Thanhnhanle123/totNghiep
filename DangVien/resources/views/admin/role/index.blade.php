@extends('layouts.admin')

@section('title')
    Vai trò
@endsection


@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Vai trò', 'title' => 'danh sách','route' => 'role.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @can('role-add')
                    <a href="{{ route('role.create') }}" class="btn btn-success m-2 float-right">THÊM</a>
                @endcan
                @can('permission-list')
                    <a href="{{ route('permission.create') }}" class="btn btn-success m-2 float-right">SỰ CHO PHÉP</a>
                @endcan
            </div>
            @can('role-list')
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="canGiua">id</th>
                            <th scope="col">name</th>
                            <th scope="col">vai trò</th>
                            @can('role-edit')
                            <th scope="col" class="canGiua">Sữa</th>
                            @endcan
                            @can('role-delete')
                            <th scope="col" class="canGiua">Xóa</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <th scope="row" class="canGiua">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            @can('role-edit')
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('role.edit',['id' => $role->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                            @endcan
                            @can('role-delete')
                                <td class="canGiua">
                                    <a class="btn btn-danger action_delete" data-url="{{ route('role.delete',['id' => $role->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            @endcan
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    {{$roles->links()}}
                </div>
            @endcan
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection






