<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('login')->with('alert', '');
	}

	public function do_login() {

		$id_user = trim(Input::get('id_user'));
		$password = trim(Input::get('password'));
		
		$status = DB::table('user')->where('id_user', '=', $id_user)->where('password', '=', $password)->get(['id_group', 'username', 'id_user']);

		if(!empty($status)) {

			foreach ($status as $key => $value) {
				$username = $value->username;
				$group_user = $value->id_group;
				$user_id = $value->id_user;
			}

			session(['status_login' => true, 'username' => $username, 'id_group' => $group_user, 'id_user' => $user_id]);

			$user = session('username');
			$group = session('id_group');
			$id_user_id = session('id_user');

			$status_group = DB::table('group')->where('id_group', '=', $group)->get(['nama_group']);

			foreach ($status_group as $keys => $value_group) {
				$group_name = $value_group->nama_group;
			}
			
			return redirect($group_name)->with('username', $user);
			// session(['id_user' => $status[]]);
			// echo $user;

		}
		else {
			return redirect('login')->with('alert', 'Username or password is incorrect !');
		}
	}

	public function do_logout() {

		Session::flush();

		return redirect('login');

	}

}
