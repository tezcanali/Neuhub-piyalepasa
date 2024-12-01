<?php

declare(strict_types=1);

return [
    'form' => [
        'title' => 'Başlık',
        'url' => 'URL',
        'linkable_type' => 'Tür',
        'linkable_id' => 'ID',
    ],
    'resource' => [
        'name' => [
            'label' => 'İsim',
        ],
        'locations' => [
            'label' => 'Konumlar',
            'empty' => 'Atanmamış',
        ],
        'items' => [
            'label' => 'Öğeler',
        ],
        'is_visible' => [
            'label' => 'Görünürlük',
            'visible' => 'Görünür',
            'hidden' => 'Gizli',
        ],
    ],
    'actions' => [
        'add' => [
            'label' => 'Menüye Ekle',
        ],
        'locations' => [
            'label' => 'Konumlar',
            'heading' => 'Konumları Yönet',
            'description' => 'Her konumda hangi menünün görüneceğini seçin.',
            'submit' => 'Güncelle',
            'form' => [
                'location' => [
                    'label' => 'Konum',
                ],
                'menu' => [
                    'label' => 'Atanmış Menü',
                ],
            ],
            'empty' => [
                'heading' => 'Kayıtlı konum bulunamadı',
            ],
        ],
    ],
    'items' => [
        'expand' => 'Genişlet',
        'empty' => [
            'heading' => 'Bu menüde öğe bulunmamaktadır.',
        ],
    ],
    'custom_link' => 'Özel Bağlantı',
    'open_in' => [
        'label' => 'Açılış yeri',
        'options' => [
            'self' => 'Self',
            'blank' => 'Blank',
            'parent' => 'Parent',
            'top' => 'Top',
        ],
    ],
    'notifications' => [
        'created' => [
            'title' => 'Bağlantı oluşturuldu',
        ],
        'locations' => [
            'title' => 'Menü konumları güncellendi',
        ],
    ],
    'panel' => [
        'empty' => [
            'heading' => 'Öğe bulunamadı',
            'description' => 'Bu menüde öğe bulunmamaktadır.',
        ],
        'pagination' => [
            'previous' => 'Önceki',
            'next' => 'Sonraki',
        ],
    ],
];
