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

/**
 * Class AdminerBootstrapLike
 */
class AdminerBootstrapLike
{
	var $dev;

	/**
	 * Class constructor
	 *
	 * @param boolean $dev Set TRUE to development mode
	 */
	public function __construct($dev = false)
	{
		$this->dev = $dev;
	}

	function head()
	{
		?>

		<link rel="stylesheet" type="text/css" href="assets/styles<?php echo $this->dev ? '' : '.min' ?>.css">
		<script type="application/javascript" src="assets/scripts<?php echo $this->dev ? '' : '.min' ?>.js" <?php echo nonce() ?>></script>

		<?php
		return true;
	}

	function loginForm()
	{
		?>

		<div id="login-form">
			<?php echo Adminer::loginForm() ?>
		</div>

		<?php
		return true;
	}

	function name()
	{
		return '<a href="./" id="h1">Adminer</a>';
	}
}
