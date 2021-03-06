<?php

return array(

    'fields_i18n' => function() {

        return array(
            'business_name' => array(
                'title' => 'Название бизнеса',
                'type' => 'text',
            ),
            'header_bg_image' => array(
                'title' => 'Фоновое изображение в шапке',
                'type' => 'image',
            ),
            'logo' => array(
                'title' => 'Логотип в шапке',
                'type' => 'image',
            ),
            'mainpage_logo' => array(
                'title' => 'Логотип для главной страницы',
                'type' => 'image',
            ),
            'header_title' => array(
                'title' => 'Заголовок в шапке',
                'type' => 'text',
            ),
            'header_desc' => array(
                'title' => 'Описание в шапке',
                'type' => 'textarea',
            ),

            'desc' => array(
                'title' => 'Основное описание',
                'type' => 'textarea_redactor',
            ),
            'contacts' => array(
                'title' => 'Блок с контактной информацией',
                'type' => 'textarea_redactor',
            ),
            'content' => array(
                'title' => 'Полное описание',
                'type' => 'textarea_redactor',
            ),
            'content_wide_image' => array(
                'title' => 'Широкое изображение в описании',
                'type' => 'image',
            ),

            'company_title' => array(
                'title' => 'Название компании',
                'type' => 'text',
            ),
            'company_short' => array(
                'title' => 'Краткое описание компании',
                'type' => 'textarea',
            ),
            'company_full' => array(
                'title' => 'Полное описание компании',
                'type' => 'textarea_redactor',
            ),
            'company_contacts' => array(
                'title' => 'Контакты компании',
                'type' => 'textarea_redactor',
            ),
        );
    },

    'seo' => ['title', 'description', 'keywords'],

    'versions' => 0,

    'slug_label' => 'URL',

);