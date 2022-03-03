<?php
require '../utils/Helper.php';
use  Brief\utils\Helper;
$helper = new Helper();
$helper->setTest('123');
var_dump($helper);