<?php
include_once(PATH_CONTROLLERS . 'Exercicis/Ex4/selectAnimal.ctrl.php');

/**
 * Modul Select Controller Mono
 */
class Ex4SelectOrniController extends Ex4SelectAnimalController
{
    protected $table = 'imagenesornitorrincos';
}