


MONEY SAVING APP
provide solution for clients , so they can save money and reduce expenses


!!!!!!NOTES THAT I KEPT THE WHOLE TIME OF BUILDING THE APPLICATION!!!!!!

Laravel + Vue Js + Inertia Js
(SPA app)



install laravel,vue,inertia
inertia has a lot of featured that can allow to use vue js normally inside the laravel project
https://inertiajs.com/
-> routes->controller->view
passing props from the controller and handle them with vue js -> defineProps
persistant / default Layouts
Persistant
<script>
import MainLayout from "../../Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

in the default layout way , i dont need this code , instead i need to add this into app.js
const page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || MainLayout;
        return page;

add eslint for the vue
Laravel Debugbar & IDE Helper ( its an bar that shows info about the requests,info etc.)
vue dev tool


=>CONNECTION TO DATABASE
docker
mysql( mariadb)
create a file docker-compose.yml   +  in the terminal -> docker compose up
go into localhost:8080 and create a database called saverapp  ( the same name as in the .env 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saverapp
DB_USERNAME=root
DB_PASSWORD=root

php artisan db:show (shows the database info )
  Database ............................................................................................................... saverapp  
  Host .................................................................................................................... 127.0.0.1  
  Port ......................................................................................................................... 3306  
  Username ..................................................................................................................... root  
  URL ...............................................................................................................................  
  Open Connections ............................................................................................................1  
Tables .......................................................................................................................... 0  

=>MODELS & MIGRATIONS 
eloquent (laravel name) = ORM 
php artisan make:model Listing -m    (m is for migration , it creates also a migration file)
php artisan migrate


=>WORKING WITH MIGRATIONS
php artisan make:migration add_fields_to_listings_table
unsignedTinyInteger = non negative (unsigned)


=>MODELS FACTORIES & SEEDERS
php artisan make:factory ListingFactory
factories = how the models should look like ( gives the definition of the columns)
Seeding = proccess of generating fake data to the database
\database\seeder  , add this ->   \App\Models\Listing::factory(20)->create();
php artisan db:seed 
php artisan migrate:refresh --seed

=>QUERYING THE DATABASE
composer require laravel/tinker
php artisan tinker

=>UPDATE & INSERT DATA
$listing = Listing::find(10)
$listing->beds = 1
it says that in the id which is equal to 10 , it will give 1 bed
in the listing model . with this code , protected $fillable = ['beds', 'baths', 'area', 'city', 'code', 'street', 'street_number', 'price'];
}, i can make the columns fillable through the tinker and add fields , modify , update , create.

=>RESOURCE CONTROLLER & ROUTE MODEL BINDING
php artisan make:controller PhotoController --resource
it creates empty function inside the controller for every possible operation

=>SEE THE ROUTES
php artisan route:list

=>Ziggy library
composer require tightenco/ziggy
it makes the routes in vue easier 

=>AUTHENTICATION <- fixed!!
crud operations
login
logout
register

=>SHARED DATA !!!!
in the middleware folder ,inside the file "HandleInertiaRequests" its possible to pass data that u want to use in all the pages without restriction,like this

'user' => [
              'username' => $request->user() ? $request->user()->username : null,           
 ]

now, in the vue pages , in the script  i can do this 
const username = computed(() => page.props.user?.username || "Guest");

{{username}}    <- text interpolation , render the data !!!

=>RELATIONSHIPS -> MYSQL!!
building the relations between the models (User, Listing)
every user to see his own lists, to add a list and to be registered, that he did it

=>POLICY
php artisan make:policy ListingPolicy --model=Listing
in the ListingPolicy -> this way only the admin and the authorized person can see the page
if ($user->isAdmin === 1) {
            return true;
        }
        return $user->id === $listing->by_user_id;

add this in the function to the listing controller that i want only the authorized person to see,
if (Auth::user()->cannot('edit', $listing)) {
            abort(403);
        }

=>PAGINATION & FILTERING
method - eloquent paginate
i need to change the defineProps from array to object  ({listings : Object});
pagination -> it works!!

=>ADD FEATURES FOR THE USERS -> think for that !!
profile  <--- it works!!!
vue3-toastify <--- it works!!!
spinner - progress indicator  <--- it works !!!
fade for the spinner  

=>PROGRESS INDICATOR FOR THE SPINNER

=>PROFILE PAGE 

=>THINGS TO DO
profile <-- it works!!
change username <-- it works!!
change password <-- it works!!
change phone number <-- it works!!
make incomes tables <-- it works!!
(GENERAL) add diagrams & implement my data <-- it works!!
(For == house) add diagrams & implement my data <-- it works!!
for = boolean, 0 = home , 1 = car , 2 = subscription, 3 = food <-- it works!!
update avatar <--
plans of payment <--
get error message when credentials are wrong <--
suggestions, what u can reduce to get more profit < --

=>INCOMES, EXPENSES
For the House :
Rent
Electricity
Water
Heating
Gas
Home Insurance
For the car :
Assurance
Essence (gasoline)
Mechanical
For subscriptions:
Internet
Phone
Television
netflix
Apple
….
For the food :
Fruit/vegetable…
Meet fish …
Beverage
Others
Fast food…
Restaurant
Purchasing for hygiene:
Shampoo
face/ body
Purchase to clean:
Cleaner
tool for cleaning
Purchase for leisure:
Movie theater
Sport
Bowling
….

----> NEED (TV,WATER,ELECTRICITY,etc)
----> TYPE ( 1 = NECESSARY,  0 = FOR PLEASURE)
----> FOR (HOME,SUBSCRIPTION,FOOD,etc)
----> PAID (0 = NOT PAID ,  1 = PAID)

-->relationships (type,for)  
to get a single table based on the (type) or the (for)

=>PLAN OF PAYMENT
Starter
Medium
Premium/Gold

=>ICONS
https://icons8.com/
Free Icons + Font Awesome

=>DIAGRAMS
www.chartjs.org

=> TIPS
when its <a> instead of <Link> the pages refreshes ,
instead of just changing without reload.


=>SEARCH FEATURE
import {ref,watch,defineProps } from "vue";

=> ADD GOOGLE ANALYTICS AND OPTIMIZE THE SEO IN THE WEBSITES



=>DEPLOY THE WEBSITE ON DIGITAL OCEAN , 
IP:*********
(ROOT)passw:*********
(laravel)PASSW:*********

sudo ufw allow 'Nginx HTTP'
sudo mysql
sudo mysql_secure_installation
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by '*********';
sudo mysql -u root -p
create user 'app'@'localhost' identified by '*********';
alter user 'app'@'localhost' identified with mysql_native_password by '*********';
create database laravel;
grant all on laravel.* to 'app'@'localhost';
flush privileges;
exit
sudo apt update
sudo apt install php-bcmath php-mbstring php-xml
sudo apt install unzip
curl -sS https://getcomposer.org/installer |php
sudo mv composer.phar /usr/local/bin/composer
cd /var/www
sudo chown user ./
git clone https://github.com/entritSenia/SaverApp.git
cd SaverApp
sudo apt update
sudo apt upgrade php
composer update
cp .env.example .env
php artisan key:generate
vim .env
sudo apt install php-mysql
php artisan migrate --force
sudo vim /etc/nginx/sites-available/SaverApp
server {
    listen 80;
    server_name DOMAIN_NAME_OR_IP_ADDRESS;
    root /var/www/name_of_repo/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ .php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /.(?!well-known).* {
        deny all;
    }
}
sudo ln -s /etc/nginx/sites-available/SaverApp /etc/nginx/sites-enabled/SaverApp
sudo nginx -t 
sudo install npm
npm install vite
sudo systemctl restart nginx
sudo service nginx reload
sudo systemctl restart php8.1-fpm
sudo service apache2 restart
php artisan cache:clear
php artisan view:clear
php artisan route:clear
sudo cat /etc/php/8.1/cli/php.ini | grep 'mysql*'    (uncomment this :  ;extension=mysqli) and (this:  ;extension=pdo_mysql.so)
sudo apt install php8.1-mysql=8.1.20-1+ubuntu22.04.1+deb.sury.org+1

node version 20.

sudo chmod -R 777 /var/www/SaverApp

TIP :::: when i update  something , i need to run , npm run build 




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
