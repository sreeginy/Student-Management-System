<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grades=Grade::all();
        $grade;
            $term = $request->query('term');
                if (!empty($term)) { 
                $grades=Grade::where([
                    ['name', '!=', Null],
                    [function ($query) use ($request) {
                        if (($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                    }
                    }]
                ])
            ->orderBy('id', "ASC")
            ->paginate(10);
            } else {
                $grades = Grade::oldest()
                    ->paginate(4);
            }
          
        return view('grade/index',compact('grades'))
               ->with('i', (request()->input('page', 1)-1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade/create');
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
            // 'file' => ['required'],
            'name' => 'required|min:1',
            'order' => 'required|min:1',
            'is_active' => 'required',
        ]);  
      
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('/images'),$imageName);

        $grades = new Grade;
        $grades->profileimage = $imageName;
        $grades->name = $request->name;
        $grades->order = $request->order;
        $grades->is_active=$request->is_active;
        //return $grades;
        $grades->save();

        return redirect('grades')->with('status', 'The record is successfully saved !! :)');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
          //$grade=Student::find($id);
          return view('grade/show',compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //$student=Student::find($id);
        return view('grade/edit',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $grade = Grade::find($id);
        //return $id;
        //$grade = Grade::find($id);
        if ($request->hasFile('file')) {
        $name=$request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/images'),$imageName);
        
       $grade->profileimage = $imageName;
        }
       $grade->name = $request->name;
       $grade->order = $request->order;
       $grade->is_active=$request->is_active;

       $grade->save();
       return redirect('grades')->with('status', 'The record is successfully updated! :)!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //$grade=Grade::find($grade);
      //$grade->delete();
      //echo "Rgradeecord deleted successfully.<br/>";

       $grade->delete();
       return redirect('grades')->with('status', 'The record is successfully deleted! :( ');;
    }
}
