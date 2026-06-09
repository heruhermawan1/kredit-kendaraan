<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginPost');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerPost');
$routes->get('verify-email', 'Auth::verifyEmail');
$routes->post('verify-email', 'Auth::verifyEmailPost');
$routes->post('verify-email/resend', 'Auth::resendVerificationCode');
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::forgotPasswordPost');
$routes->get('reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('reset-password', 'Auth::resetPasswordPost');
$routes->get('logout', 'Auth::logout');

$routes->get('catalog', 'Catalog::index');
$routes->get('catalog/(:num)', 'Catalog::detail/$1');
$routes->get('simulation', 'Catalog::simulation');
$routes->post('simulation', 'Catalog::simulationPost');
$routes->get('apply/(:num)', 'Pengajuan::apply/$1');
$routes->post('apply/submit', 'Pengajuan::submit');
$routes->get('pengajuan', 'Pengajuan::index');
$routes->get('pengajuan/(:num)', 'Pengajuan::detail/$1');

$routes->get('payment', 'Payment::index');
$routes->post('payment/submit', 'Payment::submit');
$routes->get('payment/schedules', 'Payment::schedules');

$routes->get('profile', 'Profile::index');
$routes->post('profile/upload', 'Profile::upload');
$routes->post('profile/update', 'Profile::updateProfile');
$routes->post('profile/upload-document', 'Profile::uploadDocument');

$routes->group('admin', function($routes) {
    $routes->get('', 'Admin::index');
    $routes->get('vehicles', 'Admin::vehicles');
    $routes->post('vehicles/save', 'Admin::saveVehicle');
    $routes->post('vehicles/update/(:num)', 'Admin::updateVehicle/$1');
    $routes->post('vehicles/delete/(:num)', 'Admin::deleteVehicle/$1');
    $routes->get('users', 'Admin::users');
    $routes->get('applications', 'Admin::applications');
    $routes->post('applications/approve/(:num)', 'Admin::approve/$1');
    $routes->post('applications/reject/(:num)', 'Admin::reject/$1');
    $routes->get('payments', 'Admin::payments');
    $routes->post('payments/verify/(:num)', 'Admin::verifyPayment/$1');
    $routes->post('payments/reject/(:num)', 'Admin::rejectPayment/$1');
    $routes->get('reports', 'Admin::reports');
    $routes->get('categories', 'Admin::categories');
    $routes->post('categories/save', 'Admin::saveCategory');
    $routes->get('interest-rates', 'Admin::interestRates');
    $routes->post('interest-rates/save', 'Admin::saveInterestRate');
    $routes->get('documents', 'Admin::documents');
    $routes->post('documents/approve/(:num)', 'Admin::approveDocument/$1');
    $routes->post('documents/reject/(:num)', 'Admin::rejectDocument/$1');
});
