@extends('layouts.admin')

@section('title')
    Quản trị viên
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/quantrivien/index.css') }}">
@endsection

@section('Content')
    <div class="content-wrapper">
    @include('partials.content_header',['name' => 'Quản trị viên', 'title' => 'danh sách','route' => 'quantrivien.danhsach'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="inDam">Danh sách</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="canGiua">STT</th>
                                                <th scope="col">Tên đăng nhập</th>
                                                <th scope="col">mật khẩu</th>
                                                <th scope="col">Tên người dùng</th>
                                                <th scope="col">Ảnh đại diện</th>
                                                <th scope="col">Vai trò</th>
                                                @can('user-edit')
                                                <th scope="col" class="canGiua">Sữa</th>
                                                @endcan
                                                @can('user-delete')
                                                <th scope="col" class="canGiua">Xóa</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach ($user as $u)
                                            <tr>
                                                <th scope="row" class="canGiua {{ Auth::user()->id == $u->id ? "Login" : "" }}">
                                                    {{$i}}
                                                </th>
                                                <td>{{$u->userName}}</td>
                                                <td>{{$u->password_show}}</td>
                                                <td>{{$u->tenNguoiDung}}</td>
                                                <td>
                                                    <img src="{{$u->file_path}}" alt="Ảnh đại diện" class="avt">
                                                </td>
                                                <td class="">
                                                    <?php
                                                        foreach ($roleOfUser as $key => $roleOfUserItem) {
                                                            if($u->id === $roleOfUserItem->user_id){
                                                                foreach ($roles as $key => $role) {
                                                                    if($role->id === $roleOfUserItem->role_id){
                                                                        echo $role->name." ";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </td>
                                                @can('user-edit')
                                                    <td class="canGiua">
                                                        <a class="btn btn-primary" href="{{ route('quantrivien.edit',['id' => $u->id]) }}"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                @endcan
                                                @can('user-delete')
                                                    <td class="canGiua">
                                                        @if (Auth::user()->id != $u->id)
                                                            <a class="btn btn-danger action_delete" data-url="{{ route('quantrivien.delete',['id' => $u->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                                        @endif
                                                    </td>
                                                @endcan
                                            </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {{$user->links()}}
                            </div>
                        </div>
                    </div>
                    @can('user-add')
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="inDam">Thêm quản trị viên</h3>
                                </div>
                                <div class="col-lg-9">
                                    <form action="{{ route('quantrivien.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">user name</label>
                                            <input type="text" class="form-control" name="userName" placeholder="Nhập mã quản trị viên" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">mật khẩu quản trị viên</label>
                                            <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu quản trị viên" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tên người dùng</label>
                                            <input type="text" class="form-control" name="tenNguoiDung" placeholder="Nhập tên người dùng" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Vai trò</label>
                                            <br>
                                            <select name="role_id[]" id="" multiple="multiple" class="form-control select2">
                                                <option value=""></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ảnh đại diện</label>
                                            <input type="file" class="form-control-file" name="file_anh">
                                        </div>
                                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <!-- /.row -->
            </div>
        <!-- /.content -->
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
{{-- // In your Javascript (external .js resource or <script> tag) --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                tokenSeparators: [',']
            });
        });
    </script>
@endsection




