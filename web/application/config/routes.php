<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//user routes
$route['users/register'] = 'users/register';
$route['users/dashboard'] = 'users/dashboard';
$route['comments/create/(:any)'] = 'comments/create/$1';
$route['categories'] = 'category/index';
$route['categories/create'] = 'category/create';
$route['categories/posts/(:any)'] = 'category/posts/$1';
$route['categories/delete/(:any)'] = 'category/delete/$1';
$route['posts/index'] = 'posts/index';
$route['posts/update'] = 'posts/update';
$route['posts/delete/(:any)'] = 'posts/delete/$1';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['reserva/(:any)'] = 'reserva/index/$1';
$route['default_controller'] = 'pages/view';
$route['hotel/(:any)'] = 'hotel/view/$1';
$route['hotel'] = 'hotel/view';



//admin routs
$route['administrator'] = 'administrator/view';
$route['administrator/home'] = 'administrator/home';
$route['administrator/index'] = 'administrator/view';
$route['administrator/forget-password'] = 'administrator/forget_password';

$route['administrator/dashboard'] = 'administrator/dashboard';

$route['administrator/change-password'] = 'administrator/get_admin_data';
$route['administrator/update-profile'] = 'administrator/update_admin_profile';

$route['administrator/users/add-user'] = 'administrator/add_user';
$route['administrator/users'] = 'administrator/users';
$route['administrator/users/update-user/(:any)'] = 'administrator/update_user/$1';

$route['administrator/add-hotel'] = 'administrator/add_hotel';
$route['administrator/list-hotel'] = 'administrator/list_hotel';
$route['administrator/update-hotel'] = 'administrator/update_hotel';

$route['administrator/site-configuration'] = 'administrator/get_siteconfiguration';
$route['administrator/site-configuration/update/(:any)'] = 'administrator/update_siteconfiguration/$1';

$route['administrator/page-contents'] = 'administrator/get_pagecontents';
$route['administrator/page-contents/update/(:any)'] = 'administrator/update_pagecontents/$1';

$route['administrator/galleries/add'] = 'galleries/galleriesLoad';
$route['administrator/galleries'] = 'galleries/get_gallery_images';

$route['administrator/blogs/blog-comments'] = 'administrator/list_blog_comments';
$route['administrator/blogs/view-comment/(:any)'] = 'administrator/view_blog_comments/$1';

$route['administrator/team/add'] = 'administrator/add_team';
$route['administrator/team/list'] = 'administrator/list_team';
$route['administrator/team/update/(:any)'] = 'administrator/update_team/(:any)';

$route['administrator/testimonials/add'] = 'administrator/add_testimonial';
$route['administrator/testimonials/list'] = 'administrator/list_testimonial';
$route['administrator/testimonials/update/(:any)'] = 'administrator/update_testimonial/(:any)';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










