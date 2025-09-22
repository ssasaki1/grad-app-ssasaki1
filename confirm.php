<?php
session_start();
if (empty($_SESSION['first_name'])) { header('Location: index.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: accomplishments.php'); exit; }

$_SESSION['accomplishments'] = trim($_POST['accomplishments']);

$name = htmlspecialchars($_SESSION['first_name'].' '.$_SESSION['last_name'], ENT_QUOTES);
$courses = $_SESSION['courses_taken'] ?? [];
$coursesEsc = array_map(fn($c)=>htmlspecialchars($c, ENT_QUOTES), $courses);
$accompEsc  = htmlspecialchars($_SESSION['accomplishments'], ENT_QUOTES);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Step 4 – Confirm</title></head>
<body>
<h1>Confirm Your Application</h1>
<p><strong>Name:</strong> <?= $name ?></p>
<p><strong>Courses Taken:</strong>
  <?php if ($coursesEsc): ?>
    <ul><li><?= implode('</li><li>', $coursesEsc) ?></li></ul>
  <?php else: ?>None<?php endif; ?>
</p>
<p><strong>Accomplishments:</strong></p>
<pre><?= $accompEsc ?></pre>
<form action="result.php" method="POST">
    <input type="hidden" name="confirm" value="1">
    <input type="submit" value="Submit Application">
</form>
</body>
</html>
