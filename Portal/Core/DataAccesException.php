<?php

class DataAccesException extends Exception {

    public function __construct($message){
        parent::__construct($message, $code = null, $previous = null);
    }
}

