<?php

namespace Database\Seeders;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'company_name' => 'Mita',
                'company_address' => '87 Kipling Center',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'company_name' => 'Browsebug',
                'company_address' => '69 Forster Place',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'company_name' => 'Tazzy',
                'company_address' => '86269 Garrison Lane',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'company_name' => 'Blogspan',
                'company_address' => '44966 Green Ridge Court',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Company::insert($companies);
    }
}
