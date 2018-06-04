<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DepartamentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(ButtoSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(OrganitationSeeder::class);        
        $this->call(RolSeeder::class); 
        $this->call(RolMenuButtonSeeder::class);  
        $this->call(StateSeeder::class);
        $this->call(EmployeeSeeder::class);                        
        $this->call(UserSeeder::class);
    }
}
