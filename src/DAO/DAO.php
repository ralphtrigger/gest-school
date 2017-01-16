<?php
namespace GestSchool\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO
{

    /**
     * Constructor
     *
     * @param Connection $db
     *            The database connection object
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getDb()
    {
        return $this->db;
    }
     
    /**
     * Create a domain object base on DB row.
     * 
     * @param array $row The DB row containing object data
     */
    protected abstract function buildObjectDomain(array $row);

    /**
     * Database connection.
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;
}