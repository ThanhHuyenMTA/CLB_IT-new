<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Entity;

use Cake\ORM\Entity;

class TimeWork extends Entity{
    
    protected function _setTimeservingFrom($value){
        return date('H:i:s', strtotime($value));
    }
    
    protected function _setTimeservingTo($value){
        return date('H:i:s', strtotime($value));
    }
}
