<?php
declare(strict_types = 1);
namespace SchamsNet\NagiosDatabaseDemo\Slot;

/*
 * TYPO3 CMS extension "Nagios TYPO3 Monitoring: Database Demo"
 *
 * @package     TYPO3
 * @subpackage  nagios_database_demo
 * @author      Michael Schams <schams.net>
 * @link        https://schams.net
 */

use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use SchamsNet\NagiosDatabaseDemo\Details\DatabaseDetails;

/**
 * Database slot
 */
class DatabaseSlot
{
    /**
     * Object Manager
     *
     * @access private
     * @var ObjectManager
     */
    private $objectManager = null;

    /**
     * Database checks
     *
     * @access private
     * @var DatabaseDetails
     */
    private $database = null;

    /**
     * Default constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        /** @var $objectManager TYPO3\CMS\Extbase\Object\ObjectManager */
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);

        /** @var $database DatabaseDetails */
        $this->database = $this->objectManager->get(DatabaseDetails::class);
    }

    /**
     * Dispatch
     *
     * @access public
     * @param string $extensionKey Extension key of the extension emitting the signal
     * @param array $data Reference to $data array (will possibly be manipulated)
     * @return void
     */
    public function dispatch(string $extensionKey = '', array &$data = []): void
    {
        if ($extensionKey === 'nagios') {
            if (is_array($data) && count($data) > 0) {
                $data[] = $this->database->getPageUids();
            }
        }
    }
}
