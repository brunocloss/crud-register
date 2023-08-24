MODEL:

*Database's Blueprint to initiate the MySQL project (You need to have access to phymyadmin, MySQL Workbench or similars to create it).
*Is created a Database class to connect with MySql.
*Class "UserModel" is used to connect to the database, creating functions that interact directly with the SQL data.

CONTROLLER:

*registerCtrl, editCtrl and deleteCtrl are the controllers responsible to get user's inputs and take them to the main controller "UserCtrl".
*Class "UserCtrl" is the responsible for interact with the functions from "UserModel", creating validations, displayers and registration functions.

VIEW:

*Register and edit files provide forms to user fill them in. The informations are sent to Controller which implements its functions and display the results on the index page.

The system begins in /view/index.php page, where it shows a table with all users registrated.
It is possible to register new users, edit and delete them.