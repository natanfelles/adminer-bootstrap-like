<?php
ini_set('display_errors', 0);

function adminer_object()
{
	// Required to run any plugin.
	include_once './plugins/plugin.php';

	// Plugins auto-loader.
	foreach (glob('plugins/*.php') as $filename)
	{
		include_once "./{$filename}";
	}

	// Specify enabled plugins here.
	$plugins = [
		/*new AdminerDatabaseHide([
			'mysql',
			'information_schema',
			'performance_schema',
			'sys',
		]),*/

		/*new AdminerLoginServersEnhanced([
			new AdminerLoginServerEnhanced('127.0.0.1:3306', '127.0.0.1:3306 - MySQL', 'server'),
			new AdminerLoginServerEnhanced('127.0.0.1:3307', '127.0.0.1:3307 - MariaDB', 'server'),
			new AdminerLoginServerEnhanced('127.0.0.1:5432', '127.0.0.1:5432 - PostgreSQL', 'pgsql'),
			new AdminerLoginServerEnhanced('127.0.0.1:5432', '127.0.0.1:27017 - MongoDB', 'mongo'),
		]),*/

		/*new AdminerCollations([
			'utf8_general_ci',
			'utf8mb4_general_ci',
			'latin1_swedish_ci',
		]),*/

		new AdminerJsonPreview(),
		new AdminerDumpJson(),

		// new AdminerISPConfig(),

		new AdminerSimpleMenu(),

		// AdminerTheme has to be the last one.
		new AdminerTheme('bootstrap-like'),
	];

	return new AdminerPlugin($plugins);
}

// Include original Adminer or Adminer Editor.
include './adminer.php';
