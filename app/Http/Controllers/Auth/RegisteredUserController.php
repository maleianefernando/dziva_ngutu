<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        dd($request);
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'lastname' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string'],
                'type' => ['required', 'string'],
                'faculty_id' => ['numeric'],
                'course_id' => ['numeric'],
            ]);

            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'lastname' => $request->lastname,
                'role' => $request->role,
                'type' => $request->type,
                'uploads' => 0,
                'faculty_id' => $request->faculty_id,
                'course_id' => $request->course_id,
            ]);
            DB::commit();
            event(new Registered($user));

            Auth::login($user);

            return response()->json($user);
            // return redirect(route('dashboard', absolute: false));
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id){
        try{
            $user = User::find($id);
            return response()->json($user);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id){
        try{
            $user = User::find($id)->first();
            if($user){
                // $request->validate([
                //     'name' => ['required', 'string', 'max:255'],
                //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
                //     'lastname' => ['required', 'string', 'max:255'],
                //     'role' => ['required', 'string'],
                //     'type' => ['required', 'string'],
                //     'faculty_id' => ['integer'],
                //     'course_id' => ['integer'],
                // ]);

                DB::beginTransaction();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->lastname = $request->lastname;
                $user->role = $request->role;
                $user->type = $request->type;
                $user->uploads = $request->uploads;
                $user->faculty_id = $request->faculty_id;
                $user->course_id = $request->course_id;
                $user->save();
                DB::commit();
                return response()->json($user);
            }
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
