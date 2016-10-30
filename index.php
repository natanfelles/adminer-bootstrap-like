<?php
//ini_set('display_errors', 0);

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
	$plugins = array(
		new AdminerLoginServers([
			'localhost',
			'192.168.2.2',
			'192.168.2.3',
		]),
		new AdminerCollations([
			'utf8_general_ci',
			'latin1_swedish_ci',
		]),
		new AdminerDatabaseHide([
			'mysql',
			'information_schema',
			'performance_schema',
			'sys',
		]),
		new AdminerSimpleMenu(),
		new AdminerJsonPreview(),
		//new AdminerISPConfig(),

		// AdminerTheme has to be the last one.
		new AdminerTheme('bootstrap-like'),
	);

	return new AdminerPlugin($plugins);
}

// Include original Adminer or Adminer Editor.
include './adminer.php';
