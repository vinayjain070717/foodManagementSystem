Instructions to setup project
1) Install mysql 5.7 ( don't install any other version of mysql)
2) import foodDB.sql file to your database (foodDB.sql is placed in foodManagementSystem folder)
3) open db.php file and change following line
$mysqli = new mysqli("127.0.0.1", "root", "root", "foodDB");
To
$mysqli = new mysqli("127.0.0.1", yourDBUsername, yourDBpassword, yourDBName);
4) In phpMailer folder open credentials.php file and write your mail id, password and admin email, so that system can send email. Also, in your gmail set allow less secure app option. 
5) Then install wamp server
6) copy foodManagementSystem folder to wamp/www/ folder
7) Run wamp server by double-click in wamp64.exe
8) open browser and search http://localhost/FoodManagementSystem/registerHome.html
This is starting page 

