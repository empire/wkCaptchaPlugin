# sfCaptchaGD plugin #

The `wkCaptchaPlugin` is a symfony plugin and part of webkasb project that provides captcha functionality based on securimage library.

It gives you the lib with Captcha class and the module to secure your symfony forms in a minute with a good captcha.

## Installation ##

### Install the plugin for sf 1.4 ###

    php symfony plugin:install wkCaptchaPlugin

### Activate
Enable one or more modules, add I18N helper and enable internationalization in your `settings.yml`

    all:
      .settings:
        enabled_modules:      [default, wkCaptchaImage]
        standard_helpers:     [Partial, Cache, I18N]
        i18n:                 true

### Clear your cache

    symfony cc

## Secure your form ##

### To secure a symfony form for sf &gt;= 1.2 ###
Add captcha field in your form class:

    $this-&gt;setWidget(&#039;captcha&#039; =&gt; new wkWidgetCaptcha());

    $this-&gt;setValidator(&#039;captcha&#039; =&gt; new wkValidatorCaptcha());

## Configuration options ##
These options are default for captcha, you can change any of them, putting in app.yml

    all:
        wkCaptcha:
            image_width: 160
            image_height: 80
            image_bg_color: &quot;#fff&quot;
            perturbation: .8
            code_length_min: 4
            code_length_max: 6
            num_lines: 4
            noise_level: 3
            text_color: &quot;#333&quot;
            noise_color: &quot;#111&quot;
            line_color: &quot;#DDD&quot;


== Thanks ==
Thanks Alex Kubyshkin for his work on sfCaptchaGDPlugin. I get idea for writing this from his work.
