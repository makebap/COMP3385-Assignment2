<?php

namespace Core;

class Validator extends AbstractValidator
{
    public function validPassword($password)
    {
        $hasUpper = false;
        $hasNumber = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_upper($password[$i])) {
                $hasUpper = true;
            }
            if (ctype_digit($password[$i])) {
                $hasNumber = true;
            }
        }
        if ($hasUpper == false || $hasNumber == false || $password == "" || strlen($password) < 10) {
            return false;
        }
        return true;
    }
    public function authenticateUser($email, $password)
    {
        $errorExists = false;
        if (!(self::validEmail($email) && self::validPassword($password) && $this->db->emailQuery($email) && $this->db->checkPassword($email, $password))) {
            $errorExists = true;
        }

        if ($errorExists) {
            return false;
        } else {
            $user = $this->db->getUserInfo($email);
            $session = new Session();
            $session->setUser($user);
            return true;
        }
    }
}
