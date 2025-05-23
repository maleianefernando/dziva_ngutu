<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Subject;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        $courses = Course::all();
        $user_id = Auth::user()->id;
        return view('admin.doc-upload', compact('user_id', 'documents', 'courses'));
        // return response()->json($documents);
    }

    public function indexStudent(){
        $user = User::where('id', Auth::user()->id)->first();
        $documents = Document::where('course_id', $user->course_id)->orderByDesc('created_at')->get();
        $subject = Subject::all();
        // return $subject;
        return view('student.doc-list', compact('documents', 'subject'));
    }

    public function search_by_subject ($subject_id){
        $documents = Document::where('subject_id', $subject_id)->get();
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
        // $fileInfo = [];
        try{
            $request->validate([
                'user_id' => ['required', 'numeric'],
                'files' => ['required'],
                'course_id' => ['required', 'numeric'],
                'subject_id' => ['required', 'numeric'],
            ], [
                'files.required' => 'Por favor selecione um ficheiro!',
                'course_id.required' => 'Por favor, informe o curso!',
                'subject_id' => 'Por favor, informe a cadeira!',
            ]);

            DB::beginTransaction();
            $files = $request->file('files');
            $subject = Subject::where('id', $request->subject_id)->first();
            foreach ($files as $index => $file) {
                // $filename = uniqid() . ".{$fileInfo[$index]['extension']}";
                $filename = Str::lower(Str::replace(' ', '_', $subject->name)). '_dziva_ngutu_'. time() .'.'.$file->getClientOriginalExtension();
                $document = Document::create([
                    'user_id' => $request->user_id,
                    'course_id' => $request->course_id,
                    'subject_id' => $request->subject_id,
                    'mime_type' => $file->getMimeType(),
                    'file_name' => $filename,
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension(),
                ]);
                $file->storeAs('', $filename, 'private');
            }
            DB::commit();

            // return response()->json($document);
            $message = "Ficheiro(s) enviado(s) enviados com sucesso!";
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
            $document = Document::find($id);
            return response()->json($document);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function print($filename) {
        $path = storage_path("app/private/{$filename}");
        if(!file_exists($path)){
            abort(404, 'Ficheiro nao encontrado');
        }
        return response()->file($path);
    }

    public function download($filename) {
        $path = storage_path("app/private/{$filename}");
        if(!file_exists($path)){
            abort(404, 'Ficheiro nao encontrado');
        }
        return response()->download($path);
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
