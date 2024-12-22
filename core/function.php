<?php
session_start();
define("BASE_URL", "http://localhost/hospital/");
function url($var = null)
{
        return BASE_URL . $var;
}
// ---------------------VALIDATION--------------------
function validation_error($input)
{
        $input = ltrim($input);
        $input = rtrim($input);
        $input = strip_tags($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input;
}
function stringvalidation($input, $maxLen = 20, $minLen = 3)
{
        $isempty = empty($input);
        $isMaxError = strlen($input) > $maxLen;
        $isMinError = strlen($input) < $minLen;
        if ($isempty || $isMaxError || $isMinError) {
                return true;
        } else {
                return false;
        }
}
// ---------------------VALIDATION Email--------------------
function emailValidation($input, $maxLen = 60, $minLen = 10)
{
        $isempty = empty($input);
        $isMaxError = strlen($input) > $maxLen;
        $isMinError = strlen($input) < $minLen;
        $isNotEmail = !filter_var($input, FILTER_VALIDATE_EMAIL);
        if ($isempty || $isMaxError || $isMinError || $isNotEmail) {
                return true;
        } else {
                return false;
        }
}
// ---------------------VALIDATION FILE--------------------
function fileSizeValidation($fileSize, $requireSize = 2)
{
        $migaSize = ($fileSize / 1024) / 1024;
        $isMaxError = $migaSize > $requireSize;
        if ($isMaxError) {
                return true;
        } else {
                return false;
        }
}
