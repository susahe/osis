<?php namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Send_Mail;
use CodeIgniter\I18n\Time;
class Home extends BaseController
{
	private $model;
	private $mail;
	public function __construct()

	{
		helper('form');
		$this->model = new UserModel();
		$this->mail = new Send_Mail();
helper('date');
	}
	// login
	public function index()
	{

		$id= session()->get('id');
		$role = session()->get('role');

		if ($role="Student") {

		}




		return  view("home/dashboard");



	//--------------------------------------------------------------------
}
	// Register4

	private function setUserSession($user){

		$data=[
			'id'=>$user['idusers'],
			'firstname'=>$user['firstname'],
			'lastname'=>$user['lastname'],
				'email'=>$user['email'],
			'isLogedIn' => true,
			'loginUser'=>$user['role'],

		];

		session()->set($data);

		return true;

	}
	public function logout(){
		session()->destroy();
		return redirect()->to('/');

	}
}
