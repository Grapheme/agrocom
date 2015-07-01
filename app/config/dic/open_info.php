<?php

return array(

    'fields' => function() {

        return array(
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
            /*
            'description' => array(
                'title' => 'Описание',
                'type' => 'textarea',
            ),
            #*/
            'link_to_file' => array(
                'title' => 'Поле для загрузки файла',
                'type' => 'upload',
                'accept' => '*', # .exe,image/*,video/*,audio/*
                'label_class' => 'input-file',
                'handler' => function($value, $element = false) {
                    if (@is_object($element) && @is_array($value)) {
                        $value['module'] = 'DicVal';
                        $value['unit_id'] = $element->id;
                    }
                    return ExtForm::process('upload', $value);
                },
            ),
            'fileinfo' => array(
                'title' => 'Формат, размер файла',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'Например: .doc, 100кб'
                ],
            ),
        );
    },

    #'seo' => ['title', 'description', 'keywords'],

    'versions' => 0,

    #'slug_label' => 'URL',

);