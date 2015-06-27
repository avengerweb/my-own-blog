<?php

use App\Models\Permission;
use App\Models\UserAccess;
use App\User;
use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->level = 3;
        $permission->permission = "posts_manage";
        $permission->save();

        $permission = new Permission();
        $permission->level = 4;
        $permission->permission = "users_manage";
        $permission->save();

        $permission = new Permission();
        $permission->level = 5;
        $permission->permission = "permissions_manage";
        $permission->save();

        $permission = new Permission();
        $permission->level = 5;
        $permission->permission = "user_accesses_manage";
        $permission->save();

        User::create([
            'name' => "admin",
            'email' => "admin@admin.ru",
            'password' => bcrypt("admin"),
        ]);

        $user = User::whereEmail("admin@admin.ru")->first();

        $access = new UserAccess();
        $access->level = 5;
        $access->description = "Is automated created admin user";
        $access->user_id = $user->id;
        $access->save();
    }
}
