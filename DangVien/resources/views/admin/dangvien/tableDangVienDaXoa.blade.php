<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="canGiua">STT</th>
        <th>Mã đảng viên</th>
        @can('dangvien-restore')
        <th>Hoàn tác</th>
        @endcan
        @can('permanently-deleted')
        <th>Xóa vĩnh viễn</th>
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
    </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
    @foreach ($dangVien as $dv)
        <tr>
            <td></td>
            <td class="canGiua">{{$i}}</td>
            <td>{{$dv->maDangVien}}</td>
            @can('dangvien-restore')
                <td>
                    <a class="btn btn-success m-3" href="{{ route('dangviendaxoa.undo',['id' => $dv->id]) }}"><i class="fas fa-undo-alt"></i></a>
                </td>
            @endcan
            @can('permanently-deleted')
                <td>
                    <a class="btn btn-danger m-3 action_delete" data-url="{{ route('dangviendaxoa.delete',['id' => $dv->id]) }}" ><i class="fas fa-trash-alt"></i></a>
                </td>
            @endcan
            <td>{{$dv->hoLot}}</td>
            <td>{{$dv->ten}}</td>
            <td>{{$dv->tenGoiKhac}}</td>
            <td>
                {{$dv->gioiTinh == 0 ? 'Nam' : 'Nữ'}}
            </td>
            <td>{{$dv->ngaySinh}}</td>
        @foreach ($thanhPho as $tp)
            @if ($tp->maThanhPho == $dv->noiSinh_ma)
            <td>{{$tp->tenThanhPho}}</td>
            @endif
        @endforeach
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

        @foreach ($danToc as $dt)
            @if ($dt->maDanToc == $dv->danToc_ma)
            <td>{{$dt->tenDanToc}}</td>
            @endif
        @endforeach
            <td>
                @foreach ($tonGiao as $tg)
                    @if ($tg->maTonGiao == $dv->tonGiao_ma)
                    {{$tg->tenTonGiao}}
                    @endif
                @endforeach
            </td>
        @foreach ($thanhPho as $tp)
            @if ($tp->maThanhPho == $dv->queQuan_ma)
            <td>{{$tp->tenThanhPho}}</td>
            @endif
        @endforeach
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
        @foreach ($trinhDoVanHoa as $tdvh)
            @if ($tdvh->maTrinhDo == $dv->trinhDoVanHoa_ma)
            <td>{{$tdvh->maTrinhDo}}</td>
            @endif
        @endforeach

        @foreach ($ngoaiNgu as $nn)
            @if ($nn->maNgoaiNgu == $dv->ngoaiNgu_ma)
            <td>
                {{$nn->maNgoaiNgu.'-'.$nn->tenNgoaiNgu.'-'.$nn->trinhDo}}
            </td>
            @endif
        @endforeach

        @foreach ($tinHoc as $th)
            @if ($th->maTinHoc == $dv->tinHoc_ma)
            <td>{{$th->tenTinHoc.'-'.$th->loai}}</td>
            @endif
        @endforeach

        @foreach ($chucVu as $cv)
            @if ($cv->maChucVu == $dv->chucVu_ma)
            <td>{{$cv->tenChucVu}}</td>
            @endif
        @endforeach
        @foreach ($chiBo as $cb)
            @if ($cb->maChiBo == $dv->chiBo_ma)
            <td>{{$cb->tenChiBo}}</td>
            @endif
        @endforeach
        </tr>
        <?php $i++ ?>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th>STT</th>
        <th>Mã đảng viên</th>
        @can('dangvien-restore')
        <th>Hoàn tác</th>
        @endcan
        @can('permanently-deleted')
        <th>Xóa vĩnh viễn</th>
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
    </tr>
    </tfoot>
    </table>
</div>
