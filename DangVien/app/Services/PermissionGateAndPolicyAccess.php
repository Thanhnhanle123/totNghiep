<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess(){
        $this->getDefindTrangChu();

        $this->getDefindDanToc();

        $this->getDefindTonGiao();

        $this->getDefindNgoaiNgu();

        $this->getDefindTinHoc();

        $this->getDefindChucVu();

        $this->getDefindThanhPho();

        $this->getDefindChiBo();

        $this->getDefindDangVien();

        $this->getDefindUser();

        $this->getDefindRole();

        $this->getDefindPermission();

        $this->getDefindTrinhDoVanHoa();
    }
//Trang chủ
public function getDefindTrangChu(){
    Gate::define('trang-chu','App\Policies\DangVienPolicy@view'); // danh sách đảng viên
}
//Dân tộc
public function getDefindDanToc(){
    Gate::define('dantoc-list','App\Policies\DanTocPolicy@view'); // danh sách dân tộc
    Gate::define('dantoc-add','App\Policies\DanTocPolicy@create'); // thêm dân tộc
    Gate::define('dantoc-edit','App\Policies\DanTocPolicy@update'); // cập nhật sách dân tộc
    Gate::define('dantoc-delete','App\Policies\DanTocPolicy@delete'); // xóa dân tộc
    Gate::define('dantoc-upload','App\Policies\DanTocPolicy@upload'); // upload dân tộc
}
//Tôn giáo
public function getDefindTonGiao(){
    Gate::define('tongiao-list','App\Policies\TonGiaoPolicy@view'); // danh sách tôn giáo
    Gate::define('tongiao-add','App\Policies\TonGiaoPolicy@create'); // thêm tôn giáo
    Gate::define('tongiao-edit','App\Policies\TonGiaoPolicy@update'); // cập nhật sách tôn giáo
    Gate::define('tongiao-delete','App\Policies\TonGiaoPolicy@delete'); // xóa tôn giáo
    Gate::define('tongiao-upload','App\Policies\TonGiaoPolicy@upload'); // upload tôn giáo
}
//Trình độ văn hóa
public function getDefindTrinhDoVanHoa(){
    Gate::define('trinhdovanhoa-list','App\Policies\TrinhDoVanHoaPolicy@view'); // danh sách trình độ văn hóa
    Gate::define('trinhdovanhoa-add','App\Policies\TrinhDoVanHoaPolicy@create'); // thêm trình độ văn hóa
    Gate::define('trinhdovanhoa-edit','App\Policies\TrinhDoVanHoaPolicy@update'); // cập nhật sách trình độ văn hóa
    Gate::define('trinhdovanhoa-delete','App\Policies\TrinhDoVanHoaPolicy@delete'); // xóa trình độ văn hóa
}

//Ngoại ngữ
public function getDefindNgoaiNgu(){
    Gate::define('ngoaingu-list','App\Policies\NgoaiNguPolicy@view'); // danh sách ngoại ngữ
    Gate::define('ngoaingu-add','App\Policies\NgoaiNguPolicy@create'); // thêm ngoại ngữ
    Gate::define('ngoaingu-edit','App\Policies\NgoaiNguPolicy@update'); // cập nhật sách ngoại ngữ
    Gate::define('ngoaingu-delete','App\Policies\NgoaiNguPolicy@delete'); // xóa ngoại ngữ
}
//tin học
public function getDefindTinHoc(){
    Gate::define('tinhoc-list','App\Policies\TinHocPolicy@view'); // danh sách tin học
    Gate::define('tinhoc-add','App\Policies\TinHocPolicy@create'); // thêm tin học
    Gate::define('tinhoc-edit','App\Policies\TinHocPolicy@update'); // cập nhật sách tin học
    Gate::define('tinhoc-delete','App\Policies\TinHocPolicy@delete'); // xóa tin học
}
//chức vụ
public function getDefindChucVu(){
    Gate::define('chucvu-list','App\Policies\ChucVuPolicy@view'); // danh sách chức vụ
    Gate::define('chucvu-add','App\Policies\ChucVuPolicy@create'); // thêm chức vụ
    Gate::define('chucvu-edit','App\Policies\ChucVuPolicy@update'); // cập nhật sách chức vụ
    Gate::define('chucvu-delete','App\Policies\ChucVuPolicy@delete'); // xóa chức vụ
}
//thành phố
public function getDefindThanhPho(){
    Gate::define('thanhpho-list','App\Policies\ThanhPhoPolicy@view'); // danh sách thành phố
    Gate::define('thanhpho-add','App\Policies\ThanhPhoPolicy@create'); // thêm thành phố
    Gate::define('thanhpho-edit','App\Policies\ThanhPhoPolicy@update'); // cập nhật sách thành phố
    Gate::define('thanhpho-delete','App\Policies\ThanhPhoPolicy@delete'); // xóa thành phố
    Gate::define('thanhpho-upload','App\Policies\ThanhPhoPolicy@upload'); // upload thành phố
}
//chi bộ
public function getDefindChiBo(){
    Gate::define('chibo-list','App\Policies\ChiBoPolicy@view'); // danh sách chi bộ
    Gate::define('chibo-add','App\Policies\ChiBoPolicy@create'); // thêm chi bộ
    Gate::define('chibo-edit','App\Policies\ChiBoPolicy@update'); // cập nhật sách chi bộ
    Gate::define('chibo-delete','App\Policies\ChiBoPolicy@delete'); // xóa chi bộ
    Gate::define('chibo-upload','App\Policies\ChiBoPolicy@upload'); // upload chi bộ
}
//Đảng viên
    public function getDefindDangVien(){
        Gate::define('dangvien-list','App\Policies\DangVienPolicy@view'); // danh sách đảng viên
        Gate::define('dangvien-add','App\Policies\DangVienPolicy@create'); // thêm đảng viên
        Gate::define('dangvien-edit','App\Policies\DangVienPolicy@update'); // cập nhật sách đảng viên
        Gate::define('dangvien-delete','App\Policies\DangVienPolicy@delete'); // xóa đảng viên
        Gate::define('dangvien-restore','App\Policies\DangVienPolicy@restore'); // khôi phục đảng viên
        Gate::define('permanently-deleted','App\Policies\DangVienPolicy@permanently_deleted'); // Xóa đảng viễn vĩnh viễn
    }
//User
    public function getDefindUser(){
        Gate::define('user-list','App\Policies\UserPostPolicy@view'); // danh sách người dùng
        Gate::define('user-add','App\Policies\UserPostPolicy@create'); // thêm người dùng
        Gate::define('user-edit','App\Policies\UserPostPolicy@update'); // cập nhật sách người dùng
        Gate::define('user-delete','App\Policies\UserPostPolicy@delete'); // xóa người dùng
    }
//Role
    public function getDefindRole(){
        Gate::define('role-list','App\Policies\RolePolicy@view'); // danh sách phân quyền
        Gate::define('role-add','App\Policies\RolePolicy@create'); // thêm phân quyền
        Gate::define('role-edit','App\Policies\RolePolicy@update'); // cập nhật sách phân quyền
        Gate::define('role-delete','App\Policies\RolePolicy@delete'); // xóa phân quyền
    }
//permission
public function getDefindPermission(){
    Gate::define('permission-list','App\Policies\PermissionPolicy@view'); // danh sách permission
    Gate::define('permission-add','App\Policies\PermissionPolicy@create'); // thêm permission
    Gate::define('permission-edit','App\Policies\PermissionPolicy@update'); // cập nhật sách permission
    Gate::define('permission-delete','App\Policies\PermissionPolicy@delete'); // xóa permission
}
}
