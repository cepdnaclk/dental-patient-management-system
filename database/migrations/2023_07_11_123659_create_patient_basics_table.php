<?php

use App\Models\Patient\PatientBasic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_basics', function (Blueprint $table) {

            $table->id();
            $table->string("reg_number", 8)->unique();
            $table->string("name");
            $table->date("dob");
            $table->date("initial_visit");
            $table->enum("gender", array_keys(config('enums.gender')));  
            $table->enum("ethinicity", array_keys(config('enums.ethinicity')))->nullable();
            $table->enum("honorific", array_keys(config('enums.honorific')));

            $table->enum("district", array_keys(config('enums.district')))->nullable();
            $table->text("contact_address")->nullable();
            $table->string("contact_tele", 12)->nullable();

            $table->string("guardian_name")->nullable();
            $table->string("guardian_tele", 12)->nullable();
            $table->text("guardian_address")->nullable();
            $table->enum("guardian_relationship", array_keys(PatientBasic::GUARDIAN_RELATIONSHIPS))->nullable();

            $table->longText("presenting_complain_co")->nullable();
            $table->longText("presenting_complain_ho")->nullable();
            $table->longText("medical_history")->nullable();
            $table->longText("current_medications")->nullable();

            $table->string("special_referrals")->nullable();

            $table->foreignId('entered_by')
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
        Schema::dropIfExists('patient_basics');
    }
}
