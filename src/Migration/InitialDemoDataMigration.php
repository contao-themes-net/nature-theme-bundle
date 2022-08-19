<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
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
use Contao\File;
use Contao\Folder;
use Contao\System;
use ContaoThemesNet\NatureThemeBundle\ThemeUtils;
use Doctrine\DBAL\Connection;

class InitialDemoDataMigration extends AbstractMigration
{
    private ContaoFramework $contaoFramework;
    private Connection $connection;

    private string $sqlFile = 'sql'.\DIRECTORY_SEPARATOR.'contao50'.\DIRECTORY_SEPARATOR.'minimal.sql';

    private array $minTables = [
        'tl_article', 'tl_content', 'tl_css_style_selector', 'tl_files', 'tl_form', 'tl_form_field', 'tl_image_size',
        'tl_image_size_item', 'tl_layout', 'tl_member', 'tl_module', 'tl_page', 'tl_theme'
    ];

    private array $fullTables = [
        'tl_calendar', 'tl_calendar_events', 'tl_faq', 'tl_faq_category', 'tl_news', 'tl_newsletter_channel', 'tl_news_archive'
    ];

    private string $rootDir = '';

    public function __construct(ContaoFramework $contaoFramework, Connection $connection)
    {
        $this->contaoFramework = $contaoFramework;
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return "Initial demo data migration - NATURE Theme";
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->getSchemaManager();

        // If the database tables itself does not exist we should do nothing
        if (!$schemaManager->tablesExist($this->minTables)) {
            return false;
        }

        // Check if full version is used
        if ($schemaManager->tablesExist($this->fullTables)) {
            $this->sqlFile = str_replace('minimal', 'full', $this->sqlFile);
        }

        // check some tables for content
        $count = $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_article`');
        $count += $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_content`');
        $count += $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_module`');

        if ($count > 0) {
            return false;
        }

        return true;
    }

    public function run(): MigrationResult
    {
        $this->contaoFramework->initialize();

        $this->rootDir = System::getContainer()->getParameter('kernel.project_dir');

        foreach (explode("\n", file_get_contents($this->rootDir . '/' . $this->contaoFolder . '/' . $this->sqlFile)) as $sql) {
            // ignore empty lines
            if ('' === trim($sql)) {
                continue;
            }

            $this->connection->prepare($sql)->execute();
        }

        return $this->createResult(true, "Initial structure and content added.");
    }
}
