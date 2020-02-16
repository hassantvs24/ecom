<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new User();
        $table->name = 'Super Admin';
        $table->email = 'admin@admin.com';
        $table->password = bcrypt(123456);
        $table->roleID = 1;
        $table->isAdmin = 'YES';
        $table->status = 'Active';
        $table->userLevel = 'Admin';
        $table->save();
    }
}
