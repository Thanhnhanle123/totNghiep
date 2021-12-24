@extends('layouts.admin')

@section('title')
    Trình độ văn hóa
@endsection

@section('Content')
<div class="content-wrapper">
    @include('partials.content_header',['name' => 'Trình độ văn hóa', 'title' => 'danh sách','route' => 'trinhdovanhoa.danhsach'])
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
                                <th scope="col">Mã trình độ văn hóa</th>
                                <th scope="col">Tên trình độ văn hóa</th>
                                @can('trinhdovanhoa-edit')
                                    <th scope="col" class="canGiua">Sữa</th>
                                @endcan
                                @can('trinhdovanhoa-delete')
                                    <th scope="col" class="canGiua">Xóa</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                            @foreach ($trinhDoVanHoa as $tdvh)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$tdvh->maTrinhDo}}</td>
                                <td>{{$tdvh->tenTrinhDo}}</td>
                                @can('trinhdovanhoa-edit')
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('trinhdovanhoa.edit',['id' => $tdvh->id]) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('trinhdovanhoa-delete')
                                    <td>
                                        <a class="btn btn-danger action_delete"  data-url="{{ route('trinhdovanhoa.delete',['id' => $tdvh->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                @endcan
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        {{$trinhDoVanHoa->links()}}
                    </div>
                </div>
            </div>
            @can('trinhdovanhoa-add')
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="inDam">Thêm trình độ văn hóa</h3>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('trinhdovanhoa.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Mã trình độ</label>
                                    <input type="text" class="form-control @error('maTrinhDo') is-invalid @enderror" name="maTrinhDo" placeholder="Nhập mã trình độ">
                                    @error('maTrinhDo')
                                        <div class="alert alert-danger thongBao_required">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tên trình độ</label>
                                    <input type="text" class="form-control @error('tenTrinhDo') is-invalid @enderror" name="tenTrinhDo" placeholder="Nhập tên trình độ">
                                    @error('tenTrinhDo')
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


