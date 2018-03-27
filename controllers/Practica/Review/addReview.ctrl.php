<?php

class PracticaReviewAddReviewController extends Controller
{
    protected $view = 'Practica/review/addreview.tpl';
    protected $viewError = 'Practica/error/error404.tpl';
    protected $viewForbidden = 'Practica/error/error403.tpl';

    protected $user = false;
    protected $errors=array();

    public function build()
    {
        $this->user = Session::getInstance()->get('name');
        if($this->user){
            $this->reviewContent();
        }
        else
        {
            $this->setLayout($this->viewForbidden);
        }

    }

    public function reviewContent()
    {
        $params = $this->getParams();
        if(count($params) == 1)
        {
            $this->setLayout($this->view);
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
                if($fields['imagename']=='' || $_FILES["image"]['name'] != NULL ) //isset(..)
                {
                    $upload=$this->uploadImage();
                }
                else
                {
                    $upload=$fields['imagename'];
                }
                $saved_url=$this->saveReview($upload);
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
                $saved_url = NULL;
            }
            $this->assign("fields",$fields);
            $this->assign("imgOK",$upload);

            if($saved_url)
            {
                //insert url and id in RedirectsTable
                $model = $this->getClass('PracticaReviewsTableModel');
                $id = $model->getIdByUrl($saved_url);
                //var_dump($id);
                $redirect = $this->getClass('PracticaRedirectsTableModel');
                $redirect->newRedirect($id, $saved_url);

                //insert rating in pointsTable
                $points = $this->getClass('PracticaPointsTableModel');
                $points->rateReview($this->user, $id, $fields['rating']);

            }
        }
        else
        {
            $this->setLayout($this->viewError);
        }
    }


    protected function uploadImage(){


        $file = $_FILES["image"]; // first file

        // Checking requirements
        $upload_test = $file["error"] === 0;
        $size_test = $file["size"] <= 2097152; // size in bytes
        $type_test = $file["type"] ==='image/jpeg' || $file["type"] ==='image/png' || $file["type"] ==='image/gif'; // format testing (mime type)

        if($upload_test && $size_test && $type_test){ // true = requirements passed
            // uploading the image
            $newFilename = uniqid().'_'.$file['name'];
            $imgUp = new Images();
            $imgUp->uploadResizeAndSave( $file, 'Practica/img_uploads/'.$newFilename, 704, 528, true);
            $imgUp->uploadResizeAndSave( $file, 'Practica/img_uploads/small_'.$newFilename, 100, 100, true);

            return $newFilename;

        } else {

            // All errors will be stored in $errors array

            $this->checkValid($file===NULL, 'Insert an image!','koImgFile' );
            $this->checkValid(!$upload_test, 'Oops an error ocurred while uploading the image! Image maximum size 2Mb','koImgUpload' );
            $this->checkValid(!$size_test, 'Maximum size 2Mb','koImgSize' );
            $this->checkValid(!$type_test, 'Formats allowed: jpg or png','koImgType');

            if($file===NULL || !$upload_test || !$size_test || !$type_test)
            {
                $this->assign('koImgErrors',true);
            }

            return false;

        }

    }

    /**
     * @param $condition
     * @param $reason
     * @return bool
     */

    protected function checkValid($condition, $reason=false, $name=false ){
        if(!$condition){
            $this->errors[]=$reason;
            $this->assign($name,$reason);
            return false;
        }
        return true;
    }


    protected function saveReview($imageName){

        //koTitle, koSubject, koDate, koRate, koDescription

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
            $url = $this->generateURL($field_title,$model);
            $model->newReview($url,$field_title, $field_desc, $field_subject, $formated_date, $field_rating, $imageName, $this->user);
            header("Location: /r/".$url);
            $ok = $url;
        }else{
            $ok = false;
        }
        return $ok ;
    }

    protected function generateURL($title,$model,$idreview=false)
    {
        $url = Url::sanitizeString($title);
        $resultByURL = $model->getReview($url);
        $count=count($resultByURL);
        if($count > 0 && !$idreview)
        {
            $id=$model->getLastId();
            $id++;
            return $url."-".$id;
        }
        if  ($resultByURL)
        {
            if ($resultByURL[0]["id"] != $idreview)
            {
                $id=$model->getLastId();
                $id++;
                return $url."-".$id;
            }
        }
        return $url;
    }

    public function loadModules() {
        $modules['head']	    = 'PracticaSharedHeadController';
        $modules['footer']	    = 'PracticaSharedFooterController';
        return $modules;
    }
}

