<?php 

require_once('connection.php');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM `user`";
$result = mysqli_query($connection, $query);

$user_list = '';

$query = "SELECT * FROM `user`";
$users = mysqli_query($connection, $query);

if (!$users) {
    echo "Error: " . mysqli_error($connection);
}


if ($users) {
    while ($user = mysqli_fetch_assoc($users)) {
        $user_list .= '<tr>';
        $user_list .= "<td>{$user['id']}</td>";
        $user_list .= "<td>{$user['roler']}</td>";
        $user_list .= "<td>{$user['first_name']}</td>"; 
        $user_list .= "<td>{$user['last_name']}</td>";
        $user_list .= "<td>{$user['email']}</td>";
        $user_list .= "<td>{$user['phone']}</td>";
        $user_list .= "<td>{$user['password']}</td>";
        $user_list .= "<td><a href='update.html?id='.$user[id]' onclick='return checkupdate()'>Edit</td>";
        $user_list .= "<td><form method='post' action='delete.php'><input type='hidden' name='id' value='{$user['id']}'><button type='submit' onclick='return checkdelete()'>Remove</button></form></td>";
        $user_list .= '</tr>';
    }
} else {
    echo "failed";
}

mysqli_close($connection); 

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; } 
        td, th { border: 1px solid black; padding: 10px; }

        img{
            opacity: 0.5;
            
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>roler</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>phone</th>
            <th>password</th>
            <th>edit</th>
            <th>delete</th>
            

        </tr>
        <?php echo $user_list; ?>
    </table>
</body>
</html>
