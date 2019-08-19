<?php

return [
    'send_email_to' => '',
    'api_site_key' => env('RECAPTCHA_SITE_KEY', ''),
    'api_secret_key' => env('RECAPTCHA_SECRET_KEY', ''),
    'url_recaptcha'=> 'https://www.google.com/recaptcha/api/siteverify',
    'subject' => 'Contact',
    'sent_message' => 'Message sent successfully',
];
