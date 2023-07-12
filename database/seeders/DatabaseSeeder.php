<?php

namespace Database\Seeders;

use App\Models\Patient\PatientBasic;
use App\Models\Patient\PatientHabits;
use App\Models\Patient\PatientHygiene;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);

        // Patient Data
        $this->call(PatientBasicSeeder::class);
        $this->call(PatientHabitsSeeder::class);
        $this->call(PatientHygieneSeeder::class);

        Model::reguard();
    }
}
