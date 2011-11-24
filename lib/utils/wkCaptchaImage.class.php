<?php

/**
 * Description of wkCaptchaImage
 *
 * @author ocean
 */
class wkCaptchaImage extends Securimage {

    public function __construct($options = array()) {
        parent::__construct($options);

        $this->image_width = sfConfig::get('app_wkCaptcha_image_width', 160);
        $this->image_height = sfConfig::get('app_wkCaptcha_image_height', 80);
        $this->image_bg_color = new Securimage_Color(sfConfig::get('app_wkCaptcha_image_bg_color', "#ffffff"));
        $this->perturbation = sfConfig::get('app_wkCaptcha_perturbation', .9);      // high level of distortion
        $this->code_length = rand(sfConfig::get('app_wkCaptcha_code_length_min', 5), sfConfig::get('app_wkCaptcha_code_length_max', 6)); // random code length
        $this->num_lines = sfConfig::get('app_wkCaptcha_num_lines', 3);
        $this->noise_level = sfConfig::get('app_wkCaptcha_noise_level', 5);
        $this->text_color = new Securimage_Color(sfConfig::get('app_wkCaptcha_text_color', "#000000"));
        $this->noise_color = new Securimage_Color(sfConfig::get('app_wkCaptcha_noise_color', "#000000"));
        $this->line_color = new Securimage_Color(sfConfig::get('app_wkCaptcha_line_color', "#cccccc"));
    }

    protected function saveData() {
        sfContext::getInstance()->getUser()->setAttribute('captcha-code', $this->code);
        sfContext::getInstance()->getUser()->setAttribute('captcha-time', time());
    }

    protected function getCode() {
        if ($this->isCodeExpired(
                        sfContext::getInstance()->getUser()->getAttribute('captcha-time')) == false) {
            return sfContext::getInstance()->getUser()->getAttribute('captcha-code');
        }

        return '';
    }

    protected function validate() {
        $code = $this->getCode();
        // returns stored code, or an empty string if no stored code was found
        // checks the session and sqlite database if enabled

        if ($this->case_sensitive == false && preg_match('/[A-Z]/', $code)) {
            // case sensitive was set from securimage_show.php but not in class
            // the code saved in the session has capitals so set case sensitive to true
            $this->case_sensitive = true;
        }

        $code_entered = trim((($this->case_sensitive) ? $this->code_entered : strtolower($this->code_entered))
        );
        $this->correct_code = false;

        if ($code != '') {
            if ($code == $code_entered) {
                $this->correct_code = true;
                sfContext::getInstance()->getUser()->setAttribute('captcha-code', '');
                sfContext::getInstance()->getUser()->setAttribute('captcha-time', 0);
            }
        }
    }

}

?>
