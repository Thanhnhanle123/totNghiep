<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\role;
use App\Traits\DeleteModelTrait;

class quantrivienController extends Controller
{
    use DeleteModelTrait;
    protected $user;
    protected $role;
    public function __construct(User $user, role $role){
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $user = $this->user->paginate(5);
        $roles = $this->role->get();
        $roleOfUser = DB::select('select * from role_user');
        return view('admin.quantrivien.index',compact('user','roles','roleOfUser'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'userName' => 'required|max:50',
            'password' => 'required|min:6|max:32'
        ],[
            'userName.required' => 'Bạn chưa nhập tên đăng nhập',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 32 ký tự'
        ]);
        if( $validator->fails() ){
            return redirect()
                        ->route('quantrivien.danhsach')
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->hasFile('file_anh')){
            $file = $request->file_anh;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = Storage::url($request->file('file_anh')->storeAs('public/quantrivien/'.auth()->id(),$fileNameHash));
        }else{
            $fileNameOrigin = Null;
            $filePath = Null;
        }
        if($request->method('post')){
            try{
                DB::beginTransaction();
                $user = $this->user->FirstOrCreate([
                    'userName' =>  $request->userName,
                    'password' =>  bcrypt($request->password),
                    'password_show' => $request->password,
                    'tenNguoiDung' => $request->tenNguoiDung,
                    'file_name' => $fileNameOrigin,
                    'file_path' => $filePath,
                ]);
                $user->roles()->attach($request->role_id);
                DB::commit();
                return redirect()->route('quantrivien.danhsach');
            }
            catch( \Exception $exception ){
                DB::rollBack();
                Log::error("message".$exception->getMessage().' Line: '.$exception->getLine());
            }
        }
    }

    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->get();
        $roleOfUser = $user->roles;
        return view('admin.quantrivien.edit',compact('user','roles','roleOfUser'));
    }

    public function update($id,Request $request){
        try{
            DB::beginTransaction();
            if($request->hasFile('file_anh')){
                $file = $request->file_anh;
                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
                $filePath = Storage::url($request->file('file_anh')->storeAs('public/quantrivien/'.auth()->id(),$fileNameHash));
            }else{
                $fileNameOrigin = $this->user->find($id)->file_name;
                $filePath = $this->user->find($id)->file_path;
            }
            if($request->method('post')){
                $this->user->find($id)->update([
                    'userName' =>  $request->userName,
                    'password' =>  bcrypt($request->password),
                    'password_show' => $request->password,
                    'tenNguoiDung' => $request->tenNguoiDung,
                    'file_name' => $fileNameOrigin,
                    'file_path' => $filePath,
                ]);
                $user = $this->user->find($id);
                $user->roles()->sync($request->role_id);
            }
            DB::commit();
            return redirect()->route('quantrivien.danhsach');
        }
        catch( \Exception $exception ){
            DB::rollBack();
            Log::error("message".$exception->getMessage().' Line: '.$exception->getLine());
        }
    }

    public function delete($id){
        try{
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }catch(\Exception $exception){
            Log::error("message". $exception->getMessage(). " --- Line : ". $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }

    public function info($id){
        $user = $this->user->edit($id);
        return view('admin.quantrivien.info',compact('user'));
    }
}
