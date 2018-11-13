/////TINKER FAST ADMIN CREATION/////

php artisan tinker

------------------------------------

$admin = new App\Admin

$admin->name = 'b'

$admin->email = 't@t.com'

$admin->role = 'admin'

$admin->password = Hash::make('123456')

$admin->save()

/////////////////////////////////////


composer require "laravelcollective/html":"^5.4.0"

composer require unisharp/laravel-ckeditor
