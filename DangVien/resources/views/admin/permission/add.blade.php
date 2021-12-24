@extends('layouts.admin')

@section('title')
    Sự cho phép
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/permission/add/add.css') }}">
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Sự cho phép', 'title' => 'danh sách','route' => 'permission.create'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @can('permission-add')
                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tên permission</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Nhập tên permission"
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-label">key code</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="key_code"
                                    placeholder="Nhập key code"
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-label">permission cha</label>
                                <select class="form-control select2"  name="parent_id" id="">
                                    <option value="0"></option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary m-2">Submit</button>
                        </div>
                    </form>
                @endcan

                @can('permission-list')
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên permission</th>
                                    <th scope="col">key code</th>
                                    <th scope="col" class="canGiua">Sữa</th>
                                    <th scope="col" class="canGiua">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                        <th scope="row">{{ $permission->id }}</th>
                                        <td>{{ $permission->parent_id != 0 ? '-' : ''}}{{$permission->name }}</td>
                                        <td>{{ $permission->key_code }}</td>
                                        <td class="canGiua">
                                            <a class="btn btn-primary" href="{{ route('permission.edit',['id' => $permission->id]) }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td class="canGiua">
                                            <a class="btn btn-danger action_delete" data-url="{{ route('permission.delete',['id' => $permission->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 table-responsive">
                            {{ $permissions->links() }}
                        </div>
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

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
        <script>
                $(".select2").select2({
            placeholder: "Chọn danh mục cha",
            allowClear: true
        });
    </script>
@endsection
