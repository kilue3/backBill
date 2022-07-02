<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


//register
$routes->post('/registeruser', 'RegisterUser::create');
//login
$routes->post('/Login', 'Login::index');
$routes->post('/Resetpass', 'Login::Resetpass');
$routes->get('/alldata', 'Login::selectall');



//mannager
$routes->get('/allusers', 'Users::index');
$routes->get('/infouser/(:any)', 'Users::finduser/$1');
//mainscholar
// $routes->post('/addMshcholarship', 'Mshcholarship::create');
// $routes->get('/Mshcholarship', 'Mshcholarship::index');
// $routes->get('/MscholarAndUsername', 'Mshcholarship::MscholarAndUsername');
// $routes->get('/MscholarByname', 'Mshcholarship::getMbyName');
// $routes->put('/editMshcholarship/(:any)', 'Mshcholarship::Medit/$1');
// $routes->get('/findMshcholarship/(:any)', 'Mshcholarship::getMbyID/$1');
// $routes->delete('/delectMscholar/(:any)', 'Mshcholarship::delectMscholar/$1');
// $routes->delete('/DelectidMscholar/(:any)', 'Mshcholarship::Delect_Mscholar/$1');
// $routes->get('/allMshcholarship', 'Mshcholarship::getAllscholar'); //หน้าทุนทั้งหมด
// $routes->get('/listscholarbyYEAR/(:any)', 'Mshcholarship::FindbyYear/$1'); //รายชื่อทุนตามปี
// $routes->put('/editMshcholarship_img/(:any)', 'Mshcholarship::editimg/$1'); ///แก้ไขรูปทุนการศึกษา อยู่ใน edit_scholar_img.js
// $routes->get('/listYEAR', 'Mshcholarship::list_Year'); //รายชื่อทุนตามปี


/////SUBSCOLAR
// $routes->get('/findSshcholarship/(:any)', 'Subscholar::getSchobyID/$1');
// $routes->get('/findSshcholarshippage/(:any)', 'Subscholar::getSpagechobyID/$1');
// $routes->post('/addSubscholarship', 'Subscholar::create');
// $routes->get('/allSubscholarship', 'Subscholar::index');
// $routes->delete('/delectSubscholarship/(:any)', 'Subscholar::delectSubScholar/$1');
// $routes->put('/editSubshcholarship/(:any)', 'Subscholar::Shedit/$1');
// $routes->delete('/delectSubscholarship/(:any)', 'Subscholar::delectSubScholar/$1');
// $routes->get('/endshcholarship', 'Subscholar::scholarend');
// $routes->get('/endshcholarshiptoday', 'Subscholar::scholarendtoday');
// $routes->get('/Searchshcholarship', 'Subscholar::search'); //search sch
// $routes->put('/editSubshcholarshipfile/(:any)', 'Subscholar::Sheditfile/$1');
// $routes->delete('/delectSubScholar/(:any)', 'Subscholar::delectSubScholarfile/$1');
// //agency
// $routes->post('/addAgency', 'Addagency::create');
// $routes->get('/Agency', 'Addagency::index');
// $routes->delete('/delectAgency/(:any)', 'Addagency::delectAgen/$1');
// $routes->get('/listscholarbyAgen/(:any)', 'Mshcholarship::FindbyAgenname/$1'); //รายชื่อทุนตามหน่วยงาน
// //typescholar
// $routes->get('/scholarTypeshow', 'ScholarType::index');
// $routes->post('/addScholarType', 'ScholarType::create');
// $routes->delete('/delectType/(:any)', 'ScholarType::delectScholarType/$1');
// $routes->get('/listscholarbyType/(:any)', 'Mshcholarship::FindbyTypename/$1'); //รายชื่อทุนตามประเภท
// /////allowuser/////////////////
// $routes->get('/user', 'AllowUser::index');
// $routes->post('/manageuser', 'AllowUser::Allow');
// $routes->get('/finduser/(:any)', 'AllowUser::finduser/$1');
// ///comment//////////////////////
// $routes->post('/comment', 'Comment::createcomment');
// $routes->post('/commentedit/(:any)', 'Comment::updateComment/$1');
// $routes->get('/commentfind/(:any)', 'Comment::Showcomment/$1');
// $routes->get('/commentfindall/(:any)', 'Comment::ShowcommentAll/$1');


// $routes->delete('/commentdelect/(:any)', 'Comment::delectComment/$1');
// $routes->put('/commentupdate/(:any)', 'Comment::updateComment/$1');
// /////////reply//////////////
// $routes->get('/replycommentfind/(:any)', 'Anscom::Showreplycomment/$1');
// ///////////profile///////////////////////
// $routes->get('/profilestudent/(:any)', 'Profile::student/$1');
// $routes->get('/profilestaffs/(:any)', 'Profile::staffprofiles/$1');
// $routes->put('/editimgstudent/(:any)', 'Profile::edit_imgStudent/$1');
// $routes->put('/editimgstaff/(:any)', 'Profile::edit_imgStaff/$1');
// $routes->put('/editinfostudent/(:any)', 'Profile::edit_infostudent/$1');
// $routes->put('/editinfostaff/(:any)', 'Profile::edit_infoStaff/$1');
// /////////notification//////////////////////////////////////////
// $routes->post('/followScholar', 'Notifications::followScholar');
// $routes->post('/checkfollowScholar', 'Notifications::checkfollow');
// $routes->delete('/Unfollow/(:any)', 'Notifications::DelectN/$1');
// $routes->get('/followlist/(:any)', 'Notifications::selectfollow/$1');
// $routes->get('/nottiflyfollowcomment/(:any)', 'Notifications::show_comment_noti/$1');
// $routes->get('/nottiflyfollowcommentAll/(:any)', 'Notifications::show_comment_noti_all/$1');
// $routes->get('/nottiflyfollowcommentStaffAll/(:any)', 'Notifications::show_comment_noti_staff_all/$1'); //การแจ้งเตือนทุนรอง
// $routes->get('/nottiflyfollowcommentStaff/(:any)', 'Notifications::show_comment_noti_staff/$1'); //การแจ้งเตือนทุนรอง
// $routes->get('/nottiflyfollowcommentStaffMain/(:any)', 'Notifications::show_comment_noti_staff_msch/$1'); //การแจ้งเตือนทุนหลัก
// $routes->get('/nottiflyfollowcommentStaffMainAll/(:any)', 'Notifications::show_comment_noti_staff_msch_all/$1'); //การแจ้งทุนหลักทั้งหมด

// ///////////result////////////////////////
// $routes->get('/resultlist', 'Resultpage::index'); // home resultboxs
// $routes->get('/allresultlist', 'Resultpage::allResult'); //all result
// $routes->post('/addresult', 'Resultpage::create'); //add resultpage
// $routes->get('/findresultshcholarship/(:any)', 'Resultpage::getResultbyID/$1'); //resultbox
// $routes->get('/ResultAndUsername', 'Resultpage::ResultAndUsername'); //staffresultbox
// $routes->get('/Result/(:any)', 'Resultpage::getResultpage_byID/$1'); //resultshow
// $routes->put('/editresult/(:any)', 'Resultpage::editresult/$1'); //resultedit
// $routes->put('/editresultfile/(:any)', 'Resultpage::resultfile/$1'); //resulteditfile
// $routes->delete('/delectresult/(:any)', 'Resultpage::delectresult/$1'); //resultdelete

// ////////userlist//////////////////
// $routes->get('/userlistbyclasspage/(:any)', 'Userlist::ListUserByclass/$1'); //userlistbyclasspage
// $routes->get('/userliststaff', 'Userlist::index'); //userlistbyclasspage
// $routes->put('/UpuserClass/(:any)', 'Userlist::UpuserClass/$1');

// //////Setup_system///////////
// $routes->get('/Setup_system', 'Setup_system::index'); //แสดงชื่อและโลโก้
// $routes->post('/Setup_system', 'Setup_system::create'); //สร้างชื่อและโลโก้
// $routes->put('/Setup_systemEdit/(:any)', 'Setup_system::edit/$1'); //แก้ไขชื่อเว็บ
// $routes->delete('/Setup_systemdelect/(:any)', 'Setup_system::delect/$1'); //ลบชื่อและโลโก้ตามID
// $routes->put('/editSetup_system/(:any)', 'Setup_system::editimg/$1'); //แก้ไขชื่อโลโก้
// $routes->get('/getSetup_system/(:any)', 'Setup_system::getID/$1'); //แสดงชื่อและโลโก้ตามID
// //////Setup_slide///////////
// $routes->get('/Setup_slide', 'Setup_slide::index'); //แสดงสไลด์ทั้งหมด
// $routes->post('/Setup_slide', 'Setup_slide::create'); //สร้างสไลด์
// $routes->get('/getSetup_slide/(:any)', 'Setup_slide::getID/$1'); //แสดงสไลด์ตามID
// $routes->put('/EditSilde/(:any)', 'Setup_slide::edit/$1'); //แก้ไขชื่อสไลด์ตามID
// $routes->put('/editSetup_slidetimg/(:any)', 'Setup_slide::editimg/$1'); //แก้ไขสไลด์ตามID
// $routes->delete('/Setup_slideDelect/(:any)', 'Setup_slide::delect/$1'); //ลบสไลด์ตามID

// ///Search///
// $routes->get('/SearchMshcholarship', 'Mshcholarship::search'); //search Msch
// $routes->get('/SearchYearScholarship', 'Mshcholarship::search_year'); //search year
// $routes->get('/Searchshcholarship', 'Subscholar::search'); //search sch
// $routes->get('/SearchTyge', 'ScholarType::search'); //search Tyge
// $routes->get('/SearchAgency', 'Addagency::search'); //search Addagency
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
