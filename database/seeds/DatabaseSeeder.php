<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DepartamentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(RolSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PresentationSeeder::class);
    }
}
