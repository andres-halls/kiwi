<?php

class personalcode{
    public $result         = array();
    private $age           = NULL;
    private $birthdate     = NULL;
    private $personalcode  = NULL;

    public function __construct($personalcode){
        // siin oleks mõistlik isikukood valideerida
        $this->personalcode = $personalcode;
        $this->doMagicWithPersonalcode();
    }

    public function doMagicWithPersonalcode(){
        $this->birthdate();
        $this->ageInYears();

        return $this->result;
    }

    private function birthdate(){
        $this->birthdate             = $this->century().substr($this->personalcode, 1, 2).'-'.substr($this->personalcode, 3, 2).'-'.substr($this->personalcode, 5, 2);
        $this->result['DateOfBirth'] = $this->birthdate;
    }

    private function century(){
        $century = array(1 => array('Man', '18'),
            array('Woman', '18'),
            array('Man', '19'),
            array('Woman', '19'),
            array('Man', '20'),
            array('Woman', '20'));

        // Get personalcode first digit
        $digit = substr($this->personalcode, 0, 1);

        return $century[$digit][1];
    }

    private function ageInYears($splitter = '-'){
        list($day, $month, $year) = explode($splitter, $this->birthdate);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;

        if ($month_diff < 0){
            $year_diff--;
        }
        elseif (($month_diff==0) && ($day_diff < 0)){
            $year_diff--;
        }

        $this->age           = $year_diff;
        $this->result['Age'] = $year_diff;
    }
}

$personalcode = new personalcode(37605030299);
?> 