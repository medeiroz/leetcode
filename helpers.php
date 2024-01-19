<?php

function benchmark($callback): string
{
    $start = microtime(true);
    $callback();
    $end = microtime(true);
    $timeInSeconds = $end - $start;
    $formattedTimeInSeconds = number_format($timeInSeconds, 2);
    $timeInMilliseconds = round($timeInSeconds * 1000);
    return "Tempo de execução: $formattedTimeInSeconds segundos ou $timeInMilliseconds ms";
}

function dd() {
    echo '<pre>';
    array_map(fn ($x) => var_dump($x), func_get_args());
    echo '</pre>';
    die;
}
