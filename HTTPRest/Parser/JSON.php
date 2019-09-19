<?php
namespace HTTPRest\Parser;


class JSON extends AbstractParser {

    function __construct( $request ){
        parent::__construct( $request );
    }

    public function parse(){

        if($this->isJSON($this->data)){
            return $this->data;
        }else{
            return json_encode($this->data);
        }
        
    }
}