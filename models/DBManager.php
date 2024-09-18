<?php

/**
 * Connection to the database.
 * This class is a singleton. It generate only one instance at a time.
 * Use getInstance() to get the instance of this class.
 */
class DBManager 
{
    private static $instance;

    private $db;

    /**
     * Initialize the connection to the database
     * @see DBManager::getInstance()
     */
    private function __construct() 
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Gets the instance of the class DBManager.
     * @return DBManager
     */
    public static function getInstance() : DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    /**
     * Gets the PDO object that contains informations to connect to the database.
     * @return PDO
     */
    public function getPDO() : PDO
    {
        return $this->db;
    }

    /**
     * Executes a SQL query.
     * If params, uses a prepared request.
     * @param string $sql : SQL query to execute.
     * @param array|null $params : params of the SQL query.
     * @return PDOStatement : result of the SQL query.
     */
    public function query(string $sql, ?array $params = null) : PDOStatement
    {
        if ($params == null) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
    
}