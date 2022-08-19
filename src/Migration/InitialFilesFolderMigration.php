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

class InitialFilesFolderMigration extends AbstractMigration
{
    private ContaoFramework $contaoFramework;

    private string $filesFolder = 'files'.\DIRECTORY_SEPARATOR.'naturetheme';
    private string $contaoFolder = 'vendor'.\DIRECTORY_SEPARATOR.'contao-themes-net'.\DIRECTORY_SEPARATOR.'nature-theme-bundle'.\DIRECTORY_SEPARATOR.'contao';
    private string $rootDir = '';

    public function __construct(ContaoFramework $contaoFramework)
    {
        $this->contaoFramework = $contaoFramework;
    }

    public function getName(): string
    {
        return "Initial files folder migration - NATURE Theme";
    }

    public function shouldRun(): bool
    {
        $this->contaoFramework->initialize();

        $this->rootDir = System::getContainer()->getParameter('kernel.project_dir');

        // If the folder exists we should do nothing
        if (file_exists($this->rootDir . \DIRECTORY_SEPARATOR . $this->contaoFolder . \DIRECTORY_SEPARATOR .  $this->filesFolder)) {
            return false;
        }

        return true;
    }

    public function run(): MigrationResult
    {
        if (!file_exists($this->rootDir . \DIRECTORY_SEPARATOR . $this->contaoFolder . \DIRECTORY_SEPARATOR .  $this->filesFolder)) {
            $folder = new Folder($this->contaoFolder.\DIRECTORY_SEPARATOR.$this->filesFolder);
            $folder->copyTo($this->filesFolder);
        }

        return $this->createResult(true, "Initial files added.");
    }

    protected function copyThemeFolder(): void
    {

    }
}
