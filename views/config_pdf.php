<?Php
$host_name = "localhost";
$database = "yummyfood"; // Change your database nae
$username = "";          // Your database user id 
$password = "root";          // Your password

//////// Do not Edit below /////////
try {
$db = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>