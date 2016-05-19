<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\AddressOneToOne;
use App\PostOneToMany;

Route::get('/', function () {
    return view('welcome');
});


/*|+/*\*|+/*\*|+/*\*|+/*\/
 | Eloquent One to One
 **|+/*\*|+/*\*|+/*\*|+/*/
Route::get('/insertonetoone', function () {

    $user = User::findOrFail(1);

    $address = new AddressOneToOne(['name'=>'123 Queens NY NY 3213']);

    $user->addressonetoone()->save($address);

});

Route::get('/updateonetoone', function () {

    $address = AddressOneToOne::where('user_id', 1)->first();

    $address->name = "Updated new address: 3432 Street";

    $address->save();

});

Route::get('/readonetoone', function () {

    $user = User::findOrFail(1);

    echo $user->addressonetoone->name;
});

Route::get('/deleteonetoone', function () {

    $user = User::findOrFail(1);

    $user->addressonetoone()->delete();
});

//*|+/*\*|+/*\*|+/*\*|+/*\/\*|+/*\*|+/*\/



/*|+/*\*|+/*\*|+/*\*|+/*\/
 | Eloquent One to Many
 **|+/*\*|+/*\*|+/*\*|+/*/

Route::get('createonetomany', function () {

    $user = User::findOrFail(1);

    $post = new PostOneToMany(['title'=>'123 Queens NY NY 3213','body'=>'Put the text here']);

    $user->postsonetomany()->save($post);

});

Route::get('/readonetomany', function () {

    $user = User::findOrFail(1);

    echo $user->postsonetomany->first()->title;
});

Route::get('/updateonetomany', function () {


    $user = User::find(1);

    $user->postsonetomany()->whereId(1)->update(['title'=>'Awesome job', 'body'=>'great Laravel']);
});

Route::get('/deleteonetomany', function () {


    $user = User::find(1);

    $user->postsonetomany()->whereId(1)->delete();
});

//*|+/*\*|+/*\*|+/*\*|+/*\/\*|+/*\*|+/*\/