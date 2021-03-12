<?php

Route::group(['namespace' => 'HR', 'middleware' => 'role:hr'], function () {
    Route::prefix('/teacher/evaluation/portal/hr')->group(function () {
        Route::get('/dashboard', 'HrController@dashboard')->name('hr.dashboard');
// school routes
        Route::resource('/manage-program/school', 'ManageProgram\SchoolController');
        Route::get('/all/schools/', 'ManageProgram\SchoolController@getAllSchools')->name('all.schools');
// school routes
// department routes
        Route::resource('/manage-program/department', 'ManageProgram\DepartmentController');
        Route::get('/all/departments/', 'ManageProgram\DepartmentController@getAllDepartments')->name('all.departments');
        Route::get('/all/departments/schools', 'ManageProgram\DepartmentController@getSchools')->name('get.departments.schools');
// department routes
//user routes
        Route::resource('users', 'UserController');
        Route::get('all/registered/users', 'UserController@getAllUsers')->name('all.registered.users');
        Route::get('all/schools', 'UserController@getAllSchools')->name('all.schools');
        Route::get('school/{id}/departments', 'UserController@getSchoolDepartments')->name('user.school.departments');
        Route::get('users/schools/{id}/departments/', 'UserController@getDepartments')->name('user.departments');
//user routes
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');

        //course routes
        Route::resource('course','CourseController');
        Route::get('all/course','CourseController@getAllCourses')->name('all.courses');
        Route::get('course/all/programs','CourseController@getAllPrograms')->name('course.all.program');

        //report
        Route::get('/view/teacher','HrController@viewTeacher')->name('hr.teachers.report');
        Route::get('/view/{id}/teacher-report','HrController@viewTeacherReport')->name('hr.view_teacher.report');
        Route::get('/return/teacher/{id}','HrController@returnTeacherReport')->name('hr.return.teacher.report');







        Route::post('/mark/report','HrController@saveReportMarks')->name('hr.save_report.marks');
        Route::get('/edit/report/marks/{id}','HrController@editReportMarks')->name('hr.edit_report.marks');
        Route::post('/update/report/marks/{id}','HrController@updateReportMarks')->name('hr.update_report.marks');
        Route::post('/submit/report/{id}/dean','HrController@submitReportToDean')->name('submit.report.dean');

    });
});