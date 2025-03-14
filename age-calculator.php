<?php
/*
Plugin Name: Age Calculator
Description: Calculates age based on birthdate.
Version: 1.0
Author: Eduardo Sena
*/

// Função para calcular a idade
function getAge($date){
    $from = new DateTime($date);
    $to   = new DateTime('today');
    return $from->diff($to)->y;
}

function time_ago_func($atts){
    extract(shortcode_atts(array(
        'birthdate' => '',
    ), $atts));

    // Lide com o caso em que o campo de data de nascimento não está definido
    if (!$birthdate) {
        return '';
    }

    $age = getAge($birthdate);
    return $age;
}

// Registre o shortcode
add_shortcode('time_ago', 'time_ago_func');
