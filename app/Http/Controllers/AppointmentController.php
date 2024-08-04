<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($doctor_id)
    {
        $doctors=Doctor::all();
        $all= Appointment::where('doctor_id', $doctor_id)->get();
           $name= Doctor::where('id',"=",$doctor_id)->get('name') ;
   return(view('appointment.all_appoin' ,compact('all','name')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors=Doctor::all();
        $pats=Patient::all();
        return view('appointment.create_appointment',["doctors"=>$doctors,"pats"=>$pats]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {$st=$request->has("status")?1:0;

    if(!empty($request->status)){
        $st=$request->status;
    }else{
        $st="0";
    }
    $startTime = Carbon::parse($request->when);
    $endTime = $startTime->copy()->addMinutes(30);

    $overlappingAppointments = Appointment::where(function($query) use ($startTime, $endTime) {
        $query->where(function($query) use ($startTime, $endTime) {
            $query->where('when', '>=', $startTime)
                  ->where('when', '<', $endTime);
        })->orWhere(function($query) use ($startTime, $endTime) {
            $query->where('when', '<=', $startTime)
                  ->whereRaw('DATE_ADD(`when`, INTERVAL 30 MINUTE) > ?', [$startTime]);
        });
    })->exists();

        if ($overlappingAppointments) {
            return view("errors",["message"=>"has date in this time"]);
    }
        else{
            Appointment::create([
                'doctor_id' => $request->doctor_id,
                'patient_id' => $request->patient_id,
                'when' => $request->when,
                'status' =>$st,
            ]);
                return view("success");

        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Appointment = Appointment::where('id','=',$id)->first();
        $Appointment = Appointment::find($id);
        $Appointmentall = Appointment::where('id','=',$id)->first();
        $Appointmentall=Appointment::get();
        $doctors=Doctor::all();
        $pats=Patient::all();
        return view('appointment.edit_appointment',['pats'=>$pats,'doctors'=>$doctors,'Appointment'=>$Appointment,"Appointmentall"=>$Appointmentall]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        if(!empty($request->status)){
            $st=$request->status;
        }else{
            $st="0";
        }
        $appoionment = Appointment::find($id);
        $data = [
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'when' => $request->when,
            'status' => $st,
        ];
       if( $appoionment->update($data)){

        return view("success");
    }
    else{
        return view("errors",["message"=>"has date in this time"]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($appo=Appointment::find($id)){
            if($appo->delete()){
             return view('Success');
            }
        }
    else {
        return view("errors",["message"=>"date not found"]);
    }
    }
    
}
