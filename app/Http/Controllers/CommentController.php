<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
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
                'document_id' => ['required', 'numeric'],
                'content' => ['required', 'string'],
            ]);

            // $course = Course::where('id', $request->course_id)->get()->first();

            DB::beginTransaction();
            $comment = Comment::create([
                'user_id' => $request->user_id,
                'document_id' => $request->document_id,
                'content' => $request->content,
            ]);
            DB::commit();

            return response()->json($comment);
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
            $comment = Comment::find($id);
            return response()->json($comment);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $comment = Comment::find($id)->first();
            $request->validate([
                'content' => ['required', 'string'],
            ]);

            DB::beginTransaction();
            $comment->content = $request->content;
            $comment->save();
            DB::commit();

            return response()->json($comment);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
