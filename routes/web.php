<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TeacherAssignedSectionMail;
use App\Mail\Teachertimetable;
use App\Http\Controllers\MailChimpController;
use App\Http\Controllers\testcontroller;
use App\livewire\login;
use App\Http\Controllers\invoices;
use Auth as Auth;


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

    Route::get('/', 'App\Http\Livewire\Login\Login')->name('login');
    Route::prefix('admin')->middleware('admin')->namespace('App\Http\Livewire')->group(function(){
         Route::get('/dashboard', 'Admin\Dashboard')->name('admin.dashboard');
        Route::prefix('subjects')->group(function(){
            Route::get('/','Admin\Subjects\Book')->name('admin.book');
            Route::get('/edit/{id}','Admin\Subjects\Editbook')->name('admin.editbook');
        });
        Route::get('/alerts','Admin\Alerts\Alerts')->name('admin.alerts');
        Route::prefix('classes')->group(function(){
            Route::get('/','Admin\Classes\Allclass')->name('admin.allclass');
            Route::get('/create','Admin\Years\Create')->name('admin.year');
            Route::get('/details/{id}','Admin\Classes\Classddetails')->name('admin.classddetails');
            Route::get('/sectiondetails/{id}','Admin\Classes\Sectiondetails')->name('admin.sectiondetails');
            Route::get('/pdf/{id}','Admin\Classes\Pdftimetable')->name('section.pdf');
            // Route::get('/create-classes','Admin\classes\addclass')->name('admin.addclass');
        });
        Route::prefix('attendance')->group(function(){
            Route::get('/','Admin\Attendance\Attendance')->name('admin.attendance');
            Route::get('/record','Admin\Attendance\Record')->name('attendance.record');
        });

        Route::prefix('/branches')->group(function(){
            Route::get('/create','Admin\Branches\Createbranch')->name('admin.createbranch');
            Route::get('/','Admin\Branches\Allbranch')->name('admin.allbranch');
            Route::get('/edit/{id}','Admin\Branches\EditBranch')->name('edit.branch');
        });
        Route::prefix('/teachers')->group(function(){
            Route::get('/create','Admin\Teachers\Addteacher')->name('admin.addteacher');
            Route::get('/','Admin\Teachers\Allteachers')->name('admin.allteachers');
            Route::get('/edit/{id}','Admin\Teachers\Edit')->name('edit.teacher');
            Route::get('/profile/{id}','Admin\Teachers\Teacherprofile')->name('admin.teacherprofile');
        });
        Route::prefix('/assignments')->group(function(){
            Route::get('/create','Admin\Assignments\Createassignment')->name('admin.createassignment');
            Route::get('/','Admin\Assignments\Allassignment')->name('admin.assignment');
            Route::get('/profile/{id}','Admin\Assignments\Assignmentprofile')->name('admin.assignmentprofile');
            // Route::get('/assigned/{id}','Admin\Assignments\assignassignment')->name('admin.assignassignment');
            // Route::get('/admin/assignmentprofile/{assignment_id}', Assignmentprofile::class)->name('admin.assignmentprofile');
            Route::get('/update/{id}','Admin\Assignments\Editassignment')->name('admin.editassignment');
        });
        Route::prefix('/staff')->group(function(){
            Route::get('/create','Admin\Staff\Createstaff')->name('admin.create-staff');
            Route::get('/','Admin\Staff\Allstaff')->name('admin.all-staff');
            Route::get('/update/{id}','Admin\Staff\Staffupdate')->name('admin.staffupdate');
            Route::get('/profile/{id}','Admin\Staff\Staffprofile')->name('admin.staffprofile');
            Route::get('/category','Admin\Staff\Category')->name('admin.staffcategory');
        });
        Route::prefix('/students')->group(function(){
            Route::get('/','Admin\Students\Allstudents')->name('admin.allstudents');
            Route::get('/update/{id}','Admin\Students\Studentupdate')->name('admin.studentupdate');
            Route::get('/profile/{id}','Admin\Students\Studentprofile')->name('admin.studentprofile');
            Route::get('/accounts/{id}','Admin\Students\Accounts')->name('admin.accounts');
            Route::get('/admission','Admin\Admission\Admissionform')->name('admin.admissionform');
        });
        Route::prefix('/accounts')->group(function(){
            Route::get('/create','Admin\Accounts\Addsection')->name('admin.addsection');
            Route::get('/expence','Admin\Accounts\Expence')->name('admin.expence');
            Route::get('/fee-collection','Admin\Accounts\Feecollection')->name('admin.feecollection');
            Route::get('/history','Admin\Accounts\History')->name('admin.history');
            Route::get('/overview','Admin\Accounts\Overview')->name('admin.overview');
        });
        Route::prefix('/profile')->group(function(){
            Route::get('/','Admin\Settings\Profilesettings')->name('admin.profilesettings');
            Route::get('/change-password','Admin\Settings\Changepassword')->name('admin.changepassword');
        });
        Route::prefix('/timetable')->group(function(){
            Route::get('/','Admin\Timetable\Timetable')->name('admin.timetable'); 
            Route::get('/create','Admin\Timetable\Createtimetable')->name('admin.timetable.create'); 
        });
        Route::prefix('/complain')->group(function(){
            Route::get('/','Admin\Complaines\Allcomplaines')->name('admin.allcomplaines');
            Route::get('/create','Admin\Complaines\Createcomplain')->name('admin.createcomplain');
            Route::get('/category','Admin\Complaines\Complaincategory')->name('admin.complaincategory');
            Route::get('/profile/{id}','Admin\Complaines\Complainprofile')->name('admin.complainprofile');

        });
        Route::prefix('/users')->group(function(){
            Route::get('/create','Admin\Management\Createuser')->name('admin.createuser');
            Route::get('/','Admin\Management\Allusers')->name('admin.allusers');
            Route::get('/update/{id}','Admin\Management\Updateuser')->name('admin.updateuser');
            Route::get('/permissions','Admin\Management\Permissions')->name('admin.permissions');
            Route::get('/roles','Admin\Management\Roles')->name('admin.roles');
            Route::get('/role_permission/{id}','Admin\Management\RolePermission')->name('admin.role_permission');
        });
        Route::prefix('/school')->group(function(){
            Route::get('/all', 'Admin\GeneralSetting\AllSchool')->name('admin.allschool');
            Route::get('/edit/{id}', 'Admin\GeneralSetting\EditSchool')->name('edit.school');
            Route::get('/reset', 'Admin\GeneralSetting\Databasereset')->name('admin.reset');
        });

        Route::prefix('quiz')->group(function(){
            Route::get('/category','Admin\Quiz\Quizz')->name('admin.quizz');
            Route::get('/create','Admin\Quiz\Createquiz')->name('admin.createquiz');
            Route::get('/question/{id}','Admin\Quiz\Quizquestion')->name('admin.question');
            Route::get('/all','Admin\Quiz\Fetchquiz')->name('admin.fetch');
            Route::get('/edit/{id}','Admin\Quiz\Editquiz')->name('admin.edit');
            Route::get('/details/{id}','Admin\Quiz\Profilequiz')->name('admin.quizprofile');
            Route::get('/assigned/{id}','Admin\Quiz\Assignquiz')->name('admin.assignquiz');
        });


        Route::get('/logout','Admin\Logout\Logout')->name('admin.logout');
        Route::get('/title','Admin\Pagetitle\Pagetitle')->name('admin.pagetitle');
        

        Route::get('/test-email', function () {
            Mail::to('mohsinwebinternee786@gmail.com')->send(new TeacherAssignedSectionMail());
        });
    });

    Route::get('/mail', [MailChimpController::class, 'index']);
    Route::post('/subscribe', [MailChimpController::class, 'subscribe'])->name('subscribe');
    
    
    Route::get('/test', [testcontroller::class, 'test']);
    Route::get('/test-email', function () {
        Mail::to('mohsinwebinternee786@gmail.com')->send(new Teachertimetable());
    });
    Route::get('/logout',function(){
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');

Route::get('/school/add', 'App\Http\Livewire\Admin\GeneralSetting\AddSchool')->name('admin.addschool');