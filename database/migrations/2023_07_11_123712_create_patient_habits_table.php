<?php

use App\Models\Patient\PatientHabits;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_habits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')
                ->constrained()
                ->references('id')
                ->onDelete('cascade')
                ->on('patient_basics');

            // Smoking
            $table->enum("smoking", array_keys(PatientHabits::SMOKING_TYPES));
            $table->enum("smoking_frequency", array_keys(PatientHabits::SMOKING_FREQ));
            $table->smallInteger("smoking_duration")->min(0)->max(100)->unsigned(); // in years 
            $table->smallInteger("ex_smoking_duration")->min(0)->max(100)->unsigned()->nullable(); // in years

            // Betal Chewing
            $table->boolean("betal_chewing");
            $table->boolean("betal_chewing_tabacco");
            $table->string("betal_chewing_details")->nullable();

            $table->boolean("smokeless_tabaco");

            // Alcohol
            $table->boolean("alcohol");
            $table->enum("alcohol_frequency", array_keys(PatientHabits::ALCOHOL_FREQ));
            $table->smallInteger("alcohol_duration")->min(0)->max(100)->unsigned(); // in years

            // Other notes
            $table->text("other")->nullable();

            // Update informations
            $table->foreignId('updated_user')
                ->constrained()
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_habits');
    }
}
