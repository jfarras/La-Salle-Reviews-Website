<?php
/**
 * Modul Select Controller Mono
 */
class Ex3SelectMonoController extends Controller
{
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

    /**
     * @param $id identificador de la primera primera imatge de la pàgina
     * @param $select_model controlador del model
     * @param $i numero d'imatge de la pàgina
     * @param $fotos array de fotos a mostrar
     * @param $nofotos array de fotos no trobades
     */
    protected function cargarFoto($id, $select_model, $i, &$fotos)
    {
        $result = $select_model->ConsultarImatge($id+$i,'imagenesmonos');
        if ($result)
        {
            $foto['id']     = $id+$i;
            $foto['url']    = $result[0]['url'];
            $foto['nombre'] = $result[0]['nombre'];
        }
        else
        {
            $foto['id']     = $id+$i;
            $foto['url']    = "/imag/image_not_found.jpg";
            $foto['nombre'] = 'Sin imagen';
        }
        $fotos[$i] = $foto;
    }

    protected function mostrarContingut()
    {
        $params = $this->getParams();
        if(count($params) > 1)
        {
            $id = $params['id'];
            if ($id)
            {
                $select_model = $this->getClass('Ex3SelectAnimalModel');
                $fotos = array();
                for ($i = 0; $i < 3; $i++) {
                    $this->cargarFoto($id,$select_model,$i,$fotos);
                }
                $this->assign('fotos', $fotos);
            }
        }
    }
}