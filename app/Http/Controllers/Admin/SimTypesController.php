<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\SimTypes;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SimTypesRequest;
use Gate;

class SimTypesController extends Controller
{

    public function index()
    {
        if (Gate::none(['sim_types_allow', 'sim_types_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "sim_types";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = SimTypes::orderByDesc("id")->get();
        return view("admin.sim_types.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['sim_types_allow'])) {
            return redirect(route("admin.sim_types.index"));
        }
        $admiko_data['sideBarActive'] = "sim_types";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.sim_types.store");
        
        
        return view("admin.sim_types.manage")->with(compact('admiko_data'));
    }

    public function store(SimTypesRequest $request)
    {
        if (Gate::none(['sim_types_allow'])) {
            return redirect(route("admin.sim_types.index"));
        }
        $data = $request->all();
        
        $SimTypes = SimTypes::create($data);
        
        return redirect(route("admin.sim_types.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $SimTypes = SimTypes::find($id);
        if (Gate::none(['sim_types_allow', 'sim_types_edit']) || !$SimTypes) {
            return redirect(route("admin.sim_types.index"));
        }

        $admiko_data['sideBarActive'] = "sim_types";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.sim_types.update", [$SimTypes->id]);
        
        
        $data = $SimTypes;
        return view("admin.sim_types.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(SimTypesRequest $request,$id)
    {
        if (Gate::none(['sim_types_allow', 'sim_types_edit'])) {
            return redirect(route("admin.sim_types.index"));
        }
        $data = $request->all();
        $SimTypes = SimTypes::find($id);
        $SimTypes->update($data);
        
        return redirect(route("admin.sim_types.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['sim_types_allow'])) {
            return redirect(route("admin.sim_types.index"));
        }
        SimTypes::destroy($request->idDel);
        return back();
    }
    
    
    
}
