<?php
/**
 * Modul Select Controller Animal
 */
class Ex4SelectAnimalController extends Controller
{
    protected $table;
    protected $viewSelect = 'Exercicis/zoo/selectAnimals.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->mostrarContingut();
        $this->setLayout($this->viewSelect);
    }

    protected function mostrarContingut()
    {
        $params = $this->getParams();
        $offset = $params['offset'];
        if ($offset != null)
        {
            $select_model = $this->getClass('Ex4SelectAnimalModel');
            $result = $select_model->ConsultarImatge($offset*3,$this->table);
            $fotos = array();
            for ($pos = 0; $pos < 3; $pos++) {
                if ($pos < count($result))
                {
                    $foto['id']     = $result[$pos]['id'];
                    $foto['url']    = $result[$pos]['url'];
                    $foto['nombre'] = $result[$pos]['nombre'];
                }
                else
                {
                    $foto['id']     = '-1';
                    $foto['url']    = "/Exercicis/imag/image_not_found.jpg";
                    $foto['nombre'] = 'Sin imagen';
                }
                $fotos[$pos] = $foto;

            }
            $this->assign('fotos', $fotos);
        }
    }
}