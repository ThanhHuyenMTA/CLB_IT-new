<?php

/**
 * Description of Apply
 * @author Thinhnd
 * @date Jul 12, 2016
 * 
 */

namespace Admin\Model\Entity;

use Cake\ORM\Entity;

class Job extends Entity{
    const UNIT_TIME = 1;
    const UNIT_DATE = 2;
    const UNIT_MONTH = 3;
    const ACTIVE = 1;
    const NON_ACTIVE = 0;
    const DELETED = 1;
    const NON_DELETED = 0;

    public static function getUnit($type=null){
        $listUnit = array(
            Job::UNIT_TIME => 'Giờ',
            Job::UNIT_DATE => 'Ngày',
            job::UNIT_MONTH => 'Tháng',
        );
        if(isset($listUnit[$type])){
            return $listUnit[$type];
        }
        return $listUnit;
    }
}
