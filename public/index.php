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
// ini_set('display_errors', 1);
// ini_set('display_statup_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

function adminer_object()
{
    return new AdminerBootstrapLike([
        new AdminerDatabaseHide([
            'mysql',
            'information_schema',
            'performance_schema',
            'sys',
        ]),
        //	new AdminerEditForeign,
        new AdminerEnumOption,
        new AdminerTableStructure,
        new AdminerTableIndexesStructure,
        new AdminerDumpJson,
        new AdminerDumpZip,
        new AdminerLoginIp(['127.0.0.1']),
    ], false);
}

require __DIR__ . '/../adminer.php';
