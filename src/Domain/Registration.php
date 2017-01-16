<?php
namespace GestSchool\Domain;

class Registration
{

    /**
     * Registration state.
     *
     * @var string
     */
    private $state;

    /**
     * Registration class.
     *
     * @var \GestSchool\Domain\Classe
     */
    private $class;

    /**
     * Registration student.
     *
     * @var \GestSchool\Domain\Student
     */
    private $student;

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getClass()
    {
        return $this->classe;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function getStudent()
    {
        return $this->student;
    }

    public function setStudent($student)
    {
        $this->student = $student;
        return $this;
    }
}