Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
public function employees()
{
    return $this->hasMany(Employee::class);
}

Schema::create('employees', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->foreignId('client_id')->constrained();
    $table->timestamps();
});
public function client()
{
    return $this->belongsTo(Client::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}

Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('product_name');
    $table->foreignId('employee_id')->constrained();
    $table->timestamps();
});
public function employee()
{
    return $this->belongsTo(Employee::class);
}
$clients = Client::with(['employees' => function ($query) {
    $query->with('orders')->latest();
}])->get();