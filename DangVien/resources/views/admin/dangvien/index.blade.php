@extends('layouts.admin')

@section('title')
    Đảng viên
@endsection

@section('css')
    @include('admin.dangvien.FileCss')
@endsection

@section('Content')
    <div class="wrapper">
        <div class="content-wrapper">
            @include('partials.content_header',['name'=>'Đảng Viên','title'=>'Danh sách','route' => 'dangvien.danhsach'])
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form  action="{{ route('dangvien.search') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Dân tộc</label>
                                            <select class="form-control" name="danToc_ma" id="#">
                                                <option value="0">Dân tộc</option>
                                                {{!! $htmlOptionDantoc !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Ngoại ngữ</label>
                                            <select class="form-control" name="ngoaiNgu_ma" id="#">
                                                <option value="0">Ngoại ngữ</option>
                                                {{!! $htmlOptionNgoaiNgu !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Quê quán</label>
                                            <select class="form-control" name="queQuan_ma" id="#">
                                                <option value="0">Quê quán</option>
                                                {{!! $htmlOptionQueQuan !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Tuổi đảng viên</label>
                                            <select class="form-control" name="tuoi_value" id="#">
                                                <option value="0">Tuổi đảng viên</option>
                                                <option value="1">Dảng viên từ 18 đến 30 tuổi</option>
                                                <option value="2">Dảng viên từ 31 đến 40 tuổi</option>
                                                <option value="3">Dảng viên từ 41 đến 50 tuổi</option>
                                                <option value="4">Dảng viên từ 51 đến 60 tuổi</option>
                                                <option value="5">Dảng viên trên 60 tuổi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Chức vụ</label>
                                            <select class="form-control" name="chucVu_ma" id="#">
                                                <option value="0">Chức vụ</option>
                                                {{!! $htmlOptionChucVu !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Tôn giáo</label>
                                            <select class="form-control" name="tonGiao_ma" id="#">
                                                <option value="0">Tôn giáo</option>
                                                {{!! $htmlOptionTonGiao !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Tin học</label>
                                            <select class="form-control" name="tinHoc_ma" id="#">
                                                <option value="0">Tin học</option>
                                                {{!! $htmlOptionTinHoc !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Nơi sinh</label>
                                            <select class="form-control" name="noiSinh_ma" id="#">
                                                <option value="0">Nơi sinh</option>
                                                {{!! $htmlOptionNoiSinh !!}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Trình đô văn hóa</label>
                                            <select class="form-control" name="trinhDoVanHoa_ma" id="#">
                                                <option value="0">Trình độ văn hóa</option>
                                                {{!! $htmlOptionTrinhDoVanHoa !!}}
                                            </select>
                                        </div>
                                        <div class="col-lg-12 loc">
                                            <label for="" class="form-label">Chi bộ</label>
                                            <select class="form-control" name="chiBo_ma" id="#">
                                                <option value="">Chi bộ</option>
                                                {{!! $htmlOptionChiBo !!}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 m-2">
                                        <button class="btn btn-primary" data-url="{{ route('dangvien.search') }}" type="submit"><i class="fas fa-search"> Tìm Kiếm</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    @can('dangvien-restore')
                                        <a class="btn btn-success show-deleted" href="{{ route('dangviendaxoa.danhsach') }}"><i class="fas fa-trash"></i></a>
                                    @endcan
                                    @can('dangvien-add')
                                        <a class="btn btn-success float-right" href="{{ route('dangvien.create') }}">ADD</a>
                                    @endcan
                                </div>
                                <!-- /.card-header -->
                                @include('admin.dangvien.tableDangVien')
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection

@section('js')
    @include('admin.dangvien.FileJs');
@endsection


