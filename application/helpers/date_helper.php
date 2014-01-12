<?php

/**
* Format date as Y-m-d
*/
function date2sql($date)
{
    $temp = new DateTime($date);

    return $temp->format('Y-m-d');
}

/**
* Format date for output to user
*/
function date2user($date)
{
    $temp = new DateTime($date);

    return $temp->format('d.m.Y');   
}
