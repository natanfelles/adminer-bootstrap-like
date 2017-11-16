<?php

/**
 * Adds support for Pematon's custom theme.
 * This includes meta headers, touch icons and other stuff.
 *
 * @author    Peter Knut
 * @author    Natan Felles <natanfelles@gmail.com>
 * @copyright 2014-2015 Pematon, s.r.o. (http://www.pematon.com/)
 */
class AdminerTheme {
	/** @var string */
	private $themeName;

	/**
	 * @param string $themeName File with this name and .css extension should be located in css folder.
	 */
	function AdminerTheme($themeName = "bootstrap-like", $themes = [])
	{
		define("PMTN_ADMINER_THEME", TRUE);

		if (isset($_POST['theme']) && in_array($_POST['theme'], $themes)) {
			$themeName = $_POST['theme'];
			setcookie('adminer_theme', $_POST['theme'], strtotime('+365 days'));
		}
		elseif (isset($_GET['theme']) && in_array($_GET['theme'], $themes))
		{
			$themeName = $_GET['theme'];
			setcookie('adminer_theme', $_GET['theme'], strtotime('+365 days'));
		}
		elseif (isset($_COOKIE['adminer_theme']) && in_array($_COOKIE['adminer_theme'], $themes))
		{
			$themeName = $_COOKIE['adminer_theme'];
		}

		$this->themeName = $themeName;
	}

	/**
	 * Prints HTML code inside <head>.
	 *
	 * @return false
	 */
	public function head()
	{
		$userAgent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
		?>

		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, target-densitydpi=medium-dpi"/>

		 <link rel="icon" type="image/ico" href="images/favicon.png">

		<?php
		// Condition for Windows Phone has to be the first, because IE11 contains also iPhone and Android keywords.
		if (strpos($userAgent, "Windows") !== FALSE):
			?>
			  <meta name="application-name" content="Adminer"/>
			  <meta name="msapplication-TileColor" content="#ffffff"/>
			  <meta name="msapplication-square150x150logo" content="images/tileIcon.png"/>
			  <meta name="msapplication-wide310x150logo" content="images/tileIcon-wide.png"/>

		<?php elseif (strpos($userAgent, "iPhone") !== FALSE || strpos($userAgent, "iPad") !== FALSE): ?>
			  <link rel="apple-touch-icon-precomposed" href="images/touchIcon.png"/>

		<?php elseif (strpos($userAgent, "Android") !== FALSE): ?>
			  <link rel="apple-touch-icon-precomposed" href="images/touchIcon-android.png?2"/>

		<?php else: ?>
			  <link rel="apple-touch-icon" href="images/touchIcon.png"/>
		<?php endif; ?>

		 <link rel="stylesheet" type="text/css" href="css/<?php echo htmlspecialchars($this->themeName) ?>.css?2">

		<script type="text/javascript" src="js/adminer-theme.js"></script>

		<?php

		// Return false to disable linking of adminer.css and original favicon.
		// Warning! This will stop executing head() function in all plugins defined after AdminerTheme.
		return FALSE;
	}


	function name()
	{
		return '<a href="//' . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['DOCUMENT_URI']) . '" id="h1">Adminer</a>';
	}

}
