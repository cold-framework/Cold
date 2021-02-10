<?php

function dump(...$var)
{
    var_dump($var);
}

function dd(...$var)
{
    var_dump($var); die;
}