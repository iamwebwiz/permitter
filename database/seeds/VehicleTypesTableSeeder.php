<?php

use App\VehicleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleTypes = collect([
            'articulated vehicle',
            'commercial',
            'private',
            'motorcycle',
        ]);

        $vehicleTypes->transform(static function ($type) {
            VehicleType::create(['name' => $type, 'slug' => Str::slug($type)]);
        });

        $this->command->info("[{$vehicleTypes->count()}] vehicle types seeded.");
    }
}
