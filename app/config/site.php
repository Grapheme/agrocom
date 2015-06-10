<?php

return array(

    'theme_path' => URL::to('/theme/site/dist'),
    #'theme_path' => URL::to('/theme/' . Config::get('app.template') . '/dist'),
    #'mobile_theme_path' => URL::to('/theme/mobile/dist'),

    'paginate_limit' => 30,

    ## Disable functionality of changing url "on-the-fly" for generating
    ## seo-friendly url (via URL::route('page', '...')) with right various url-segments for multilingual pages.
    'disable_url_modification' => 0,

    'uploads_dir' => public_path('uploads/files'),

    'uploads_photo_dir' => public_path('uploads'),
    'uploads_thumb_dir' => public_path('uploads/thumbs'),
    'uploads_photo_public_dir' => '/uploads',
    'uploads_thumb_public_dir' => '/uploads/thumbs',

    'galleries_photo_dir'        => public_path('uploads/galleries'),
    'galleries_photo_public_dir' => '/uploads/galleries',
    'galleries_thumb_dir'        => public_path('uploads/galleries/thumbs'),
    'galleries_thumb_public_dir' => '/uploads/galleries/thumbs',

    'galleries_photo_size'       => -800, # 800 => 800x600 || 600x800 ; -800 => 800x1000 || 1000x800
    'galleries_thumb_size'       => -200, # 200 => 200x150 || 150x200 ; -200 => 200x300 || 300x200

    'galleries_cache_dir'        => public_path('uploads/galleries/cache'),
    'galleries_cache_public_dir' => '/uploads/galleries/cache',
    'galleries_cache_allowed_sizes' => [
        '200x200'
    ],


    'seo' => [
        'default_title'       => 'default title',
        'default_description' => '',
        'default_keywords'    => '',
    ],

    'dics' => [
        'preload_cache_lifetime' => 60*24, ## время жизни кеша страниц, в минутах
    ],


    ##
    ## MOBILE VERSION
    ## Template changing by mobile subdomain
    ##
    'mobile' => [
        'enabled'  => FALSE,
        'domain'   => 'm',
        'template' => 'mobile',
        'theme_path' => URL::to('/theme/mobile/dist'),
    ],

    'monthes' => [
        'ru' => [
            '01' => 'Январь',
            '02' => 'Февраль',
            '03' => 'Март',
            '04' => 'Апрель',
            '05' => 'Май',
            '06' => 'Июнь',
            '07' => 'Июль',
            '08' => 'Август',
            '09' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
        ],
        'en' => [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ],
    ],

);
