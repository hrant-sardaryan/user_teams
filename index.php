<?php
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
}

$db_selected = mysqli_select_db($conn, 'test');

if (!$db_selected) {
    die('Can\'t use foo : '.mysql_error());
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Users and Teams</title>
  </head>
  <body>
    <h1>Users and Teams</h1>
    <table>
      <thead>
        <tr>
          <td> User ID: </td>
          <td>Name:</td>
          <td>Teams</td>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

  </body>
</html>
