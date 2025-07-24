<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur  // pdir GmbH
 *
 * @package    contao-themes-net/nature-theme-bundle
 * @link       https://github.com/contao-themes-net/nature-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\NatureThemeBundle\Migration;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\System;
use Doctrine\DBAL\Connection;

class InitialDemoDataMigration extends AbstractMigration
{
    use MigrationHelperTrait;

    public function __construct(ContaoFramework $contaoFramework, Connection $connection)
    {
        $this->contaoFramework = $contaoFramework;
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return 'Initial demo data migration - NATURE Theme';
    }

    /**
     * @throws \Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        // If the database tables itself do not exist we should do nothing
        if (!$schemaManager->tablesExist($this->minTables)) {
            return false;
        }

        // Check if a full version is used
        if ($schemaManager->tablesExist($this->fullTables)) {
            $this->sqlFile = str_replace('minimal', 'full', $this->sqlFile);
        }

        // Check wich Contao Version is used
        if (version_compare(ContaoCoreBundle::getVersion(), '5.6.0', '>=')) {
            $this->sqlFile = str_replace('contao53', 'contao56', $this->sqlFile);
        }

        // check some tables for content
        $count = (int) $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_article`');
        $count += (int) $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_content`');
        $count += (int) $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_module`');

        if ($count > 0) {
            return false;
        }

        if (!isset($schemaManager->listTableColumns('tl_article')['pdir_th_tag'])) {
            return false;
        }

        if (!$schemaManager->tablesExist(['tl_content']) && !isset($schemaManager->listTableColumns('tl_content')['advancedCss'])) {
            return false;
        }

        if (!$schemaManager->tablesExist(['tl_form']) && !isset($schemaManager->listTableColumns('tl_form')['ac_set'])) {
            return false;
        }

        return true;
    }

    /**
     * @throws \Exception
     */
    public function run(): MigrationResult
    {
        $this->contaoFramework->initialize();

        $this->projectDir = System::getContainer()->getParameter('kernel.project_dir');

        foreach (explode("\n", file_get_contents($this->projectDir.'/'.$this->contaoFolder.'/'.$this->sqlFile)) as $sql) {
            // ignore empty lines
            if ('' === trim($sql)) {
                continue;
            }

            $this->connection->prepare($sql)->execute();
        }

        return $this->createResult(true, 'Initial structure and content added.');
    }
}
