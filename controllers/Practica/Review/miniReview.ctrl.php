<?php

class PracticaReviewMiniReviewController extends PracticaHomeHomeController
{
    protected $view = 'Practica/review/miniReview.tpl';
    protected $viewError = 'Practica/error/error404.tpl';
    protected $viewForbidden = 'Practica/error/error403.tpl';

    /**
     * Aquest métode sempre s'executa i caldrà implementar-lo sempre.
     */
    public function build(){

        //cas home
        $select_model = $this->getClass('PracticaReviewsTableModel');
        $pointsTable = $this->getClass('PracticaPointsTableModel');

        $result = $select_model->getLastReviews();
        foreach ($result as &$valor) {
            $valor['description'] = substr(html_entity_decode(strip_tags($valor['description'])),0,50);
            $values = explode(' ',$valor["DateCreation"]);
            $date = explode('-',$values[0]);
            $valor["DateCreation"] = $date[2]."/".$date[1]."/".$date[0];

            $totalPoints = $pointsTable->getSumRating($valor["id"]);

            if ($totalPoints[0]["number"] > 0)
            {
                $globalPoints = round($totalPoints[0]["total"]/$totalPoints[0]["number"],1);
            }
            else
            {
                $globalPoints = "-";
            }
            $valor["points"] = $globalPoints;
        }
        $this->setLayout($this->view);
        $this->assign('result',$result);

    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}