<?php
namespace HTTPRest\Parser;


class XML extends AbstractParser {

    private $xml = null;
    function __construct( $request ){
        parent::__construct( $request );
    }

    public function parse(){

        if($this->isJSON($this->data)){

            $this->data = json_decode($this->data, true);
        }else{
            if(is_string($this->data)) {
                $tempArray[] = $this->data;
                $this->data = $tempArray;
            }
        }

        $this->xml = new \SimpleXMLElement('<xml/>');

        $response = $this->xml->addChild('response');
        foreach($this->data as $key => $value){
            if(!empty($key)){
                $response->addChild($key, $value);
            } else {
                $response->addChild('data',$value);
            }
        }

        header('Content-type: text/xml');
        return $this->xml->asXml();
        
    }
}