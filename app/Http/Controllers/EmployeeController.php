<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function index()
    {
        $all_employee = Employee::all();
        return  view('employee.manage-employee',compact('all_employee'));
    }
    public function create()
    {
        return view('employee.add-employee');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string',
            'dob' => 'required|string',
            'present_address'=>'required|string',
            'parmanent_address'=>'required|string',
        ]);

        $store_employee = new Employee();
        $store_employee->email = $request->email;
        $store_employee->first_name = $request->first_name;
        $store_employee->last_name = $request->last_name;
        $store_employee->password = Hash::make($request->password);
        $store_employee->dob = $request->dob;
        $store_employee->present_address = $request->present_address;
        $store_employee->parmanent_address = $request->parmanent_address;
        $store_employee->save();

        return  Redirect::route('manage-employee')->with('Employee Added Succesfully');
    }
    public function edit($id)
    {
        $edit_employee = Employee::find($id);
        return view('employee.edit-employee',compact('edit_employee'));
    }
    public function update(Request $request,$id)
    {
        $store_employee = Employee::find($id);
        $store_employee->email = $request->email;
        $store_employee->first_name = $request->first_name;
        $store_employee->last_name = $request->last_name;
        $store_employee->password = Hash::make($request->password);
        $store_employee->dob = $request->dob;
        $store_employee->present_address = $request->present_address;
        $store_employee->parmanent_address = $request->parmanent_address;
        $store_employee->update();

        return  Redirect::route('manage-employee')->with('Employee Updated Succesfully');
    }
    public function destroy($id)
    {
        $delete_employee = Employee::destroy($id);
        return Redirect::back();
    }
}
