<?php
/*

Used for printing relative times in loop rather than absolute timestamps
Snagged from: http://stackoverflow.com/a/9619909

$limit is the number of seconds at which point this function gives up
translating the time and just returns the absolute time.

$limit = 60; // 1 minute (60)
$limit = 3600; // 1 hour (60*60)
$limit = 14400; // 4 hours (60*60*4)
$limit = 86400; // 1 day (60*60*24)
$limit = 604800; // 1 week (60*60*24*7)
$limit = 2592000; // 1 month (60*60*24*30)
$limit = 31536000; // 1 year (60*60*24*365)
$limit = 3153600000; // 1 century (60*60*24*365*100)
*/
function relativeTime($time = false, $format = 'j/m/y g:i A', $limit = 86400) {
    if (empty($time) || (!is_string($time) && !is_numeric($time))) $time = time();
    elseif (is_string($time)) $time = strtotime($time);

    $now = current_time('U');
    $relative = '';

    if ($time === $now) $relative = 'ahora';
    elseif ($time > $now) $relative = 'en el futuro';
    else {
        $diff = $now - $time;

        if ($diff >= $limit) $relative = date($format, $time);
        elseif ($diff < 60) {
            $relative = 'hace ' . $diff . ' ' . (((int)$diff === 1) ? 'segundo' : 'segundos');
        } elseif (($minutes = ceil($diff/60)) < 60) {
            $relative = 'hace ' . $minutes . ' ' . (((int)$minutes === 1) ? 'minuto' : 'minutos');
        } elseif (($hours = ceil($diff/3600)) < 24) {
            $relative = 'hace ' . $hours . ' ' . (((int)$hours === 1) ? 'hora' : 'horas');
        } elseif (($days = ceil($diff/86400)) < 7) {
            $relative = 'hace ' . $days . ' ' . (((int)$days === 1) ? 'día' : 'días');
        } elseif ($days < 30) {
            $weeks = ceil($diff/604800);
            $relative = 'hace ' . $weeks . ' ' . (((int)$weeks === 1) ? 'semana' : 'semanas');
        } elseif ($days < 365) {
            $months = ceil($diff/2592000);
            $relative = 'hace ' . $months . ' ' . (((int)$months === 1) ? 'mes' : 'meses');
        } elseif (($years = ceil($diff/31536000)) < 100) {
            $relative = 'hace ' . $years . ' ' . (((int)$years === 1) ? 'año' : 'años');
        }
    }

    return $relative;
}