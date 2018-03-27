<?php


class PracticaReviewModulTopTenController extends Controller
{
    protected $viewRev= 'Practica/review/Top10Reviews.tpl';


    public function build(){

        //cas home
        $select_model = $this->getClass('PracticaReviewsTableModel');
        $pointsTable = $this->getClass('PracticaPointsTableModel');
        $result = $pointsTable->get10BestReviews();
        foreach ($result as &$valor) {

        if ($valor["avg_points"] > 0)
        {
            $globalPoints = round($valor["avg_points"],1);
        }
        else
        {
            $globalPoints = "-";
        }
        $valor["avg_points"] = $globalPoints;

        $this->assign('result',$result);
        $this->setLayout($this->viewRev);
        }
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }

}
