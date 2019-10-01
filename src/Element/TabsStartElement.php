<?php

namespace ContaoThemesNet\NatureThemeBundle\Element;

class TabsStartElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_tabs_start_nature';

    /**
     * Generate the content element
     */
    protected function compile()
    {
		if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
        }

        $this->Template->tabsElement = $this->tabs_element;
    }
}
