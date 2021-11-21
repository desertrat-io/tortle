<?php

namespace Database\Seeders;

use App\Models\Accounts\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            ['label' => 'Admin', 'internal_label' => 'admin', Role::ACCESS_COLUMN_NAME => Role::ADMIN_ACCESS_VALUE]
        );
        Role::create(
            ['label' => 'Basic', 'internal_label' => 'basic', Role::ACCESS_COLUMN_NAME => Role::BASIC_ACCESS_VALUE]
        );
    }
}
