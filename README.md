# chat app and  assignment
 chat app and  assignment  <br />
 =>login and register  <br />
 =>แชทส่วนตัว  <br />
 =>แชทกลุ่ม  <br />
 =>ระบบสั่งงานและติดตามงาน  <br />
=> ฯลฯ  <br />
  

## get it up and running.

After you clone this project, do the following:

```bash
# go into the project
cd  root project
# create a .env file
cp .env.example .env
# install composer dependencies
composer update
# install npm dependencies
npm install
# generate a key for your application
php artisan key:generate

# add the database connection config to your .env file
DB_CONNECTION=mysql
DB_DATABASE=your database
DB_USERNAME=your table name
DB_PASSWORD=your password
# run the migration files to generate the schema
php artisan migrate

# run webpack and watch for changes
npm run watch

# run serve
php artisan serve

Good Luck :)
