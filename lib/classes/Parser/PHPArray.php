<?php
include_once '/Users/serbay/Projects/myProjects/http-client/lib/init.php';


class PHPArray extends AbstractParser {

    private $assoc;

    function __construct( $request , $assoc = true ){
        parent::__construct( $request );
        $this->assoc = $assoc;
    }

    public function parse(){

        if($this->isJSON($this->data)){

            return json_decode($this->data, $this->assoc);
        }else{
            if(is_string($this->data)) {
                $tempArray[] = $this->data;
                return $tempArray;
            }
        }
        
    }
}