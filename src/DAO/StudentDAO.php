<?php
namespace GestSchool\DAO;

use GestSchool\Domain\Student;

class StudentDAO extends DAO
{

    public function findAllByClass($code)
    {
        $sql = "select e.* from Eleve e inner join Inscrire i on e.id_el = i.id_el " .
             "where code_cl = '$code' order by e.nom_el, e.prenom_el";
        $result = $this->getDb()->fetchAll($sql);
        
        $students = array();
        foreach ($result as  $row){
            $id = $row['id_el'];
            $students[$id] = $this->buildObjectDomain($row);
        }
        
        return $students;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \GestSchool\DAO\DAO::buildObjectDomain()
     */
    protected function buildObjectDomain(array $row)
    {
        $student = new Student();
        $student->setId($row['id_el']);
        $student->setMatricule($row['matricule_el']);
        $student->setName($row['nom_el']);
        $student->setSurname($row['prenom_el']);
        $student->setBirthdate(date_create($row['date_naiss_el']));
        $student->setSexe($row['sexe_el']);
        
        return $student;
    }
}