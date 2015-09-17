<?php

class Employees extends Eloquent
{

    protected $table = 'employees';

    private $rules = array(
        'photo' => 'image|max:3000',
        'photo' => 'required|mimes:jpg,jpeg,bmp,png',
        'first_name' => 'required|alpha|min:3',
        'last_name'  => 'required',
        'email' => 'required|email|unique:employees', // required and must be unique in the employees table
    );

    public function validate($input_data){
        $validate = Validator::make($input_data, $this->rules);
        // check for failure


        if ($validate->fails())
        {
            // set errors and return false

            $nb = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }

    public function errors(){
        return $this->errors();
    }


}