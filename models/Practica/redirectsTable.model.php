<?php
/**
 * Redirect Table Model
 */
class PracticaRedirectsTableModel extends Model
{
    /**
     * @param $idReview id of the review.
     * @return mixed returns the review id of the given url.
     */
    public function getRedirect($url)
    {
        $sql= <<<QUERY
SELECT *
FROM redirects
WHERE reviewUrl = "$url"
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * Adds a new redirection.
     * @param $idReview id of the review.
     * @param $reviewUrl new url of the review.
     */
    public function newRedirect($idReview, $reviewUrl)
    {

        $sql= <<<QUERY
INSERT INTO redirects (idReview, reviewUrl)
VALUES ("$idReview", "$reviewUrl")
QUERY;

        $this->execute($sql);
    }

    /**
     * Deletes all the redirects of the given review.
     * @param $idReview id of the review.
     */
    public function deleteRedirects($idReview)
    {

        $sql= <<<QUERY
DELETE FROM redirects
WHERE idReview = "$idReview"
QUERY;

        $this->execute($sql);
    }
}