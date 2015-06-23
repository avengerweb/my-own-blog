<?php

use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new \App\Models\Permission();
        $permission->level = 1;
        $permission->permission = "dashboard_view";
        $permission->save();
    }
}
