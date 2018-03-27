<?php
class PracticaReviewSearchPageController extends Controller
{
    protected $viewError = 'Practica/error/error404.tpl';

    public function build( )
    {
        $params = $this->getParams();
        if(count($params) == 1){

        $this->setLayout( 'Practica/review/searchPage.tpl');
        $this->processSearch();

        }else        $this->setLayout($this->viewError);


    }
    private function processSearch()
    {
        if(Filter::isSent("searchbar"))
        {
            $query=Filter::getString("searchbar");
            $offset = 1;
            $offset = 10*($offset-1);
            $this->search($offset,$query);

        }elseif(Filter::isSent("searchquery")){
            $query=Filter::getString("searchquery");
            $offset=(int)Filter::getString("currentpage");

            if(Filter::isSent("next")){
                $offset++;
            }elseif ($offset!=1){
                $offset--;
            }
            $offset = 10*($offset-1);
           $this->search($offset,$query);

        }else{
            $this->assign("issent",false);
        }
    }

   private function search($offset, $query){
        if(strlen($query)>0)
        {
            $this->assign("issent",true);
            $model = $this->getClass('PracticaReviewsTableModel');
            $result=$model->searchReview($query,$offset);

            foreach ($result as &$value)
            {
                $value['description'] = substr(html_entity_decode(strip_tags($value['description'])),0,50);
            }
            $this->assign("hasresults",count($result)>0 ); // results is not empty
            $this->assign("result",$result);
            $this->assign("query",$query);
            $offset=($offset/10)+1;
            $this->assign("offset",$offset);
            if($offset!=1){
                $this->assign("prev",true);
            }else{
                $this->assign("prev",false);
            }
            if(count($result)<10){
                $this->assign("next",false);
            }else{
                $this->assign("next",true);
            }

        }else{
            $this->assign("issent",false);
        }
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        $modules['search']      = 'PracticaReviewSearchReviewController';
        $modules['modulTop10Reviews'] = 'PracticaReviewModulTopTenController';

        return $modules;
    }
}