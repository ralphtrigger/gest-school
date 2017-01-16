<?php
namespace GestSchool\Domain;

class Student
{

    /**
     * Student id.
     *
     * @var integer
     */
    private $id;

    /**
     * Student matricule.
     *
     * @var string
     */
    private $matricule;

    /**
     * Student name.
     *
     * @var string
     */
    private $name;

    /**
     * Student surname.
     *
     * @var string
     */
    private $surname;

    /**
     * Student birthdate.
     *
     * @var \DateTime
     */
    private $birthdate;

    /**
     * Student gender.
     *
     * @var string
     */
    private $sexe;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getMatricule()
    {
        return $this->matricule;
    }

    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }
}