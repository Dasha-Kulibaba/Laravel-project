<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */

	protected function groups()
	{
		if (count($groups = Groups::all()) > 0) {
			$groups = Groups::all();
			return view('auth.register', compact('groups'));
		} else return view('auth.register');
	}


	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\Models\User
	 */
	protected function create(array $data)
	{
		$user =
			User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
			]);

		if (preg_match('/student/', $data['email']) || array_key_exists('isstudent', $data)) {
			$student = [
				'st_name' => $data['name'],
				'st_email' => $data['email'],
				'group_id' => $data['group_id'],
				'user_id' => $user->id,
			];
			Students::create($student);
		} else {
			Teachers::create([
				'teacher_name' => $user->name,
				'teacher_email' => $user->email,
				'user_id' => $user->id,
			]);
		}

		return $user;
	}
}
