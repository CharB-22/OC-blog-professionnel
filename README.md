# Project 5 - Create your own blog, using PHP

Goal : Build a professional blog from scratch, with a section visible to everyone and a section only accessible to specific users.
For more details go to : https://openclassrooms.com/fr/paths/59/projects/7/assignment

In this repository, you will find:
- The application pages and folders needed to run the application
- The composer.json needed to install the libraries used for this project
- The sql database
- UML diagrams

To install the project on your own server:

--> Download or Clone the project from Github

--> Make sure you have composer installed to be able to download the libraries to be able to correctly run this project. Once this check is done, installed the libraries by using this command in your command line:
php composer.phar install

--> Import the .sql file from the repository in your MySql database.
In order to connect to the database, make sure to update the identifiers in the AbstractManager.php (App\Model\AbstractManager.php):
    const DB_HOST = 'mysql:host=localhost;dbname=oc-projet5';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

--> Last but not least, in order to access the backend pages, an generic administrator account has been created:
username: Admin1
password : Administrator1
