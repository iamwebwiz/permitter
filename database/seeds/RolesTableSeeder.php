<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = collect(['applicant', 'reviewer', 'processor']);

        $roles->transform(static function ($roleName) {
            Role::findOrCreate($roleName);
        });

        $this->command->info("[{$roles->count()}] roles seeded successfully.");
    }
}
