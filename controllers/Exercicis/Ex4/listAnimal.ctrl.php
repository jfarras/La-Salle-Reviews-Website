<?php
/**
 * List Controller
 */
class Ex4ListAnimalController extends Controller
{
    protected $viewList = 'Exercicis/zoo/listAnimal.tpl';

    protected $table;
    protected $tipo;

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->mostrarContingut();

    }

    protected function mostrarContingut()
    {
        $select_model = $this->getClass('Ex4SelectAnimalModel');
        $result = $select_model->SelectAll($this->table);

        $this->assign("fotos", $result);
        $this->assign("table", $this->table);
        $this->assign("tipo", $this->tipo);
        $this->setLayout($this->viewList);
    }
}