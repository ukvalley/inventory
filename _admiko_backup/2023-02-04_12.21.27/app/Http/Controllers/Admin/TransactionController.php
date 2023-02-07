<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TransactionRequest;
use Gate;

class TransactionController extends Controller
{

    public function index()
    {
        if (Gate::none(['transaction_allow', 'transaction_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "transaction";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Transaction::orderByDesc("id")->get();
        return view("admin.transaction.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['transaction_allow'])) {
            return redirect(route("admin.transaction.index"));
        }
        $admiko_data['sideBarActive'] = "transaction";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.transaction.store");
        
        
        return view("admin.transaction.manage")->with(compact('admiko_data'));
    }

    public function store(TransactionRequest $request)
    {
        if (Gate::none(['transaction_allow'])) {
            return redirect(route("admin.transaction.index"));
        }
        $data = $request->all();
        
        $Transaction = Transaction::create($data);
        
        return redirect(route("admin.transaction.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Transaction = Transaction::find($id);
        if (Gate::none(['transaction_allow', 'transaction_edit']) || !$Transaction) {
            return redirect(route("admin.transaction.index"));
        }

        $admiko_data['sideBarActive'] = "transaction";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.transaction.update", [$Transaction->id]);
        
        
        $data = $Transaction;
        return view("admin.transaction.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(TransactionRequest $request,$id)
    {
        if (Gate::none(['transaction_allow', 'transaction_edit'])) {
            return redirect(route("admin.transaction.index"));
        }
        $data = $request->all();
        $Transaction = Transaction::find($id);
        $Transaction->update($data);
        
        return redirect(route("admin.transaction.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['transaction_allow'])) {
            return redirect(route("admin.transaction.index"));
        }
        Transaction::destroy($request->idDel);
        return back();
    }
    
    
    
}
