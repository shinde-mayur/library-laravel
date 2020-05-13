<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->orderBy('stud_id', 'asc')->simplePaginate(15);      
        return view('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student=new Student;
        $student->stud_id=$request->input('stud_id');
        $student->stud_name=$request->input('stud_name');
        $student->stud_gender=$request->input('stud_gender');
        $student->stud_class=$request->input('stud_class');
        $student->stud_contact=$request->input('stud_contact');
        $student->stud_email=$request->input('stud_email');
        $student->stud_addr=$request->input('stud_addr');
        $student->stud_city=$request->input('stud_city');
        $student->stud_pin=$request->input('stud_pin');
        $student->save();
        $msg=$request->input('stud_name')." with ID ".$request->input('stud_id')." added.";
        return redirect(route('student.add'))->with('status', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $students = Student::where('stud_name','LIKE','%'.$request->search.'%')->get();
        $students = Student::where('stud_id', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_name', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_class', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_gender', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_contact', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_city', 'LIKE', '%' . $request->search . '%')
          ->orWhere('stud_email', 'LIKE', '%' . $request->search . '%')
          ->simplePaginate(15);
          $students->appends(['search' => $request->search]);
        return view('students.search')->with('students',$students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($stud_id)
    {
         // $data = Student::findOrFail($stud_id);

    $stud_data = Student::where('stud_id', '=', $stud_id)
                                ->first();
    return view('students.edit', compact('stud_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        Student::where('stud_id', '=', $id)->update([
            'stud_name'=>$request->stud_name,
            'stud_class'=>$request->stud_class,
            'stud_gender'=>$request->stud_gender,
            'stud_contact'=>$request->stud_contact,
            'stud_email'=>$request->stud_email,
            'stud_addr'=>$request->stud_addr,
            'stud_pin'=>$request->stud_pin,
            'stud_city'=>$request->stud_city,
        ]);     
        $msg=$request->input('stud_name')." with ID ".$request->input('stud_id')." updated.";
        return redirect(route('student.edit',$id))->with('status', $msg);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stud_id)
    {
        Student::where('stud_id', '=', $stud_id)->delete();
        return redirect(route('student'))->with('status','Student with ID '.$stud_id.' deleted.');
    }
}
