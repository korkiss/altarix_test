Installation
============


## Installing using Composer

If you do not have [Composer](http://getcomposer.org/), follow the instructions in the
[Installing Yii](https://github.com/yiisoft/yii2/blob/master/docs/guide/start-installation.md#installing-via-composer) section of the definitive guide to install it.

At first clone project from GitHUb as ususal.
Create a folder and run command inside it.

    git clone https://github.com/korkiss/yii2-taxi-extension.git

Next step is to update dependencies for Yii2 project
    
    composer update

Configure your database for Yii2 properly working in config/db.php. For example we are going to use Postgres:
     
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=localhost;port=5432;dbname=altarix',
        'username' => 'postgres',
        'password' => 'postgres',
        'charset' => 'utf8',
    ];

Final step for installation is to run migration for Database. Simply run migration script in Root folder of a project.
 
    yii migrate



## Running cron

We are looking for Taxi number 'em33377' in public database using SOAP request. 
To run cron in proper way you have run
 
    yii cron/em33377

To emulate search for taxi driver without RegNumber run

    yii cron/em33378


# Running web server 

Simplies way to run web server is to run in command line

    yii serve

Then open http://localhost:8080/

Then login to system using Username/Password pair admin/admin and "Cron Results" link will be visible then.

