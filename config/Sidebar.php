<?php

namespace Config;

class Sidebar
{
    public static function get(): array
    {
        return [
            'SuperAdmin' => [
                [
                    'label' => 'Dashboard',
                    'url' => '/administrator/dashboard',
                    'icon' => 'ri-dashboard-fill',
                    'sublabel' => false,
                ],
                [
                    'label' => 'User',
                    'url' => '/administrator/user',
                    'icon' => 'ri-arrow-drop-right-line',
                    'sublabel' => [
                        [
                            'label' => 'Admin',
                            'url' => '/administrator/user/admin',
                        ],
                        [
                            'label' => 'Guru',
                            'url' => '/administrator/user/guru',
                        ],
                        [
                            'label' => 'Siswa',
                            'url' => '/administrator/user/siswa',
                        ],
                    ]
                ],
                [
                    'label' => 'Kelas',
                    'url' => '/administrator/dashboard',
                    'icon' => 'ri-home-office-fill',
                    'sublabel' => false,
                ],
                [
                    'label' => 'Setting',
                    'url' => '/administrator/dashboard',
                    'icon' => 'ri-settings-4-fill',
                    'sublabel' => false,
                ],
            ],
            // 'Guru' => [
            //     ['label' => 'Dashboard', 'url' => '/guru/dashboard', 'icon' => 'ri-dashboard-line'],
            //     ['label' => 'Materi', 'url' => '/guru/materi', 'icon' => 'ri-book-line'],
            // ],
            // 'Siswa' => [
            //     ['label' => 'Dashboard', 'url' => '/siswa/dashboard', 'icon' => 'ri-dashboard-line'],
            //     ['label' => 'Tugas', 'url' => '/siswa/tugas', 'icon' => 'ri-task-line'],
            // ]
        ];
    }
}
