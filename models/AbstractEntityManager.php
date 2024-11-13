<?php

/**
 * Abstract class that represent a manager. Gets automatically the database manager. 
 * Used for prepared request
 */
abstract class AbstractEntityManager {
    
    protected $db;

    /**
     * Gets automatically the DBManager instance. 
     */
    public function __construct() 
    {
        $this->db = DBManager::getInstance();
    }

}