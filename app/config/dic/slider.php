<?php

return array(

    'fields_i18n' => function() {

        return array(
            'number' => array(
                'title' => 'Число',
                'type' => 'text',
            ),
            'unit' => array(
                'title' => 'единица измерения (необязательно)',
                'type' => 'text',
            ),
            'entity' => array(
                'title' => 'Сущность, к которой относится число',
                'type' => 'text',
            ),
            'image' => array(
                'title' => 'Фоновое изображение',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 6, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
        );
    },

    /**
     * HOOKS - набор функций-замыканий, которые вызываются в некоторых местах кода модуля словарей, для выполнения нужных действий.
     */
    'hooks' => array(

        /**
         * Вызывается после создания, обновления, удаления записи, изменения порядка сортировки
         */
        'after_store_update_destroy_order' => function ($dic = NULL, $dicval = NULL) {
            Cache::forget('app.slider');
        },

    ),

    'first_line_modifier' => function($line, $dic, $dicval) {
        $dicval->extract(true);
        #Helper::ta($dicval);
        return '<strong>' . $dicval->number . '</strong> <i>' . $dicval->unit . '</i> ' . $dicval->entity;
    },

    #'seo' => ['title', 'description', 'keywords'],
    'seo' => false,

    /**
     * Скрыть Название с формы
     * По умолчанию название отображается
     */
    'hide_name' => 1,

);