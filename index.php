<?php

include_once 'BWB.php';

$bwb = new BWB();
$ok = $bwb->has_bad_words('Some nasty words here like pula.');

var_dump($ok);