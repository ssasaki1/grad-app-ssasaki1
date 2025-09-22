<?php
session_start();
session_regenerate_id(true);
$_SESSION = [];
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Step 1 – Name</title></head>
<body>
<h1>Graduate Application – Step 1</h1>
<form action="courses.php" method="POST">
    First Name: <input type="text" name="first_name" required><br>
    Last Name : <input type="text" name="last_name"  required><br><br>
    <input type="submit" value="Continue">
</form>
</body>
</html>
