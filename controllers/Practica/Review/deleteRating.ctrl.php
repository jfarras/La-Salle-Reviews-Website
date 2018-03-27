<?php

class PracticaReviewDeleteRatingController extends Controller
{
    protected $view = 'Practica/review/deleteRating.tpl';
    protected $viewError = 'Practica/error/error404.tpl';

    public function build()
    {

        $user = Session::getInstance()->get('name');
        if(!$user){
            $this->assign("noLogin",true);
        }
        $this->deleteRating($user);
    }

    private function deleteRating($name)
    {
        $params = $this->getParams();
        if(count($params) == 2)
        {
            $url = $params['url_arguments'][0];

            $reviews = $this->getClass('PracticaReviewsTableModel');
            $review = $reviews->getReview($url);
            if ($review)
            {
                $this->setLayout($this->view);
                $this->assign("title",$review[0]["title"]);

                $pointsTable = $this->getClass('PracticaPointsTableModel');
                $points = $pointsTable->getUserReviewRate($name,$review[0]["id"]);

                if ($points)
                {
                    //Get form answer
                    $subButt = Filter::isSent("submitConfirm");
                    if ($subButt)
                    {
                        $answer = Filter::getString("confirm");
                        if ($answer == "Yes")
                        {
                            $pointsTable->deleteReviewRate($name,$review[0]["id"]);
                        }
                        header("Location: /Rating/1");
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
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}

