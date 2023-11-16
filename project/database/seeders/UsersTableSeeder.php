<?php

namespace Database\Seeders;

use App\TreeLayerStructure\Base\Connection\DBConnectionInterface;
use App\TreeLayerStructure\Entities\User\UserEntity;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\HashManager;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(DBConnectionInterface $DBConnection, HashManager $manager): void
    {
        $users = collect();
        $faker = Faker::create();
        $password = $manager->make('test');
        for ($i = 0; $i < 20000; $i ++) {
            $users->add(
                (new UserEntity(
                    email: $faker->email,
                    name: $faker->firstName,
                    surname: $faker->lastName,
                    created_at: date('Y-m-d H:i:s'),
                    updated_at: date('Y-m-d H:i:s'),
                    password: $password,
                ))->toArray()
            );
        }
        foreach ($users->chunk(1000) as $chunkedUsers) {
            $DBConnection->insertMultiple('users', array_values($chunkedUsers->toArray()));
        }
    }
}
