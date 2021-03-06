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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'accueil';
$route['article/(.+)/(.+)-(\d+)'] = 'accueil/detailArticle/$3';
$route['accueil/categorie/(\d+)-(.+)'] = 'accueil/detail_categorie/$1';
$route['accueil/recherche/cat/(.+)/page/(\d+)/affiche/(\d+)/query/(.+)/date1/(.+)/date2/(.+)/annee/(:any)/mois/(:any)'] = 'accueil/detail_categorie/$1/$2/$3/$4/$5/$6/$7/$8';
$route['accueil/sarisary/(\d+)-(.+)'] = 'accueil/list_sarisary/$1';
$route['accueil/fil-d-actualite/(.+)'] = 'accueil/detail_filactu/$1';
$route['accueil/archive/(\d+)/(.+)'] = 'accueil/detailjournal/$1';
$route['accueil/ilaiko'] = 'accueil/info_utile';
$route['ilaiko/(.+)/(.+)-(\d+)'] = 'accueil/detail_info_utile/$3';
$route['accueil/hamaky-gazety'] = 'accueil/feuilleter_journal';
$route['page/administration'] = 'dashboard';
$route['page/administration/(:any)'] = 'dashboard/$1';
$route['page/administration/(:any)/(:any)'] = 'dashboard/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
