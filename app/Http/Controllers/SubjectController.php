<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.listar-cadeira', compact('subjects'));
        // return response()->json($subjects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        $courses = Course::all();
        return view('admin.registar-cadeira', compact('courses', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'course_id' => ['required', 'integer'],
                'semester' => ['numeric', 'nullable'],
                'year' => ['numeric', 'nullable'],
            ],[
                'name.required' => 'É obrigatório preencher o nome da cadeira!',
                'name.max' => 'O nome da cadeira deve ter um máximo de 255 caracteres!',
                'course_id.required' => 'É obrigatório indicar o curso!',
                'course_id.integer' => 'É obrigatório indicar o curso!',
            ]);

            $course = Course::where('id', $request->course_id)->get()->first();
            if($course) {
                $exists = Subject::where('course_id', $course->id)->where('name', $request->name)->exists();
                if($exists) {
                    return response()->json(['error' => 'This subject already exists in this course']);
                }

                DB::beginTransaction();
                $subject = Subject::create([
                    'name' => $request->name,
                    'course_id' => $request->course_id,
                    'semester' => $request->semester,
                    'year' => $request->year
                ]);
                DB::commit();

                $message = "A Cadeira ($request->name) foi registada com sucesso!";
                return Redirect::back()->with('success', 'success')->with('message', $message);
                // return response()->json($subject);
            } else {
                return Redirect::back()->with('error', 'error')->with('message', 'Verifique se essa cadeira não existe!')->withInput();
                // return response()->json(['error' => 'Verify if the course id exists']);
            }
        }catch(Exception $e){
            DB::rollBack();
            return Redirect::back()->with('error', 'error')->with('message', $e->getMessage())->withInput();
            // return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $subject = Subject::find($id);
            return response()->json($subject);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'course_id' => ['required', 'integer'],
                'semester' => ['numeric', 'nullable'],
                'year' => ['numeric', 'nullable'],
            ]);

            $subject = Subject::where('id', $id)->first();
            $course = Course::where('id', $request->course_id)->get()->first();
            if($course) {
                $exists = Subject::where('course_id', $course->id)->where('name', $request->name)->exists();
                if($exists) {
                    DB::beginTransaction();
                    $subject->name = $request->name;
                    $subject->course_id = $request->course_id;
                    $subject->semester = $request->semester;
                    $subject->year = $request->year;
                    $subject->save();
                    DB::commit();
                    return response()->json($subject);
                }

                return response()->json(['error' => 'This subject does not exists in this course']);

            } else {
                return response()->json(['error' => 'Verify if the course id exists']);
            }
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
