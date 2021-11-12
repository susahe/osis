<?php namespace App\Models;

use CodeIgniter\Model;


class TestModel extends Model {
  protected $table ='student';
  protected $primaryKey = 'id';
  protected $allowedFields = ['address','days','time','created','update','slug','status'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];


protected $validationRules = [
    'address' => 'required',
    'days' => 'required',
    'time' => 'required'


];


protected $validationMessages = [

  'adresss' => ['required'=>'Sorry you are not allowed to move foward'],
  'days' => ['required' =>'this is needed'],
  'time'=> ['required'=>'this is must field'],


];

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


}
