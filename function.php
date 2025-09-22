<?php
function checkEligibility(string $accomp, int $numListed, int $numTaken): bool {
    $keyword   = 'php';
    $threshold = 0.5;

    $hasKeyword   = stripos($accomp, $keyword) !== false;
    $enoughCourses= $numListed > 0 && ($numTaken / $numListed) >= $threshold;

    return $hasKeyword && $enoughCourses;
}
