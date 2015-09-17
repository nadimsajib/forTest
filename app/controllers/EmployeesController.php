<?php

class EmployeesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $registration_form_rules = array(
		'photo' => 'image|max:3000',
		'photo' => 'required|mimes:jpg,jpeg,bmp,png',
		'first_name' => 'required|alpha|min:3',
		'last_name'  => 'required',
		'email' => 'required|email|unique:employees',           // required and has to match the password field
	);
	public function __construct(){

	}
	public function index()
	{
		$employees_all = Employees::all();
		return View::make('employees.index',compact('employees_all'));
	}

	public function create()
	{
		return View::make('employees.create');
	}

	public function store()
	{
		$first_name= Input::get('first_name');
		$last_name= Input::get('last_name');
		$email= Input::get('email');
		$image=Input::file('photo');
		$input_data= Input::all();
		$employees = new Employees();


		//validation check

		$validator = Validator::make(Input::all(), $this->registration_form_rules);

		// check if the validator failed -----------------------
		if (!$validator->fails()) {

				$employees->first_name = $first_name;
				$employees->last_name = $last_name;
				$employees->email = $email;
			$img_dir = "images/employees/" . date("h-m-y");

			if (!file_exists($img_dir)) {
				mkdir($img_dir, 0777, true);
			}
			$filename = $image->getClientOriginalName();
			$pathL = public_path($img_dir."-".$filename);
			Image::make($image->getRealPath())->resize(900, 600)->save($pathL);
			$employees->photo = $img_dir."-".$filename;


				//insert data

				if($employees->save()){
					Session::flash('success','Successfully added');
					return Redirect::to('/');
				}
				else{
					Session::flash('success','Something Wrong');
					return Redirect::to('employees/create');
				}
		}else{
			$messages = $validator->messages();
			return Redirect::to('employees/create')->withErrors($validator);
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$employees = Employees::find($id);
		return View::make('employees.create',compact('employees'));
	}
	public function update($id)
	{
		$data = Input::all();

		$employees = Employees::find($id);
		if ($data) {

			$employees->first_name = Input::get('first_name');
			$employees->last_name = Input::get('last_name');
			//update without email
			//$employees->email = Input::get('email');
			$employees->save();
			Session::flash('success', 'Successfully Updated!');
			return Redirect::to('/');
		}
	}

	public function destroy($id)
	{
		$employees = Employees::find($id);
		$employees->delete();
		Session::flash('success', 'Successfully deleted!');
		return Redirect::to('/');

	}


}
