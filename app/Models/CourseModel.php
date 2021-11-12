<?php namespace App\Models;

use CodeIgniter\Model;



class CourseModel extends Model {
  protected $table ='courses';
  protected $primaryKey = 'id';
  protected $allowedFields = ['csname','cstheryhrs','cspracthrs','csassinghrs','csprojecthrs','csfees','cstype','csperyear','csslug','csduemonths','status','updated','created'];


public function getCourses($slug=null){
  if(!$slug){
    return $this->findAll();
  }

  return $this->asArray()
          ->where(['csslug'=>$slug])
          ->first();
}
function getCountCourses(){

return $query = $this->countAll() ;
}

public function selectCourseById($course_id)
{
    $result = $this->select('csname')
        ->where('id',$course_id)
        ->first();


    return $result;
}





}
