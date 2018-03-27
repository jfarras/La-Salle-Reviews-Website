<?php

class PracticaReviewDeleteReviewController extends Controller
{
    protected $view = 'Practica/review/deleteReview.tpl';
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
            if(count($params['url_arguments']) ==1) $this->content($params);
            else $this->setLayout($this->viewError);
        }
        else
        {
            $this->setLayout($this->viewError);
        }
    }

    public function content($params)
    {
        $url = $params['url_arguments'][0];
        $name = Session::getInstance()->get('name');
        if($name)
        {
            $reviews = $this->getClass('PracticaReviewsTableModel');
            $review = $reviews->getReview($url);
            if ($review && $review[0]["author"] == $name)
            {
                $this->assign("title",$review[0]["title"]);
                $this->setLayout($this->view);

                //Get form answer
                $subButt = Filter::isSent("submitConfirm");
                if ($subButt)
                {
                    $answer = Filter::getString("confirm");
                    if ($answer == "Yes")
                    {
                        $this->deleteRedirects($review["id"]);
                        $this->deleteRating($review["id"]);

                        $reviews = $this->getClass('PracticaReviewsTableModel');
                        $reviews->deleteReview($url);
                    }
                    header("Location: /l/1");
                }
            }
            else if ($review)
            {
                //Error wrong author
                $this->setLayout($this->viewForbidden);
            }
            else
            {
                //Error load review
                $this->setLayout($this->viewError);
            }
        }
        else
        {
            $this->setLayout($this->viewForbidden);
        }
    }

    private function deleteRating($idReview)
    {
        $pointsTable = $this->getClass('PracticaPointsTableModel');
        $pointsTable->deleteIDRatings($idReview);
    }

    private function deleteRedirects($idReview)
    {
        $redirects = $this->getClass('PracticaReviewsTableModel');
        $redirects->deleteRedirects($idReview);
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}
