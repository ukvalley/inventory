<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PurchaseRequest;
use Gate;
use App\Models\Admin\Manifacturer;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Users;

class PurchaseController extends Controller
{

    public function index()
    {
        if (Gate::none(['purchase_allow', 'purchase_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "purchase";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Purchase::orderByDesc("id")->get();
        return view("admin.purchase.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['purchase_allow'])) {
            return redirect(route("admin.purchase.index"));
        }
        $admiko_data['sideBarActive'] = "purchase";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.purchase.store");
        
        
		$manifacturer_all = Manifacturer::all()->sortBy("name")->pluck("name", "id");
		$device_status_all = Purchase::DEVICE_STATUS_CONS;
		$sim_types_all = SimTypes::all()->sortBy("name")->pluck("name", "id");
		$users_all = Users::getParentChildrenList();
        return view("admin.purchase.manage")->with(compact('admiko_data','manifacturer_all','device_status_all','sim_types_all','users_all'));
    }

    public function store(PurchaseRequest $request)
    {
        if (Gate::none(['purchase_allow'])) {
            return redirect(route("admin.purchase.index"));
        }
        $data = $request->all();
        
        $Purchase = Purchase::create($data);
        
        return redirect(route("admin.purchase.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Purchase = Purchase::find($id);
        if (Gate::none(['purchase_allow', 'purchase_edit']) || !$Purchase) {
            return redirect(route("admin.purchase.index"));
        }

        $admiko_data['sideBarActive'] = "purchase";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.purchase.update", [$Purchase->id]);
        
        
		$manifacturer_all = Manifacturer::all()->sortBy("name")->pluck("name", "id");
		$device_status_all = Purchase::DEVICE_STATUS_CONS;
		$sim_types_all = SimTypes::all()->sortBy("name")->pluck("name", "id");
		$users_all = Users::getParentChildrenList();
        $data = $Purchase;
        return view("admin.purchase.manage")->with(compact('admiko_data', 'data','manifacturer_all','device_status_all','sim_types_all','users_all'));
    }

    public function update(PurchaseRequest $request,$id)
    {
        if (Gate::none(['purchase_allow', 'purchase_edit'])) {
            return redirect(route("admin.purchase.index"));
        }
        $data = $request->all();
        $Purchase = Purchase::find($id);
        $Purchase->update($data);
        
        return redirect(route("admin.purchase.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['purchase_allow'])) {
            return redirect(route("admin.purchase.index"));
        }
        Purchase::destroy($request->idDel);
        return back();
    }
    
    
    
}
