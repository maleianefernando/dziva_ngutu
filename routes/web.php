<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\Document;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = Auth::user();
    if($user->role === 'admin'){
        return redirect()->route('documento.listar');
    } else if($user->type === 'docente'){
        return view('professor.doc-list');
    } else if($user->type === 'estudante'){
        return redirect('estudante/inicio');
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

        Route::get('/cadeira', [SubjectController::class, 'create'])->name('registar.cadeira');
    });

    Route::get('/perfil', [ProfileController::class, 'editAdmin'])->name('admin.perfil');

    Route::get('/docentes', [UserController::class, 'indexOfTeacher'])->name('listar.docente');

    Route::get('/estudantes', [UserController::class, 'indexOfStudent'])->name('listar.estudante');

    Route::get('/faculdades', [FacultyController::class, 'index'])->name('listar.faculdade');

    Route::get('/cursos', [CourseController::class, 'index'])->name('listar.cursos');

    Route::get('/cadeiras', [SubjectController::class, 'index'])->name('listar.cadeira');

    Route::get('/materials', [DocumentController::class, 'index'])->name('admin.material');
});

Route::middleware('auth')->group(function () {
    Route::get('/search_course/{faculty_id}', [CourseController::class, 'search_by_faculty']);
    Route::get('/search_subject/{course_id}', [SubjectController::class, 'search_by_course']);
    Route::get('/search_subject_by_year/{year}', [SubjectController::class, 'search_by_year']);

    Route::get('/search_files/{subject_id}', [DocumentController::class, 'search_by_subject']);
    Route::get('file/view/{filename}', [DocumentController::class, 'print'])->name('file.view');
    Route::get('file/download/{filename}', [DocumentController::class, 'download'])->name('file.download');

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
        Route::post('/criar', [SubjectController::class, 'store'])->name('disciplinas.registar');
        Route::get('/{id}', [SubjectController::class, 'show']);
        Route::put('/editar/{id}', [SubjectController::class, 'update']);
    });

    Route::prefix('/documentos')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('documento.listar');
        Route::post('/criar', [DocumentController::class, 'store'])->name('documentos.criar');
        Route::get('/{id}', [DocumentController::class, 'show']);
        Route::put('/editar/{id}', [DocumentController::class, 'update']);
    });

    Route::prefix('/comentarios')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
        Route::post('/criar', [CommentController::class, 'store']);
        Route::get('/{id}', [CommentController::class, 'show']);
        Route::put('/editar/{id}', [CommentController::class, 'update']);
    });
});

Route::get('/professor/material', function () {
    return view('professor.doc-upload');
})->name('professor.material');

Route::get('/professor/listar', function () {
    return view('professor.doc-list');
})->name('professor.materialview');

Route::get('/estudante/inicio', [function () {
    $user = User::where('id', Auth::user()->id)->first();
    $documents = Document::where('course_id', $user->course_id)->orderByDesc('created_at')->get();
    $subject = Subject::all();
    return view('student.student', compact('documents', 'subject'));
}])->name('student.home');

Route::get('/estudante/material', [DocumentController::class, 'indexStudent'])->name('student.material');

Route::get('/estudante/perfil', [ProfileController::class, 'editStudent'])->name('estudante.perfil');

Route::get('/professor/perfil', function () {
    return view('professor.settings');
})->name('professor.perfil');

// Route::get('/professor/listar', function () {
//     return view('professor.doc-list');
// })->name('professor.materialview');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
