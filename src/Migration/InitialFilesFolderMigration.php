<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur  // pdir GmbH
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

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\Folder;
use Contao\System;
use Doctrine\DBAL\Connection;

class InitialFilesFolderMigration extends AbstractMigration
{
    use MigrationHelperTrait;

    public function __construct(ContaoFramework $contaoFramework, Connection $connection)
    {
        $this->contaoFramework = $contaoFramework;
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return 'Initial files folder migration - NATURE Theme';
    }

    /**
     * @throws \Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        // If the database tables itself does not exist we should do nothing
        if (!$schemaManager->tablesExist($this->minTables)) {
            return false;
        }

        // Check if full version is used
        if (!$schemaManager->tablesExist($this->fullTables)) {
            return false;
        }

        $this->contaoFramework->initialize();

        $this->uploadPath = System::getContainer()->getParameter('contao.upload_path');
        $this->projectDir = System::getContainer()->getParameter('kernel.project_dir');

        // If the folder exists we should do nothing
        if (file_exists($this->projectDir.'/'.$this->uploadPath.'/'.$this->themeFolder)) {
            return false;
        }

        // check some tables for content
        $count = $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_article`');
        $count += $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_content`');
        $count += $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_module`');

        if (0 === $count) {
            return false;
        }

        return true;
    }

    /**
     * @throws \Exception
     */
    public function run(): MigrationResult
    {
        // copy files and folders to files
        $folder = new Folder($this->contaoFolder.'/files/'.$this->themeFolder);
        $folder->copyTo($this->uploadPath.'/'.$this->themeFolder);

        return $this->createResult(true, 'Initial theme files where copied.');
    }
}
