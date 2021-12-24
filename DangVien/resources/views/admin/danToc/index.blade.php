@extends('layouts.admin')

@section('title')
    Dân tộc
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/uploadFile.css') }}">
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Dân tộc', 'title' => 'danh sách','route' => 'dantoc.danhsach'])

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
                                <th scope="col">Mã dân tộc</th>
                                <th scope="col">Tên dân tộc</th>
                                @can('dantoc-edit')
                                    <th scope="col" class="canGiua">Sữa</th>
                                @endcan
                                @can('dantoc-delete')
                                    <th scope="col" class="canGiua">Xóa</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                            @foreach ($danToc as $dt)
                            <tr>
                                <th scope="row" class="canGiua">{{$i}}</th>
                                <td>{{$dt->maDanToc}}</td>
                                <td>{{$dt->tenDanToc}}</td>
                                @can('dantoc-edit')
                                    <td class="canGiua">
                                        <a class="btn btn-primary" href="{{ route('dantoc.edit',['id' => $dt->id]) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('dantoc-delete')
                                    <td class="canGiua">
                                        <a class="btn btn-danger action_delete" href="" data-url="{{ route('dantoc.delete',['id' => $dt->id]) }}"><i class="fas fa-trash-alt "></i></a>
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
                            {{$danToc->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            @can('dantoc-add')
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="inDam">Thêm dân tộc</h3>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('dantoc.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                <label class="form-label">Mã dân tộc</label>
                                <input type="text" class="form-control @error('maDanToc') is-invalid @enderror" name="maDanToc" placeholder="Nhập mã dân tộc">
                                    @error('maDanToc')
                                    <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên dân tộc</label>
                                    <input type="text" class="form-control @error('tenDanToc') is-invalid @enderror"  name="tenDanToc" placeholder="Nhập tên dân tộc">
                                    @error('tenDanToc')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            @can('dantoc-upload')
                <div class="m-2 col-md-4">
                    @include('partials.uploadFile',['route' => 'dantoc.upload'])
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



