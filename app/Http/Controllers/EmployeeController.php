<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::paginate(5);
        return view('employee.index', ['employees' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Company::all();
        return view('employee.form', ['companies' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required|email',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => intval($request->company),
        ]);
        return redirect('/employee')->with('status', 'Data Company Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // dd($employee);
        $companies = Company::all();
        return view('employee.form-edit', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required'
        ]);
        $employee->update([
            'name' => $request->name,
            'company_id' => $request->company,
            'email' => $request->email
        ]);

        return redirect('/employee')->with('status', 'Data Company Berhasil Di Update !!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employee')->with('status', 'data berhasil dihapus');
    }
}
