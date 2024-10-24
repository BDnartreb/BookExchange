<?php

//hydrates an entity in a right format from a database

abstract class AbstractEntity 
{
    // id by default -1, to check it's a new entity. 
    protected int $id = -1;

    /**
     * hydrates the entity with the array in params
     * @param array $data
     */
    public function __construct(array $data = []) 
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * Fields of the array should correspond to attributs of the entity
     * underscore are changed in camelCase
     * @return void
     */
    protected function hydrate(array $data) : void 
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /** 
     * id setter.
     * @param int $id
     * @return void
     */
    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    
    /**
     * id getter.
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }
}