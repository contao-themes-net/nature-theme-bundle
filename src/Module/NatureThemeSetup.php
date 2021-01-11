<?php

namespace ContaoThemesNet\NatureThemeBundle\Module;

class NatureThemeSetup extends \BackendModule
{
    const VERSION = '1.3.8';

    protected $strTemplate = 'be_naturetheme_setup';

    /**
     * Generate the module
     */
    protected function compile()
    {
        switch (\Input::get('act')) {
            case 'syncFolder':
                $path = TL_ROOT . '/web/bundles/contaothemesnetnaturetheme';
                if(!file_exists("files/naturetheme")) {
                    new \Folder("files/naturetheme");
                }
                $this->getFiles($path);
                $this->getSqlFiles($path = TL_ROOT . "/vendor/contao-themes-net/nature-theme-bundle/src/templates");
                $this->Template->message = true;
                $this->Template->version = NatureThemeSetup::VERSION;
                break;
            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare("TRUNCATE tl_files")->execute();
                $this->Template->messageTruncate = true;
                $this->Template->version = NatureThemeSetup::VERSION;
                break;
            default:
                $this->Template->version = NatureThemeSetup::VERSION;
        }
    }

    protected function getFiles($path) {
        foreach (scan($path) as $dir) {
            if(!is_dir($path."/".$dir)) {
                $pos = strpos($path,"contaothemesnetnaturetheme");
                $filesFolder = "files/naturetheme".str_replace("contaothemesnetnaturetheme","",substr($path,$pos))."/".$dir;

                if($dir != "_nature_variables.scss" && $dir != "_nature_colors.scss" && $dir != "backend.css" && $dir != "nature.scss" && $dir != "nature_win.scss" && $dir != "nature_style.scss" && $dir != "maklermodul.scss" && $dir != "fonts.scss") {
                    if(!file_exists(TL_ROOT."/".$filesFolder)) {
                        $objFile = new \File("web/bundles/".substr($path,$pos)."/".$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path."/".$dir;
                $pos = strpos($path,"contaothemesnetnaturetheme");
                $filesFolder = "files/naturetheme".str_replace("contaothemesnetnaturetheme","",substr($path,$pos))."/".$dir;
                if($dir != "bulma" && $dir != "parts" && $dir != "fonts" && $dir != "js" && $dir != "css" && $dir != "color_schemes") {
                    if(!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }

    protected function getSqlFiles($path) {
        foreach (scan($path) as $dir) {
            if(!is_dir($path."/".$dir)) {
                $pos = strpos($path,"/vendor");
                $filesFolder = "templates/" . $dir;
                $objFile = new \File(substr($path,$pos)."/".$dir, true);
                $objFile->copyTo($filesFolder);
            }
        }
    }
}
