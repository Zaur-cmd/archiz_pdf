<?php

if (!function_exists('userType')) {
    function userType($type)
    {
        if ($type == 1) {
            return 'Мастера';
        } elseif ($type == 2) {
            
            return 'Сотрудники';
        } else {
            return 'Пользователи';
        }
    }
}
