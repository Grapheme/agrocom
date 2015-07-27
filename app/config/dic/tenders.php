<?php

return array(

    'fields_i18n' => function() {

        return array(
            'published_at' => array(
                'title' => 'Дата окончания приема предложений',
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
            'description' => array(
                'title' => 'Краткое описание',
                'type' => 'textarea',
            ),

            'upload1' => array(
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
            'upload2' => array(
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
            'upload3' => array(
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

            #
            'type' => array(
                'title' => 'Тип',
                'type' => 'select',
                'values' => Config::get('site.tender_types'),
                'default' => Input::get('filter.fields.tender_type') ?: null,
            ),

            'link' => array(
                'title' => 'Ссылка',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),

        );
    },

    #'seo' => ['title', 'description', 'keywords'],

    'versions' => false,

);