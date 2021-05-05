# Project 5 - Create your own blog, using PHP

Goal : Build a professional blog from scratch, with a section visible to everyone and a section only accessible to specific users.
This blog has been built using essentially the language PHP without any additional framework.
For more details go to : https://openclassrooms.com/fr/paths/59/projects/7/assignment

In this repository, you will find:
    - The application pages and folders needed to run the application
    - The composer.json needed to install the libraries used for this project
    - The sql database
    - UML diagrams

To install the project on your own server:

--> Download or Clone the project from Github

--> Install the needed libraries by using this command in your command line:

    php composer.phar install

--> Import the .sql file from the repository in your MySql database.

--> Update the _config.php file with your own identifier. This file can be found in this folder:
config\_config.php : replace the asterisks with the identifiers from your own set up. These changes have to be done in order to connect correctly to the database and to update the email recipient.

--> Last but not least, in order to access the backend pages, a generic administrator account has been created (already in the database):

    username: Admin1
    
    password : Administrator1