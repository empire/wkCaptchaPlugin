<?php

/**
 * Description of wkValidatorCaptcha
 *
 * @author ocean
 */
class wkValidatorCaptcha extends sfValidatorBase {

    /**
     * Configures the current validator.
     *
     *
     * @param array $options   An array of options
     * @param array $messages  An array of error messages
     *
     * @see sfValidatorBase
     */
    protected function configure($options = array(), $messages = array()) {
        $this->setMessage('invalid', 'Invalid captcha.');
    }

    public function doClean($value) {
        new sfValidatorInteger();
        $image = new wkCaptchaImage();

        if (!$image->check($value)) {
            throw new sfValidatorError($this, 'invalid');
        }

        return $value;
    }

}
