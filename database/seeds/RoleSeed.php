<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new Role();
        $table->roleID = 1;
        $table->name = 'Super Admin';
        $table->save();
    }
}
