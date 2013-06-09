<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    Memes
 *  @version    $Id$
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/Memes_Controller.php';

ini_set('max_execution_time', 0);

Memes_Controller::main_CLI('Memes_Controller', '{$action_name}');
?>
