<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    public function run()
    {
        DB::table('records')->insert([
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123-456-7890'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '987-654-3210'],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '456-789-1230'],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'phone' => '789-123-4560'],
            ['name' => 'Charlie White', 'email' => 'charlie@example.com', 'phone' => '321-654-9870'],
            ['name' => 'David Black', 'email' => 'david@example.com', 'phone' => '159-753-4862'],
            ['name' => 'Emma Wilson', 'email' => 'emma@example.com', 'phone' => '951-357-2846'],
            ['name' => 'Franklin Harris', 'email' => 'franklin@example.com', 'phone' => '852-963-7410'],
            ['name' => 'Grace Miller', 'email' => 'grace@example.com', 'phone' => '753-159-4826'],
            ['name' => 'Henry Clark', 'email' => 'henry@example.com', 'phone' => '632-741-8529'],
            ['name' => 'Isabella Moore', 'email' => 'isabella@example.com', 'phone' => '284-635-7912'],
            ['name' => 'Jack Thomas', 'email' => 'jack@example.com', 'phone' => '968-574-3120'],
            ['name' => 'Katherine Hall', 'email' => 'katherine@example.com', 'phone' => '123-987-6543'],
            ['name' => 'Liam Turner', 'email' => 'liam@example.com', 'phone' => '567-890-1234'],
            ['name' => 'Mia Anderson', 'email' => 'mia@example.com', 'phone' => '890-123-5678'],
        ]);
    }
}
