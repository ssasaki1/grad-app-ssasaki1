<?php
session_start();
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['confirm'])) {
    header('Location: index.php'); exit;
}

$all   = $_SESSION['all_courses']     ?? [];
$take  = $_SESSION['courses_taken']   ?? [];
$acomp = $_SESSION['accomplishments'] ?? '';

$eligible = checkEligibility($acomp, count($all), count($take));
$name     = htmlspecialchars($_SESSION['first_name'].' '.$_SESSION['last_name'], ENT_QUOTES);

$msg = $eligible
     ? 'you are accepted for an phone interview'
     : 'sorry, your application was rejected';
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Step 5 – Result</title></head>
<body>
<h1>Application Result</h1>
<p><strong>Applicant:</strong> <?= $name ?></p>
<p><?= htmlspecialchars($msg, ENT_QUOTES) ?></p>
</body>
</html>
