<?php
/**
 * Adminer Bootstrap-Like Design
 *
 * @author  Natan Felles, https://natanfelles.github.io <natanfelles@gmail.com>
 * @link    https://github.com/natanfelles/adminer-bootstrap-like
 * @link    https://www.adminer.org/plugins/#use
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or
 *     other)
 */

/**
 * Class AdminerBootstrapLike
 */
class AdminerBootstrapLike extends AdminerPlugin
{
    protected $dev = false;

    /**
     * Class constructor
     *
     * @param array $plugins
     * @param boolean $dev Set TRUE to development mode
     */
    public function __construct($plugins, $dev = false)
    {
        $this->dev = $dev;
        parent::__construct($plugins);
    }

    public function head()
    {
        ?>

        <link rel="stylesheet" type="text/css" href="assets/styles<?php echo $this->dev ? ''
            : '.min' ?>.css">
        <script type="application/javascript" src="assets/scripts<?php echo $this->dev ? ''
            : '.min' ?>.js" <?php echo nonce() ?>></script>

        <?php
    }

    public function loginForm()
    {
        ?>

        <div id="login-form">
            <?php parent::loginForm() ?>
        </div>

        <?php
    }

    public function name()
    {
        return '<a href="./" id="h1">Adminer</a>'
            . '<div id="scroller"><a href="#"></a><a href="#"></a></div>';
    }
}
