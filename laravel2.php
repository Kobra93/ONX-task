Schema::create('user_cars', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->foreignId('car_id')->constrained();
    $table->boolean('is_in_use')->default(false);
    $table->timestamps();
});