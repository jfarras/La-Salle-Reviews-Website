<?php
/**
 * Inset Controller
 */
class Ex2InsertController extends Controller
{
    protected $viewInsert = 'Exercicis/monitos/insert.tpl';
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
            $this->setLayout($this->viewInsert);
            $insert_valor = $this -> getClass ('Ex2InserirModel');

            //echo "model:"; var_dump($insert_valor);

            // Per capturar una variable enviada mitjançant un formulari HTML pels métodes GET/POST evitant SQL injection
            $nombre = Filter::getString('nombre');
            $url = Filter::getString('url');
            if ($nombre && $url) {
                $insert_valor -> Inserir($nombre,$url);
            }
        }
        else
        {
            $this->setLayout($this->viewError);
        }
    }


    /**
     * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
     * The sintax is the following:
     * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
     *
     * @return array
     */
    public function loadModules() {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';
        return $modules;
    }
}