<h1>Laravel Members</h1>

Small Forum Site with Laravel8<br>
Inquiry Features included<br>

<h1>Demo</h1>
https://forum.addisteria.com
(Japanese Site)

*Some features as belows are not included:<br>
   admin role<br>
   prodifle edit<br>
   policy & gate<br>
   
<h1>Fearures</h1>

Created with basic Laravel features.<br>
Users can :<br>
-post, show, edit, delet posts<br>
-add comments to others posts<br>
-display all the posts list, also their own posts list, the posts that they add comments<br>
-send inqruiy to admin<br>

<h1>Requirements</h1>
Laravel 8.0+<br>
Database Tables<br>

<h1>Installation</h1>

1. Save all the files in your local environments.<br>

2. Create the database<br>
   Also Register DB name in "DB_DATABASE" of .env <br>

3. Run Composer<br>
    ```
    composer install
    ```
    
4. Run Migrate<br>
    ```
    php artisan migrate
    ```
    
5. Change Settings<br>
If you want to use Inquiry feature, please fill in the following fields of .env<br>
-MAIL_HOST<br>
-MAIL_PORT<br>
-MAIL_USERNAME<br>
-MAIL_FROM_ADDRESS<br>

6. ALso, create MAIL_ADMIN field in .env & input admin user's email address<br>
-MAIL_ADMIN<br>
