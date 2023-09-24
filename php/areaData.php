<?php

class areaData{

    private $testName;
    public function __construct($testNameForFunc)
    {
        $this -> testName = $testNameForFunc;
    }

    public function getName(){
        return $this -> testName;
    }
    /*
    if this coordinates are in the area return true 
    else return false
    usufull comments btw
    */
    public function areaCheck($x,$y,$R){
        // return "testInfo";
        //second rotation
        if($x>0 && $x*$y < 0){
            // return "lol";
            return true;
        }
        //okrusnos in third rotation
        elseif( $x<0 && $x*$y>0 && ($x*$x+$y*$y) < sqrt($R)){
            return true;
        }    
        //тут дырка на самом деле...
        elseif(0.5*($R/2)-1<0 && $x*$y<0){
            return true;
        }
        return false;
    }

}

?>