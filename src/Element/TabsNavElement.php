<?php

namespace ContaoThemesNet\NatureThemeBundle\Element;

class TabsNavElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_tabs_nav_nature';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $items = \StringUtil::deserialize($this->tabs_navigation, true);
		$limit = \count($items) - 1;
		for ($i=0, $c=\count($items); $i<$c; $i++)
		{
			$arrItems[] = array
			(
				'class' => (($i == 0) ? 'first' : (($i == $limit) ? 'last' : '')),
				'content' => $items[$i]['label'],
				'value' => $items[$i]['value']
			);
		}
		$this->Template->items = $arrItems;
    }
}
