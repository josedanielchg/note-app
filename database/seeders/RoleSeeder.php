<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          $role1 = Role::create(['name' => 'owner',]);
          $role2 = Role::create(['name' => 'collaborator',]);
     }
}
