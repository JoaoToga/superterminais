<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_pessoa', ['juridica', 'fisica', 'estrangeira']);
            $table->string('razao_social')->nullable();
            $table->string('nome')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('identificador_estrangeiro')->nullable();
            $table->string('perfil');
            $table->string('documento_comprobatorio');
            $table->string('email');
            $table->string('telefone');
            $table->boolean('faturamento_direto')->default(false);
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
        Schema::dropIfExists('empresas');
    }
};
