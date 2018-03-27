<?php

class PracticaReviewRatingModuleController extends Controller
{
    protected $view = 'Practica/review/ratingModule.tpl';

    public function build()
    {
        $user = Session::getInstance()->get('name');
        if(!$user){
            $this->assign("noLogin",true);
        }
        $this->ratingForm($user);
    }

    public function ratingForm($name)
    {
        $params = $this->getParams();
        if(count($params) == 2)
        {
            $url = $params['url_arguments'][0];
            $reviewsTable = $this->getClass('PracticaReviewsTableModel');

            $review = $reviewsTable->getReview($url);

            if ($review)
            {
                $pointsTable = $this->getClass('PracticaPointsTableModel');
                $totalPoints = $pointsTable->getSumRating($review[0]["id"]);

                if ($totalPoints[0]["number"] > 0)
                {
                    $this->assign("totalRate",round($totalPoints[0]["total"]/$totalPoints[0]["number"],1)."/10");
                    $this->assign("numRates",$totalPoints[0]["number"]);
                }
                else
                {
                    $this->assign("totalRate","This review has not been rated.");
                    $this->assign("numRates",0);
                }

                $points = $this->loadPoints($name,$review[0]["id"],$pointsTable);
                $this->setLayout($this->view);
                if(Filter::isSent("rateForm"))
                {
                    $this->saveRating($name,$review[0]["id"],$points);
                }
            }
        }
    }

    private function loadPoints($name, $id, $pointsTable)
    {

        $userPoints = $pointsTable->getUserReviewRate($name,$id);

        if ($userPoints) {
            $this->assign("userRate",$userPoints[0]["points"]);
            return $userPoints[0]["points"];
        }
        return 0;
    }

    protected function checkValid($condition, $reason=false
    ){
        if(!$condition)
        {
            $this->errors[]=$reason;
            return false;
        }
        return true;
    }

    protected function saveRating($name, $id, $points)
    {

        #------------------- Checking -----------------------
        $field_rating = Filter::getInteger('rating');
        $ratingOk = $this->checkValid($field_rating<=10 && $field_rating>0, 'Rate 1 to 10' ); /*not empty*/

        #--------------- Save ----------------------
        if($ratingOk)
        {
            $pointsTable = $this->getClass('PracticaPointsTableModel');
            if (!$points) $pointsTable->rateReview($name, $id, $field_rating);
            else $pointsTable->changeRate($name, $id, $field_rating);
            header("Location: /Rating/1");
        }
        else
        {
            echo '<script>alert("'.implode('\n',$this->errors).'");</script>';
        }
    }
}

