@extends('layouts.admin')

@section('title')
    Tôn giáo
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/uploadFile.css') }}">
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Tôn giáo', 'title' => 'danh sách','route' => 'tongiao.danhsach'])

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
                                <th scope="col">Mã tôn giáo</th>
                                <th scope="col">Tên tôn giáo</th>
                                @can('tongiao-edit')
                                    <th scope="col" class="canGiua">Sữa</th>
                                @endcan
                                @can('tongiao-delete')
                                    <th scope="col" class="canGiua">Xóa</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach ($tonGiao as $tg)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$tg->maTonGiao}}</td>
                                <td>{{$tg->tenTonGiao}}</td>
                                @can('tongiao-edit')
                                    <td class="canGiua">
                                        <a class="btn btn-primary" href="{{ route('tongiao.edit',['id' => $tg->id]) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('tongiao-delete')
                                    <td class="canGiua">
                                        <a class="btn btn-danger action_delete" data-url="{{ route('tongiao.delete',['id' => $tg->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                @endcan
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        {{$tonGiao->links()}}
                    </div>
                </div>
            </div>
            @can('tongiao-add')
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="inDam">Thêm tôn giáo</h3>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('tongiao.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                <label class="form-label">Mã tôn giáo</label>
                                <input type="text" class="form-control @error('maTonGiao') is-invalid @enderror" name="maTonGiao" placeholder="Nhập mã tôn giáo">
                                    @error('maTonGiao')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên tôn giáo</label>
                                    <input type="text" class="form-control @error('tenTonGiao') is-invalid @enderror" name="tenTonGiao" placeholder="Nhập tên tôn giáo">
                                    @error('tenTonGiao')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan

            @can('tongiao-upload')
                <div class="m-2 col-md-4">
                   @include('partials.uploadFile',['route' => 'tongiao.upload'])
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

