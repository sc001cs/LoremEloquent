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
use App\Role;

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


/*|+/*\*|+/*\*|+/*\*|+/*\/
 | Eloquent Many to Many
 **|+/*\*|+/*\*|+/*\*|+/*/

Route::get('createmanytomany', function () {

    $user = User::findOrFail(1);

    $role = new Role(['name'=>'Simple user']);

    $user->rolesmanytomany()->save($role);

});

Route::get('createmanytomany2', function () {

    $role = Role::findOrFail(1);

    $user = new User(['name'=>'Simple user', 'password'=>'dsa123','email'=>'dsa@dsa.com']);

    $role->usersmanytomany()->save($user);

});

Route::get('/readmanytomany', function () {

    $user = User::findOrFail(3);

    dd($user->rolesmanytomany);

    foreach ($user->rolesmanytomany as $role) {
        dd($role);
    }
});

Route::get('updatemanytomany', function () {

    $user = User::findOrFail(3);

    if($user->has('rolesmanytomany')) {

        foreach ($user->rolesmanytomany as $role) {
            if($role->name == 'administrator') {

                $role->name = 'Admin';

                $role->save();
            }
        }
    }

});


Route::get('deletemanytomany', function () {

    $user = User::findOrFail(1);

    $user->rolesmanytomany()->first()->delete();

});

Route::get('/attachmanytomany', function () {

    $user = User::findOrFail(1);

    $user->rolesmanytomany()->attach(3);

});

Route::get('/detachmanytomany', function () {

    $user = User::findOrFail(1);

    $user->rolesmanytomany()->detach(3);

});

//*|+/*\*|+/*\*|+/*\*|+/*\/\*|+/*\*|+/*\/