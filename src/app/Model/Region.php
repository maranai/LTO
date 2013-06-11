<?php
/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:14 AM
 */

class Region extends AppModel
{

    public $hasMany = array('University');

    function getAllRegions(){
        $r = $this->find('list', array(
            'recursive' => 0,
            'fields' => array ('Region.id', 'Region.name')));
        return $r;
    }

}

?>