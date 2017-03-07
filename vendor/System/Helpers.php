<?php
    if(!function_exists('pre')){
        function pre($value){
            echo "<pre>";
            print_r($value);
            echo "</pre>";
        }
    }

    if(!function_exists('array_get')){
        function array_get($haystack,$key,$default = ""){
            return (isset($haystack[$key])) ? $haystack[$key] : $default;
        }
    }


    if(!function_exists('_e')){
        /**
         * Escape the given value
         * @param string $value
         * @return string
         */
        function _e($value){
            return htmlspecialchars($value);
        }
    }