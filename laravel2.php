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
class UserCarController extends Controller
{
    public function assignCar(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $car = Car::findOrFail($request->car_id);

        $user->cars()->attach($car, ['is_in_use' => true]);

        return response()->json(['message' => 'Car assigned successfully']);
    }

    public function unassignCar(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $car = Car::findOrFail($request->car_id);

        $user->cars()->updateExistingPivot($car->id, ['is_in_use' => false]);

        return response()->json(['message' => 'Car unassigned successfully']);
    }

    public function isCarInUse(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $car = Car::findOrFail($request->car_id);

        $isInUse = $user->cars()->where('car_id', $car->id)->first()->pivot->is_in_use;

        return response()->json(['is_in_use' => $isInUse]);
    }
}