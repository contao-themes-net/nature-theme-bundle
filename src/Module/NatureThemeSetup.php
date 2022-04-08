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

namespace ContaoThemesNet\NatureThemeBundle\Module;

use Contao\BackendModule;
use Contao\File;
use Contao\Folder;
use Contao\Input;
use ContaoThemesNet\NatureThemeBundle\ThemeUtils;

class NatureThemeSetup extends BackendModule
{
    public const VERSION = '1.9.0';

    protected $strTemplate = 'be_naturetheme_setup';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        switch (Input::get('act')) {
            case 'syncFolder':
                $path = sprintf(
                    '%s/%s/bundles/contaothemesnetnaturetheme',
                    ThemeUtils::getRootDir(),
                    ThemeUtils::getWebDir()
                );

                if (!file_exists('files/naturetheme')) {
                    new Folder('files/naturetheme');
                }
                $this->getFiles($path);
                $this->getSqlFiles(ThemeUtils::getRootDir().'/vendor/contao-themes-net/nature-theme-bundle/src/templates');
                $this->Template->message = true;
                $this->Template->version = self::VERSION;
                break;

            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare('TRUNCATE tl_files')->execute();
                $this->Template->messageTruncate = true;
                $this->Template->version = self::VERSION;
                break;

            default:
                $this->Template->version = self::VERSION;
        }
    }

    protected function getFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, 'contaothemesnetnaturetheme');
                $filesFolder = 'files/naturetheme'.str_replace('contaothemesnetnaturetheme', '', substr($path, $pos)).'/'.$dir;

                if ('_nature_variables.scss' !== $dir && '_nature_colors.scss' !== $dir && 'backend.css' !== $dir && 'nature.scss' !== $dir && 'nature_win.scss' !== $dir && 'nature_style.scss' !== $dir && 'maklermodul.scss' !== $dir && 'fonts.scss' !== $dir) {
                    if (!file_exists(ThemeUtils::getRootDir().'/'.$filesFolder)) {
                        $objFile = new File(ThemeUtils::getWebDir().'/bundles/'.substr($path, $pos).'/'.$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path.'/'.$dir;
                $pos = strpos($path, 'contaothemesnetnaturetheme');
                $filesFolder = 'files/naturetheme'.str_replace('contaothemesnetnaturetheme', '', substr($path, $pos)).'/'.$dir;

                if ('bulma' !== $dir && 'parts' !== $dir && 'fonts' !== $dir && 'js' !== $dir && 'css' !== $dir && 'color_schemes' !== $dir) {
                    if (!file_exists($filesFolder)) {
                        new Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }

    protected function getSqlFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, '/vendor');
                $filesFolder = 'templates/'.$dir;
                $objFile = new File(substr($path, $pos).'/'.$dir, true);
                $objFile->copyTo($filesFolder);
            }
        }
    }
}
