<?php

return array(

    'fields_i18n' => function() {

        return array(
            'project_name' => array(
                'title' => 'Название проекта',
                'type' => 'text',
            ),
            'short' => array(
                'title' => 'Краткое описание',
                'type' => 'textarea_redactor',
            ),
            'gallery' => array(
                'title' => 'Галерея изображений',
                'type' => 'gallery',
                'params' => array(
                    'maxfilesize' => 6, // MB
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
            'full' => array(
                'title' => 'Полное описание',
                'type' => 'textarea_redactor',
            ),
            'contacts' => array(
                'title' => 'Блок с контактной информацией',
                'type' => 'textarea_redactor',
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
            Cache::forget('app.projects');
        },

    ),

    'seo' => ['title', 'description', 'keywords'],

    'versions' => 0,

    'slug_label' => 'URL',

);