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

$sql = 'SELECT u.id, u.first_name, u.last_name, GROUP_CONCAT(t.name SEPARATOR ",") AS tms
FROM users u
inner join teams_users tu on tu.user_id=u.id
inner join teams t on t.id=tu.team_id
GROUP BY u.id';
$users = mysqli_query($conn, $sql);
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
        <?php
while ($row = mysqli_fetch_assoc($users)) {
    echo '<tr><td>'.$row['id'].'</td>';
    echo '<td>'.$row['first_name'].' '.$row['first_name'].'</td>';
    echo '<td>'.$row['tms'].'</td></tr>';
} ?>
      </tbody>
    </table>

  </body>
</html>
