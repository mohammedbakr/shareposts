# Shareposts App

* simple PHP app based on BakrMVC PHP Framework.
* App for sharing posts between users.
* User can register, add posts, edit and delete his/her posts.
* Any registered user can see all the posts.


## Getting Started

Copy the project in your folder.
Follow the instructions to complete the installation.

### Prerequisites

* Apache Server
* PHP 5.6+
* Mysql Database


Install [XAMPP](https://www.apachefriends.org/index.html) for an easy quickstart

### Database

Create a database of your choice in PhpMyAdmin


### Config File

Modify the app/config/config.php file according to your needs.

```
//Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', '_YOUR_USER_');
define('DB_PASS', '_YOUR_PASS_');
define('DB_NAME', '_YOUR_DBNAME');
```

### htaccess file

Modify the .htaccess file inside the public folder to match the name of your installation folder
