<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Manifacturer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ManifacturerRequest;
use Gate;

class ManifacturerController extends Controller
{

    public function index()
    {
        if (Gate::none(['manifacturer_allow', 'manifacturer_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "manifacturer";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Manifacturer::orderByDesc("id")->get();
        return view("admin.manifacturer.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['manifacturer_allow'])) {
            return redirect(route("admin.manifacturer.index"));
        }
        $admiko_data['sideBarActive'] = "manifacturer";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.manifacturer.store");
        
        
        return view("admin.manifacturer.manage")->with(compact('admiko_data'));
    }

    public function store(ManifacturerRequest $request)
    {
        if (Gate::none(['manifacturer_allow'])) {
            return redirect(route("admin.manifacturer.index"));
        }
        $data = $request->all();
        
        $Manifacturer = Manifacturer::create($data);
        
        return redirect(route("admin.manifacturer.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Manifacturer = Manifacturer::find($id);
        if (Gate::none(['manifacturer_allow', 'manifacturer_edit']) || !$Manifacturer) {
            return redirect(route("admin.manifacturer.index"));
        }

        $admiko_data['sideBarActive'] = "manifacturer";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.manifacturer.update", [$Manifacturer->id]);
        
        
        $data = $Manifacturer;
        return view("admin.manifacturer.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(ManifacturerRequest $request,$id)
    {
        if (Gate::none(['manifacturer_allow', 'manifacturer_edit'])) {
            return redirect(route("admin.manifacturer.index"));
        }
        $data = $request->all();
        $Manifacturer = Manifacturer::find($id);
        $Manifacturer->update($data);
        
        return redirect(route("admin.manifacturer.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['manifacturer_allow'])) {
            return redirect(route("admin.manifacturer.index"));
        }
        Manifacturer::destroy($request->idDel);
        return back();
    }
    
    
    
}
