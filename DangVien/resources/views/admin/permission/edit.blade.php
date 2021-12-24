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
    @include('partials.content_header',['name' => 'Sự cho phép', 'title' => 'cập nhật','route' => 'permission.create'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <form action="{{ route('permission.update',['id'=>$permission->id]) }}" method="POST">
            @csrf
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Tên permission</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Nhập tên permission"
                            value="{{ $permission->name }}"
                        >
                    </div>
                    <div class="form-group">
                        <label class="form-label">key code</label>
                        <input
                            type="text"
                            class="form-control"
                            name="key_code"
                            placeholder="Nhập key code"
                            value="{{ $permission->key_code }}"
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">permission cha</label>
                        <select class="form-control select2"  name="parent_id" id="">
                            <option value="0">Chọn permission cha</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                  </div>
              </div>
          </form>
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
