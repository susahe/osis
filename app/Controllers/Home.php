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
		helper('form');
		$data['title'] = "Users";

		helper('form');

		if ($this->request->getMethod()=='post')
		{
			$rules=[

				'email'=> 'required|min_length[6]|max_length[50]|valid_email',
				'password'=> 'required|min_length[8]|max_length[255]|validateUser[email,password]',

			];
			$errors=[
				'password'=> [
					'validateUser'=> 'Email or Password don \'t match',

				]

			];
		 if (! $this->validate($rules,$errors)){

			$data['validation']= $this->validator;
		}
		 else
			{
				$model = new UserModel();

				$user= $model->where('email',$this->request->getVar('email'))
						->first();

					$this->setUserSession($user);
			//	echo var_dump($this->setUserSession($user));
				return redirect()->to('/dashboard');
		 }
		}

		return  view("home/login",$data);



	//--------------------------------------------------------------------
}
	// Register4

	private function setUserSession($user){

		$data=[
			'id'=>$user['id'],
			'firstname'=>$user['firstname'],
			'lastname'=>$user['lastname'],
				'email'=>$user['email'],
			'isLogedIn' => true,
			'loginUser'=>$user['role'],

		];

		session()->set($data);

		return true;




	}

	public function login()
	{
				$data['title'] = "Users";
				if ($this->request->getMethod()=='post')
							{
								$rules=
											[
													'email'=> 'required|min_length[6]|max_length[50]|valid_email',
													'password'=> 'required|min_length[8]|max_length[255]|validateUser[email,password]',
											];
								$errors=[
													'password'=>
																		[
																			'validateUser'=> 'Email or Password don \'t match',
																		]
												];
							 if (! $this->validate($rules,$errors))
									{
											$data['validation']= $this->validator;
									}
				else
							{
							$user= $this->model->where('email',$this->request->getVar('email'))
																		->first();
								$this->setUserSession($user);
								return redirect()->to('/dashboard');
							}
		}
				return  view("home/login");
	}

public function dashboard()
{
    	return  view("home/dashboard");
}


	public function logout(){
		session()->destroy();
		return redirect()->to('/');

	}



}
