<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.view_reviews',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $rates = ['0','1','2','3','4','5'];
        return view('reviews.create_review',compact('patients','doctors','rates'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if( $request->isMethod('post') ) {
        $validate = Validator::make($request->all(),[
            'patient_id' =>'required|string|exists:patients,id',
            'doctor_id' =>'required|string|exists:doctors,id',
            'rate' =>'required|integer|min:0|max:5',
            'comment' =>'required|string'
        ]);

        if($validate->fails()) {
            dd($validate->errors());
        }else{
            $data = [
                'patient_id' => $request->patient_id,
                'doctor_id'=> $request->doctor_id,
                'rate' => $request->rate,
                'comment' => $request->comment
            ];
            $appointment_status = Appointment::where('patient_id',$request->input('patient_id'))
            ->where('doctor_id',$request->input('doctor_id'))
            ->value('status');
            $patients = array(Review::where('doctor_id',$request->input('doctor_id'))->value('patient_id'));
        
            if(in_array($request->patient_id,$patients)){
                return view('errors',['message'=>'not allowed to add this review']);
            }
           
            if($appointment_status == 1){
                $review = Review::create($data);
                return view('reviews.view_review',compact('review'));
            }
            else{
                return view('errors',['message'=>'not allowed to add this review']);
            }
            
        }
    }else{
        return view('reviews.create_review');
   }
    }

    /**
     * Display the specified resource.
     */
    public function show( Review $review )
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        $review = Review::find($id);
        if( $review->delete()) {
            return view('success');
        }
    }
    public function view_doctorrate(){
        $doctors = Doctor::all();
        return view('reviews.view_doctorrate',compact('doctors'));
    }

    public function getRateAvarege(Request $request ) {
           $rates = Review::where('doctor_id',$request->input('doctor_id'))->pluck('rate')->toArray();
           $doctor_name = Doctor::where('id',$request->input('doctor_id'))->value('name');
            $count = count($rates);
            $sum = array_sum($rates);
            if( $count == 0 ){
                $count = 1;
            }
            $avg = floor($sum/$count);
            
            return view('reviews.avarage_rate',compact('doctor_name','avg'));
        
    }
  
}
