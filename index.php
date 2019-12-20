<?php
include('config.php');

defineLang();

putenv('LC_ALL='. LANG_FOLDER);
setlocale(LC_ALL, LOCALE_CODE);

textdomain("menu");

if (!isset($_GET['page'])) {
	
	$page = NULL;
	
} else {

	$tmp = explode('/', $_GET['page'], 3);
	$page = '/' . $tmp[1];
	$subpage = isset($tmp[2]) ? '/' . $tmp[2] : '';


}

$router = 
	array(
		[
			'permalink' => '/', 
			'i18nedPermalink' => _('/'), 
			'tpl' => 'home.php'
		], 
		[
			'permalink' => '/fonctionnalites', 
			'i18nedPermalink' => _('/fonctionnalites'), 
			'tpl' => 'features.php'
		], 
		[
			'permalink' => '/telechargement', 
			'i18nedPermalink' => _('/telechargement'), 
			'tpl' => 'download.php'
		], 
		[
			'permalink' => '/merci', 
			'i18nedPermalink' => _('/merci'), 
			'tpl' => 'funding.php'
		], 
		[
			'permalink' => '/tutoriel-cesium', 
			'i18nedPermalink' => _('/tutoriel-cesium'), 
			'tpl' => 'tuto.php'
		], 
		[
			'permalink' => '/developpeurs', 
			'i18nedPermalink' => _('/developpeurs'), 
			'tpl' => 'jobs.php'
		],
		[
			'permalink' => '/mentions-legales', 
			'i18nedPermalink' => _('/mentions-legales'), 
			'tpl' => 'legal-notice.php'
		]
	);

$found = false;
$pageIsHome = false;

foreach ($router as $route)
{
	if ($route['i18nedPermalink'] == $page)
	{
		$found = true;
		$pagePermalink = $route['permalink'];
		$pageIsHome = ($route['i18nedPermalink'] == _('/')) ? true : false;
		
		include('tpl/' . $route['tpl']);
		
		break;
	}
}

if (!$found)
{
	// echo '<pre>'; var_dump($page); echo '</pre>';
	header('Location: '. $rootURL . '/'. LANG . '/');
}

