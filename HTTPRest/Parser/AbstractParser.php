<?php
namespace HTTPRest\Parser;

abstract class AbstractParser {
    protected $data = null;

    public function __construct( $data = null)
    {
        $this->data = rtrim($data);
    }

    function isJSON($string)
    {
        // decode the JSON data
        $result = json_decode($string);

        // switch and check possible JSON errors
        if(json_last_error()) {
            return false;
        }

        // everything is OK
        return true;
    }

    abstract public function parse();
}
