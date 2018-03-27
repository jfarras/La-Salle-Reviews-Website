<?php
include_once(PATH_CONTROLLERS . 'Exercicis/Ex4/listAnimal.ctrl.php');
/**
 * List Module
 */
class Ex4ListOrniController extends Ex4ListAnimalController
{
    protected $table = 'imagenesornitorrincos';
    protected $tipo = 'Ornitorrincos';
}