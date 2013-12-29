<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
*/

$route['users/all'] = "admin/users_list";
$route['users/add'] = "admin/users_add";
$route['users/edit/(:num)'] = "admin/users_edit/$1";
$route['projects/all'] = "admin/projects_list";
$route['projects/add'] = "admin/procjects_add";
$route['projects/edit/(:num)'] = "admin/projects_edit/$1";
$route['projects/remove/(:num)'] = "admin/project_delete/$1";
$route['domains/all'] = "domain/domains_list";
$route['domains/add'] = "domain/domains_add";
$route['domains/edit/(:num)'] = "domain/domains_edit/$1";
$route['domains/delete/(:num)'] = "domain/domains_delete/$1";
$route['task/all'] = "task/task_list";
$route['task/add'] = "task/task_add";
$route['task/edit/(:num)'] = "task/task_edit/$1";
$route['task/delete/(:num)'] = "task/task_delete/$1";
/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "dashboard";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
