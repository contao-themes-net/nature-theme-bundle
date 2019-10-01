<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace ContaoThemesNet\NatureThemeBundle\Tests;

use ContaoThemesNet\NatureThemeBundle\ContaoThemesNetNatureThemeBundle;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetNatureThemeBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoThemesNetNatureThemeBundle();

        $this->assertInstanceOf('ContaoThemesNet\NatureThemeBundle\ContaoThemesNetNatureThemeBundle', $bundle);
    }
}
