<?php

/**
 * Base actions for the wkCaptchaPlugin wkCaptchaImage module.
 *
 * @package     wkCaptchaPlugin
 * @subpackage  wkCaptchaImage
 * @author      Hossein Zolfi (hossein.zolfi@gmail.com, empire@cyber-experts.com), Alireza Kazemi (alireza.kazemi@gmail.com, kazemi@cse.shirazu.ac.ir.com), Saeed Kazemi (kazemi.ms@gmail.com, skazemi@cse.shirazu.ac.ir.com)
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BasewkCaptchaImageActions extends sfActions {

    public function executeShow(sfWebRequest $request) {
        $this->image = new wkCaptchaImage();
    }

}
