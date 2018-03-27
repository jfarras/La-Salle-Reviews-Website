<?php
/**
 * Select Controller
 */
class Ex4SelectZooController extends Controller
{
    protected $viewSelect = 'Exercicis/zoo/selectZoo.tpl';
    protected $viewError = 'Exercicis/error/error404.tpl';

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
        if(count($params) == 2)
        {
            $URLarguments = $params['url_arguments'];
            if (count($URLarguments) == 1)
            {
                $this->setLayout($this->viewSelect);

                $select_model = $this->getClass('Ex4SelectAnimalModel');

                $maxMono = $select_model->ConsultarMida('imagenesmonos');
                $maxOrni = $select_model->ConsultarMida('imagenesornitorrincos');
                $maxMarmota = $select_model->ConsultarMida('imagenesmarmotas');

                $max = $maxMono[0]['COUNT(*)'];
                if ($max < $maxOrni[0]['COUNT(*)']) $max = $maxOrni[0]['COUNT(*)'];
                if ($max < $maxMarmota[0]['COUNT(*)']) $max = $maxMarmota[0]['COUNT(*)'];

                $pag = $max;
                if ($pag%3 != 0) $pag++;
                if ($pag%3 != 0) $pag++;
                $pag = $pag/3-1;

                $offset = $URLarguments[0];
                $this->setParams(array('offset'=>$offset));
                $this->assign('offset', $offset);

                if ($offset > 0)
                {
                    $this->assign("prev", true);
                }
                else
                {
                    $this->assign("prev", false);
                }
                if ($offset < $pag)
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
                $this->setParams(array('offset'=>null));
            }
        }
        else
        {
            $this->setLayout($this->viewError);
            $this->setParams(array('offset'=>null));
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
        $modules['head']	    = 'SharedHeadController';
        $modules['monos']	    = 'Ex4SelectMonoController';
        $modules['ornis']	    = 'Ex4SelectOrniController';
        $modules['marmotas']	= 'Ex4SelectMarmotaController';
        $modules['footer']	    = 'SharedFooterController';
        return $modules;
    }
}