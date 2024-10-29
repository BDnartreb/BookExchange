<?php


/**
 * Add the count of messages in the params array in the template main.php
 * @param array params
 * @return array params 
 */

abstract class AbstractController {

    protected function getParams(array $params) : ?array
    {
        if ($_SESSION) {
            $c = new UserManager();
            $messageCount = $c->getMessageCount();
            $params ['messageCount'] = $messageCount;
        }
            return $params;
    } 
}