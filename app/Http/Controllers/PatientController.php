<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all=Patient::all();
        return(view('patient.all_pat' ,['all'=>$all]  ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function all(){
return Patient::all();
    }
    public function create()
    {
        return view('patient.create_patient');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   if(
        Patient::create([
            'name' => $request->name ,
            'phone' => $request->phone,
            'born'=>$request->born,
        ])){
        // return redirect()->route('/success');
        return view('success');}
    else{
        return view('errors',["message"=>"patient already exists"]);
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
