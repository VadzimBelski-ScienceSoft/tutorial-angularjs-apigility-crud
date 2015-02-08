<?php
return array(
    'db' => array(
        'adapters' => array(
            'DB\\Tutorial' => array(
                'driver' => 'Pdo_Sqlite',
                'database' => 'data/tutorial.sqlite',
                'charset' => 'utf8',
            ),
        ),
    ),
);
