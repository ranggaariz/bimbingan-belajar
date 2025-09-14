<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::viewLogin');
$routes->get('login/index', 'Login::viewLogin');
$routes->get('login/viewLogin', 'Login::viewLogin');
$routes->post('login/aksi_login', 'Login::aksi_login');
$routes->get('login/logout', 'Login::logout');
$routes->get('login/register', 'Login::register');
$routes->post('login/saveRegister', 'Login::saveRegister');

$routes->get('admin', 'Admin::index');
$routes->get('admin/index', 'Admin::index');
$routes->get('admin/user', 'Admin::user');
$routes->get('admin/formUser', 'Admin::formUser', ['as' => 'admin.formUser']);
$routes->get('admin/openUser/(:num)', 'Admin::openUser/$1', ['as' => 'admin.openUser']);
$routes->get('admin/formEditUser/(:num)', 'Admin::formEditUser/$1', ['as' => 'admin.formEditUser']);
$routes->post('admin/editUser/(:num)', 'Admin::editUser/$1', ['as' => 'admin.editUser']);
$routes->post('admin/addUser', 'Admin::addUser');
$routes->get('admin/deleteUser', 'Admin::deleteUser', ['as' => 'admin.deleteUser']);

$routes->get('admin/daftarPelajar', 'Admin::daftarPelajar');
$routes->get('admin/approveAnggotaAdmin/(:num)', 'Admin::approveAnggotaAdmin/$1', ['as' => 'admin.approveAnggotaAdmin']);
$routes->get('admin/pelajar', 'Admin::pelajar');

// $routes->get('admin/openCuti/(:num)/(:num)', 'Admin::openCuti/$1/$2');
// $routes->get('admin/approveCuti', 'Admin::approveCuti', ['as' => 'admin.approveCuti']);
// $routes->get('admin/rejectCuti', 'Admin::rejectCuti', ['as' => 'admin.rejectCuti']);
// $routes->get('admin/timeslip', 'Admin::timeslip');
// $routes->get('admin/openTimeslip/(:num)/(:num)', 'Admin::openTimeslip/$1/$2');
// $routes->get('admin/approveTimeslip', 'Admin::approveTimeslip', ['as' => 'admin.approveTimeslip']);
// $routes->get('admin/rejectTimeslip', 'Admin::rejectTimeslip', ['as' => 'admin.rejectTimeslip']);
// $routes->get('admin/seragam', 'Admin::seragam');
// $routes->get('admin/openSeragam/(:num)/(:num)', 'Admin::openSeragam/$1/$2');
// $routes->get('admin/approveSeragam', 'Admin::approveSeragam', ['as' => 'admin.approveSeragam']);
// $routes->get('admin/rejectSeragam', 'Admin::rejectSeragam', ['as' => 'admin.rejectSeragam']);
// $routes->get('admin/formCuti', 'Admin::formCuti', ['as' => 'admin.formCuti']);
// $routes->get('admin/formEditCuti/(:num)', 'Admin::formEditCuti/$1', ['as' => 'admin.formEditCuti']);
// $routes->post('admin/addCuti', 'Admin::addCuti');
// $routes->post('admin/editCuti/(:num)', 'Admin::editCuti/$1', ['as' => 'admin.editCuti']);
// $routes->get('admin/deleteCuti', 'Admin::deleteCuti', ['as' => 'admin.deleteCuti']);

$routes->get('pengajar', 'Pengajar::index');
$routes->get('pengajar/index', 'Pengajar::index');
$routes->get('pengajar/jadwal', 'Pengajar::jadwal');
$routes->post('pengajar/addJadwal', 'Pengajar::addJadwal');
$routes->post('pengajar/editJadwal/(:num)', 'Pengajar::editJadwal/$1', ['as' => 'pengajar.editJadwal']);
$routes->get('pengajar/deleteJadwal', 'Pengajar::deleteJadwal', ['as' => 'pengajar.deleteJadwal']);

$routes->get('pengajar/soal', 'Pengajar::soal');
$routes->post('pengajar/addSoal', 'Pengajar::addSoal');
$routes->post('pengajar/editSoal/(:num)', 'Pengajar::editSoal/$1', ['as' => 'pengajar.editSoal']);
$routes->get('pengajar/deleteSoal', 'Pengajar::deleteSoal', ['as' => 'pengajar.deleteSoal']);

$routes->get('pengajar/formJawaban/(:num)', 'Pengajar::formJawaban/$1', ['as' => 'pengajar.formJawaban']);
$routes->post('pengajar/addJawaban/(:num)', 'Pengajar::addJawaban/$1', ['as' => 'pengajar.addJawaban']);
$routes->post('pengajar/editJawaban/(:num)/(:num)', 'Pengajar::editJawaban/$1/$2', ['as' => 'pengajar.editJawaban']);
$routes->get('pengajar/deleteJawaban', 'Pengajar::deleteJawaban', ['as' => 'pengajar.deleteJawaban']);

$routes->get('pengajar/materi', 'Pengajar::materi');
$routes->post('pengajar/addMateri', 'Pengajar::addMateri');
$routes->post('pengajar/editMateri/(:num)', 'Pengajar::editMateri/$1', ['as' => 'pengajar.editMateri']);
$routes->post('pengajar/uploadMateri/(:num)', 'Pengajar::uploadMateri/$1', ['as' => 'pengajar.uploadMateri']);
$routes->get('pengajar/deleteMateri', 'Pengajar::deleteMateri', ['as' => 'pengajar.deleteMateri']);
$routes->get('pengajar/tryout', 'Pengajar::tryout');
$routes->get('pengajar/formSoal', 'Pengajar::formSoal', ['as' => 'pengajar.formSoal']);
$routes->post('pengajar/addSoal2', 'Pengajar::addSoal2');

// $routes->get('supervisor', 'Supervisor::index');
// $routes->get('supervisor/index', 'Supervisor::index');
// $routes->get('supervisor/openUser/(:num)', 'Supervisor::openUser/$1', ['as' => 'supervisor.openUser']);
// $routes->get('supervisor/formEditUser/(:num)', 'Supervisor::formEditUser/$1', ['as' => 'supervisor.formEditUser']);
// $routes->post('supervisor/editUser/(:num)', 'Supervisor::editUser/$1', ['as' => 'supervisor.editUser']);
// $routes->get('supervisor/uploadPicture/(:num)', 'Supervisor::uploadPicture/$1', ['as' => 'supervisor.uploadPicture']);
// $routes->post('supervisor/uploadProfile/(:num)', 'Supervisor::uploadProfile/$1', ['as' => 'supervisor.uploadProfile']);
// $routes->get('supervisor/cuti', 'Supervisor::cuti');
// $routes->get('supervisor/formCuti', 'Supervisor::formCuti', ['as' => 'supervisor.formCuti']);
// $routes->post('supervisor/addCuti', 'Supervisor::addCuti');
// $routes->get('supervisor/openCuti/(:num)/(:num)', 'Supervisor::openCuti/$1/$2');
// $routes->get('supervisor/approveCuti', 'Supervisor::approveCuti', ['as' => 'supervisor.approveCuti']);
// $routes->get('supervisor/rejectCuti', 'Supervisor::rejectCuti', ['as' => 'supervisor.rejectCuti']);
// $routes->get('supervisor/timeslip', 'Supervisor::timeslip');
// $routes->get('supervisor/formTimeslip', 'Supervisor::formTimeslip', ['as' => 'supervisor.formTimeslip']);
// $routes->post('supervisor/addTimeslip', 'Supervisor::addTimeslip');
// $routes->get('supervisor/openTimeslip/(:num)/(:num)', 'Supervisor::openTimeslip/$1/$2');
// $routes->get('supervisor/approveTimeslip', 'Supervisor::approveTimeslip', ['as' => 'supervisor.approveTimeslip']);
// $routes->get('supervisor/rejectTimeslip', 'Supervisor::rejectTimeslip', ['as' => 'supervisor.rejectTimeslip']);
// $routes->get('supervisor/seragam', 'Supervisor::seragam');
// $routes->post('supervisor/addSeragam', 'Supervisor::addSeragam');
// $routes->get('supervisor/openSeragam/(:num)/(:num)', 'Supervisor::openSeragam/$1/$2');
// $routes->get('supervisor/approveSeragam', 'Supervisor::approveSeragam', ['as' => 'supervisor.approveSeragam']);
// $routes->get('supervisor/rejectSeragam', 'Supervisor::rejectSeragam', ['as' => 'supervisor.rejectSeragam']);

$routes->get('pelajar', 'Pelajar::index');
$routes->get('pelajar/index', 'Pelajar::index');
$routes->get('pelajar/jadwal', 'Pelajar::jadwal');

$routes->get('pelajar/tryout', 'Pelajar::tryout');
$routes->get('pelajar/start', 'Pelajar::start', ['as' => 'pelajar.start']);
$routes->post('pelajar/submitTryout', 'Pelajar::submitTryout', ['as' => 'pelajar.submitTryout']);

$routes->get('pelajar/materi', 'Pelajar::materi');

$routes->get('test-email', 'Login::aaa'); //http://localhost/bimbingan-belajar/public/test-email

// $routes->get('karyawan', 'Karyawan::index');
// $routes->get('karyawan/index', 'Karyawan::index');
// $routes->get('karyawan/openUser/(:num)', 'Karyawan::openUser/$1', ['as' => 'karyawan.openUser']);
// $routes->get('karyawan/formEditUser/(:num)', 'Karyawan::formEditUser/$1', ['as' => 'karyawan.formEditUser']);
// $routes->post('karyawan/editUser/(:num)', 'Karyawan::editUser/$1', ['as' => 'karyawan.editUser']);
// $routes->get('karyawan/uploadPicture/(:num)', 'Karyawan::uploadPicture/$1', ['as' => 'karyawan.uploadPicture']);
// $routes->post('karyawan/uploadProfile/(:num)', 'Karyawan::uploadProfile/$1', ['as' => 'karyawan.uploadProfile']);
// $routes->get('karyawan/cuti', 'Karyawan::cuti');
// $routes->get('karyawan/formCuti', 'Karyawan::formCuti', ['as' => 'karyawan.formCuti']);
// $routes->get('karyawan/formEditCuti/(:num)', 'Karyawan::formEditCuti/$1', ['as' => 'karyawan.formEditCuti']);
// $routes->get('karyawan/openCuti/(:num)/(:num)', 'Karyawan::openCuti/$1/$2');
// $routes->get('karyawan/deleteCuti', 'Karyawan::deleteCuti', ['as' => 'karyawan.deleteCuti']);
// $routes->post('karyawan/addCuti', 'Karyawan::addCuti');
// $routes->get('karyawan/timeslip', 'Karyawan::timeslip');
// $routes->get('karyawan/formTimeslip', 'Karyawan::formTimeslip', ['as' => 'karyawan.formTimeslip']);
// $routes->post('karyawan/addTimeslip', 'Karyawan::addTimeslip');
// $routes->get('karyawan/openTimeslip/(:num)/(:num)', 'Karyawan::openTimeslip/$1/$2');
// $routes->get('karyawan/deleteTimeslip', 'Karyawan::deleteTimeslip', ['as' => 'karyawan.deleteTimeslip']);
// $routes->get('karyawan/seragam', 'Karyawan::seragam');
// $routes->post('karyawan/addSeragam', 'Karyawan::addSeragam');
// $routes->get('karyawan/openSeragam/(:num)/(:num)', 'Karyawan::openSeragam/$1/$2');
// // $routes->post('karyawan/addCuti', 'Karyawan::addCuti');
// $routes->post('karyawan/editCuti/(:num)', 'Karyawan::editCuti/$1', ['as' => 'karyawan.editCuti']);

// GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG