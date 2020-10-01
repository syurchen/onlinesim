<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    private function getRandomName(): string
    {
        $md5 = md5(rand(1, 10));
        $name = preg_replace("/[^A-Za-z?!]/", '', $md5);
        $name = ucfirst(strtolower($name));
        return $name;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->truncate();
        for ($i = 0; $i < 1000; $i++){
            \DB::table('user')->insert([
                'first_name' => $this->getRandomName(),
                'second_name' => $this->getRandomName(),
                'country' => $this->getRandomName(),
                'phone' => rand(10000000000, 99999999999),
                'company' => $this->getRandomName()
            ]);
        }
    }

}