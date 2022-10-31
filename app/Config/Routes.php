<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get','post'],'Register', 'Home::Register');
$routes->match(['get','post'],'Login', 'Home::Login');
$routes->match(['get','post'],'logout', 'Home::logout');
$routes->match(['get','post'],'Products', 'Home::Products');
$routes->match(['get','post'],'ProductDetails', 'Home::ProductDetails');
$routes->match(['get','post'],'Promotion', 'Home::Promotion');
$routes->match(['get','post'],'PromotionDetails', 'Home::PromotionDetails');
$routes->match(['get','post'],'Build_PC', 'Home::Build_PC');
$routes->match(['get','post'],'AddCart1', 'Home::AddCart1');
$routes->match(['get','post'],'AddCart2', 'Home::AddCart2');
$routes->match(['get','post'],'AddCart3', 'Home::AddCart3');
$routes->match(['get','post'],'AddCart', 'Home::AddCart');
$routes->match(['get','post'],'Cart', 'Home::Cart');
$routes->match(['get','post'],'RemoveProductItem', 'Home::RemoveProductItem');
$routes->match(['get','post'],'RemovePromotionItem', 'Home::RemovePromotionItem');
$routes->match(['get','post'],'RemoveComponentItem', 'Home::RemoveComponentItem');
$routes->match(['get','post'],'Payment', 'Home::Payment');
$routes->match(['get','post'],'Game', 'Home::Game');
$routes->match(['get','post'],'GameReward', 'Home::GameReward');
$routes->match(['get','post'],'OrderStatus', 'Home::OrderStatus');
$routes->match(['get','post'],'AccountManagement', 'Home::AccountManagement');
$routes->match(['get','post'],'updateAccount', 'Home::updateAccount');
$routes->get('ProductDetails/(:num)', 'Home::ProductDetails/$1');
$routes->get('PromotionDetails/(:num)', 'Home::PromotionDetails/$1');
$routes->get('Home/AddCart1/(:num)', 'Home::AddCart1/$1');
$routes->get('Home/AddCart2/(:num)', 'Home::AddCart2/$1');
$routes->get('Home/AddCart3/(:num)', 'Home::AddCart3/$1');
$routes->get('GameReward/(:num)', 'Home::GameReward/$1');
$routes->get('AdminPage', 'Admin::index');
$routes->match(['get','post'],'AdminRegister', 'Admin::AdminRegister');
$routes->match(['get','post'],'AdminLogin', 'Admin::AdminLogin');
$routes->match(['get','post'],'Adminlogout', 'Admin::Adminlogout');
$routes->match(['get','post'],'UsersTable', 'Admin::UsersTable');
$routes->match(['get','post'],'ProductsTable', 'Admin::ProductsTable');
$routes->match(['get','post'],'PromotionsTable', 'Admin::PromotionsTable');
$routes->match(['get','post'],'ComponentsTable', 'Admin::ComponentsTable');
$routes->match(['get','post'],'RewardsTable', 'Admin::RewardsTable');
$routes->match(['get','post'],'OrdersTable', 'Admin::OrdersTable');
$routes->match(['get','post'],'AdminsTable', 'Admin::AdminsTable');
$routes->match(['get','post'],'PaymentsTable', 'Admin::PaymentsTable');
$routes->match(['get','post'],'PaymentsTable', 'Admin::PaymentsTable');
$routes->match(['get','post'],'CPUsTable', 'Admin::CPUsTable');
$routes->match(['get','post'],'GPUsTable', 'Admin::GPUsTable');
$routes->match(['get','post'],'AddUser', 'Admin::AddUser');
$routes->match(['get','post'],'AddProduct', 'Admin::AddProduct');
$routes->match(['get','post'],'AddPromotion', 'Admin::AddPromotion');
$routes->match(['get','post'],'AddComponent', 'Admin::AddComponent');
$routes->match(['get','post'],'AddReward', 'Admin::AddReward');
$routes->match(['get','post'],'AddOrder', 'Admin::AddOrder');
$routes->match(['get','post'],'AddAdmin', 'Admin::AddAdmin');
$routes->match(['get','post'],'AddCPU', 'Admin::AddCPU');
$routes->match(['get','post'],'AddGPU', 'Admin::AddGPU');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
