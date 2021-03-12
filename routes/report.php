<?php

//Route::get('/send/report/to/hr','ReportController@reportToDean')->name('teacher.report.dean');
Route::get('teacher/evaluation/portal/teacher/send/report/to/hr','ReportController@reportToHr')->name('report');