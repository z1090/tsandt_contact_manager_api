<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'first_name' => 'Nadia',
                'last_name' => 'Issatt',
                'email' => 'nissatt0@browsebug.co.uk',
                'phone' => '01225340164',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Bertie',
                'last_name' => 'Evered',
                'email' => 'bevered1@tazzy.com',
                'phone' => '01380440743',
                'company_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Clive',
                'last_name' => 'Petruskevich',
                'email' => 'cpetruskevich2@mita.com',
                'phone' => '01610030782',
                'company_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Kim',
                'last_name' => 'Lyndon',
                'email' => 'klyndon3@mita.com',
                'phone' => '01610779901',
                'company_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Dee',
                'last_name' => 'Element',
                'email' => 'delement4@blogspan.org',
                'phone' => '01249159682',
                'company_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Robert',
                'last_name' => 'Warrior',
                'email' => 'rwarrior5@browsebug.co.uk',
                'phone' => '01225977981',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Craig',
                'last_name' => 'Boultwood',
                'email' => 'cboultwood6@blogspan.org',
                'phone' => '01249099027',
                'company_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Jennie',
                'last_name' => 'Somerbell',
                'email' => 'gsomerbell7@browsebug.co.uk',
                'phone' => '01225135649',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Donnovan',
                'last_name' => 'Burnham',
                'email' => 'dburnhamc@blogspan.org',
                'phone' => '01249005283',
                'company_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Marlon',
                'last_name' => 'Reyne',
                'email' => 'mreyne9@browsebug.co.uk',
                'phone' => '01225401139',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Gabby',
                'last_name' => 'Yaldren',
                'email' => 'gyaldrena@browsebug.co.uk',
                'phone' => '01225479729',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Isacc',
                'last_name' => 'Ebunoluwa',
                'email' => 'iebunoluwab@tazzy.com',
                'phone' => '01380281365',
                'company_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Kiele',
                'last_name' => 'Brownbill',
                'email' => 'kbrownbillc@mita.edu',
                'phone' => '01610369032',
                'company_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Thelma',
                'last_name' => 'Karppi',
                'email' => 'tkarppid@browsebug.co.uk',
                'phone' => '01225882231',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Rita',
                'last_name' => 'Tutchings',
                'email' => 'rtutchingse@tazzy.com',
                'phone' => '01380272539',
                'company_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Polly',
                'last_name' => 'Charville',
                'email' => 'pcharvillef@mita.com',
                'phone' => '01610791664',
                'company_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Mervyn',
                'last_name' => 'Myerscough',
                'email' => 'mmyerscoughg@tazzy.com',
                'phone' => '01380888131',
                'company_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Analise',
                'last_name' => 'Tilbury',
                'email' => 'atilburyh@mita.com',
                'phone' => '01610276436',
                'company_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Bryon',
                'last_name' => 'Wateridge',
                'email' => 'bwateridgei@browsebug.co.uk',
                'phone' => '01225776028',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Jade',
                'last_name' => 'Orrow',
                'email' => 'jorrowj@browsebug.co.uk',
                'phone' => '01225918253',
                'company_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Contact::insert($contacts);
    }
}
