<?php

/**
 * This file should contain the configuration of databases.
 *
 * $dbs_config is an array of database configurations. Each element of the
 * array should provide details for a database which will be selectable from
 * a list.
 *
 * This is arguably more secure and convenient than submitting database
 * details with an HTML form (and sending them over an unsecured channel).
 *
 * Refer to the 'Demo Configuration' below for reference.
 *
 * $dbs_config = array(
 *      array(
 *          'name' => 'Demo Configuration',
 *          'config' => array(
 *              'host'        => 'localhost',
 *              'user'        => 'db_user',
 *              'password'    => 'db_password',
 *              'db_name'     => 'db_name'
 *          )
 *      ),
 * );
 *
 */
class Config
{

    private $db_config = array(
        array(
            'name' => 'development',
            'config' => array(
                'host' => '',
                'user' => 'root',
                'password' => '',
                'db_name' => 'localhost_dev'
            )
        ),
        array(
            'name' => 'production',
            'config' => array(
                'host' => 'localhost',
                'user' => 'root',
                'password' => '',
                'db_name' => 'localhost_prod'
            )
        )
    );

    public static function getDBConfig($name)
    {
        $class = new Config();
        foreach ($class->db_config as $config) {
            if ($config['name'] == $name) {
                return $config['config'];
            }
        }
        return false;
    }

}