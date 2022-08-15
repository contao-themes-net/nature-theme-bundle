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

namespace ContaoThemesNet\NatureThemeBundle\Migrations;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\System;
use Doctrine\DBAL\Connection;

class InitialDemoDataMigration extends AbstractMigration
{
    private string $sqlFile = 'vendor/contao-themes-net/nature-theme-bundle/contao/sql/contao50/minimal.sql';

    private array $minTables = [
        'tl_article', 'tl_content', 'tl_css_style_selector', 'tl_files', 'tl_form', 'tl_form_field', 'tl_image_size',
        'tl_image_size_item', 'tl_layout', 'tl_member', 'tl_module', 'tl_page', 'tl_theme'
    ];

    private array $fullTables = [
        'tl_calendar', 'tl_calendar_events', 'tl_faq', 'tl_faq_category', 'tl_news', 'tl_newsletter_channel', 'tl_news_archive'
    ];

    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
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

        $count = $this->connection->fetchOne('SELECT COUNT(*) FROM `tl_article`');

        if ($count > 0) {
            return false;
        }

        return true;
    }

    public function run(): MigrationResult
    {
        $rootDir = System::getContainer()->getParameter('kernel.project_dir');

        foreach (explode("\n", file_get_contents($rootDir . '/' . $this->sqlFile)) as $sql) {
            dump($sql);
            dump('----');
            if ('' === trim($sql)) {
                continue;
            }
            // dump(rtrim($sql, "\n\r"));
            // dump(str_replace(["\r", "\n"], '', $sql));
            // dump(trim($sql));
            $this->connection->prepare($sql)->execute();
        }

        return $this->createResult(true, "Initial NATURE Theme demo data added.");
    }
}
