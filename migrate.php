#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: Abiola
 * Date: 4/9/14
 * Time: 10:20 AM
 */

require_once(realpath(dirname(__FILE__)) . '/dbdiff.php');

/**
 * Initialize migration process.
 * Replace 'staging' and 'live' with the corresponding configurations in config.php
 *
 * The first configuration is the target configuration.
 * e.g. DbDiff('staging', 'live') will migrate 'live' database to match the structure in 'staging'
 */
$diff = new DbDiff('staging', 'live');

//TODO handle command line arguments properly
if (count($argv) <= 1) {
    $str = $diff->generateDiff();
    if (trim($str) == '') {
        echo "No difference between databases.";
    } else {
        echo "SQL required to migrate " . $diff->getName2() . " to match " . $diff->getName1() . "\n";
        echo "=================================\n";
        echo $str . "\n";
        echo "=================================\n\n";
    }
    return;
}

if ($argv[1] == 'migrate') {
    $diff->doMigration();
} else if ($argv[1] == 'help') {
    echo "add 'migrate' as argument to perform migration.\nRun without any arguments to get the SQL queries.";
} else {
    echo "unknown argument '" . $argv[1] . "'\n";
}