@extends('layouts.admin')

@section('title')
    Tin học
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Tin học', 'title' => 'danh sách','route' => 'tinhoc.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Danh sách</h3>
                    </div>
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="canGiua">STT</th>
                                <th scope="col">Mã tin học</th>
                                <th scope="col">Tên tin học</th>
                                <th scope="col">Loại</th>
                                @can('tinhoc-edit')
                                <th scope="col" class="canGiua">Sữa</th>
                                @endcan
                                @can('tongiao-delete')
                                <th scope="col" class="canGiua">Xóa</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                            @foreach ($tinHoc as $th)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$th->maTinHoc}}</td>
                                <td>{{$th->tenTinHoc}}</td>
                                <td>{{$th->loai}}</td>
                                @can('tinhoc-edit')
                                <td class="canGiua">
                                    <a class="btn btn-primary" href="{{ route('tinhoc.edit',['id' => $th->id]) }}"><i class="fas fa-edit"></i></a>
                                </td>
                                @endcan
                                @can('tongiao-delete')
                                <td class="canGiua">
                                    <a class="btn btn-danger action_delete" data-url="{{ route('tinhoc.delete',['id' => $th->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                @endcan
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        {{$tinHoc->links()}}
                    </div>
                </div>
            </div>
            @can('tinhoc-add')
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="inDam">Thêm tin học</h3>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('tinhoc.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Mã tin học</label>
                              <input type="text" class="form-control @error('maTinHoc') is-invalid @enderror" name="maTinHoc" placeholder="Nhập mã tin học">
                                @error('maTinHoc')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên tin học</label>
                                <input type="text" class="form-control @error('tenTinHoc') is-invalid @enderror" name="tenTinHoc" placeholder="Nhập tên tin học">
                                @error('tenTinHoc')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại</label>
                                <input type="text" class="form-control @error('loai') is-invalid @enderror" name="loai" placeholder="Loại">
                                @error('loai')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
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


