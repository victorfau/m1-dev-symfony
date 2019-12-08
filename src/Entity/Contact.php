<?php
/**
 * author : victor fau
 * contact : victorrfau@gmail.com
 * context : school
 */

namespace App\Entity;


class Contact {
    private $mail;
    private $message;

    /**
     * @return mixed
     */
    public function getMail (){
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail ($mail): void{
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMessage (){
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage ($message): void{
        $this->message = $message;
    }

}