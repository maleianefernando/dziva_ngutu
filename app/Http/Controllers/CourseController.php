<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.listar-curso', compact('courses'));
        // return response()->json($courses);
    }

    public function search_by_faculty($faculty_id) {
        $courses = Course::where('faculty_id', $faculty_id)->get();
        return response()->json($courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.registar-curso', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'faculty_id' => ['required', 'numeric'],
                'duration' => ['numeric', 'nullable'],
            ],[
                'name.required' => 'É obrigatório preencher o nome do curso!',
                'name.max' => 'O nome do curso deve ter um máximo de 255 caracteres',
                'faculty_id.required' => 'Por favor, selecione uma faculdade!',
                'faculty_id.numeric' => 'Ocorreu um erro ao selecionar a faculdade!',
            ]);

            $faculty = Faculty::where('id', $request->faculty_id);
            if($faculty) {
                DB::beginTransaction();
                $course = Course::create([
                    'name' => $request->name,
                    'faculty_id' => $request->faculty_id,
                    'duration' => $request->duration,
                ]);
                DB::commit();

                // return response()->json($course);
                $message = "O curso ($request->name) foi registada com sucesso!";
                return Redirect::back()->with('success', 'success')->with('message', $message);
            } else {
                // return response()->json(['error' => 'Verify if the faculty id exists']);
                return Redirect::back()->with('error', 'error')->with('message', 'Esta faculdade já existe')->withInput();
            }
        }catch(Exception $e){
            DB::rollBack();
            // return response()->json(['error' => $e->getMessage()]);
            return Redirect::back()->with('error', 'error')->with('message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $course = Course::find($id);
            return response()->json($course);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
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
                'faculty_id' => ['required', 'integer'],
                'duration' => ['string', 'nullable'],
            ]);

            $course = Course::find($id)->first();
            $faculty = Faculty::where('id', $request->faculty_id);
            if($faculty) {
                DB::beginTransaction();
                $course->name = $request->name;
                $course->faculty_id = $request->faculty_id;
                $course->duration = $request->duration;
                $course->save();
                DB::commit();

                return response()->json($course);
            } else {
                return response()->json(['error' => 'Verify if the faculty id exists']);
            }
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
