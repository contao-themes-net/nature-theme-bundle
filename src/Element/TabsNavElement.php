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

namespace ContaoThemesNet\NatureThemeBundle\Element;

use Contao\ContentElement;
use Contao\StringUtil;

class TabsNavElement extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_tabs_nav_nature';

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        $items = StringUtil::deserialize($this->tabs_navigation, true);
        $limit = \count($items) - 1;
        $arrItems = [];

        for ($i = 0, $c = \count($items); $i < $c; ++$i) {
            $arrItems[] = [
                'class' => 0 === $i ? 'first' : ($i === $limit ? 'last' : ''),
                'content' => $items[$i]['label'],
                'value' => $items[$i]['value'],
            ];
        }
        $this->Template->items = $arrItems;
    }
}
