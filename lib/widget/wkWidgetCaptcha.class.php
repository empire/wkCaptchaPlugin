<?php

/**
 * Description of wkWidgetCaptcha
 *
 * @author ocean
 */
class wkWidgetCaptcha extends sfWidgetForm {

    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $context = sfContext::getInstance();
        $url = $context->getRouting()->generate("wk_captcha_image");
        $value = $context->getRequest()->getPostParameter('captcha');
        $attributes = array_merge($attributes, array('class' => 'captcha'));
        $tag = $this->renderTag('input', array_merge(array('type' => 'text', 'name' => $name, 'value' => $value), $attributes));

        $tag = $tag . "<a href='' onClick='return false' title='" . __("Reload image") . "'><img src='$url?" . time() . "' onClick='this.src=\"$url?r=\" + Math.random() + \"&amp;reload=1\"' border='0' class='captcha' /></a>";
        return $tag;
    }

}

?>
