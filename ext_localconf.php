<?php

/*
 * TYPO3 CMS extension "Nagios TYPO3 Monitoring: Database Demo"
 *
 * @package     TYPO3
 * @subpackage  nagios_database_demo
 * @author      Michael Schams <schams.net>
 * @link        https://schams.net
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Initiate SignalSlotDispatcher
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class
);

// Connect signal "postNagiosCoreDetails" to a Slot
$signalSlotDispatcher->connect(
    \SchamsNet\Nagios\Controller\NagiosController::class,
    'postNagiosCoreDetails',
    \SchamsNet\NagiosDatabaseDemo\Slot\DatabaseSlot::class,
    'dispatch'
);
