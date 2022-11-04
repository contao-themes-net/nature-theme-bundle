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

namespace ContaoThemesNet\NatureThemeBundle\DependencyInjection\Tests;

use ContaoThemesNet\NatureThemeBundle\DependencyInjection\ContaoThemesNetNatureThemeExtension;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetNatureThemeExtensionTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoThemesNetNatureThemeExtension();

        $this->assertInstanceOf('ContaoThemesNet\NatureThemeBundle\DependencyInjection\ContaoThemesNetNatureThemeExtension', $bundle);
    }
}
