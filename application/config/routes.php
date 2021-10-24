<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//require_once( APPPATH .'helpers/common_helper.php');
$instutlname = $this->uri->segment(1);
$route['default_controller'] = "admin";
//$route['ims_administrator'] = "ims_administrator";
//$route['404_override'] = '';
$route['logout'] = "ims_administrator/logout";
$route['translate_uri_dashes'] = FALSE;

/*$route['(edoctor|user|dbdadminmanage|doctorsAdmin|home|cmspage|cms|adminSetings|blood|video)'] = "$1";
$route['(edoctor|user|dbdadminmanage|doctorsAdmin|home|cmspage|cms|adminSetings|video)/(:any)'] = "$1/$2";*/

//$route['(index|news|events|ims_administrator|content)'] = "$1";
//$route['(index|news|events|ims_administrator|content)/(:any)'] = "$1/$2";

//$route['content/(:any)'] = "content/article/$1";
$route[$instutlname.'/reports'] 	= "reports";
$route[$instutlname.'/reports/(.*)'] 	= "reports/$1/$2/$3";
$route['content/(.*)'] 	= "content/index/$1/$2";
$route['notice/(.*)'] 	= "notice/notice_details/$1/$2";
$route['testimonial/(.*)'] = "testimonial/testimonial_details/$1/$2";
$route['news/(:any)'] 	= "news/news_details/$1";
$route['events/(:any)'] = "events/event_details/$1";
//$route['university/(:any)'] = "university/index/$1";

//$route['cgwcedu/(:any)'] = "cgwcedu/departmentview/$1";

/*
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];
*/
//$route['index/(:any)'] = 'book/index/$1';

//$route['(index|usermanage|admin|dashboard|publisher|author|product|category|article|member|agent|sponcer)'] = "$1";

//$route['books/(:any)'] = "books/index/$1";
//$route['books/(:num)/(:any)'] = 'books/index/$1/$2';
