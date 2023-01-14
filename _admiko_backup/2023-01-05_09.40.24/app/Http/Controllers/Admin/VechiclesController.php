<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Vechicles;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VechiclesRequest;
use Gate;
use App\Models\Admin\Customer;

class VechiclesController extends Controller
{

    public function index()
    {
        if (Gate::none(['vechicles_allow', 'vechicles_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "vechicles";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Vechicles::$admiko_file_info;
        $tableData = Vechicles::orderByDesc("id")->get();
        return view("admin.vechicles.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['vechicles_allow'])) {
            return redirect(route("admin.vechicles.index"));
        }
        $admiko_data['sideBarActive'] = "vechicles";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.vechicles.store");
        $admiko_data["fileInfo"] = Vechicles::$admiko_file_info;
        
		$customer_all = Customer::all()->sortBy("name")->pluck("name", "id");
        return view("admin.vechicles.manage")->with(compact('admiko_data','customer_all'));
    }

    public function store(VechiclesRequest $request)
    {
        if (Gate::none(['vechicles_allow'])) {
            return redirect(route("admin.vechicles.index"));
        }
        $data = $request->all();
        
        $Vechicles = Vechicles::create($data);
        
        return redirect(route("admin.vechicles.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Vechicles = Vechicles::find($id);
        if (Gate::none(['vechicles_allow', 'vechicles_edit']) || !$Vechicles) {
            return redirect(route("admin.vechicles.index"));
        }

        $admiko_data['sideBarActive'] = "vechicles";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.vechicles.update", [$Vechicles->id]);
        $admiko_data["fileInfo"] = Vechicles::$admiko_file_info;
        
		$customer_all = Customer::all()->sortBy("name")->pluck("name", "id");
        $data = $Vechicles;
        return view("admin.vechicles.manage")->with(compact('admiko_data', 'data','customer_all'));
    }

    public function update(VechiclesRequest $request,$id)
    {
        if (Gate::none(['vechicles_allow', 'vechicles_edit'])) {
            return redirect(route("admin.vechicles.index"));
        }
        $data = $request->all();
        $Vechicles = Vechicles::find($id);
        $Vechicles->update($data);
        
        return redirect(route("admin.vechicles.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['vechicles_allow'])) {
            return redirect(route("admin.vechicles.index"));
        }
        Vechicles::destroy($request->idDel);
        return back();
    }
    
    
    
}
