<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UsersRequest;
use Gate;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        if (Gate::none(['users_allow', 'users_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        
		if($request->id == "0"){ return redirect(route("admin.users.index")); }
		$data_admiko_parent_child = Users::getParentChildrenList();
        $tableData = Users::where("admiko_parent_child",$request->id??0)->orderByDesc("id")->get();
        return view("admin.users.index")->with(compact('admiko_data', "tableData",'data_admiko_parent_child'));
    }

    public function create()
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index",Request()->return_page??""));
        }
        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.users.store",Request()->id??"");
        
        
		$user_type_all = Users::USER_TYPE_CONS;
		$data_admiko_parent_child = Users::getParentChildrenList();
        return view("admin.users.manage")->with(compact('admiko_data','user_type_all','data_admiko_parent_child'));
    }

    public function store(UsersRequest $request)
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index",Request()->return_page??""));
        }
        $data = $request->all();
        
        $Users = Users::create($data);
        
        return redirect(route("admin.users.index",Request()->return_page??""));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Users = Users::find($id);
        if (Gate::none(['users_allow', 'users_edit']) || !$Users) {
            return redirect(route("admin.users.index"));
        }

        $admiko_data['sideBarActive'] = "users";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.users.update", [$Users->id]);
        
        
		$user_type_all = Users::USER_TYPE_CONS;
		$data_admiko_parent_child = Users::getParentChildrenList();
        $data = $Users;
        return view("admin.users.manage")->with(compact('admiko_data', 'data','user_type_all','data_admiko_parent_child'));
    }

    public function update(UsersRequest $request,$id)
    {
        if (Gate::none(['users_allow', 'users_edit'])) {
            return redirect(route("admin.users.index",$request->return_page??""));
        }
        $data = $request->all();
        $Users = Users::find($id);
        $Users->update($data);
        
        return redirect(route("admin.users.index",$request->return_page??""));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['users_allow'])) {
            return redirect(route("admin.users.index",$request->return_page??""));
        }
		$Users = new Users();
		$Users->parentChildrenPrepareDelete($request->idDel);
        Users::destroy($request->idDel);
        return back();
    }
    
    
    
}
