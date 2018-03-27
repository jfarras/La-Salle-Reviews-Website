<?php
/**
 * Inset Controller
 */
class Ex2SelectController extends Controller
{
    protected $viewSelect = 'monitos/select.tpl';
    protected $viewError = 'error/error404.tpl';

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
        $params = $this->getParams();
        if(count($params) > 1)
        {
            $URLarguments = $params['url_arguments'];
            if (count($URLarguments) == 1)
            {
                $id = $URLarguments[0];
                $select_model = $this->getClass('Ex2SelectModel');
                $max = $select_model->ConsultarMida();
                $result = $select_model->ConsultarImatge($id);

                //var_dump($result);
                //echo "model:"; var_dump($select_model);

                if ($result)
                {
                    $foto['id']     = $id;
                    $foto['url']    = $result[0]['url'];
                    $foto['nombre'] = $result[0]['nombre'];

                    $this->assign("foto", $foto);
                }
                else
                {
                    $this->assign("nofoto", true);
                    $this->assign("id", $id);
                }
                $this->setLayout($this->viewSelect);
                if ($id > 1)
                {
                    $this->assign("prev", true);
                }
                else
                {
                    $this->assign("prev", false);
                }
                if ($id < $max[0]['COUNT(*)'])
                {
                    $this->assign("next", true);
                }
                else
                {
                    $this->assign("next", false);
                }
            }
            else
            {
                $this->setLayout($this->viewError);
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