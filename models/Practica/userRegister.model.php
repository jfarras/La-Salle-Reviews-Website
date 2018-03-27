<?php
/**
 * User Table Model
 */
class PracticaUserRegisterModel extends Model
{

    /**
     * @param $email email of the user to be found.
     * @return mixed returns the user with the email provided.
     */
    public function getUser($email)
    {
        $sql= <<<QUERY
SELECT name, login, password, used
FROM user
WHERE email = "$email"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * @param $name username to be checked.
     * @return return if there's any user with the name asked.
     */
    public function checkDBName($name)
    {
        $sql= <<<QUERY
SELECT name
FROM user
WHERE name = "$name"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * @param $login login of the user to be checked.
     * @return return if there's any user with the login asked.
     */
    public function checkDBLogin($login)
    {
        $sql= <<<QUERY
SELECT login
FROM user
WHERE login = "$login"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /**
     * @param $email email of the user to be checked.
     * @return return if there's any user with the email asked.
     */
    public function checkDBMail($email)
    {
        $sql= <<<QUERY
SELECT email
FROM user
WHERE email = "$email"
QUERY;

        $result = $this->getAll($sql);
        return $result;

    }

    /*
     * Inserts a new user
     */
    public function newUser($name, $login, $email, $password, $code)
    {

        $sql= <<<QUERY
INSERT INTO user
VALUES ("$name",  "$login",  "$email",  "$password", "$code", 'false')
QUERY;

        $this->execute($sql);
    }

    /*
     * Checks if the code already exists
     */
    public function checkCode($code)
    {
        $sql= <<<QUERY
SELECT used
FROM user
WHERE code =  "$code"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }
    public function checkUserByCode($code)
    {
        $sql= <<<QUERY
SELECT name
FROM user
WHERE code =  "$code"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    /*
     * Sets the code for the login provided to used
     */
    public function usedCode($code)
    {

        $sql= <<<QUERY
UPDATE user
SET used=1
WHERE code = "$code";
QUERY;

        $this->execute($sql);
    }
    public function getLogin($name)
    {
        $sql= <<<QUERY
SELECT login
FROM user
WHERE name =  "$name"
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

}
