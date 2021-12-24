@extends('layouts.admin')

@section('title')
    Thành phố
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/uploadFile.css') }}">
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Thành phố', 'title' => 'danh sách','route' => 'thanhpho.danhsach'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @can('thanhpho-list')
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
                                    <th scope="col">Mã thành phố</th>
                                    <th scope="col">Tên thành phố</th>
                                    @can('thanhpho-edit')
                                    <th scope="col" class="canGiua">Sữa</th>
                                    @endcan
                                    @can('thanhpho-delete')
                                    <th scope="col" class="canGiua">Xóa</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach ($thanhPho as $tp)
                                <tr>
                                    <th scope="row" class="canGiua">{{$i}}</th>
                                    <td>{{$tp->maThanhPho}}</td>
                                    <td>{{$tp->tenThanhPho}}</td>
                                    @can('thanhpho-edit')
                                    <td class="canGiua">
                                        <a class="btn btn-primary" href="{{ route('thanhpho.edit',['id' => $tp->id]) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                    @endcan
                                    @can('thanhpho-delete')
                                    <td class="canGiua">
                                        <a class="btn btn-danger action_delete" data-url="{{ route('thanhpho.delete',['id' => $tp->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    @endcan
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                {{$thanhPho->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-1"></div>
            @can('thanhpho-add')
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="inDam">Thêm thành phố</h3>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('thanhpho.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Mã thành phố</label>
                                    <input type="text" class="form-control @error('maThanhPho') is-invalid @enderror" name="maThanhPho" placeholder="Nhập mã thành phố">
                                    @error('tenThanhPho')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên thành phố</label>
                                    <input type="text" class="form-control @error('tenThanhPho') is-invalid @enderror" name="tenThanhPho" placeholder="Nhập tên thành phố">
                                    @error('tenThanhPho')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            @can('thanhpho-upload')
                <div class="m-2 col-md-4">
                    @include('partials.uploadFile',['route' => 'thanhpho.upload'])
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
    <script src="{{ asset('js/uploadFile.js') }}"></script>
@endsection


