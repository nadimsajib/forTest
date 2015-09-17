<?php

class EmployeesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees_all = Employees::all();
		return View::make('employees.index',compact('employees_all'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employees.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$first_name= Input::get('first_name');
		$last_name= Input::get('last_name');
		$email= Input::get('email');
		$input_data= Input::all();
		$employees = new Employees();

		//validation check
		if ($employees->validate($input_data)){

				$employees->first_name = $first_name;
				$employees->last_name = $last_name;
				$employees->email = $email;
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
			Session::flash('success', "Email already Exists. Try Again! ");
			return Redirect::to('employees/create');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employees = Employees::find($id);
		// Load user/createOrUpdate.blade.php view
		return View::make('employees.create')->with('employees', $employees);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();

		$employees = Employees::find($id);

		// attempt validation
		if ($data) {

			$employees->first_name = Input::get('first_name');
			$employees->last_name = Input::get('last_name');
			$employees->email = Input::get('email');
		}

		$employees->save();
		Session::flash('success', 'Successfully Updated!');
		return Redirect::to('/');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$employees = Employees::find($id);
		$employees->delete();
		Session::flash('success', 'Successfully deleted!');
		return Redirect::to('/');

	}


}
