<?php namespace App\Controllers;
use App\Models\CourseModel;
use App\Models\CourseModuleTaskModel;
use App\Libraries\Send_Mail;
use App\Libraries\Curd;
use CodeIgniter\I18n\Time;
class CourseModuleTask extends BaseController
{
	private $model;
	private $csmodel;
	private $mail;
	private $curd;
	public function __construct()

	{
		helper('form');
		helper('date');
	//	 $this->model = new CourseModuleModel();
		// $this->mail = new Send_Mail();
		$this->model = new CourseModuleTaskModel();
		$this->csmodel = new CourseModel();
		$this->curd = new Curd();
	}
	// login
	public function index()
	{


		$data['task'] = $this->model->findAll() ;





		// //	echo var_dump($data);
	 return  view("courses/course_modules_tasks_view",$data);

		// echo view("courses/course_view",$data);
		echo "course modules";
	}



	public function view_course($cslug=null){
		$model = new CourseModel();
			$data['course'] = $this->model->getCourses($cslug);

			if (empty($data['course']))
		 {
				 throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $cslug);
		 }
		 		$this->setCourseSession($data['course']);
				 $data['title'] = $data['course']['csname'];

		return  view("courses/course_view",$data);

	}

	public function create_course_module(){
		$data=[];
		if ($this->request->getMethod()=='post')
		{
		$rules=[
			'csname'=> 'required|min_length[3]|max_length[255]',
			'cstheryhrs'=> 'required',
			'cspracthrs'=> 'required',

			'csprojecthrs'=> 'required',
			'csfees'=> 'required',
			'cstype'=> 'required',
			'csperyear'=> 'required',
		//	'csimage'=> 'required',
				'csduemonths'=> 'required',
		];
	 if (! $this->validate($rules)){

		$data['validation']= $this->validator;
	}
	 else
		{



		$newdata = [

			'csname' => $this->request->getVar('csname'),
			'cstheryhrs' => $this->request->getVar('cstheryhrs'),
			'cspracthrs' => $this->request->getVar('cspracthrs'),

			'csprojecthrs' => $this->request->getVar('csprojecthrs'),
			'csfees' => $this->request->getVar('csfees'),
			'cstype' => $this->request->getVar('cstype'),
			'csperyear' => $this->request->getVar('csperyear'),
		//	'csimage' => $this->request->getVar('csimage'),
			'csduemonths' => $this->request->getVar('csduemonths'),
		'csslug' => url_title($this->request->getVar('csname')),
		];

	$this->model->save($newdata);


		$message = "Sucessfuly Added to the database";

		$session= session();

		$session->setFlashdata('sucess', $message);

		return redirect()->to('/courses');
	 }
}
	return  view("courses/create_course",$data);

	}



	private function setCourseModuleSession($course){

		$data=[
			'id'=>$course['id'],
			'csname'=> $course['csname'],
			'cstheryhrs'=> $course['cstheryhrs'],
			'cspracthrs'=> $course['cspracthrs'],

			'csprojecthrs'=> $course['csprojecthrs'],
			'csfees'=> $course['csfees'],
			'cstype'=> $course['cstype'],
			'csperyear'=>$course['csperyear'],
		//	'csimage'=> 'required',
				'csduemonths'=> $course['csduemonths'],


		];

		session()->set($data);

		return true;

	}


	public function edit_course_module(){

		$data=[];
		if ($this->request->getMethod()=='post')
		{
		$rules=[
			'csname'=> 'required|min_length[3]|max_length[255]',
			'cstheryhrs'=> 'required',
			'cspracthrs'=> 'required',

			'csprojecthrs'=> 'required',
			'csfees'=> 'required',
			'cstype'=> 'required',
			'csperyear'=> 'required',
		//	'csimage'=> 'required',
				'csduemonths'=> 'required',
		];
	 if (! $this->validate($rules)){

		$data['validation']= $this->validator;
	}
	 else
		{



		$newdata = [

			'csname' => $this->request->getVar('csname'),
			'cstheryhrs' => $this->request->getVar('cstheryhrs'),
			'cspracthrs' => $this->request->getVar('cspracthrs'),

			'csprojecthrs' => $this->request->getVar('csprojecthrs'),
			'csfees' => $this->request->getVar('csfees'),
			'cstype' => $this->request->getVar('cstype'),
			'csperyear' => $this->request->getVar('csperyear'),
		//	'csimage' => $this->request->getVar('csimage'),
			'csduemonths' => $this->request->getVar('csduemonths'),
		'csslug' => url_title($this->request->getVar('csname')),
		];

	$this->model->save($newdata);
					session()->setFlashdata('sucess', 'Sucessfully Updated');
					return redirect()->to('/courses');
				 }
				}
				$data['user']=$model->where('id',session()->get('id'))->first();


				return view("courses/course_view",$data);


	}

public function activate_course_module_task($id)
		{
			$message = "The user sucessfully activated";
			$this->curd->change_status($id,$status=0,$message,$this->model);
			return redirect()->to('/coursemoduletask');
			}


public function deactivate_course_module_task($id)
		{
			$message = "The user sucessfully deactivated";
			$this->curd->change_status($id,$status=1,$message,$this->model);
			return redirect()->to('/coursemoduletask');
		}






}
