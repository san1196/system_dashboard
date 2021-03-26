<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleMenu;

class KaryawanController extends Controller
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
		
		$data['cek'] = Users::count();
		$data['karyawan'] = DB::table('users as a')->leftJoin('master_role as b','b.id','=','a.role_id')->where('a.name','like','%'.$filter.'%')->select('a.*','b.role_name')->paginate(10);
        return view('menu.karyawan.karyawan',$data);
    }
		
	public function tambah()
    {
        $data['auth'] = \Auth::user()->id;
        $data['role'] = Role::get();
    	return view('menu.karyawan.karyawan_create',$data);
    }
	
	public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'role_id' => 'required',
    	],
		[
			'name.required' => 'Field Name harus diisi',
			'email.required' => 'Field Email harus diisi',
			'password.required' => 'Field Password harus diisi',
			'role_id.required' => 'Field Role harus diisi',
		]);
 
        Users::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    		'role_id' => $request->role_id,
    		'created_by' => $request->created_by,
    		'active' => '1',
    		'block' => '0',
    	]);
 
    	return redirect('/datakaryawan');
    }
	
	public function edit($id)
	{
        $data['karyawan'] = Users::find($id);
        $data['role'] = Role::get();
	    return view('menu.karyawan.karyawan_edit',$data);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'role_id' => 'required',
    	],
		[
			'name.required' => 'Field Name harus diisi',
			'email.required' => 'Field Email harus diisi',
			'role_id.required' => 'Field Role harus diisi',
		]);
	 
        if(!empty($request->password)){
            $ab = Users::find($id);
            $ab->name = $request->name;
            $ab->email = $request->email;
            $ab->password = bcrypt($request->password);
            $ab->role_id = $request->role_id;
            $ab->active = $request->active;
            $ab->block = $request->block;
            $ab->save();
        }else{
            $ab = Users::find($id);
            $ab->name = $request->name;
            $ab->email = $request->email;
            $ab->role_id = $request->role_id;
            $ab->active = $request->active;
            $ab->block = $request->block;
            $ab->save();
        }

		return redirect('/datakaryawan');
	}
	
	public function delete($id)
	{
		$ab = Users::find($id);
		$ab->delete();
		return redirect('/datakaryawan');
	}
}
