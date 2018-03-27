<?php


class PracticaReviewModulReviewController extends Controller
{
    protected $viewRev= 'Practica/review/modulReview.tpl';


    public function build()
    {
        $this->setLayout($this->viewRev);

        $this->buildRev();

    }

    public function buildRev()
    {
        $pointsTable = $this->getClass('PracticaPointsTableModel');
        $user_model = $this->getClass('PracticaUserRegisterModel');

        $idBest = $pointsTable->getBestReview();

        if($idBest)
        {
            $reviewsTable = $this->getClass('PracticaReviewsTableModel');
            $result = $reviewsTable->getReviewByID($idBest[0]["idReview"]);

            $totalPoints = $pointsTable->getSumRating($result[0]["id"]);

            if ($totalPoints[0]["number"] > 0)
            {
                $globalPoints = round($totalPoints[0]["total"]/$totalPoints[0]["number"],1);
            }
            else
            {
                $globalPoints = "-";
            }
            $resultTaulaUser = $user_model->getLogin($result[0]['author']);

            $values = explode(' ',$result[0]["DateCreation"]);
            $date = explode('-',$values[0]);
            $FormatedDate = $date[2]."/".$date[1]."/".$date[0];
            $this->assign('formatedDate',$FormatedDate);
            $this->assign('bestRev',$result[0]);
            $this->assign('login',$resultTaulaUser[0]['login']);
            $this->assign('globalPoints',$globalPoints);
        }
        else
        {
            $this->assign('noReviews',true);

        }
    }


}
