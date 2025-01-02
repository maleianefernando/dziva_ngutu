<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
        // dd($request);
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
            ], [
                'name.required' => 'O campo de nome é obrigatório!',
                'name.max' => 'O campo de nome não deve exceder a 255 caracteres!',
                'lastname.required' => 'O campo de apelido é obrigatório!',
                'lastname.max' => 'O campo de apelido não deve exceder a 255 caracteres!',
                'email.required' => 'O campo de email é obrigatório!',
                'email.lowercase' => 'O campo de email apenas permite letras minusculas!',
                'email.email' => 'Insira um formato válido de email ex: exemplo@gmail.com!',
                'email.unique' => 'O email inserido já está registado, insira outro!',
                'faculty_id.required' => 'O campo de faculdade é obrigatório!',
                'faculty_id.numeric' => 'É obrigatório selecionar uma faculdade!',
                'course_id.required' => 'O campo de curso é obrigatório!',
                'course_id.numeric' => 'É obrigatório selecionar um curso!',
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

            // return response()->json($user);
            $message = 'Utilizador registado com sucesso!';
            $message .= Str::length($request->lastname) < 8 ? "\nA sua palavra-passe é o seu apelido duas vezes a mínusculo" : "\nA sua palavra-passe é o seu apelido duas vezes a mínusculo";

            return Redirect::back()->with('success', 'success')->with('message', $message);
        }catch(Exception $e){
            DB::rollBack();
            // return response()->json(['error' => $e->getMessage()]);
            return Redirect::back()->with('error', 'error')->with('message', $e->getMessage())->withInput();
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
