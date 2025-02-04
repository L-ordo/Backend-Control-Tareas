    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up()
        {
            Schema::create('usuarios', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 100);
                $table->string('correo', 100)->unique();
                $table->string('password', 100)();

            });
        }

        public function down()
        {
            Schema::dropIfExists('usuarios');
        }

    };
