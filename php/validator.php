<?php

class validator
{
    private $x,$y,$R;
    public function __construct($x,$y,$R)
    {
        $this->x=$x;
        $this->y=$y;
        $this->R=$R;
    }
    public function checkData(){
        return $this->validateX() && $this->validateY() && $this->validateR();
    }

    private function validateX(){
        return in_array($this->x, array(-5,-4,-3,-2,-1,0,1,2,3));
    }
    private function validateY(){
        return is_numeric($this->y) && ($this -> y > -3 && $this->y <5);
    }
    private function validateR(){
        return in_array($this->R, array(1,2,3,4,5));
    }
}

