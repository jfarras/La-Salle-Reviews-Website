<?php
/**
 * Redirect Table Model
 */
class PracticaPointsTableModel extends Model
{


    public function rateReview($name, $id, $points)
    {
        $sql= <<<QUERY
INSERT INTO reviewpoints (idReview, name, points)
VALUES ('$id', '$name', '$points')
QUERY;

        $this->execute($sql);
    }

    public function changeRate($name, $id, $points)
    {
        $sql= <<<QUERY
UPDATE reviewpoints
SET points = '$points'
WHERE idReview = '$id' AND name = "$name"
QUERY;

        $this->execute($sql);
    }

    /**
     * @param $id id of the review.
     * @param $name name of the user.
     * @return mixed returns how many points did the user set to the review.
     */
    public function getUserReviewRate($name, $id)
    {
        $sql= <<<QUERY
SELECT points, date
FROM reviewpoints
WHERE idReview = "$id" AND name = "$name"
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }


    /**
     * @param $id id of the review.
     * @return mixed returns the sum of the points given to the url except those given by the user.
     */
    public function getSumRating($id)
    {

        $sql= <<<QUERY
SELECT SUM(points) AS total, count(points) AS number
FROM reviewpoints
WHERE idReview = "$id"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    public function getBestReview() {

        $sql= <<<QUERY
SELECT idReview, avg(points) AS avg_points
FROM reviewpoints
GROUP BY idReview
ORDER BY avg_points DESC
LIMIT 1
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    public function get10BestReviews() {

        $sql= <<<QUERY
SELECT idReview, avg(rp.points) AS avg_points, title,url
FROM reviewpoints AS rp,reviews AS r
WHERE rp.idReview = r.id
GROUP BY idReview
ORDER BY avg_points DESC
LIMIT 10
QUERY;
        $result = $this->getAll($sql);
        return $result;
    }

    public function deleteReviewRate($name, $id)
    {
        $sql= <<<QUERY
DELETE FROM reviewpoints
WHERE idReview = "$id" AND name = "$name"
QUERY;

        $this->execute($sql);
    }

    public function deleteIDRatings($id)
    {
        $sql= <<<QUERY
DELETE FROM reviewpoints
WHERE idReview = "$id"
QUERY;

        $this->execute($sql);
    }
}

