<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 22/08/2018
 * Time: 11:12
 */

$container->loadFromExtension('monolog', array(
    'handlers' => array(
        'main' => array(
            'type' => 'rotating_file',
            'path' => '%kernel.logs_dir%/%kernel.environment%.log',
            'level' => 'debug',
            // max number of log files to keep
            // defaults to zero, which means infinite files
            'max_files' => 10,
        ),
    ),
));