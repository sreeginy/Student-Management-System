<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects=Subject::all();
        $subject;
            $term = $request->query('term');
                if (!empty($term)) {
                $subjects=Subject::where([
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
                $subjects = Subject::oldest()
                    ->paginate(4);
            } 

        return view('subject/index',compact('subjects'))
                ->with('i', (request()->input('page', 1)-1) * 5);

    }

    public function pdfview(Request $request)
    {
        $subjects=Subject::all();
        view()->share('subjects',$subjects);
        if($request->has('download')){
            PDF::setOPtions(['dpi'=>'150','defaultFont'=>'sans-serif']);
            $pdf = PDF::loadview('subject.pdf');
            return $pdf->download('subject.pdf');
        }

        return view('subject/pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject/create');
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
            'name' => 'required|min:1',
            'color' => 'required|min:1',
            'order' => 'required|min:1',
            'height' => 'required|min:1',
        ]);  

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('/images'),$imageName);
        
        $subjects = new Subject;
        $subjects->profileimage = $imageName;
        $subjects->name = $request->name;
        $subjects->color = $request->color;
        $subjects->order = $request->order;
        $subjects->height = $request->height;
        $subjects->save();
        return redirect('subjects')->with('status', 'The record is successfully inserted !! :)');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subject/show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //$subject=Subject::find($id);
        return view('subject/edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        //return $id;
        //$subject = Subject::find($id);
        if ($request->hasFile('file')) {
        $name=$request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('/images'),$imageName);

        $subject->profileimage = $imageName;
        }
        $subject->name = $request->name;
        $subject->color = $request->color;
        $subject->order = $request->order;
        $subject->height = $request->height;

        $subject->save();
        return redirect('subjects')->with('status', 'The record is successfully updated! :)');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //$subject->delete();
       //echo "Rgradeecord deleted successfully.<br/>";
       $subject->delete();

       return redirect('subjects')->with('status', 'The record is successfully deleted! :( ');;
    
    }
}
