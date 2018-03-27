<?php
/**
 * Reviews Table Model
 */
class PracticaReviewsTableModel extends Model
{

    /**
     * @param $name author of the reviews.
     * @param $offset offset of the reviews to be shown.
     * @return mixed returns the 10 reviews after the offset.
     */
    public function getUserReviews($name, $offset)
    {
        $sql= <<<QUERY
SELECT *
FROM reviews
WHERE author = '$name'
LIMIT $offset, 10
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * @param $name name of the author of the reviews.
     * @return mixed returns the number of reviews of that author.
     */
    public function getUserReviewsSize($name)
    {
        $sql= <<<QUERY
SELECT COUNT(*)
FROM reviews
WHERE author = '$name'
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * @param $url url of the review.
     * @return mixed returns the review with that title.
     */
    public function getReview($url)
    {
        $sql= <<<QUERY
SELECT *
FROM reviews
WHERE url = '$url'
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    public function getReviewByID($id)
    {
        $sql= <<<QUERY
SELECT *
FROM reviews
WHERE id = '$id'
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * Adds a new review.
     * @param $url url of the review.
     * @param $title title of the review.
     * @param $description description of the review.
     * @param $subject subject of the review.
     * @param $dateClass class date of the review.
     * @param $points points of the review.
     * @param $image image of the review.
     * @param $author author of the review.
     */
    public function newReview($url, $title, $description, $subject, $dateClass, $points, $image, $author)
    {

        $sql= <<<QUERY
INSERT INTO reviews(url, title, description, subject, dateClass, points, image, author)
VALUES ('$url', '$title', '$description', '$subject', '$dateClass', '$points', '$image', '$author')
QUERY;

        $this->execute($sql);
    }

    /**
     * Updates the review which title is oldTitle.
     * @param $oldUrl original title of the review.
     * @param $url new url of the review.
     * @param $title new title of the review.
     * @param $description new description of the review.
     * @param $subject new subject of the review.
     * @param $dateClass new class date of the review.
     * @param $points new points of the review.
     * @param $image new image of the review.
     */
    public function updateReview($oldUrl, $url, $title, $description, $subject, $dateClass, $points, $image)
    {
        $sql= <<<QUERY
UPDATE reviews
SET url = '$url', title = '$title', description = '$description', subject = '$subject', dateClass = '$dateClass', points = '$points', image = '$image'
WHERE url = '$oldUrl'
QUERY;

        $this->execute($sql);
    }

    /**
     * Deletes the review with the given title.
     * @param $url url of the review to be deleted.
     */
    public function deleteReview($url)
    {
        $sql= <<<QUERY
DELETE FROM reviews
WHERE url = '$url'
QUERY;

        $this->execute($sql);
    }

    public function searchReview($search_term,$offset)
    {

        $sql= <<<QUERY
SELECT *
FROM reviews
WHERE title LIKE '%{$search_term}%' OR description LIKE '%{$search_term}%'
LIMIT $offset, 10
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    public function getIdByUrl($url){
        $sql= <<<QUERY
SELECT id
FROM reviews
WHERE url='{$url}'
QUERY;

        $result = $this->getRow($sql);
        return (int)$result['id'];
    }


    public function getLastId(){
        $sql= <<<QUERY
SELECT id
FROM reviews
ORDER BY id DESC
LIMIT 1
QUERY;

        $result = $this->getRow($sql);
        return (int)$result['id'];
    }

    public function getLastReviews () {

        $sql= <<<QUERY
SELECT *
FROM reviews
ORDER BY DateCreation DESC
LIMIT 10
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    public function getLastImages () {

        $sql= <<<QUERY
SELECT image
FROM reviews
ORDER BY DateCreation DESC
LIMIT 10
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    public function getRatingList($offset) {

        $sql= <<<QUERY
SELECT *
FROM reviews
ORDER BY points DESC
LIMIT $offset, 10
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    public function getRatingReviewsSize()
    {
        $sql= <<<QUERY
SELECT COUNT(*)
FROM reviews
ORDER BY points DESC
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }
}
