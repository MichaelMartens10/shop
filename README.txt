
/////-- START PROJECT --///////////////////

### Configure the .env file for local db

### Run the following commmands ->

php artisan migrate

php artisan storage:link

composer install

//////////////////////////////////////////


/////-- TINKER ADMIN CREATION --//////////

### Create an Admin for start of project

php artisan tinker

------------------------------------

$admin = new App\Admin

$admin->name = 'admin'

$admin->email = 'a@a.com'

$admin->role = 'admin'

$admin->password = Hash::make('123456')

$admin->save()

//////////////////////////////////////////


/////-- Afterwords --/////////////////////

  It's recommended to use

  php artisan r:l

  For all possible urls, as I didn't have
  time to include them

//////////////////////////////////////////
