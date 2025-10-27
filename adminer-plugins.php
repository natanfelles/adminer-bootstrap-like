<?php
return [
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
    new AdminerBootstrapLike(true),
];
