<?php
session_start();
if (empty($_SESSION['first_name'])) { header('Location: index.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: courses.php'); exit; }

$selected = $_POST['courses'] ?? [];
$all = $_SESSION['all_courses'];
$_SESSION['courses_taken'] = array_values(array_intersect($selected, $all));

$name = htmlspecialchars($_SESSION['first_name'].' '.$_SESSION['last_name'], ENT_QUOTES);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Step 3 – Accomplishments</title></head>
<body>
<h1>Applicant: <?= $name ?></h1>
<h2>Describe Your Accomplishments</h2>
<form action="confirm.php" method="POST">
    <textarea name="accomplishments" rows="8" cols="60" required
      placeholder="Write about your achievements (mention PHP if applicable)"></textarea><br><br>
    <input type="submit" value="Continue to Confirmation">
</form>
</body>
</html>
