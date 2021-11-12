<?php namespace App\Controllers;
use App\Models\UserModel;
use App\Models\StudentModel;

use App\Models\Custom;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;


class Student extends BaseController
{
				private $model;
				private $mail;
				private $studentmodel;
				private $curd;

				public function __construct()

				{
					// helper classess
					helper('form');
					helper('date');
					$this->db = db_connect();



					// Using Model create Objects
					$this->model 				= new UserModel();
					$this->studentmodel = new StudentModel();
					$this->curd = new Curd();
					$this->mail 				= new Send_Mail();

				}

				// login
				public function index()
				{
					$data=[];


					 //$student = new
					// echo var_dump($student);
					//
				//	 $data['students'] = $student->getStudents();
				//	echo var_dump($data);
				//$model = new StudentModel();

					//	echo var_dump($data);

					$data['students'] = $this->studentmodel->getStudents();
				//		echo var_dump($std);

					echo  view("users/student/student_view",$data);

				}

				public function view_profile($slug=null){
				//	$model = new UserModel();
						$data['user'] = $this->model->getusers($slug);

						if (empty($data['user']))
					 {
							 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
					 }
					 		$this->setUserSession($data['user']);
							 $data['title'] = $data['user']['firstname'];

					return  view("users/user_profile_view",$data);

				}


				// Create a user

				public function create_user(){
					$data=[];
					if ($this->request->getMethod()=='post')
					{
					$rules=[
						'firstname'=> 'required|min_length[3]|max_length[20]',
						'lastname'=> 'required|min_length[3]|max_length[20]',
						'email'=> 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
						'password'=> 'required|min_length[8]|max_length[255]',
						'mobile'=> 'required|valid_phone_number[mobile]',
						'cpassword'=> 'matches[password]',
					];
				 if (! $this->validate($rules)){

					$data['validation']= $this->validator;
				}
				 else
					{


						//	$model = new UserModel();
					$newdata = [

						'email' => $this->request->getVar('email'),
						'password' => $this->request->getVar('password'),
						'role' => $this->request->getVar('role'),
						'firstname' => $this->request->getVar('firstname'),
						'lastname' => $this->request->getVar('lastname'),
						'mobile' => $this->request->getVar('mobile'),
						'slug' => url_title($this->request->getVar('email')),
					];

					$this->model->save($newdata);

					// create pre registred ID
					$user_id = $this->model->getInsertID();
					$myTime = new Time('now');
					$time = Time::parse($myTime);
					$preregid = $time->getYear().$user_id;
					$gmail =$newdata['email'];

					$email_message=	$this->mail->user_reg_sendmail($gmail,$preregid);
					$message = "You areSucessfuly registred your Pre Registration Id is"." ".$preregid." ".$email_message;




						$session= session();

					$session->setFlashdata('sucess', $message);

					return redirect()->to('/');
				 }
			}
				return  view("users/create_user",$data);
				}




			// Set Sessions

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



			// Edit users

				public function edit_user(){

							$data=[];
							helper('form');
							  $model = new UserModel();
							if ($this->request->getMethod()=='post')
							{
								$rules=[
									'firstname'=> 'required|min_length[3]|max_length[20]',
									'lastname'=> 'required|min_length[3]|max_length[20]',
								];
								if ($this->request->getPost('password')!=''){
									$rules['password']= 'required|min_length[3]|max_length[20]';
									$rules['cpassword']= 'matches[password]';
								}

							 if (! $this->validate($rules)){

							 	$data['validation']= $this->validator;
							}
							 else
							  {


								$newdata = [
									'idusers' => session()->get('id'),
								  'role' => $this->request->getPost('role'),
								  'firstname' => $this->request->getPost('firstname'),
								  'lastname' => $this->request->getPost('lastname'),
									'email' => $this->request->getVar('email'),
									'mobile'=> $this->request->getVar('mobile'),
										'slug' => url_title($this->request->getVar('email')),
								    'update' => date('Y-m-d H:i:s',now()),
								];

					if ($this->request->getPost('password')!=''){
						$newdata['password']= $this->request->getPost('password');
					}


							//	echo var_dump($newdata);
								//$model->update(session()->get('id'),$newdata);
							//	$model->update($newdata['idusers'], $newdata);
								$model->save($newdata);
								session()->setFlashdata('sucess', 'Sucessfully Updated');
								return redirect()->to('/');
							 }
							}
							$data['user']=$model->where('idusers',session()->get('id'))->first();


							return view("users/user_profile_view",$data);


				}
				public function activate_student($id)
						{
								$message = "The user sucessfully activated";
								//$data=$this->model->getUserStatusById($id);
								$this->curd->change_status($id,$status=0,$message,$this->model);
	  				 		return redirect()->to('/student');
							}


				public function deactivate_student($id)
						{
							$message = "The user sucessfully deactivated";
							//$data=$this->model->getUserStatusById($id);
							$this->curd->change_status($id,$status=1,$message,$this->model);
							return redirect()->to('/student');
						}






}
