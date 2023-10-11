<?php

class areaData{

    /*
    /if these coordinates are in the area return true
    /else return false
    /useful comments btw
    */
    public function areaCheck($x,$y,$R)
    {
        //Second rotation
        if ($x <= 0 && $y >= 0) {
            if (($x >= -$R) && ($y <= $R)) {
                return "Попадание";
            }
        } //third rotation
        elseif ($x <= 0 && $y <= 0) {
            if (($x * $x + $y * $y) <= $R * $R) {
                return "Попадание";
            }
        } //fourth rotation
        elseif ($x >= 0 && $y <= 0) {
            if (($x <= $R) && ($y > $R) && (0.5 * $x - 0.5 <= $R)) {
                return "Попадание";
            }
        }
        return "Промах";
    }
}
?>