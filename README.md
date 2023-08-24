![image](https://github.com/brunocloss/crud-register/assets/130106110/99791f2c-39da-469d-9c9a-f9bce6e74d01)


MODEL:

*"db.sql" is the Database's Blueprint to initiate the MySQL project (You need to have access to phymyadmin, MySQL Workbench or similars to create it).

*It is created a Database class to connect with MySQL.

*Class "UserModel" is used to connect to the database, creating functions that interact directly with the SQL data.


VIEW:

*Register and edit files provide forms to user fill them in. The informations are sent to Controller which implements its functions and display the results on the index page.


CONTROLLER:

*registerCtrl, editCtrl and deleteCtrl are the controllers responsible to get user's inputs and take them to the main controller "UserCtrl".

*Class "UserCtrl" is the responsible for interact with the functions from "UserModel", creating validations, displayers and registration functions.


----------------------------------------------------------------

The system begins in /view/index.php page, where it shows a table with all registrated users.

It is possible to register new users, edit and delete them.
