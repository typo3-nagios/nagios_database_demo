<?php
declare(strict_types = 1);
namespace SchamsNet\NagiosDatabaseDemo\Details;

/*
 * TYPO3 CMS extension "Nagios TYPO3 Monitoring: Database Demo"
 *
 * @package     TYPO3
 * @subpackage  nagios_database_demo
 * @author      Michael Schams <schams.net>
 * @link        https://schams.net
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Class provides database specific details
 */
class DatabaseDetails
{
    private const ORDER_BY_ASCENDING = 'ASC';
    private const ORDER_BY_DESCENDING = 'DESC';

    /**
     * Returns a list of currently stored page UIDs, without deleted pages
     *
     * @access public
     * @return string List of page UIDs
     */
    public function getPageUids(): string
    {
        $pages = [];
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('pages');
        $statement = $queryBuilder
            ->select('uid')->from('pages')->where(
                $queryBuilder->expr()->eq('deleted', 0)
            )->orderBy('uid', self::ORDER_BY_ASCENDING)->execute();

        // Iterate database response
        while ($row = $statement->fetch()) {
            $pages[] = 'DATABASE:table-uid-' . $row['uid'];
        }
        // Return list of page UIDs, multi-line
        return implode(chr(13), $pages);
    }
}
