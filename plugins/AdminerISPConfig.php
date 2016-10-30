<?php

/**
 * Authenticate and auto-check host by ISPConfig Remote API
 *
 * Your Remote User needs the following functions:
 *      Sites database functions
 *      Server functions
 *
 * @author  Natan Felles, https://natanfelles.github.io <natanfelles@gmail.com>
 * @link    https://natanfelles.github.io/adminer-ispconfig
 * @link    http://www.adminer.org/plugins/#use
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */
class AdminerISPConfig {


	var $username = 'admin';
	var $password = 'admin';
	var $soap_uri = 'https://server.domain.tld:8080/remote/';
	var $check_ssl = FALSE; // Set FALSE if you are using a Self Signed certificate


	function credentials()
	{
		return array($this->get_server(), $_GET["username"], get_password());
	}


	function get_server()
	{
		$username = $this->username;
		$password = $this->password;
		$soap_uri = $this->soap_uri;
		$soap_location = $soap_uri . '/index.php';

		if ($this->check_ssl == FALSE)
		{
			$stream_context = stream_context_create(array(
				'ssl' => array(
					'verify_peer'       => FALSE,
					'verify_peer_name'  => FALSE,
					'allow_self_signed' => TRUE,
				),
			));
		}
		else
		{
			$stream_context = NULL;
		}

		$client = new SoapClient(NULL, array(
			'location'       => $soap_location,
			'uri'            => $soap_uri,
			'stream_context' => $stream_context,
			'trace'          => 1,
			'exceptions'     => 1,
		));

		try
		{
			$session_id = $client->login($username, $password);

			$web_database_user = $client->sites_database_user_get($session_id, [
				'database_user' => h($_GET["username"]),
			]);

			$server = $client->server_get($session_id, $web_database_user['server_id'], $section = 'server');

			$client->logout($session_id);

			return $server[1]['hostname'];
		}
		catch (SoapFault $e)
		{
			die('SOAP Error: ' . $e->getMessage());
		}
	}


	function loginForm()
	{
		?>
		<div id="login">
			<table>
				<input type="hidden" name="auth[driver]" value="server">
				<tr>
					<th><?php echo lang('Username'); ?>
					<td>
						<input id="username" name="auth[username]" value="<?php echo h($_GET["username"]); ?>">
				<tr>
					<th><?php echo lang('Password'); ?>
					<td><input type="password" name="auth[password]">
			</table>
			<p><input type="submit" value="<?php echo lang('Login'); ?>">
				<?php
				echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";
				?>
		</div>
		<?php

		return TRUE;
	}


}
