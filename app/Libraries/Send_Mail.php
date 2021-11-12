<?php
namespace App\Libraries;
use CodeIgniter\I18n\Time;

class Send_Mail{
public function title($param){

  if($param['title']){
    return view('admin/cmps/title',$param);
  }
}


public function user_reg_sendmail($e_mail,$preregid)
{
        $email = \Config\Services::email();
        $email->setTo($e_mail);
				$email->setFrom('mithardware@gmail.com');
				$email->setSubject("Application has submited Successfully with pre-registraion id"." ".$preregid);
			 $email->setMessage("Your Application Successfully Submited and Your Pre Registred id is"." ".$preregid." "."Plase keep this with you for futrue refrence and First log your System then active using this code then your account will activated.  'Your Application Staus is Inactive'");
				if ($email->send())
				{
            return  'Email successfully sent';
        }
				else
				{
            //$data = $email->printDebugger(['headers']);
					$data ='Cant connect E-mail Error';
            return $data;
        }
}

public function registration_no($id){
  $myTime = new Time('now');
  $time = Time::parse($myTime);
  $preregid = $time->getYear()." ".$id;
  return $preregid;
}
}

 ?>
