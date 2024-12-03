<?php

if (!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}

if (!function_exists('debug_to_console')) {
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output)) {
            $output = implode(',', $output);
        }
        echo "<script>console.log('Debug: " . $output . "' );</script>";
    }
}

if (!function_exists('debug_to_file')) {
    function debug_to_file($data, $filename = 'debug.log') {
        $output = print_r($data, true);
        file_put_contents($filename, $output, FILE_APPEND);
    }
}

if (!function_exists('debug_test')) {
    function debug_test() {
        $timestamp = date('Y-m-d H:i:s');
        $test_message = "[$timestamp] Debugging test successful: All systems operational.";
        
        debug($test_message);
        debug_to_console($test_message);
        debug_to_file($test_message);
    }
}
