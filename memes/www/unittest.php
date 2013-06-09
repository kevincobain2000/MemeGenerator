<?php
error_reporting(E_ALL);
require_once dirname(__FILE__) . '/../app/Memes_Controller.php';

Memes_Controller::main('Memes_Controller', array(
    '__ethna_unittest__',
    )
);
?>
