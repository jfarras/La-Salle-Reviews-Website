<?php

class PracticaHomeHomeController extends Controller
{
	protected $view = 'Practica/home/home.tpl';
    protected $viewError = 'Practica/error/error404.tpl';

    protected $result;

    public function build()
	{
        $params = $this->getParams();
        if (count($params) === 1){


        $select_model = $this->getClass('PracticaReviewsTableModel');
        $this->result = $select_model->getLastImages();
        $name = Session::getInstance()->get('name');
        if ($name) {
            $this->assign('logged', true);
            $this->assign('welcome', "Welcome ".$name." to laSalle Reviews");
        }
        else
        {
            $this->assign('welcome', "Welcome to laSalle Reviews please logIn to access more features");
        }
		$this->setLayout($this->view);
       $this->assign('result', $this->result);
        }else $this->setLayout($this->viewError);


    }
	
	/**
	 * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
	 * The sintax is the following:
	 * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
	 *
	 * @return array
	 */
	public function loadModules() {
		$modules['head']	= 'PracticaSharedHeadController';
		$modules['footer']	= 'PracticaSharedFooterController';
        $modules['modulReview'] = 'PracticaReviewModulReviewController';
        $modules['miniReview'] = 'PracticaReviewMiniReviewController';
        $modules['modulTop10Reviews'] = 'PracticaReviewModulTopTenController';
        return $modules;
	}
}