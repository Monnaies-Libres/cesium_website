<?php


$cesiumDownloads =
[
	'android' => [
		'title' => 'Android',
		'url' => 'https://play.google.com/store/apps/details?id=fr.duniter.cesium',
		'img' => 'android.svg',
		'desc' => _('Disponible directement sur le Play Store'),
		'extra' => sprintf(_('(ou <a href="%s">télécharger le fichier .apk</a>)'), 'https://github.com/duniter/cesium/releases/download/v'. $cesiumVersions['android'] .'/cesium-v'. $cesiumVersions['android'] .'-android.apk')
	],
	'iphone' => [
		'title' => 'iPhone',
		'url' => 'https://apps.apple.com/app/cesium-%C4%9F1/id1471028018',
		'img' => 'apple.svg',
		'desc' => _('Disponible sur l\'App Store'),
		'extra' => ''
	],
	'firefox' => [
		'title' => _('Firefox'),
		//'url' => sprintf('https://github.com/duniter/cesium/releases/download/v%s/cesium-v%s-extension-firefox.xpi', $cesiumVersions['firefox'], $cesiumVersions['firefox']),
		'url' => 'https://addons.mozilla.org/fr/firefox/addon/cesium/',
		'img' => 'firefox2019.png',
		'desc' => _('Module complémentaire pour Firefox'),
		'extra' => ''
	],
	'chromium' => [
		'title' => _('Chromium&nbsp;/&nbsp;Chrome'),
		'url' => 'https://chrome.google.com/webstore/detail/cesium/ocbhjemiokgibfojkkjapfealnbmgoek',
		'img' => 'chrome.svg',
		'desc' => _('Extension pour Chromium&nbsp;/&nbsp;Chrome'),
		'extra' => ''
	],
	'safari' => [
		'title' => _('Safari'),
		'url' => 'https://apps.apple.com/us/app/cesium-%C4%9F1-for-safari/id1551461335',
		'img' => 'safari.png',
		'desc' => _('Extension pour Safari'),
		'extra' => ''
	],
	'brave' => [
		'title' => _('Brave'),
		'url' => 'https://chrome.google.com/webstore/detail/cesium/ocbhjemiokgibfojkkjapfealnbmgoek',
		'img' => 'brave_lion.svg',
		'desc' => _('Extension pour Brave'),
		'extra' => ''
	],
	'debian' => [
		'title' => 'Ubuntu&nbsp;/ Debian',
		'url' => sprintf('https://github.com/duniter/cesium/releases/download/v%s/cesium-desktop-v%s-linux-x64.deb', $cesiumVersions['debian'], $cesiumVersions['debian']),
		'img' => 'cof_orange_hex.svg',
		'desc' => _('Paquet .deb pour Debian et ses dérivés (Ubuntu, Linux Mint, etc.)'),
		'extra' => _('En cas de problème&nbsp;:') . '<br /><code>sudo apt-get install -y libgconf-2-4</code>'
	],
	'arch' => [
		'title' => 'Arch Linux (et dérivés)',
		'url' => sprintf('https://aur.archlinux.org/packages/cesium-desktop-deb'),
		'img' => 'arch.svg',
		'desc' => _('A installer via AUR'),
		'extra' => _('<code>yay -S cesium-desktop-deb</code>')
	],
	'windows' => [
		'title' => 'Windows',
		'url' => sprintf('https://github.com/duniter/cesium/releases/download/v%s/cesium-desktop-v%s-windows-x64.exe', $cesiumVersions['windows'], $cesiumVersions['windows']),
		'img' => 'windows.svg',
		'desc' => _('Installateur .exe pour Windows'),
		'extra' => _('Lancez le .exe et suivez les instructions à l\'écran')
	],
	'web' => [
		'title' => 'Web',
		'url' => sprintf('https://github.com/duniter/cesium/releases/download/v%s/cesium-v%s-web.zip', $cesiumVersions['web'], $cesiumVersions['web']),
		'img' => '1024px-Applications-internet.png',
		'desc' => _('Pour une installation sur un serveur web'),
		'extra' => ''
	],
	'yunohost' => [
		'title' => 'Yunohost',
		'url' => 'https://github.com/duniter/cesium_ynh',
		'img' => 'yunohost.svg',
		'desc' => _('Paquet pour Yunohost'),
		'extra' => ''
	],
	'livrables' => [
		'title' => _('Livrables'),
		'url' => 'https://github.com/duniter/cesium/releases',
		'img' => 'github.svg',
		'desc' => _('Toutes versions disponibles sur GitHub'),
		'extra' => ''
	],
];
