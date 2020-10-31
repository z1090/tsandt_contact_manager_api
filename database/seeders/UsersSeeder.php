<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Output\ConsoleOutput;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Test User 1',
                'email' => 'test1.@test.com',
                'password' => Hash::make('password1'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Test User 2',
                'email' => 'test2.@test.com',
                'password' => Hash::make('password2'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

        $user1 = User::find(1);
        $user2 = User::find(2);

        $token1 = $user1->createToken('test-access', ['read', 'write']);
        $token2 = $user2->createToken('test-access', ['read']);

        $out = new ConsoleOutput();
        $out->writeln(" ");
        $out->writeln("============================================");
        $out->writeln(" ");
        $out->writeln("USER TOKENS");
        $out->writeln(" ");
        $out->writeln("============================================");
        $out->writeln(" ");
        $out->writeln("Test User 1:");
        $out->writeln($token1->plainTextToken);
        $out->writeln(" ");
        $out->writeln("Test User 2:");
        $out->writeln($token2->plainTextToken);
        $out->writeln(" ");
        $out->writeln("============================================");
        $out->writeln(" ");
    }
}
