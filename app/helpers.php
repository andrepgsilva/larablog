<?php

if (! function_exists('separateCsv')) {
    function separateCsv($csv)
    {
        $csvFields = str_getcsv($csv);
        $lowerWords = array_map('strtolower', $csvFields);
        return array_map('trim', $lowerWords);
    }
}