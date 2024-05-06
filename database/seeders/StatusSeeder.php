<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\StatusService;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusDatas = [
            [
                'name' => 'Active',
            ],

            [
                'name' => 'Inactive',
            ],

            [
                'name' => 'Draft',
            ],
        ];

        $statuses = StatusService::statuses();
        
        if($statuses->isEmpty())
        {
            foreach($statusDatas as $validated)
            {
                StatusService::store($validated);
            }
        }
    }
}
