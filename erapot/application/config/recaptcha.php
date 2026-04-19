<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
$config['recaptcha_site_key'] = '6Lc8hSoUAAAAAF8_v4iiS3rpd3Cjc4zLxHwI7jUv';
$config['recaptcha_secret_key'] = '6Lc8hSoUAAAAAFmrpHA6cIX4Z0DP-LHWuTRVc2LB';

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'en';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */