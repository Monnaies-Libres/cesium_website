<?php
if (!$pageIsHome) {
	
	$pageTitle .= " - "  . "Cesium Ğ1";

}

$bodyIds = !isset($bodyIds) ? '' : $bodyIds;

?>
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<title><?php echo $pageTitle; ?></title>
		<link type="image/x-icon" rel="shortcut icon" href="<?php echo $rootURL; ?>/img/favicon.png" />
		<meta name="generator" content="BorisPaing" />
		

		<meta name="description" content="<?php echo $pageDescription; ?>" />

		<meta property="og:title" content="<?php echo $pageTitle; ?>"/>
		<meta property="og:description" content="<?php echo $pageDescription; ?>" />
		<meta property="og:url" content="http://cesium.app/" />
		<meta property="og:site_name" content="Cesium Ğ1" />
		
		<meta property="og:image" content="<?php echo $rootURL . '/i18n/' . LANG_FOLDER . '/contents' . _('/accueil') . _('/Cesium-G1-maquette.png'); ?>" />
		<meta property="og:type" content="website" />

		<meta name="twitter:description" content="<?php echo $pageDescription; ?>" />
		<meta name="twitter:title" content="<?php echo $pageTitle; ?>" />
		
		<meta name="twitter:image" content="<?php echo $rootURL . '/i18n/' . LANG_FOLDER . '/contents' . _('/accueil') . _('/Cesium-G1-maquette.png'); ?>" />
		<meta name="twitter:card" content="summary_large_image" />
		
		<script type="text/javascript" src="<?php echo $rootURL; ?>/lib/lazyImg.min.js"></script>
		
		<?php
		foreach ($availableLanguages as $isoCode => $v)
		{
			echo '<link rel="alternate" hreflang="'. $isoCode .'" href="'. $rootURL .'/'. $isoCode .'/" />'; 
		}
		?>

		<link type="text/css" rel="stylesheet" media="screen" href="<?php echo $rootURL; ?>/lib/style.css" />
		
		<?php if (FUNDING_ALT) echo '<link type="text/css" rel="stylesheet" media="screen" href="'. $rootURL .'/lib/style-funding-alt-1.css" />'; ?>
		
	</head>
	<body id="<?php echo $bodyIds; ?>">
			<?php
				textdomain("menu");

				$menu =
					array(
						[
							'uri' => _('/'), 
							'label' => _('Accueil')
						], 
						[
							'uri' => _('/fonctionnalites'), 
							'label' => _('Fonctionnalités')
						], 
						[
							'uri' => _('/telechargement'), 
							'label' => _('Télécharger')
						],
						[
							'uri' => _('/tutoriel-cesium') . '/', 
							'label' => _('Tutoriel')
						]
					);
			?>
			
			<header>
				<?php
				
				$element = $pageIsHome ? 'h1' : 'h2';
				
				echo '
				<'. $element .'>
					<a href="'. parseURI("/") .'">
						Cesium Ğ1
					</a>
				</'. $element .'>';
				?>
				
				<p>
					<a href="<?php echo parseURI("/"); ?>">
						<img src="<?php echo $rootURL; ?>/lib/logo.png" alt="logo Cesium Ğ1" />
					</a>
				</p>

				<nav>
					<button><span>Afficher le menu</span></button>

					<ul>

						<?php

						$itemsNb = count($menu);

						for ($i = 0; $i < $itemsNb; ++$i)
						{
							$active = ($_SERVER['REQUEST_URI'] == parseURI($menu[$i]['uri'])) ? ' class="active"' : '';

							echo '
							<li'. $active .'>
								<a role="menuitem" href="'. parseURI($menu[$i]['uri']) . '">
									<span>'. $menu[$i]['label'] .'</span>
								</a>
							</li>';
						}
						?>

					</ul>
				</nav>
			</header>
			
			<main>
