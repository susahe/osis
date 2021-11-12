<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Custom
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }


public function getStudents()
{
  $builder = $this->db->table('student');
//  $builder->db->table('student');
  $builder->select('*');
  $builder->join('users', 'student.id = users.id' );
  $student = $builder->get()->getResultArray();
  return $student;


}

public function all()
{
    $this->db->table('student')->get->getResult();
}

}
