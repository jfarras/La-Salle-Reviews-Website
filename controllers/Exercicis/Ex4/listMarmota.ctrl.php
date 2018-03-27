<?php
include_once(PATH_CONTROLLERS . 'Exercicis/Ex4/listAnimal.ctrl.php');
/**
 * List Module
 */
class Ex4ListMarmotaController extends Ex4ListAnimalController
{
    protected $table = 'imagenesmarmotas';
    protected $tipo = 'Marmotas';
}