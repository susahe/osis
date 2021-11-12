<?php namespace App\Models;

use CodeIgniter\Model;


class StudentModel extends Model {
  protected $table ='student';
  protected $primaryKey = 'id';
  protected $allowedFields = ['address','days','time','created','update','slug','status'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];



  public function getusers($slug = false)
  {
      if ($slug === false)
      {
          return $this->findAll();
      }

      return $this->asArray()
                  ->where(['slug' => $slug])
                  ->first();
  }

  public function getStudent($id)
  {
      return $this->asArray()
                  ->where(['id'=> $id])
                  ->first();
  }





  public function getStudents()
  {


  //  $builder->db->table('student');
    $this->select('*');
    $this->join('users', 'student.id = users.id' );
    $student = $this->get()->getResultArray();
    return $student;


  }

public function all()
{
  $this->db->table('student')->get->getResult();
}

}
