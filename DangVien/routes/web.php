<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', 'loginController@index');
    Route::post('/', 'loginController@login')->name('login');
});

Route::get('/', 'loginController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'trangchuController@index')->name('trangchu');
        Route::prefix('/')->group(function () {
            Route::post('Ai', 'AiController@index')->name('sent_AI');
        });
        Route::prefix('dantoc')->group(function () {
            Route::get('/', 'dantocController@index')->name('dantoc.danhsach')->middleware('can:dantoc-list');
            Route::post('store', 'dantocController@store')->name('dantoc.store');
            Route::get('edit/{id}', 'dantocController@edit')->name('dantoc.edit')->middleware('can:dantoc-edit');
            Route::post('update/{id}', 'dantocController@update')->name('dantoc.update');
            Route::get('delete/{id}', 'dantocController@delete')->name('dantoc.delete')->middleware('can:dantoc-delete');
            Route::post('upload', 'dantocController@upload')->name('dantoc.upload')->middleware('can:dantoc-upload');
        });

        Route::prefix('tongiao')->group(function () {
            Route::get('/', 'tongiaoController@index')->name('tongiao.danhsach')->middleware('can:tongiao-list');
            Route::post('store', 'tongiaoController@store')->name('tongiao.store');
            Route::get('edit/{id}', 'tongiaoController@edit')->name('tongiao.edit')->middleware('can:tongiao-edit');
            Route::post('update/{id}', 'tongiaoController@update')->name('tongiao.update');
            Route::get('delete/{id}', 'tongiaoController@delete')->name('tongiao.delete')->middleware('can:tongiao-delete');
            Route::post('upload', 'tongiaoController@upload')->name('tongiao.upload')->middleware('can:tongiao-upload');
        });

        Route::prefix('trinhdovanhoa')->group(function () {
            Route::get('/','trinhdovanhoaController@index')->name('trinhdovanhoa.danhsach')->middleware('can:trinhdovanhoa-list');
            Route::post('store','trinhdovanhoaController@store')->name('trinhdovanhoa.store');
            Route::get('edit/{id}','trinhdovanhoaController@edit')->name('trinhdovanhoa.edit')->middleware('can:trinhdovanhoa-add');
            Route::post('update/{id}', 'trinhdovanhoaController@update')->name('trinhdovanhoa.update')->middleware('can:trinhdovanhoa-edit');
            Route::get('delete/{id}', 'trinhdovanhoaController@delete')->name('trinhdovanhoa.delete')->middleware('can:trinhdovanhoa-delete');
        });

        Route::prefix('ngoaingu')->group(function () {
            Route::get('/', 'ngoainguController@index')->name('ngoaingu.danhsach')->middleware('can:ngoaingu-list');
            Route::post('store', 'ngoainguController@store')->name('ngoaingu.store');
            Route::get('edit/{id}', 'ngoainguController@edit')->name('ngoaingu.edit')->middleware('can:ngoaingu-edit');
            Route::post('update/{id}', 'ngoainguController@update')->name('ngoaingu.update');
            Route::get('delete/{id}', 'ngoainguController@delete')->name('ngoaingu.delete')->middleware('can:ngoaingu-delete');
        });

        Route::prefix('tinhoc')->group(function () {
            Route::get('/', 'tinhocController@index')->name('tinhoc.danhsach')->middleware('can:tinhoc-list');
            Route::post('store', 'tinhocController@store')->name('tinhoc.store');
            Route::get('edit/{id}', 'tinhocController@edit')->name('tinhoc.edit')->middleware('can:tinhoc-edit');
            Route::post('update/{id}', 'tinhocController@update')->name('tinhoc.update');
            Route::get('delete/{id}', 'tinhocController@delete')->name('tinhoc.delete')->middleware('can:tinhoc-delete');
        });

        Route::prefix('chucvu')->group(function () {
            Route::get('/', 'chucvuController@index')->name('chucvu.danhsach')->middleware('can:chucvu-list');
            Route::post('store', 'chucvuController@store')->name('chucvu.store');
            Route::get('edit/{id}', 'chucvuController@edit')->name('chucvu.edit')->middleware('can:chucvu-edit');
            Route::post('update/{id}', 'chucvuController@update')->name('chucvu.update');
            Route::get('delete/{id}', 'chucvuController@delete')->name('chucvu.delete')->middleware('can:chucvu-delete');
        });

        Route::prefix('thanhpho')->group(function () {
            Route::get('/', 'thanhphoController@index')->name('thanhpho.danhsach')->middleware('can:thanhpho-list');
            Route::post('store', 'thanhphoController@store')->name('thanhpho.store');
            Route::get('edit/{id}', 'thanhphoController@edit')->name('thanhpho.edit')->middleware('can:thanhpho-edit');
            Route::get('delete/{id}', 'thanhphoController@delete')->name('thanhpho.delete')->middleware('can:thanhpho-delete');
            Route::post('update/{id}', 'thanhphoController@update')->name('thanhpho.update');
            Route::post('upload', 'thanhphoController@upload')->name('thanhpho.upload')->middleware('can:thanhpho-upload');
        });

        Route::prefix('chibo')->group(function () {
            Route::get('/', 'chiboController@index')->name('chibo.danhsach')->middleware('can:chibo-list');
            Route::post('store', 'chiboController@store')->name('chibo.store');
            Route::get('edit/{id}', 'chiboController@edit')->name('chibo.edit')->middleware('can:chibo-edit');
            Route::get('delete/{id}', 'chiboController@delete')->name('chibo.delete')->middleware('can:chibo-delete');
            Route::post('update/{id}', 'chiboController@update')->name('chibo.update');
            Route::post('upload', 'chiboController@upload')->name('chibo.upload')->middleware('can:chibo-upload');
        });

        Route::prefix('dangvien')->group(function () {
            Route::get('/', 'dangvienController@index')->name('dangvien.danhsach')->middleware('can:dangvien-list');
            Route::get('create', 'dangvienController@create')->name('dangvien.create')->middleware('can:dangvien-add');
            Route::post('store', 'dangvienController@store')->name('dangvien.store');
            Route::get('edit/{id}', 'dangvienController@edit')->name('dangvien.edit')->middleware('can:dangvien-edit');
            Route::get('delete/{id}', 'dangvienController@delete')->name('dangvien.delete')->middleware('can:dangvien-delete');
            Route::post('update/{id}', 'dangvienController@update')->name('dangvien.update');
            Route::post('/', 'dangvienController@search')->name('dangvien.search')->middleware('can:dangvien-list');;

            Route::prefix('dangvienchuyendi')->group(function () {
                Route::get('/', 'dangvienController@index_dangvienchuyendi')->name('dangvienchuyendi.danhsach');
                Route::get('create/{id}', 'dangvienController@create_dangvienchuyendi')->name('dangvienchuyendi.create')->middleware('can:dangvien-add');
                Route::post('store/{id}', 'dangvienController@store_dangvienchuyendi')->name('dangvienchuyendi.store');
            });

            Route::prefix('dangviendaxoa')->group(function () {
                Route::get('/', 'dangvienController@index_dangviendaxoa')->name('dangviendaxoa.danhsach')->middleware('can:dangvien-list');
                Route::get('undo/{id}', 'dangvienController@undo_dangviendaxoa')->name('dangviendaxoa.undo')->middleware('can:dangvien-restore');
                Route::get('delete/{id}', 'dangvienController@delete_dangviendaxoa')->name('dangviendaxoa.delete')->middleware('can:dangvien-delete');
                Route::post('/', 'dangvienController@search_dangVienChuyenDi')->name('dangviendaxoa.searchDangVienDaXoa')->middleware('can:dangvien-list');
            });
        });

        Route::prefix('doituongdang')->group(function () {
            Route::get('/', 'doituongdangController@index')->name('doituongdang.danhsach');
            // Route::post('store', 'doituongdangController@store')->name('doituongdang.store');
            // Route::get('edit/{id}', 'doituongdangController@edit')->name('doituongdang.edit');
            // Route::post('update/{id}', 'doituongdangController@update')->name('doituongdang.update');
            // Route::get('delete/{id}', 'doituongdangController@delete')->name('doituongdang.delete');
            // Route::get('thongtincanhan/{id}', 'doituongdangController@edit')->name('doituongdang.info');
        });

        Route::prefix('quantrivien')->group(function () {
            Route::get('/', 'quantrivienController@index')->name('quantrivien.danhsach')->middleware('can:user-list');
            Route::post('store', 'quantrivienController@store')->name('quantrivien.store');
            Route::get('edit/{id}', 'quantrivienController@edit')->name('quantrivien.edit')->middleware('can:user-edit');
            Route::post('update/{id}', 'quantrivienController@update')->name('quantrivien.update');
            Route::get('delete/{id}', 'quantrivienController@delete')->name('quantrivien.delete')->middleware('can:user-delete');
            Route::get('thongtincanhan/{id}', 'quantrivienController@edit')->name('quantrivien.info');
        });

        Route::prefix('role')->group(function () {
            Route::get('/', 'roleController@index')->name('role.danhsach')->middleware('can:role-list');
            Route::get('create', 'roleController@create')->name('role.create')->middleware('can:role-add');
            Route::post('store', 'roleController@store')->name('role.store');
            Route::get('edit/{id}', 'roleController@edit')->name('role.edit')->middleware('can:role-edit');
            Route::get('delete/{id}', 'roleController@delete')->name('role.delete')->middleware('can:role-delete');
            Route::post('update/{id}', 'roleController@update')->name('role.update');
        });

        Route::prefix('permission')->group(function () {
            Route::get('create', 'permissionController@create')->name('permission.create')->middleware('can:permission-list');
            Route::post('store', 'permissionController@store')->name('permission.store');
            Route::get('edit/{id}', 'permissionController@edit')->name('permission.edit')->middleware('can:permission-edit');
            Route::get('delete/{id}', 'permissionController@delete')->name('permission.delete')->middleware('can:permission-delete');
            Route::post('update/{id}', 'permissionController@update')->name('permission.update');
        });
    });
});

