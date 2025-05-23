<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('admin.listar-faculdade', compact('faculties'));
        // return response()->json($faculties);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.registar-faculdade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'location' => ['string', 'nullable'],
                'phone' => ['string', 'nullable'],
            ], [
                'name.required' => 'É obrigatório preencher o nome da faculdade',
                'name.max' => 'O nome da faculdade deve ter um máximo de 255 caracteres',
            ]);

            DB::beginTransaction();
            $faculty = Faculty::create([
                'name' => $request->name,
                'location' => $request->location,
                'phone' => $request->phone,
            ]);
            DB::commit();

            // return response()->json($faculty);
            $message = "A faculdade ($request->name) foi registada com sucesso!";
            return Redirect::back()->with('success', 'success')->with('message', $message);
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
            $faculty = Faculty::find($id);
            return response()->json($faculty);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $faculty = Faculty::find($id)->first();
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'location' => ['string', 'nullable'],
                'phone' => ['string', 'nullable'],
            ]);

            DB::beginTransaction();
            $faculty->name = $request->name;
            $faculty->location = $request->location;
            $faculty->phone = $request->phone;
            $faculty->save();
            DB::commit();

            return response()->json($faculty);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
