<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Device;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DeviceRequest;
use Gate;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Users;
use App\Models\Admin\Customer;

class DeviceController extends Controller
{

    public function index()
    {
        if (Gate::none(['device_allow', 'device_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "device";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Device::orderByDesc("id")->get();
        return view("admin.device.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['device_allow'])) {
            return redirect(route("admin.device.index"));
        }
        $admiko_data['sideBarActive'] = "device";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.device.store");
        
        
		$sim_types_all = SimTypes::all()->sortBy("name")->pluck("name", "id");
		$status_all = Device::STATUS_CONS;
		$users_all = Users::getParentChildrenList();
		$customer_all = Customer::all()->sortBy("name")->pluck("name", "id");
        return view("admin.device.manage")->with(compact('admiko_data','sim_types_all','status_all','users_all','customer_all'));
    }

    public function store(DeviceRequest $request)
    {
        if (Gate::none(['device_allow'])) {
            return redirect(route("admin.device.index"));
        }
        $data = $request->all();
        
        $Device = Device::create($data);
        
        return redirect(route("admin.device.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Device = Device::find($id);
        if (Gate::none(['device_allow', 'device_edit']) || !$Device) {
            return redirect(route("admin.device.index"));
        }

        $admiko_data['sideBarActive'] = "device";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.device.update", [$Device->id]);
        
        
		$sim_types_all = SimTypes::all()->sortBy("name")->pluck("name", "id");
		$status_all = Device::STATUS_CONS;
		$users_all = Users::getParentChildrenList();
		$customer_all = Customer::all()->sortBy("name")->pluck("name", "id");
        $data = $Device;
        return view("admin.device.manage")->with(compact('admiko_data', 'data','sim_types_all','status_all','users_all','customer_all'));
    }

    public function update(DeviceRequest $request,$id)
    {
        if (Gate::none(['device_allow', 'device_edit'])) {
            return redirect(route("admin.device.index"));
        }
        $data = $request->all();
        $Device = Device::find($id);
        $Device->update($data);
        
        return redirect(route("admin.device.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['device_allow'])) {
            return redirect(route("admin.device.index"));
        }
        Device::destroy($request->idDel);
        return back();
    }
    
    
    
}
