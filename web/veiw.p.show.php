<?php 

require_once('connection.php');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM `prequest`";
$result = mysqli_query($connection, $query);

$user_list = '';

$query = "SELECT * FROM `prequest`";
$users = mysqli_query($connection, $query);

if (!$users) {
    echo "Error: " . mysqli_error($connection);
}


if ($users) {
    while ($user = mysqli_fetch_assoc($users)) {
        $user_list .= '<tr>';
        $user_list .= "<td>{$user['email']}</td>";
        $user_list .= "<td>{$user['product']}</td>";
        $user_list .= "<td>{$user['quantity']}</td>";
        $user_list .= '<td><button onclick="document.location=\'mailto:'.$user['email'].'?subject=Feedback&body=cofirmed your order,now set your payment\'">Approve</button></td>';
        $user_list .= '<td><button onclick="document.location=\'mailto:'.$user['email'].'?subject=Feedback&body=Sorry! Cant approve your oder!!\'">Reject</button></td>';
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
    </style>
</head>
<body>
    <table>
        <tr>
            <th>email</th>
            <th>product</th>
            <th>quantity</th>
            <th>Decision</th>
            <th>Decision</th>
            

        </tr>
        <?php echo $user_list; ?>
    </table>
</body>
</html>
