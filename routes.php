<?php

// homepage views
$router->get('landingPageBaseCode', 'HomeController@index');

// admin views
$router->get('landingPageBaseCode/admin', 'AdminController@index');
// assistant crud
$router->get('landingPageBaseCode/admin/assistants', 'AdminController@assistantList');
$router->get('landingPageBaseCode/admin/assistant-create', 'AdminController@createAssistant');
$router->post('landingPageBaseCode/admin/assistant-store', 'AdminController@storeAssistant');
// shop crud
$router->get('landingPageBaseCode/admin/shops', 'AdminController@shopList');
$router->get('landingPageBaseCode/admin/shop-create', 'AdminController@createShop');
$router->post('landingPageBaseCode/admin/shop-store', 'AdminController@storeShop');
// city crud
$router->get('landingPageBaseCode/admin/cities', 'AdminController@cityList');
$router->get('landingPageBaseCode/admin/city-create', 'AdminController@createCity');
$router->post('landingPageBaseCode/admin/city-store', 'AdminController@storeCity');

// pivot tables routes
$router->get('landingPageBaseCode/admin/assign-shop', 'AdminController@assignShop');
$router->post('landingPageBaseCode/admin/store-assignment', 'AdminController@storeAssignShop');
