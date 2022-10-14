<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function removeAllCharsExceptNumbers($string){
    return preg_replace('/[^0-9]/','', $string);
}

