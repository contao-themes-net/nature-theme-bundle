<?php

declare(strict_types=1);

/*
 * nature theme bundle for Contao Open Source CMS
 *
 * Copyright (C) 2026 pdir / digital agentur  // pdir GmbH
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

use Contao\Automator;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\Folder;
use Contao\System;
use Doctrine\DBAL\Connection;

trait MigrationHelperTrait
{
    private ContaoFramework $contaoFramework;
    private Connection $connection;

    private string $uploadPath;
    private string $projectDir;

    private string $contaoFolder = 'vendor/contao-themes-net/nature-theme-bundle/contao';
    private string $themeFolder = 'naturetheme';
    private string $sqlFile = 'sql/contao53/minimal.sql';

    private array $minTables = [ // @phpstan-ignore-line
        'tl_article', 'tl_content', 'tl_css_style_selector', 'tl_files', 'tl_form', 'tl_form_field', 'tl_image_size',
        'tl_image_size_item', 'tl_layout', 'tl_member', 'tl_module', 'tl_page', 'tl_theme',
    ];

    private array $fullTables = [ // @phpstan-ignore-line
        'tl_calendar', 'tl_calendar_events', 'tl_faq', 'tl_faq_category', 'tl_news', 'tl_newsletter_channel', 'tl_news_archive',
    ];

    /**
     * Copies the theme files to the upload folder and regenerates the symlinks.
     * Returns false if the folder already exists.
     */
    private function copyThemeFiles(): bool
    {
        $this->contaoFramework->initialize();

        $this->uploadPath = System::getContainer()->getParameter('contao.upload_path');
        $this->projectDir = System::getContainer()->getParameter('kernel.project_dir');

        if (file_exists($this->projectDir.'/'.$this->uploadPath.'/'.$this->themeFolder)) {
            return false;
        }

        $folder = new Folder($this->contaoFolder.'/files/'.$this->themeFolder);
        $folder->copyTo($this->uploadPath.'/'.$this->themeFolder);

        (new Automator())->generateSymlinks();

        return true;
    }
}
