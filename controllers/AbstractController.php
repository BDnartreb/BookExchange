<?php

abstract class AbstractController {

    protected function getParams(array $params) {
        $messageCount = 3;//aller chercher value dans DB
        $params ['messageCount'] = $messageCount;
        return $params;


    } 




}