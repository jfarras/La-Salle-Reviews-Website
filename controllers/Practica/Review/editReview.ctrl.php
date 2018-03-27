<?php
require_once 'addReview.ctrl.php';

class PracticaReviewEditReviewController extends PracticaReviewAddReviewController
{
    protected $view = 'Practica/review/editReview.tpl';

    /**
     * Sets the content of the page
     */
    public function reviewContent()
    {
        $params = $this->getParams();
        if(count($params) == 2)
        {
            if (count($params['url_arguments']) == 1)
            {
                $url = $params['url_arguments'][0];
                $idReview = $this->loadReview($url,$this->user);
                if ($idReview)
                {
                    $upload=false;
                    if(Filter::isSent("submitForm"))
                    {
                        $fields=array(
                            "title"=>Filter::getString("title"),
                            "subject"=>Filter::getString("subject"),
                            "date"=>Filter::getString("date"),
                            "imagename"=>Filter::getString("imagename"),
                            "rating"=>Filter::getString("rating"),
                            "description"=>Filter::getString("description")
                        );
                        if($fields['imagename']=='' || $_FILES["image"]['name'] != NULL ){ //isset(..)
                            $upload=$this->uploadImage();
                        }else{
                            $upload=$fields['imagename'];
                        }
                        $this->updateReview($upload,$url,$idReview);
                    }
                    else
                    {
                        $fields=array(
                            "title"=>'',
                            "subject"=>'',
                            "date"=>'',
                            "imagename"=>'',
                            "rating"=>'',
                            "description"=>''
                        );
                    }
                    $this->assign("fields",$fields);
                    $this->assign("imgOK",$upload);
                }
                else
                {
                    $this->setLayout($this->viewForbidden);
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

    private function loadReview($url, $name)
    {
        $reviews = $this->getClass('PracticaReviewsTableModel');
        $review = $reviews->getReview($url);
        if ($review)
        {
            if ($review[0]["author"] == $name){
                //Review exists
                $values = explode('/',$review[0]['dateClass']);
                $dateFormat = "$values[2]-$values[1]-$values[0]";
                $this->assign('review',$review[0]);
                $this->assign('dateFormat',$dateFormat);
                $this->setLayout($this->view);
                return $review[0]["id"];
            }
            else return false;
        }
        return false;
    }

    protected function updateReview($imageName,$oldUrl,$idReview){

        #------------------- Checking -----------------------
        $this->checkValid((bool)$imageName);
        $field_title = Filter::getString('title');
        $this->checkValid(strlen($field_title)<=100 && strlen($field_title)>0, 'Insert a title with a maximum of 100 characters','koTitle' );
        $field_subject = Filter::getString('subject');
        $this->checkValid(strlen($field_subject)>0 , 'Insert the subject','koSubject'); /*not empty*/
        $field_date = Filter::getString('date');
        $this->checkValid(strlen($field_date)>0 && strtotime($field_date)<= time(), 'Insert a valid date','koDate' ); /*not empty and current or earlier date*/
        $field_rating=Filter::getInteger('rating');
        $this->checkValid($field_rating<=10 && $field_rating>0, 'Rate 1 to 10', 'koRate' ); /*not empty*/


        $field_desc =Filter::getString('description');
        if( strlen($field_desc) < 10 ){
            $field_desc = strip_tags($field_desc);
        }

        $this->checkValid(strlen($field_desc)>0, 'Insert a description','koDescription' );


        #--------------- Save ----------------------
        if(count($this->errors)==0){

            $formated_date = date('d/m/Y',strtotime($field_date));
            $model = $this->getClass('PracticaReviewsTableModel');
            $modelPoints = $this->getClass('PracticaPointsTableModel');
            $url = $this->generateURL($field_title,$model,$idReview);
            if (strcmp($url,$oldUrl) != 0)
            {
                $model_redirect = $this->getClass('PracticaRedirectsTableModel');
                $model_redirect->newRedirect($idReview,$url);
            }
            $model->updateReview($oldUrl, $url, $field_title, $field_desc, $field_subject, $formated_date, $field_rating, $imageName);
            $modelPoints->changeRate($this->user, $url, $field_rating);
            header("Location: /r/".$url);
            $ok = true;
        }else{
            echo '<script>alert("'.implode('\n',$this->errors).'");</script>';
            $ok = false;
        }
        return $ok ;
    }
}

