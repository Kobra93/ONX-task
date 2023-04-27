Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
Schema::create('employees', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->foreignId('client_id')->constrained();
    $table->timestamps();
});
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('product_name');
    $table->foreignId('employee_id')->constrained();
    $table->timestamps();
});