<?php
/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:21 AM
 */

class University extends AppModel
{

    public $belongsTo = array('Region');
    public $hasMany = array('Program');

    function getUniversitiesByRegionId($regionId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('University.region_id' => $regionId)
        ));
        return $r;
    }

    function getUniversityList(){
        $r = $this->find('list', array(
            'recursive' => 0,
            'fields' => array ('University.id', 'University.name'),
            'order' => 'University.name'
        ));
        return $r;
    }

    function getUniversities(){
        $r = $this->find('all', array(
            'recursive' => -1,
            'fields' => array ('University.*'),
            'order' => 'University.name'
        ));
        return $r;
    }

}

?>