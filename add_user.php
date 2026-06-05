<?php
include 'auth.php';

if(isset($_POST['add_user']))
{
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $role = $_POST['role'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query($conn,"
    INSERT INTO users
    (
        fullname,
        username,
        email,
        phone,
        password,
        role,
        status
    )
    VALUES
    (
        '$fullname',
        '$username',
        '$email',
        '$phone',
        '$password',
        '$role',
        'active'
    )
    ");

    header("Location: users.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add User</title>

<link rel="stylesheet"
href="assets/admin.css">

</head>
<body>

<div class="main">

<h1>Add User</h1>

<form method="POST">

<input type="text"
name="fullname"
placeholder="Full Name"
required>

<br><br>

<input type="text"
name="username"
placeholder="Username"
required>

<br><br>

<input type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input type="text"
name="phone"
placeholder="Phone">

<br><br>

<input type="password"
name="password"
placeholder="Password"
required>

<br><br>

<select name="role">

<option value="user">
User
</option>

<option value="admin">
Admin
</option>

</select>

<br><br>

<button
class="btn"
name="add_user">

Add User

</button>

</form>

</div>

</body>
</html>