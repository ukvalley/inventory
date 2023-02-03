<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CustomerRequest;
use Gate;

class CustomerController extends Controller
{

    public function index()
    {
        if (Gate::none(['customer_allow', 'customer_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "customer";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Customer::$admiko_file_info;
        $tableData = Customer::orderByDesc("id")->get();
        return view("admin.customer.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['customer_allow'])) {
            return redirect(route("admin.customer.index"));
        }
        $admiko_data['sideBarActive'] = "customer";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.customer.store");
        $admiko_data["fileInfo"] = Customer::$admiko_file_info;
        
        return view("admin.customer.manage")->with(compact('admiko_data'));
    }

    public function store(CustomerRequest $request)
    {
        if (Gate::none(['customer_allow'])) {
            return redirect(route("admin.customer.index"));
        }
        $data = $request->all();
        
        $Customer = Customer::create($data);
        
        return redirect(route("admin.customer.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Customer = Customer::find($id);
        if (Gate::none(['customer_allow', 'customer_edit']) || !$Customer) {
            return redirect(route("admin.customer.index"));
        }

        $admiko_data['sideBarActive'] = "customer";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.customer.update", [$Customer->id]);
        $admiko_data["fileInfo"] = Customer::$admiko_file_info;
        
        $data = $Customer;
        return view("admin.customer.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(CustomerRequest $request,$id)
    {
        if (Gate::none(['customer_allow', 'customer_edit'])) {
            return redirect(route("admin.customer.index"));
        }
        $data = $request->all();
        $Customer = Customer::find($id);
        $Customer->update($data);
        
        return redirect(route("admin.customer.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['customer_allow'])) {
            return redirect(route("admin.customer.index"));
        }
        Customer::destroy($request->idDel);
        return back();
    }
    
    
    
}
