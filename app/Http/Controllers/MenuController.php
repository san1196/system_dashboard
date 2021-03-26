<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Menu;

class MenuController extends Controller
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
		
		$data['cek'] = Menu::count();
		$data['menu'] = DB::table('master_list_menu as a')->leftJoin('users as b','b.id','=','a.created_by')->where('a.menu_name','like','%'.$filter.'%')->select('a.*','b.name as created_by_name')->paginate(10);
        return view('menu.master.menu.menu',$data);
    }
		
	public function tambah()
    {
        $data['auth'] = \Auth::user()->id;
    	return view('menu.master.menu.menu_create',$data);
    }
	
	public function store(Request $request)
    {
    	$this->validate($request,[
    		'menu_name' => 'required',
    		'url_link' => 'required',
    	],
		[
			'menu_name.required' => 'Field Name harus diisi',
			'url_link.required' => 'Field URL harus diisi',
		]);
 
        Menu::create([
    		'menu_name' => $request->menu_name,
    		'url_link' => $request->url_link,
    		'created_by' => $request->created_by,
    	]);
 
    	return redirect('/mastermenu');
    }
	
	public function edit($id)
	{
	   $data['menu'] = Menu::find($id);
	   return view('menu.master.menu.menu_edit',$data);
	}
	
	public function update($id, Request $request)
	{
		$this->validate($request,[
    		'menu_name' => 'required',
    		'url_link' => 'required',
    	],
		[
			'menu_name.required' => 'Field Name harus diisi',
			'url_link.required' => 'Field URL harus diisi',
		]);
	 
		$ab = Menu::find($id);
		$ab->menu_name = $request->menu_name;
		$ab->url_link = $request->url_link;
		$ab->save();
		return redirect('/mastermenu');
	}
	
	public function delete($id)
	{
		$ab = Menu::find($id);
		$ab->delete();
		return redirect('/mastermenu');
	}
}
