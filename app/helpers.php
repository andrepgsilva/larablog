<?php

if (! function_exists('separateCsv')) {
    function separateCsv($csv)
    {
        $csvFields = str_getcsv($csv);
        if (count($csvFields) > 1) {
            return array_map('trim', $csvFields);
        }
    }
}