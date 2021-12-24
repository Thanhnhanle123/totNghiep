<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="canGiua">STT</th>
        <th>Mã đảng viên</th>
        @can('dangvien-edit')
        <th>Sữa</th>
        @endcan
        @can('dangvien-delete')
        <th>Xóa</th>
        @endcan
        <th>Họ lót</th>
        <th>Tên</th>
        <th>Tên gọi khác</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Nơi sinh</th>
        <th>Tuổi</th>
        <th>Số CCCD</th>
        <th>Ngày cấp</th>
        <th>Nơi cấp</th>
        <th>Dân tộc</th>
        <th>Tôn giáo</th>
        <th>Quê quán</th>
        <th>Địa chỉ thường trú</th>
        <th>Nơi ở hiện tại</th>
        <th>Điện thoại cơ quan</th>
        <th>Điện thoại nhà</th>
        <th>Điện thoại cá nhân</th>
        <th>Email</th>
        <th>Tình trạng hôn nhân</th>
        <th>Thành phần xuất thân</th>
        <th>Diện ưu tiên gia đình</th>
        <th>Năng khiến</th>
        <th>Sở trường</th>
        <th>Tình trạng sức khỏe</th>
        <th>Khuyết tật</th>
        <th>Trình độ văn hóa</th>
        <th>Ngoại ngữ</th>
        <th>Tin học</th>
        <th>Chức vụ</th>
        <th>Chi bộ</th>
        {{-- <th>Chuyển đến</th> --}}
        <th>Chuyển đi</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
    @foreach ($dangVien as $dv)
        <tr>
            <td></td>
            <td class="canGiua">{{$i}}</td>
            <td>{{$dv->maDangVien}}</td>
            @can('dangvien-edit')
            <td>
                <a class="btn btn-success m-3" href="{{ route('dangvien.edit',['id' => $dv->id]) }}"><i class="fas fa-edit"></i></a>
            </td>
            @endcan
            @can('dangvien-delete')
            <td>
                <a class="btn btn-danger m-3 action_delete" data-url="{{ route('dangvien.delete',['id' => $dv->id]) }}" ><i class="fas fa-trash-alt"></i></a>
            </td>
            @endcan
            <td>{{$dv->hoLot}}</td>
            <td>{{$dv->ten}}</td>
            <td>{{$dv->tenGoiKhac}}</td>
            <td>
                {{$dv->gioiTinh == 0 ? 'Nam' : 'Nữ'}}
            </td>
            <td>{{$dv->ngaySinh}}</td>
            <td>
                @foreach ($thanhPho as $tp)
                    @if ($tp->maThanhPho == $dv->noiSinh_ma)
                    {{$tp->tenThanhPho}}
                    @endif
                @endforeach
            </td>
            <td>
                <?php
                        echo now()->year - date('Y',strtotime($dv->ngaySinh))." t <br>";
                        if(now()->month < date('m',strtotime($dv->ngaySinh))){
                            echo "thiếu ".(date('m',strtotime($dv->ngaySinh))-now()->month)." th";
                        }else {
                            echo (now()->month - date('m',strtotime($dv->ngaySinh)))." th";
                        }
                ?>
            </td>
        @foreach ($cccd as $cccd_coppy)
            @if ($cccd_coppy->id == $dv->CCCD_id)
            <td>{{$cccd_coppy->CCCD}}</td>
            <td>{{$cccd_coppy->ngayCap}}</td>
            <td>{{$cccd_coppy->noiCap}}</td>
            @endif
        @endforeach
            <td>
                @foreach ($danToc as $dt)
                    @if ($dt->maDanToc === $dv->danToc_ma)
                    {{$dt->tenDanToc}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($tonGiao as $tg)
                    @if ($tg->maTonGiao == $dv->tonGiao_ma)
                    {{$tg->tenTonGiao}}
                    @endif
                @endforeach
            </td>
            {{-- <td>{{$dv->quocTich}}</td> --}}
            <td>
                @foreach ($thanhPho as $tp)
                    @if ($tp->maThanhPho == $dv->queQuan_ma)
                    {{$tp->tenThanhPho}}
                    @endif
                @endforeach
            </td>
            <td>{{$dv->diaChiThuongTru}}</td>
            <td>{{$dv->noiOHienTai}}</td>
            <td>{{$dv->dienThoaiCoQuan}}</td>
            <td>{{$dv->dienThoaiNha}}</td>
            <td>{{$dv->dienThoaiCaNhan}}</td>
            <td>{{$dv->email}}</td>
            <td>{{$dv->tinhTrangHonNhan}}</td>
            <td>{{$dv->thanhPhanXuatThan}}</td>
            <td>{{$dv->dienUuTien}}</td>
            <td>{{$dv->nangKhieu}}</td>
            <td>{{$dv->soTruong}}</td>
            <td>{{$dv->tinhTrangSucKhoe}}</td>
            <td>{{$dv->khuyetTat}}</td>
            <td>
                @foreach ($trinhDoVanHoa as $tdvh)
                    @if ($tdvh->maTrinhDo == $dv->trinhDoVanHoa_ma)
                    {{$tdvh->maTrinhDo}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($ngoaiNgu as $nn)
                    @if ($nn->maNgoaiNgu == $dv->ngoaiNgu_ma)
                        {{$nn->maNgoaiNgu.'-'.$nn->tenNgoaiNgu.'-'.$nn->trinhDo}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($tinHoc as $th)
                    @if ($th->maTinHoc == $dv->tinHoc_ma)
                    {{$th->tenTinHoc.'-'.$th->loai}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($chucVu as $cv)
                    @if ($cv->maChucVu == $dv->chucVu_ma)
                        {{$cv->tenChucVu}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($chiBo as $cb)
                    @if ($cb->maChiBo == $dv->chiBo_ma)
                        {{$cb->tenChiBo}}
                    @endif
                @endforeach
            </td>
            {{-- <td>
                <a class="btn btn-outline-success m-3" href=""><i class="fas fa-user-graduate"></i></a>
            </td> --}}
            <td>
                <a class="btn btn-outline-danger m-3" href="{{ route('dangvienchuyendi.create',['id' => $dv->id]) }}"><i class="fas fa-suitcase-rolling"></i></a>
            </td>
        </tr>
        <?php $i++ ?>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th>STT</th>
        <th>Mã đảng viên</th>
        @can('dangvien-edit')
        <th>Sữa</th>
        @endcan
        @can('dangvien-delete')
        <th>Xóa</th>
        @endcan
        <th>Họ lót</th>
        <th>Tên</th>
        <th>Tên gọi khác</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Nơi sinh</th>
        <th>Tuổi</th>
        <th>Số CCCD</th>
        <th>Ngày cấp</th>
        <th>Nơi cấp</th>
        <th>Dân tộc</th>
        <th>Tôn giáo</th>
        <th>Quê quán</th>
        <th>Địa chỉ thường trú</th>
        <th>Nơi ở hiện tại</th>
        <th>Điện thoại cơ quan</th>
        <th>Điện thoại nhà</th>
        <th>Điện thoại cá nhân</th>
        <th>Email</th>
        <th>Tình trạng hôn nhân</th>
        <th>Thành phần xuất thân</th>
        <th>Diện ưu tiên gia đình</th>
        <th>Năng khiến</th>
        <th>Sở trường</th>
        <th>Tình trạng sức khỏe</th>
        <th>Khuyết tật</th>
        <th>Trình độ văn hóa</th>
        <th>Ngoại ngữ</th>
        <th>Tin học</th>
        <th>Chức vụ</th>
        <th>Chi bộ</th>
        {{-- <th>Chuyển đến</th> --}}
        <th>Chuyển đi</th>
    </tr>
    </tfoot>
    </table>
</div>
