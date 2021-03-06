<?php

return array(

    'fields_i18n' => function() {

        return array(
            'news_name' => array(
                'title' => 'Название новости',
                'type' => 'text',
            ),
            'published_at' => array(
                'title' => 'Дата публикации',
                'type' => 'date',
                'others' => array(
                    'class' => 'text-center',
                    'style' => 'width: 221px',
                    'placeholder' => 'Нажмите для выбора'
                ),
                'handler' => function($value) {
                    return $value ? @date('Y-m-d', strtotime($value)) : $value;
                },
                'value_modifier' => function($value) {
                    return $value ? date('d.m.Y', strtotime($value)) : date('d.m.Y');
                },
            ),
            'preview' => array(
                'title' => 'Анонс новости',
                'type' => 'textarea',
            ),
            'content' => array(
                'title' => 'Полный текст новости',
                'type' => 'textarea_redactor',
            ),
            'gallery' => array(
                'title' => 'Галерея',
                'type' => 'gallery',
                'params' => array(
                    'maxfilesize' => 4, // MB
                    #'acceptedfiles' => 'image/*',
                ),
                'handler' => function($array, $element) {
                    return ExtForm::process('gallery', array(
                        'module'  => 'DicValMeta',
                        'unit_id' => $element->id,
                        'gallery' => $array,
                        'single'  => true,
                    ));
                }
            ),
        );
    },

    'seo' => ['title', 'description', 'keywords'],

    'versions' => false,

);