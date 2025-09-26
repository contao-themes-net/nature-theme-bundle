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

namespace ContaoThemesNet\NatureThemeBundle\Module;

use Contao\BackendModule;

class NatureThemeSetup extends BackendModule
{
    public const VERSION = '2.6.1';

    protected $strTemplate = 'be_naturetheme_setup';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        $this->Template->version = self::VERSION;
    }
}
