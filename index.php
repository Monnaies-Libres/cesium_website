<?php
include('config.php');

defineLang();

putenv('LC_ALL='. LANG_FOLDER);
setlocale(LC_ALL, LOCALE_CODE);

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
			'i18nedPermalink' => dgettext('menu', '/'), 
			'tpl' => 'home.php'
		], 
		[
			'permalink' => '/fonctionnalites', 
			'i18nedPermalink' => dgettext('menu', '/fonctionnalites'), 
			'tpl' => 'features.php'
		], 
		[
			'permalink' => '/telechargement', 
			'i18nedPermalink' => dgettext('menu', '/telechargement'), 
			'tpl' => 'download.php'
		], 
		[
			'permalink' => '/merci', 
			'i18nedPermalink' => dgettext('menu', '/merci'), 
			'tpl' => 'funding.php'
		], 
		[
			'permalink' => '/tutoriel-cesium', 
			'i18nedPermalink' => dgettext('menu', '/tutoriel-cesium'), 
			'tpl' => 'tuto.php'
		], 
		[
			'permalink' => '/developpeurs', 
			'i18nedPermalink' => dgettext('home', '/developpeurs'), 
			'tpl' => 'jobs.php'
		],
		[
			'permalink' => '/mentions-legales', 
			'i18nedPermalink' => dgettext('menu', '/mentions-legales'), 
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
		$pageIsHome = ($route['i18nedPermalink'] == dgettext('menu', '/')) ? true : false;
		
		include('tpl/' . $route['tpl']);
		
		break;
	}
}

if (!$found)
{
	// echo '<pre>'; var_dump($page); echo '</pre>';
	header('Location: '. $rootURL . '/'. LANG . '/');
}

