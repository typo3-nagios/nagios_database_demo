<?php

/*
 * TYPO3 CMS extension "Nagios TYPO3 Monitoring: Database Demo"
 *
 * @package     TYPO3
 * @subpackage  nagios_database_demo
 * @author      Michael Schams <schams.net>
 * @link        https://schams.net
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Nagios TYPO3 Monitoring: Database Demo',
    'description' => 'Provides additional details about the database for demonstration purposes.',
    'category' => 'misc',
    'version' => '1.0.0',
    'state' => 'beta',
    'createDirs' => '',
    'clearcacheonload' => true,
    'author' => 'Michael Schams (schams.net)',
    'author_email' => 'schams.net',
    'author_company' => 'https://schams.net',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-7.2.99',
            'typo3' => '9.5.0-9.5.99',
            'nagios' => '3.0.0-3.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
