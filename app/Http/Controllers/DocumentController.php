<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return response()->json($documents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'user_id' => ['required', 'numeric'],
                'size' => ['required', 'string'],
                'extension' => ['required', 'string'],
                'mime_type' => ['required', 'string'],
            ]);

            // $course = Course::where('id', $request->course_id)->get()->first();

            DB::beginTransaction();
            $document = Document::create([
                'user_id' => $request->user_id,
                'file_name' => $request->file_name,
                'size' => $request->size,
                'extension' => $request->extension,
                'description' => $request->description,
                'mime_type' => $request->mime_type,
            ]);
            DB::commit();

            return response()->json($document);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $document = Document::find($id);
            return response()->json($document);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $document = Document::find($id)->first();
        try{
            // $course = Course::where('id', $request->course_id)->get()->first();

            DB::beginTransaction();
            // $document->user_id => $request->user_id;
            $document->file_name = $request->file_name;
            $document->size = $request->size;
            $document->extension = $request->extension;
            $document->description = $request->description;
            $document->mime_type = $request->mime_type;
            $document->save();
            DB::commit();

            return response()->json($document);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
