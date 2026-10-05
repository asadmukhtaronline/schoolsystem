<?php

use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->namespace('App\Http\Livewire')->middleware('teacher')->group(function(){
    Route::get('/dashboard','Teacher\Dashboard')->name('teacher.dashboard'); 
    Route::get('/classes','Teacher\Myclasses')->name('teacher.myclasses');
    Route::get('/attendance','Teacher\Attendance\Attendance')->name('teacher.attendance');
    Route::get('/attendance/record','Teacher\Attendance\Record')->name('teacher.record');
    Route::get('/activities','Teacher\Activities')->name('teacher.activities');

    Route::prefix('assignments')->group(function(){
        Route::get('create','Teacher\Assignment\Createassignment')->name('teacher.assignments');
        Route::get('update/{id}','Teacher\Assignment\Updateassignment')->name('teacher.updateassignments');
        Route::get('profile/{id}','Teacher\Assignment\Assignmentprofile')->name('teacher.assignmentprofile');
        Route::get('/','Teacher\Assignment\Allassignment')->name('teacher.allassignments');
    });
    
    Route::prefix('quiz')->group(function(){
        Route::get('/create','Teacher\Quiz\Createquiz')->name('teacher.quiz');
        Route::get('/','Teacher\Quiz\Allquiz')->name('teacher.allquiz');
        Route::get('/edit/{id}','Teacher\Quiz\Editquiz')->name('teacher.editquiz');
        Route::get('/question/{id}','Teacher\Quiz\Questions')->name('teacher.question');
        Route::get('/details/{id}','Teacher\Quiz\Quizprofile')->name('teacher.quizprofile');
        Route::get('/assigned/{id}','Teacher\Quiz\Quizassign')->name('teacher.quizassign');
        Route::get('/category','Teacher\Quiz\Quizcategory')->name('teacher.quizcategory');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/profile','Teacher\Profilesetting')->name('teacher.profile');    
        Route::get('/change-password','Teacher\Changepassword')->name('change.password');
    });

    Route::get('/timetable', 'Teacher\Timetable')->name('teacher.timetable');
});    

