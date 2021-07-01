<?php
require_once '../Core/Aplication.php';
$app=new Aplication();
$app->renderController();
$data=null;
if(isset($app->getData()[0])){
    $data= $app->getData()[0];
}
$view=$app->getView();
require($view);
?>
