<?php

class PracticaReviewRatingReviewController extends Controller
{
    protected $view = 'Practica/review/ratingList.tpl';
    protected $viewError = 'Practica/error/error404.tpl';

    public function build()
    {
        $user = Session::getInstance()->get('name');
        if(!$user){
            $this->assign("noLogin",true);
        }
        $this->ratingList($user);
    }

    public function ratingList($name)
    {
        $params = $this->getParams();
        if(count($params) == 2)
        {
            if (count($params['url_arguments']) == 1)
            {
                $offset = $params['url_arguments'][0];
                $this->loadList($name, $offset);
            }
            else $this->setLayout($this->viewError);
        }
        else $this->setLayout($this->viewError);
    }

    private function loadList($name,$offset)
    {
        $reviewsTable = $this->getClass('PracticaReviewsTableModel');

        $max = $reviewsTable->getRatingReviewsSize()[0]['COUNT(*)'];
        if ($max%10 == 0) $pag = $max/10;
        else $pag = ($max+(10-$max%10))/10;

        if ($offset > $pag || $offset <= 0)$this->setLayout($this->viewError);
        else
        {
            $reviewsArray = array();
            $reviews = $reviewsTable->getRatingList(($offset-1)*10);
            $pointsTable = $this->getClass('PracticaPointsTableModel');

            $this->setLayout($this->view);

            $this->assign("offset", $offset);

            if ($reviews) {
                foreach($reviews as $review)
                {
                    $totalPoints = $pointsTable->getSumRating($review["id"]);
                    $userPoints = $pointsTable->getUserReviewRate($name,$review["id"]);

                    if ($totalPoints[0]["number"] > 0)
                    {
                        $globalPoints = round($totalPoints[0]["total"]/$totalPoints[0]["number"],1)."/10";
                        $ratingNum = $totalPoints[0]["number"];
                    }
                    else
                    {
                        $globalPoints = "-";
                        $ratingNum = "0";
                    }

                    if ($userPoints)
                    {
                        $givenPoints = $userPoints[0]["points"]."/10";
                        $values = explode(' ',$userPoints[0]["date"]);
                        $date = explode('-',$values[0]);
                        $ratingDate = $date[2]."/".$date[1]."/".$date[0];
                        $deleteLink = true;
                    }
                    else
                    {
                        $givenPoints = "-";
                        $ratingDate = "-";
                        $deleteLink = false;
                    }

                    $ratedReview = array(
                        "review" => $review,
                        "globalPoints" => $globalPoints,
                        "ratingNum" => $ratingNum,
                        "ratingDate" => $ratingDate,
                        "givenPoints" => $givenPoints,
                        "deleteLink" => $deleteLink
                    );

                    $reviewsArray[] = $ratedReview;
                }

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
                $this->assign("reviews",$reviewsArray);
            }
            else
            {
                $this->assign("noReviews","There are no reviews to rate");

            }
        }
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}

