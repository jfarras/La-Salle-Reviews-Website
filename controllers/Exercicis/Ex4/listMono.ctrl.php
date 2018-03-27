<?php
include_once(PATH_CONTROLLERS . 'Exercicis/Ex4/listAnimal.ctrl.php');
/**
 * List Module
 */
class Ex4ListMonoController extends Ex4ListAnimalController
{
    protected $table = 'imagenesmonos';
    protected $tipo = 'Monos';
}