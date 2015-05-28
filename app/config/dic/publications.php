<?php

return array(

    'fields_i18n' => function() {

        return array(
            'press_name' => array(
                'title' => 'Название публикации',
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
            'source' => array(
                'title' => 'Место публикации',
                'type' => 'text',
            ),
            'source_number' => array(
                'title' => 'Доп. инфо (например, номер журнала)',
                'type' => 'text',
            ),
            'preview' => array(
                'title' => 'Анонс публикации',
                'type' => 'textarea',
            ),
            'content' => array(
                'title' => 'Полный текст публикации',
                'type' => 'textarea_redactor',
            ),
            'image' => array(
                'title' => 'Изображение',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 6, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'link_to_file' => array(
                'title' => 'Ссылка на файл',
                'type' => 'text',
            ),
        );
    },

    'seo' => ['title', 'description', 'keywords'],

    'versions' => false,

);