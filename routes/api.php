<?php

use App\Models\Pays;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PaysResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', function(Request $request){
$request->validate([
    'email'=>'required|email',
    'password'=>'required'
]);
$user = User::where('email',$request->email)->first();
if(!$user || !Hash::check($request->password, $user->password)){
    return response()->json(['message'=>'email ou mot de passe incorrect']);
}
$token = $user->createToken($request->email)->plainTextToken;
return response()->json(['data'=>$user, 'token'=>$token]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->get('/pays',function(){
    return PaysResource::collection(Pays::all());// à la place de paginate() on peut aussi mettre all()
});

Route::middleware('auth:sanctum')->get('/pays/{id}',function($id){
    return new PaysResource(Pays::find($id));
});

Route::get('/http',function(){
    $response = Http::get('http://jsonplaceholder.typicode.com/posts');
     
     return $response->json();
  /*
 $response = Http::delete('http://jsonplaceholder.typicode.com/posts/7');
 return $response->json(); */
 });