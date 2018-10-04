<?php
/**
 * Adminer Bootstrap-Like Design
 *
 * @author  Natan Felles, https://natanfelles.github.io <natanfelles@gmail.com>
 * @link    https://github.com/natanfelles/adminer-bootstrap-like
 * @link    https://www.adminer.org/plugins/#use
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */

//ini_set('display_errors', 0);

function adminer_object()
{
	// Required to run any plugin
	include_once './plugins/plugin.php';

	// Plugins auto-loader
	foreach (glob('plugins/*.php') as $filename)
	{
		include_once "./{$filename}";
	}

	// Specify enabled plugins here
	$plugins = [

		new AdminerDatabaseHide([
			'mysql',
			'information_schema',
			'performance_schema',
			'sys',
		]),

		new AdminerCollations([
			'utf8_general_ci',
			'utf8mb4_general_ci',
			'latin1_swedish_ci',
		]),

		new AdminerEditForeign,
		new AdminerEnumOption,

		new AdminerStructComments,
		new AdminerTableStructure,
		new AdminerTableIndexesStructure,

		new AdminerJsonPreview,

		new AdminerDumpJson,
		new AdminerDumpZip,

		//new AdminerISPConfig('admin', 'admin', 'https://server.domain.tld', true),

	];

	$adminer = new AdminerPlugin($plugins);

	// you can add plugins after instantiating the adminer object so it can use the referenced object!
	$adminer->addPlugin(new AdminerBootstrapLike($adminer, false));

	return $adminer;
}

// Include original Adminer or Adminer Editor
include './adminer-4.6.3.php';
