<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;

class RoleMenuController extends Controller
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
		
		$data['cek'] = RoleMenu::count();
		$data['rolemenu'] = DB::table('master_role_menu as a')->leftJoin('users as b','b.id','=','a.created_by')->leftJoin('master_role as c','c.id','=','a.role_id')->leftJoin('master_list_menu as d','d.id','=','a.menu_id')->where('c.role_name','like','%'.$filter.'%')->select('a.*','b.name as created_by_name','c.role_name','d.menu_name')->paginate(10);
        return view('menu.master.rolemenu.rolemenu',$data);
    }
		
	public function tambah()
    {
    	$data['auth'] = \Auth::user()->id;
    	$data['role'] = Role::get();
    	$data['menu'] = Menu::get();
    	return view('menu.master.rolemenu.rolemenu_create',$data);
    }
	
	public function store(Request $request)
    {
    	$this->validate($request,[
    		'role_id' => 'required',
    		'menu_id' => 'required',
    	],
		[
			'role_id.required' => 'Field Role Name harus diisi',
			'menu_id.required' => 'Field Menu Name harus diisi',
		]);
 
        RoleMenu::create([
    		'role_id' => $request->role_id,
    		'menu_id' => $request->menu_id,
    		'created_by' => $request->created_by,
    	]);
 
    	return redirect('/masterrolemenu');
    }
	
	public function edit($id)
	{
	    $data['rolemenu'] = RoleMenu::find($id);
        $data['role'] = Role::get();
    	$data['menu'] = Menu::get();
	    return view('menu.master.rolemenu.rolemenu_edit',$data);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
    		'role_id' => 'required',
    		'menu_id' => 'required',
    	],
		[
			'role_id.required' => 'Field Role Name harus diisi',
			'menu_id.required' => 'Field Menu Name harus diisi',
		]);
	 
		$ab = RoleMenu::find($id);
		$ab->role_id = $request->role_id;
		$ab->menu_id = $request->menu_id;
		$ab->save();
		return redirect('/masterrolemenu');
	}
	
	public function delete($id)
	{
		$ab = RoleMenu::find($id);
		$ab->delete();
		return redirect('/masterrolemenu');
	}
}
