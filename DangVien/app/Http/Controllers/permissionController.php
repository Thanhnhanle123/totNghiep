<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\components\Recursive;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
class permissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function create(){
        $permissions = $this->permission->latest()->paginate(5);
        $htmlOption = $this->getPermission($parent_id_selected = '');
        return view('admin.permission.add',compact('htmlOption','permissions'));
    }

    public function getPermission($parent_id_selected){
        $data = $this->permission->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->dataRecusive($parent_id_selected);
        return $htmlOption;
    }

    public function store(Request $request){
        $this->permission->firstOrCreate([
            'name' => $request->name,
            'display_name' => $request->name,
            'parent_id' => $request->parent_id,
            'key_code' => $request->key_code,
        ]);
        return redirect()->route('permission.create');
    }

    public function edit($id){
        $permission = $this->permission->find($id);
        $htmlOption = $this->getPermission($parent_id_selected = $permission->parent_id);
        return view('admin.permission.edit',compact('htmlOption','permission'));
    }

    public function update($id,Request $request){
        $this->permission->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->name,
            'parent_id' => $request->parent_id,
            'key_code' => $request->key_code,
        ]);
        return redirect()->route('permission.create');
    }

    public function delete($id){
        try{
            $this->permission->find($id)->delete();
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
}
