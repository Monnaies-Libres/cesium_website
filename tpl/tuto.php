<?php

textdomain('tuto');

$pageTitle = '';

$tutoURL = $rootURL . '/' . LANG . dgettext('menu', $pagePermalink) . '/';

if (empty($subpage))
{
	header('Location:'. $tutoURL);	
}



$tutoContentsPath = './i18n/' . LANG_FOLDER . '/contents/tuto';


if (file_exists($tutoContentsPath . $subpage) and !is_dir($tutoContentsPath . $subpage) )
{
	$p = $tutoContentsPath . $subpage;
	
	if (preg_match('/\.(jpg|jpeg)$/i', $subpage)) {
		
		header("Content-type: image/jpeg");
		
		header('Content-Length: '. filesize($p));
		
		readfile($p);
	
	} elseif (preg_match('/\.png$/i', $subpage)) {
		
		header("Content-type: image/png");
		
		header('Content-Length: '. filesize($p));
		
		readfile($p);
		
		
	} else {
		
		$pageTitle = _('Erreur');

		include('head.php');

		echo '<p>' . _('Type de fichier non supporté.') . '</p>';

		echo '<p><code>'. $subpage . '</code></p>';

		include('foot.php');
		
	}
	
} else {
	
	$path = substr($subpage, 0, strrpos($subpage, '/'));
	
	$fileName = substr($subpage, strrpos($subpage, '/'));
	$fileName = ($fileName == '/') ? '/index.html' : $fileName . '.html';
	
	$fileURI = $tutoContentsPath . $path . $fileName;

	if (!file_exists($fileURI))
	{

		$pageTitle = _('Erreur');

		include('head.php');

		echo '<p>'. _('Page non trouvée.') . '</p>';

		echo $file;

		include('foot.php');
	}

	else
	{
		/* === Menu === */
		
		$menu = './i18n/' . LANG_FOLDER . '/contents/tuto/menu.html';
		
		if (file_exists($menu)) {
			
			$toc = file_get_contents($menu, FILE_USE_INCLUDE_PATH);
			
			$pagePath = substr($subpage, 1);
			
			$branches = explode('/', removeTrailingSlash($pagePath), -1);
			
			$fullPath = '';
			
			foreach ($branches as $branch) {
				
				$fullPath .= $branch . '/';

				$toc = preg_replace('#<li>(\s*<a href="'. $fullPath .'")#isU', 
								   '<li class="current">$1', 
								   $toc);
			}
			
			$toc = preg_replace('#<li>(\s*<a href="'. $pagePath .'")#isU', 
							   '<li class="current active">$1', 
							   $toc);
			
			$toc = str_replace('href="', 
							   ('href="' . $tutoURL), 
							   $toc);
			
			
		}
		
		/* === Contents === */
		
		$contents = file_get_contents($fileURI, FILE_USE_INCLUDE_PATH);
		$contents = str_replace('src="/', 'src="' . $rootURL . '/', $contents);
		$contents = str_replace('href="/', 'href="' . $rootURL . '/' . LANG, $contents);

		preg_match('#<h1>(.+)</h1>#isU', $contents, $matches);
		$pageTitle = $matches[1];
		$pageDescription = _("Ce tutoriel vous permettra de prendre vos marques dans Cesium et vous donnera des astuces pour l'utiliser efficacement au quotidien.");

		include('head.php');

		?>

		<section id="tuto">
			<nav>
				<h2><?php echo _('Sommaire'); ?></h2>

				<?php echo $toc; ?>
			</nav>

			<article>
				<?php echo $contents; ?>
			</article>
		</section>

		<?php

		include('foot.php');
	}
	
}