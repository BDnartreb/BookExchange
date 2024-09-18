<?php

/**
 * Abstract classe that represent a manager. Gets automatically the database manager. 
 */
abstract class AbstractEntityManager {
    
    protected $db;

    /**
     * Constructeur de la classe.
     * Gets automatically the DBManager instance. 
     */
    public function __construct() 
    {
        $this->db = DBManager::getInstance();
    }
}