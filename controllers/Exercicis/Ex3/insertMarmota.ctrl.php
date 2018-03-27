<?php
/**
 * Inset Controller
 */
class Ex3InsertMarmotaController extends Controller
{
    protected $viewInsert = 'Exercicis/zoo/insertAnimal.tpl';
    protected $viewError = 'Exercicis/error/error404.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        //Crida a un métode que mostrarà contingut per pantalla.
        $this->capturaValor();
    }

    protected function capturaValor()
    {
        $params = $this -> getParams();
        if(count($params) == 1)
        {
            $tipo = 'marmota';
            $this->setLayout($this->viewInsert);
            $this->assign('tipo',$tipo);
            $insert_valor = $this -> getClass ('Ex3InsertAnimalModel');

            // Per capturar una variable enviada mitjançant un formulari HTML pels métodes GET/POST evitant SQL injection
            $nombre = Filter::getString($tipo);
            $url = Filter::getString('url'.$tipo);
            if ($nombre && $url) {
                $insert_valor -> Inserir($nombre,$url,'imagenesmarmotas');
            }
        }
        else
        {
            $this->setLayout($this->viewError);
        }
    }
}