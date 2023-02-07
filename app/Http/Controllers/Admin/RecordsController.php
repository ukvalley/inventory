<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Records;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RecordsRequest;
use Gate;
use App\Models\Admin\Users;

class RecordsController extends Controller
{

    public function index()
    {
        if (Gate::none(['records_allow', 'records_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "records";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Records::orderByDesc("id")->get();
        return view("admin.records.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['records_allow'])) {
            return redirect(route("admin.records.index"));
        }
        $admiko_data['sideBarActive'] = "records";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.records.store");
        
        
		$users_all = Users::getParentChildrenList();
        return view("admin.records.manage")->with(compact('admiko_data','users_all'));
    }

    public function store(RecordsRequest $request)
    {
        if (Gate::none(['records_allow'])) {
            return redirect(route("admin.records.index"));
        }
        $data = $request->all();
        
        $Records = Records::create($data);
        
        return redirect(route("admin.records.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Records = Records::find($id);
        if (Gate::none(['records_allow', 'records_edit']) || !$Records) {
            return redirect(route("admin.records.index"));
        }

        $admiko_data['sideBarActive'] = "records";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.records.update", [$Records->id]);
        
        
		$users_all = Users::getParentChildrenList();
        $data = $Records;
        return view("admin.records.manage")->with(compact('admiko_data', 'data','users_all'));
    }

    public function update(RecordsRequest $request,$id)
    {
        if (Gate::none(['records_allow', 'records_edit'])) {
            return redirect(route("admin.records.index"));
        }
        $data = $request->all();
        $Records = Records::find($id);
        $Records->update($data);
        
        return redirect(route("admin.records.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['records_allow'])) {
            return redirect(route("admin.records.index"));
        }
        Records::destroy($request->idDel);
        return back();
    }
    
    
    
}
