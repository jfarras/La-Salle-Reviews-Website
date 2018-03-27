<?php

class PracticaReviewListReviewsController extends Controller
{
    protected $view = 'Practica/review/listReviews.tpl';
    protected $viewError = 'Practica/error/error404.tpl';
    protected $viewForbidden = 'Practica/error/error403.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build()
    {
        $params = $this->getParams();
        if(count($params) == 2)
        {
            if (count($params['url_arguments']) == 1)
            {
                $offset = $params['url_arguments'][0];
                $this->content($offset);
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

    public function content($offset)
    {
        $name = Session::getInstance()->get('name');
        if($name)
        {
            $reviews = $this->getClass('PracticaReviewsTableModel');
            $max = $reviews->getUserReviewsSize($name)[0]['COUNT(*)'];

            if ($max%10 == 0) $pag = $max/10;
            else $pag = ($max+(10-$max%10))/10;

            if ($offset > $pag || $offset <= 0)$this->setLayout($this->viewError);
            else
            {
                $userReviews = $reviews->getUserReviews($name, ($offset-1)*10);
                $this->setLayout($this->view);

                if ($userReviews)
                {
                    $this->assign("reviews", $userReviews);
                    $this->assign("offset", $offset);

                    if ($offset > 1)
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
                    $this->assign("error", "No reviews found");
                }
            }
        }
        else
        {
            $this->setLayout($this->viewForbidden);
        }
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}