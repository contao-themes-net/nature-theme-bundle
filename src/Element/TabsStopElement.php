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

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

class TabsStopElement extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_tabs_stop_nature';

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
        }
    }
}
