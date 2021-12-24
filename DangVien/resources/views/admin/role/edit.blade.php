@extends('layouts.admin')

@section('title')
    Role
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminLTE/admins/Vaitro/add/add.css') }}">
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Vai trò', 'title' => 'Cập nhật','route' => 'role.danhsach'])

    <div class="content">
        <div class="container-fluid">
          <form action="{{ route('role.update',['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-12">
                      @csrf
                      <div class="form-group">
                          <label class="form-label">Tên vai trò</label>
                          <input
                              type="text"
                              class="form-control"
                              name="name"
                              placeholder="Nhập tên vai trò"
                              value="{{ $role->name }}"
                          >
                      </div>
                      <div class="form-group">
                          <label class="form-label">Mô tả vai trò</label>
                          <textarea
                              name="display_name"
                              class="form-control"
                              id=""
                              rows="10"
                          >
                              {{ $role->display_name }}
                          </textarea>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <label for="">
                          <input type="checkbox" name="" id="" class="check_all" >
                      </label>
                      Tất cả
                  </div>
                  @foreach ($permissionsParent as $permissionsParentItem)
                  <div class="col-md-12">
                      <div class="card border-primary mb-3">
                          <div class="card-header">
                              <label for="">
                                  <input type="checkbox" value="" class="checkbox_main" >
                              </label>
                              Module {{ $permissionsParentItem->name }}
                          </div>
                          <div class="row">
                              @foreach ($permissionsParentItem->permissionChildrent as $permissionChildrentItem)
                                  <div class="card-body text-primary col-md-3">
                                      <h5 class="card-title">
                                          <label for="">
                                              <input
                                                  type="checkbox"
                                                  name="permission_id[]"
                                                  id=""
                                                  class="checkbox_children"
                                                  value="{{ $permissionChildrentItem->id }}"
                                                  {{ $permissionsChecked->contains('id',$permissionChildrentItem->id) ? 'checked' : '' }}
                                              >
                                          </label>
                                      {{ $permissionChildrentItem->name }}
                                      </h5>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
                  @endforeach

                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
          </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

</div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('adminLTE/admins/Vaitro/add/add.js') }}"></script>
@endsection


