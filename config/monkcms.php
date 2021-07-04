<?php

return [
    'site_id' => env('MONKCMS_SITE_ID'),
    'site_secret' => env('MONKCMS_SITE_SECRET'),
    'cms_code' => env('MONKCMS_CODE', 'EKK'),
    'cms_type' => env('MONKCMS_TYPE', 'CMS'),
    'api_url' => env('MONKCMS_API_URL', 'https://api.monkcms.com'),
];
