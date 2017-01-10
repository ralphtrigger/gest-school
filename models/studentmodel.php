<?php
require_once 'dblink.php';

/**
 *
 * @param
 *            classe
 */
function getStudentByClasse($classe)
{
    $link = getConnection();
    $query = "select e.* from Eleve e inner join Inscrire i on e.id_el = i.id_el " .
         "where code_cl = '$classe' order by e.nom_el, e.prenom_el";
    $students = mysqli_query($link, $query);
    mysqli_close($link);
    return $students;
}