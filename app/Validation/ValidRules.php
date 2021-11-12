<?php namespace App\Validation;




class ValidRules {
  public function valid_phone_number($value)
  {

    $value=trim($value);
    if($value=='')
    {
      return True;
    }
    else  {
  if (preg_match('/^\(?[0-9]{3}\)?[-,]?[0-9]{3}[-,]?[0-9]{4}$/',$value))
  {
    return preg_replace('/^\(?([0-9]{3})\?[-,]?([0-9]{3})[-,]?([0-9]{4})$/','($1)$-$3',$value);
  }
  else {
    return False;
  }
  }



}
}
