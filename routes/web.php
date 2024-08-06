<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Books\IndexController as BooksIndexController;
use App\Http\Controllers\Books\CreateController as BooksCreateController;
use App\Http\Controllers\Books\StoreController as BooksStoreController;
use App\Http\Controllers\Books\UpdateController as BooksUpdateController;
use App\Http\Controllers\Books\EditController as BooksEditController;
use App\Http\Controllers\Books\DestroyController as BooksDestroyController;
use App\Http\Controllers\CreateGroupController;
use App\Http\Controllers\Hometasks\IndexController as HometasksIndexController;
use App\Http\Controllers\Hometasks\CreateController as HometasksCreateController;
use App\Http\Controllers\Hometasks\StoreController as HometasksStoreController;
use App\Http\Controllers\Hometasks\EditController as HometasksEditController;
use App\Http\Controllers\Hometasks\UpdateController as HometasksUpdateController;
use App\Http\Controllers\Hometasks\DestroyController as HometasksDestroyController;



use App\Http\Controllers\Grammar\IndexController as GrammarIndexController;

use App\Http\Controllers\Lesson\IndexController as LessonIndexController;
use App\Http\Controllers\Lesson\CreateController as LessonCreateController;
use App\Http\Controllers\Lesson\StoreController as LessonStoreController;
use App\Http\Controllers\Lesson\ShowController as LessonShowController;
use App\Http\Controllers\Lesson\EditController as LessonEditController;
use App\Http\Controllers\Lesson\UpdateController as LessonUpdateController;
use App\Http\Controllers\Lesson\DestroyController as LessonDestroyController;
use App\Http\Controllers\Lesson\DestroyFormController as LessonDestroyFormController;
use App\Http\Controllers\Lesson\DestroyContentController as LessonDestroyContentController;
use App\Http\Controllers\Lesson\DestroyExerFormController as LessonDestroyExerFormController;
use App\Http\Controllers\Lesson\DestroyExerController as LessonDestroyExerController;


use App\Http\Controllers\Vocabulary\IndexController as VocabularyIndexController;
use App\Http\Controllers\Vocabulary\CreateController as VocabularyCreateController;
use App\Http\Controllers\Vocabulary\StoreController as VocabularyStoreController;
use App\Http\Controllers\Vocabulary\EditController as VocabularyEditController;
use App\Http\Controllers\Vocabulary\UpdateController as VocabularyUpdateController;
use App\Http\Controllers\Vocabulary\DestroyController as VocabularyDestroyController;


use App\Http\Controllers\Grammar\StoreController as GrammarStoreController;
use App\Http\Controllers\Grammar\CreateController as GrammarCreateController;
use App\Http\Controllers\Grammar\DestroyContentController as GrammarDestroyContentController;
use App\Http\Controllers\Grammar\EditController as GrammarEditController;
use App\Http\Controllers\Grammar\DestroyController as GrammarDestroyController;
use App\Http\Controllers\Grammar\DestroyFormController as GrammarDestroyFormController;
use App\Http\Controllers\Grammar\UpdateController as GrammarUpdateController;
use App\Http\Controllers\Grammar\ShowController as GrammarShowController;
use App\Http\Controllers\Grammar\DestroyRuleController as GrammarDestroyRuleController;
use App\Http\Controllers\Grammar\DestroyRuleFormController as GrammarDestroyRuleFormController;
use App\Http\Controllers\Grammar\DestroyExerController as GrammarDestroyExerController;
use App\Http\Controllers\Grammar\DestroyExerFormController as GrammarDestroyExerFormController;

// use App\Http\Controllers\CreateGramController;
// use App\Http\Controllers\DeleteGramController;
// use App\Http\Controllers\GrammarController;

use App\Http\Controllers\ExerciseCheckController;


// use App\Http\Controllers\HomeTasksController;
// use App\Http\Controllers\LessonsController;
use App\Http\Controllers\Lesson\LessonTopicController;
use App\Http\Controllers\TeacherAvatarUpdateController;
use App\Http\Controllers\StudentAvatarUpdateController;
// use App\Http\Controllers\UpdGramController;
// use App\Http\Controllers\VocabularyController;
// use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', AuthController::class);

Route::namespace('App\Http\Controllers\Hometasks')->group(function () {
	Route::get('/hometasks', HometasksIndexController::class)->name('hometasks.index');
	Route::get('/hometasks/create', HometasksCreateController::class)->name('hometasks.create')->middleware('teacher');
	Route::post('/hometasks', HometasksStoreController::class)->name('hometasks.store')->middleware('teacher');
	Route::get('/hometasks/{hometasks}/edit', HometasksEditController::class)->name('hometasks.edit')->middleware('teacher');
	Route::patch('/hometasks/{hometasks}', HometasksUpdateController::class)->name('hometasks.update')->middleware('teacher');
	Route::delete('/hometasks/{hometasks}', HometasksDestroyController::class)->name('hometasks.delete')->middleware('teacher');
});

Route::namespace('App\Http\Controllers\Books')->group(function () {
	Route::get('/books', BooksIndexController::class)->name('books.index');
	Route::get('/books/create', BooksCreateController::class)->name('books.create')->middleware('teacher');
	Route::post('/books', BooksStoreController::class)->name('books.store')->middleware('teacher');
	Route::get('/books/{books}/edit', BooksEditController::class)->name('books.edit')->middleware('teacher');
	Route::patch('/books/{books}', BooksUpdateController::class)->name('books.update')->middleware('teacher');
	Route::delete('/books/{books}', BooksDestroyController::class)->name('books.delete')->middleware('teacher');
});

Route::namespace('App\Http\Controllers\Grammar')->group(function () {
	Route::get('/grammar', GrammarIndexController::class)->name('grammar.index');
	Route::post('/grammar', GrammarStoreController::class)->name('grammar.store')->middleware('teacher');
	Route::get('/grammar/create', GrammarCreateController::class)->name('grammar.create')->middleware('teacher');
	Route::get('/grammar/{grammar}', GrammarShowController::class)->name('grammar.show');
	Route::get('/grammar/{grammar}/edit', GrammarEditController::class)->name('grammar.edit')->middleware('teacher');
	Route::patch('/grammar/{grammar}', GrammarUpdateController::class)->name('grammar.update')->middleware('teacher');
	Route::delete('/grammar/{grammar}', GrammarDestroyController::class)->name('grammar.delete')->middleware('teacher');
	Route::delete('/content/{grContent}', GrammarDestroyContentController::class)->name('grammar.destroycontent')->middleware('teacher');
	Route::get('/grammar/destroy/{grContents}', GrammarDestroyFormController::class)->name('grammar.destroyContentForm')->middleware('teacher');
	Route::delete('/rules/{rule}', GrammarDestroyRuleFormController::class)->name('grammar.destroyrule')->middleware('teacher');
	Route::get('/grammar/destroy/rule/{rule}', GrammarDestroyRuleController::class)->name('grammar.destroyRuleForm')->middleware('teacher');
	Route::get('/grammar/destroy/exercise/{exercises}', GrammarDestroyExerController::class)->name('grammar.destroyExerForm')->middleware('teacher');
	Route::delete('/exercise/{exercises}', GrammarDestroyExerFormController::class)->name('grammar.destroyexer')->middleware('teacher');
});

Route::namespace('App\Http\Controllers\Lesson')->group(function () {
	Route::get('/lessons', LessonIndexController::class)->name('lesson.index');
	Route::get('/lessons/create', LessonCreateController::class)->name('lesson.create')->middleware('teacher');
	Route::post('/lessons', LessonStoreController::class)->name('lesson.store')->middleware('teacher');
	Route::get('/lessons/{lesson}', LessonShowController::class)->name('lesson.show');
	Route::get('/lessons/{lesson}/edit', LessonEditController::class)->name('lesson.edit')->middleware('teacher');
	Route::patch('/lessons/{lesson}', LessonUpdateController::class)->name('lesson.update')->middleware('teacher');
	Route::delete('/lessons/{lesson}', LessonDestroyController::class)->name('lesson.delete')->middleware('teacher');
	Route::delete('/lessons/destroy/Content/{lcContent}', LessonDestroyContentController::class)->name('lesson.destroycontent')->middleware('teacher');
	Route::get('/lessons/destroy/lContent/{lcContents}', LessonDestroyFormController::class)->name('lesson.destroyContentForm')->middleware('teacher');
	Route::get('/lesson/destroy/exercise/{exercises}',  LessonDestroyExerController::class)->name('lesson.destroyExerForm')->middleware('teacher');
	Route::delete('/exercise/{exercises}', LessonDestroyExerFormController::class)->name('lesson.destroyexer')->middleware('teacher');
});

Route::namespace('App\Http\Controllers\Vocabulary')->group(function () {
	Route::get('/vocabulary', VocabularyIndexController::class)->name('vocabulary.index');
	Route::get('/vocabulary/create', VocabularyCreateController::class)->name('vocabulary.create')->middleware('teacher');
	Route::post('/vocabulary', VocabularyStoreController::class)->name('vocabulary.store')->middleware('teacher');
	Route::get('/vocabulary/{vocabulary}/edit', VocabularyEditController::class)->name('vocabulary.edit')->middleware('teacher');
	Route::patch('/vocabulary/{vocabulary}', VocabularyUpdateController::class)->name('vocabulary.update')->middleware('teacher');
	Route::delete('/vocabulary/{vocabulary}', VocabularyDestroyController::class)->name('vocabulary.delete')->middleware('teacher');
});


Route::get('/exercise/check', ExerciseCheckController::class)->name('check.index');

Route::post('/teacher/avatar', TeacherAvatarUpdateController::class)->name('teacher.avatar');

Route::post('/student/avatar', StudentAvatarUpdateController::class)->name('student.avatar');

Route::post('/groups/create', CreateGroupController::class)->name('group.create');
//  Route::get('/', HomeTasksController::class)->name('hometasks.index');

//  Route::get('/grammar', GrammarController::class)->name('grammar.index');

// Route::get('/lessons', LessonsController::class)->name('lessons');

// Route::get('/vocabulary', VocabularyController::class)->name('vocabulary');

//

// Route::get('/grammar/grammar-topic/{grammar}', GrammarTopicController::class)->name('grammar-topic');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

// Route::get('/teacher_profile', function () {
// 	return view('teacherProfile');
// })->name('profile');

// Route::get('/create', CreateGramController::class);

// Route::get('/update', UpdGramController::class);

// Route::get('/delete', DeleteGramController::class);

Auth::routes();

Route::get('register', [RegisterController::class, 'groups'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
