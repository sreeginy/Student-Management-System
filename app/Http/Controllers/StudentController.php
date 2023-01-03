<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\grade;
use App\Models\subject;

use Illuminate\Support\Facades\Input as input;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // echo 'giny';
        $students=Student::all();
        // $student;
        $grades=Grade::all();
            $term = $request->query('term');
                if (!empty($term)) {
                    $students=Student::where([
                    ['firstname', '!=', Null],
                    [function ($query) use ($request) {
                        if (($term = $request->term)) {
                        $query->orWhere('firstname','LIKE', '%' . $term . '%')->get();
                        }
                    }]
                    ])
                    ->orderBy('id', "ASC")
                    ->paginate(10);
                } else {
                    $students = Student::oldest()
                        ->paginate(4);
                }
       //  $students = Student::oldest()->paginate(8);
        // $students = Student::latest()->paginate(5);
        //   $students =Student::paginate(7);
        
        return view('student/index',compact('students','grades'))
               ->with('i', (request()->input('page', 1)-1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::all();
        $grades=Grade::all();
        $subjects=Subject::all();
        return view('student/create',compact('students', 'grades','subjects'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate =$request->validate([
            'file' => ['required'],
            // |image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'firstname' => ['required','min:5'],
            'lastname' => ['required','min:2'],
            'gender' => ['required','in:male,female'],
            'subject_name' => ['required','array','min:1'],
            'subject_name.*' => ['required'],
            'grade_name' => ['required'],
            'address' => ['required']   
       ]);  

       $image = $request->file('file');
       $imageName = time().'.'.$image->extension();
       $image->move(public_path('/images'),$imageName);
   
       $students = new Student();
       $students->profileimage = $imageName;
       $students->firstname = $request->firstname;
       $students->lastname = $request->lastname;
       $students->gender = $request->gender;
       $students->subject_name = implode(',', $request->subject_name);
       $students->grade_name = $request->grade_name;
       $students->address = $request->address;

 
       $students->save();
      return redirect('students')->with('status','The record is successfully saved! !! :)');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //$student=Student::find($id);
        return view('student/show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
         //  $student=Student::find($id);
      $grades=Grade::all();
      $subjects=Subject::all();
        return view('student/edit',compact('student','grades','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        // return $id;
        // $student = Student::find($id);
        if ($request->hasFile('file')) {
        $name=$request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('/images'),$imageName);

         $student->profileimage = $imageName;
        }
         $student->firstname = $request->firstname;
         $student->lastname = $request->lastname;
         $student->gender= $request->gender;
         $student->subject_name =implode(',', $request->subject_name);
         $student->grade_name=$request->grade_name;
         $student->address = $request->address;

         $student->save();
         return redirect('students')->with('status', 'The record is successfully updated! :)');;
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
         // $student=Student::find($id);
         $student->delete();

         return redirect('students')->with('status', 'The record is successfully deleted! :( ');;
    }
}
