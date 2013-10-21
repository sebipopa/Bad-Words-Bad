## Bad Words Bad

__Bad Words Bad (BWB)__ is a simple php library for handling profanity words.

## Languages:
* Romanian

## Usage:
    include_once 'BWB.php';

    $bwb = new BWB();
    $ok = $bwb->has_bad_words('Some nasty words here like pula.'); // should return TRUE