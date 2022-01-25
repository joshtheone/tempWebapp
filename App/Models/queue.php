<?php
class Myqueue
{
    public $capacity = 5;


    // public 
    public function __construct()
    {
        // $arry = $_SESSION["array"];

        // $available = count($arry);

    }

    public function createQueue($arry)
    {
        $available = count($arry);

        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $url = uri($uri);
        if (!empty($arry) && $arry[$available - 1] === $url[2]) {
           
        } else {


            if ($available > $this->capacity) {
                for ($i = 0; $i < $available - 1; $i++) {
                    if ($i < $available) {
                        $arry[$i] = $arry[$i + 1];
                    }
                }
                $arry[$available - 1] = $url[2];
                $_SESSION["array"] = $arry;
            } elseif ($available > 0) {
                $arry[$available] = $url[2];
                $_SESSION["array"] = $arry;
            } else {
                $arry[$available] = $url[2];
                $_SESSION["array"] = $arry;
            }
        }
        // $_SESSION["array"] = $array;
    }

    public function peek()
    {
        $available = count($_SESSION["array"]);

        $ind = $available;
        $peek = $this->array[$ind - 1];
        unset($this->array[$ind - 1]);
        return $peek;
    }
}
