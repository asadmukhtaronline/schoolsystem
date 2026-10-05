<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testcontroller;


route::get('my',[testcontroller::class,'test']);
Route::prefix('student')->namespace('App\Http\Livewire')->middleware('student')->group(function(){
        route::get('dashboard','Student\Dashboard')->name('student.dashboard');
        route::get('myclass','Student\Myclass')->name('student.myclass');
        route::get('timetable','Student\Timetable')->name('student.timetable');
        route::get('complain','Student\Createcomplain')->name('student.complain');
        route::get('assignments','Student\Assignments')->name('student.assignments');
        route::get('quiz','Student\Quiz')->name('student.quiz');
        route::get('accounts','Student\Accounts')->name('student.accounts');
        route::get('activities','Student\Activities')->name('student.activities');
        route::get('notification','Student\Notification')->name('student.notification');
        route::get('settings','Student\Settings')->name('student.settings');
        route::get('logout','Student\Logout')->name('student.logout');
});



  