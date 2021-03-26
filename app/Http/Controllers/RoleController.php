<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Role;

class RoleController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
		$filter = $request->filter;
		
		$data['cek'] = Role::count();
		$data['role'] = DB::table('master_role as a')->leftJoin('users as b','b.id','=','a.created_by')->where('a.role_name','like','%'.$filter.'%')->select('a.*','b.name as created_by_name')->paginate(10);
        return view('menu.master.role.role',$data);
    }
		
	public function tambah()
    {
        $data['auth'] = \Auth::user()->id;
    	return view('menu.master.role.role_create',$data);
    }
	
	public function store(Request $request)
    {
    	$this->validate($request,[
    		'role_name' => 'required',
    	],
		[
			'role_name.required' => 'Field Name harus diisi',
		]);
 
        Role::create([
    		'role_name' => $request->role_name,
    		'created_by' => $request->created_by,
    	]);
 
    	return redirect('/masterrole');
    }
	
	public function edit($id)
	{
	   $data['role'] = Role::find($id);
	   return view('menu.master.role.role_edit',$data);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
		    'role_name' => 'required',
		],
		[
		    'role_name.required' => 'Field Name harus diisi',
		]);
	 
		$ab = Role::find($id);
		$ab->role_name = $request->role_name;
		$ab->save();
		return redirect('/masterrole');
	}
	
	public function delete($id)
	{
		$ab = Role::find($id);
		$ab->delete();
		return redirect('/masterrole');
	}
}
