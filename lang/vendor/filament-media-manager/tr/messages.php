<?php

return [
    'empty' => [
        'title' => "Medya veya Klasör Bulunamadı",
    ],
    'folders' => [
        'title' => 'Medya Yöneticisi',
        'single' => 'Klasör',
        'columns' => [
            'name' => 'İsim',
            'collection' => 'Koleksiyon',
            'description' => 'Açıklama',
            'is_public' => 'Herkese Açık',
            'has_user_access' => 'Kullanıcı Erişimi Var',
            'users' => 'Kullanıcılar',
            'icon' => 'İkon',
            'color' => 'Renk',
            'is_protected' => 'Korumalı',
            'password' => 'Şifre',
            'password_confirmation' => 'Şifre Doğrulama',
        ],
        'group' => 'İçerik',
    ],
    'media' => [
        'title' => 'Medya',
        'single' => 'Medya',
        'columns' => [
            'image' => 'Görsel',
            'model' => 'Model',
            'collection_name' => 'Koleksiyon Adı',
            'size' => 'Boyut',
            'order_column' => 'Sıralama Sütunu',
        ],
        'actions' => [
            'sub_folder' => [
                'label' => "Alt Klasör Oluştur"
            ],
            'create' => [
                'label' => 'Medya Ekle',
                'form' => [
                    'file' => 'Dosya',
                    'title' => 'Başlık',
                    'description' => 'Açıklama',
                ],
            ],
            'delete' => [
                'label' => 'Klasörü Sil',
            ],
            'edit' => [
                'label' => 'Klasörü Düzenle',
            ],
        ],
        'notifications' => [
            'create-media' => 'Medya başarıyla oluşturuldu',
            'delete-folder' => 'Klasör başarıyla silindi',
            'edit-folder' => 'Klasör başarıyla düzenlendi',
        ],
        'meta' => [
            'model' => 'Model',
            'file-name' => 'Dosya Adı',
            'type' => 'Tür',
            'size' => 'Boyut',
            'disk' => 'Disk',
            'url' => 'URL',
            'delete-media' => 'Medyayı Sil',
        ],
    ],
];
