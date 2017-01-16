<?php
namespace GestSchool\DAO;

use Doctrine\DBAL\Connection;
use GestSchool\Domain\Classe;

/**
 *
 * @author trigger
 *        
 */
class ClassDAO extends DAO
{
    
    /**
     * Return all list of classes, sorted by code.
     * 
     * @return \GestSchool\Domain\Classe[] A list of all classes
     */
    public function findAll(){
        $sql = "select * from Classe order by code_cl";
        $result = $this->getDb()->fetchAll($sql);
        
        $classes = array();
        foreach($result as $row){
            $code = $row['code_cl'];
            $classes[$code] = $this->buildObjectDomain($row);
        }
        
        return $classes;
    }
    
    /**
     * Create a Class object base on DB row.
     * 
     * @param array $row The DB row containing Class data
     * @return \GestSchool\Domain\Classe
     */
    protected function buildObjectDomain(array $row) {
        $class = new Classe();
        $class->setCode($row['code_cl']);
        return $class;
    }
    
    
}