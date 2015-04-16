<?php

return array(

    'fields' => function() {

        return array(
            'logo' => array(
                'title' => 'Логотип',
                'type' => 'image',
            ),
            'link' => array(
                'title' => 'Ссылка',
                'type' => 'text',
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
            Cache::forget('app.business_all');
        },

    ),

    'seo' => NULL,

    'versions' => 0,
);