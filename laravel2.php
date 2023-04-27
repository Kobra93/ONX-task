Schema::create('user_cars', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->foreignId('car_id')->constrained();
    $table->boolean('is_in_use')->default(false);
    $table->timestamps();
});
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function cars()
    {
        return $this->belongsToMany(Car::class)->withPivot('is_in_use');
    }
}

class Car extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('is_in_use');
    }
}