<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexOfStudent(){
        $users = User::where('type', 'estudante')->get();
        foreach($users as $user){
            $date = $user->created_at;
            $date = Carbon::parse($date);
            $date = $date->format('d-m-Y');
            // dd($date);
            $user->created_at = $date;
        }
        return view('admin.listar-estudante', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTeacher()
    {
        return view('admin.registar-docente');
    }

    public function createStudent()
    {
        $faculties = Faculty::all();
        return view('admin.registar-estudante', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
