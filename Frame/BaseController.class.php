<?php
abstract class BaseController
{
    protected function jump($msg, $url= '?', $time = 3){
        echo "<h3>{$msg}</h3>";
        header("refresh:{$time};url={$url}");
        exit();
    }
}