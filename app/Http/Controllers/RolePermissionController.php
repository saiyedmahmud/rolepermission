<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    // _____________________________Role controller______________________________________________
    public function roleform(){
        return view('rolepermission.roleform');
    }

    public function rolestore(Request $request){
        $role = $request['role'];
        $store=Role::create(['name' => $role]);
        return redirect()->route('rolelist');


    }
    public function rolelist(){
        $role = Role::all();
        return view('rolepermission.rolelist')->with(['role'=>$role]);
    }

    public function roledestroy(Request $request){
        
    }
     // _____________________________End Role controller______________________________________________

    // _____________________________Permission controller______________________________________________
    public function permissionform(){
        return view('rolepermission.permissionform');
    }

    public function permissionstore(Request $request){
        $permission = $request['permission'];
        Permission::create(['name' => $permission]);
        return redirect()->route('permissionlist');


    }
    public function permissionlist(){
        $permission = Permission::all();
        return view('rolepermission.permissionlist')->with(['permission'=>$permission]);
    }

    public function permissiondestroy(Request $request){
        
    }
    // _____________________________End Permission controller______________________________________________

    // _____________________________Assign Role Permission controller______________________________________________
        public function assignform(){
            $role = Role::all();
            $permission = Permission::all();
            return view('rolepermission.assignform')->with(['roles'=>$role, 'permissions'=>$permission]);
        }
    
        public function assignstore(Request $request){
            $roleid = $request->input('role');
            $role = Role::findById($roleid);
            $permissionid= $request->input('permission');
            $permission = Permission::findById($permissionid);
            $role->givePermissionTo($permission);
            return 'done';
            // return redirect()->route('assignlist');
    
    
        }
        public function assignlist(){
            $permission = Permission::all();
            return view('rolepermission.permissionlist')->with(['permission'=>$permission]);
        }
    
        public function assigndestroy(Request $request){
            
        }
        // _____________________________End Assaign Role Permission controller______________________________________________
}
