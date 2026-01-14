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
                    'label' => 'Users',
                    'url' => '/administrator/dashboard',
                    'icon' => 'ri-arrow-drop-right-line',
                    'sublabel' => [
                        [
                            'label' => 'Admin',
                            'url' => '/administrator/dashboard',
                        ],
                        [
                            'label' => 'Guru',
                            'url' => '/administrator/dashboard',
                        ],
                        [
                            'label' => 'Siswa',
                            'url' => '/administrator/dashboard',
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
