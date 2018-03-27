<?php


class PracticaReviewViewReviewController extends Controller
{
    protected $viewRev= 'Practica/review/reviewPage.tpl';
    protected $viewError = 'Practica/error/error404.tpl';


    public function build()
    {
        $this->setLayout($this->viewRev);

        $this->buildRev();

    }

    public function buildRev(){

        $params = $this->getParams();
        $select_model = $this->getClass('PracticaReviewsTableModel');
        $user_model = $this->getClass('PracticaUserRegisterModel');
        $redirect_model = $this->getClass('PracticaRedirectsTableModel');
        $points_model = $this->getClass('PracticaPointsTableModel');
        $URLarguments = $params['url_arguments'];

        $url = $URLarguments[0];

        if(count($params) == 1){
            $result = $select_model->getBestReview();
        }
        else{
            if (count($params) == 2 && count($params['url_arguments']) == 1)
            {
                $result = $redirect_model->getRedirect($url);
                if($result){

                    $resultTaulaReview = $select_model->getReviewById($result[0]['idReview']);
                    $points = $points_model->getSumRating($result[0]['idReview']);

                    if ($points[0]["number"] > 0)
                    {
                        $globalPoints = $points[0]["total"]/$points[0]["number"];
                    }
                    else
                    {
                        $globalPoints = "-";
                    }

                    if ($resultTaulaReview[0]['url'] != $result[0]['reviewUrl'] ){
                        header(
                            "HTTP/1.1 301 Moved Permanently"
                        );
                        header(
                            "Location:".$resultTaulaReview[0]['url']
                        );
                    }
                    else{
                        $resultTaulaUser = $user_model->getLogin($resultTaulaReview[0]['author']);
                        $this->assign('title',$resultTaulaReview[0]['title']);
                        $this->assign('description',$resultTaulaReview[0]['description']);
                        $this->assign('subject',$resultTaulaReview[0]['subject']);
                        $this->assign('author',$resultTaulaReview[0]['author']);
                        $this->assign('dateClass',$resultTaulaReview[0]['dateClass']);
                        $this->assign('rate',$globalPoints);
                        $this->assign('image',$resultTaulaReview[0]['image']);
                        $this->assign('login',$resultTaulaUser[0]['login']);
                        $values = explode(' ',$resultTaulaReview[0]["DateCreation"]);
                        $date = explode('-',$values[0]);
                        $FormatedDate = $date[2]."/".$date[1]."/".$date[0];
                        $this->assign('dateCreation',$FormatedDate);
                    }

                }
                else{
                    if (count($params) != 1) $this->setLayout($this->viewError);

                }

            }else         $this->setLayout($this->viewError);



        }





    }
    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        $modules['rating']	    = 'PracticaReviewRatingModuleController';
        $modules['modulTop10Reviews'] = 'PracticaReviewModulTopTenController';
        return $modules;
    }

}
