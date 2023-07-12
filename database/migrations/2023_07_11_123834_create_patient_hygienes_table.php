<?php

use App\Models\Patient\PatientHabits;
use App\Models\Patient\PatientHygiene;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientHygienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_hygienes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->constrained()
                ->references('id')
                ->onDelete('cascade')
                ->on('patient_basics');

            $table->enum("brushing_tool", array_keys(PatientHygiene::BRUSHING_TOOLS));
            $table->enum("toothbrush_type", array_keys(PatientHygiene::BRUSH_TYPE))->nullable();
            $table->enum("toothbrush_features", array_keys(PatientHygiene::BURSH_FEATURES))->nullable(); // TODO Should support multi-select

            $table->enum("brushing_frequency", array_keys(PatientHygiene::BRUSHING_FREQ));
            $table->enum("supplementry_tool", array_keys(PatientHygiene::BRUSHING_SUPPORT_TOOL));
            $table->string("supplementry_tool_other")->nullable();
            $table->enum("toothpaste", array_keys(PatientHygiene::BRUSHING_PASTE));
            $table->enum("toothpaste_other", array_keys(PatientHygiene::BRUSHING_PASTE))->nullable();
            $table->boolean("mouthwash");

            // Other notes
            $table->text("other")->nullable();

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
        Schema::dropIfExists('patient_hygienes');
    }
}
