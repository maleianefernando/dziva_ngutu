<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    if($user->role === 'admin'){
        return view('admin.doc-upload');
    } else if($user->type === 'docente'){
        return view('professor.doc-list');
    } else if($user->type === 'estudante'){
        return view('student.student');
    } else {
        Auth::logout();
        return view('auth.login');
    }
})->name('index')->middleware('auth');

Route::get('/redirect_user_by_role', function (){
    $user = Auth::user();
    if($user->role === 'admin'){
        return view('admin.doc-upload');
    } else if($user->type === 'docente'){
        return view('professor.doc-list');
    } else if($user->type === 'estudante'){
        return view('student.student');
    } else {
        Auth::logout();
        return view('auth.login');
    }
})->name('redirect_by_role');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::prefix('/registar')->group(function () {
        Route::get('/docente', [UserController::class, 'createTeacher'])->name('registar.docente');

        Route::get('/estudante', [UserController::class, 'createStudent'])->name('registar.estudante');

        Route::get('/facudade', [FacultyController::class, 'create'])->name('registar.faculdade');

        Route::get('/curso', [CourseController::class, 'create'])->name('registar.curso');

        Route::get('/cadeira', function () {
            return view('admin.registar-cadeira');
        })->name('registar.cadeira');
    });

    Route::get('/perfil', [ProfileController::class, 'editAdmin'])->name('admin.perfil');

    Route::get('/docentes', [UserController::class, 'indexOfTeacher'])->name('listar.docente');

    Route::get('/estudantes', [UserController::class, 'indexOfStudent'])->name('listar.estudante');

    Route::get('/faculdades', [FacultyController::class, 'index'])->name('listar.faculdade');

    Route::get('/cursos', [CourseController::class, 'index'])->name('listar.cursos');

    Route::get('/cadeiras', function () {
        return view('admin.listar-cadeira');
    })->name('listar.cadeira');

    Route::get('/materials', function () {
        return view('admin.doc-upload');
    })->name('admin.material');
});


Route::get('/professor/material', function () {
    return view('professor.doc-upload');
})->name('professor.material');

Route::get('/professor/listar', function () {
    return view('professor.doc-list');
})->name('professor.materialview');

Route::get('/estudante/inicio', function () {
    return view('student.student');
})->name('student.home');

Route::get('/estudante/material', function () {
    return view('student.doc-list');
})->name('student.material');

Route::get('/estudante/perfil', function () {
    return view('student.settings');
})->name('estudante.perfil');

Route::get('/professor/perfil', function () {
    return view('professor.settings');
})->name('professor.perfil');

// Route::get('/professor/listar', function () {
//     return view('professor.doc-list');
// })->name('professor.materialview');

Route::get('/search_course/{faculty_id}', [CourseController::class, 'search_by_faculty']);


Route::prefix('/utilizadores')->group(function () {
    Route::get('/', [RegisteredUserController::class, 'index'])->name('utiliadores.listar');
    Route::post('/criar', [RegisteredUserController::class, 'store'])->name('utilizadores.criar');
    Route::get('/{id}', [RegisteredUserController::class, 'show']);
    Route::put('/editar/{id}', [RegisteredUserController::class, 'update']);
});

Route::prefix('/faculdades')->group(function () {
    Route::get('/', [FacultyController::class, 'index'])->name('faculdade.listar');
    Route::post('/criar', [FacultyController::class, 'store'])->name('faculdade.criar');
    Route::get('/{id}', [FacultyController::class, 'show']);
    Route::put('/editar/{id}', [FacultyController::class, 'update']);
});

Route::prefix('/cursos')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('curso.listar');
    Route::post('/criar', [CourseController::class, 'store'])->name('curso.criar');
    Route::get('/{id}', [CourseController::class, 'show']);
    Route::put('/editar/{id}', [CourseController::class, 'update']);
});

Route::prefix('/disciplinas')->group(function () {
    Route::get('/', [SubjectController::class, 'index']);
    Route::post('/criar', [SubjectController::class, 'store']);
    Route::get('/{id}', [SubjectController::class, 'show']);
    Route::put('/editar/{id}', [SubjectController::class, 'update']);
});

Route::prefix('/documentos')->group(function () {
    Route::get('/', [DocumentController::class, 'index']);
    Route::post('/criar', [DocumentController::class, 'store']);
    Route::get('/{id}', [DocumentController::class, 'show']);
    Route::put('/editar/{id}', [DocumentController::class, 'update']);
});

Route::prefix('/comentarios')->group(function () {
    Route::get('/', [CommentController::class, 'index']);
    Route::post('/criar', [CommentController::class, 'store']);
    Route::get('/{id}', [CommentController::class, 'show']);
    Route::put('/editar/{id}', [CommentController::class, 'update']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
