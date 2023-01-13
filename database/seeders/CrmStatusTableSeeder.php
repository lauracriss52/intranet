<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2023-01-10 14:21:23',
                'updated_at' => '2023-01-10 14:21:23',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2023-01-10 14:21:23',
                'updated_at' => '2023-01-10 14:21:23',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2023-01-10 14:21:23',
                'updated_at' => '2023-01-10 14:21:23',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
