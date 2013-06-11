<?php

class User extends AppModel
{
//    public static $TEAM_LEAD = "TEAM_LEAD";
//    public static $CORP_MEMBER = "CORP_MEMBER";
//    public static $SITE_MANAGER = "SITE_MANAGER";
//    public static $PROJECT_DIRECTOR = "PROJECT_DIRECTOR";
//    public static $NATIONAL_RESEARCH = "NATIONAL_RESEARCH";

    public static $userTypes = array('CORP_MEMBER' => 'Corp Member',
                                      'TEAM_LEAD' => 'Team Lead',
									 'SITE_MANAGER' => 'Site Manager',
                                     'PROJECT_DIRECTOR' => 'Project Director',
                                     'NATIONAL_RESEARCH' => 'National Research');

   public $belongsTo = array('Classroom', 'University', 'Region');

    var $virtualFields = array(
        'full_name' => 'CONCAT(User.first_name, " ", User.last_name)'
    );

    function validationRules(){
        $this->validate = array(
            'password' => $this->passwordValidationRule(),
            //'password_confirm' => $this->passwordConfirmValidationRule(),
            'email' => $this->emailValidationRule()
        );
    }


    function passwordValidationRule(){
        if (isset($this->data[$this->name][ 'confirm_password' ])){
            return array(
                    'length-rule' => array(
                        'rule' => array('minLength', '8'),
                        'message' => __('Minimum 8 characters long')),
                    'match-rule' => array(
                        'rule' => array('equalTo', $this->data[$this->name][ 'confirm_password' ]),
                        'message' => __('Password mismatch'))
                );
        }
        else{
            return array(
                    'length-rule' => array(
                        'rule' => array('minLength', '8'),
                        'message' => __('Minimum 8 characters long'))
                );

        }
    }
    function passwordConfirmValidationRule(){
            return array(
                    'match-rule' => array(
                        'rule' => array('equalTo', $this->data[$this->name][ 'password' ]),
                        'message' => __('Password mismatch'))
                );
    }

    function emailValidationRule(){
        return array(
                'format-rule' => array(
                'rule' => 'email',
                'required' => true,
                'message' => __('Invalid email')),

                'unique-rule' => array(
                'rule' => 'isUnique',
                'required' => true,
                'message' => __('This email is already taken')
                )
        );
    }

    function getUsersByClassroomId($classroomId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('User.classroom_id' => $classroomId)
        ));
        return $r;
    }

    function getUsersByUniversityId($universityId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('User.university_id' => $universityId)
        ));
        return $r;
    }

    function getUsersByRegionId($regionId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('User.university_id' => $regionId)
        ));
        return $r;
    }

    function getUserByUsernameAndPassword($username, $password){
        $criteria = array('User.username' => $username, 'User.password' => $password);
        $r = $this->find('first',
            array(
                'recursive' => -1,
                'conditions' => $criteria,
                'fields' => array ('User.*')
            ));
        return $r;
    }

    function getUserList(){
        $r = $this->find('all',
            array(
                'recursive' => -1,
                'fields' => array ('User.*'),
                'order' => 'User.first_name, User.last_name'
            ));
        return $r;
    }

    function password_old($data)
    {
        $password = $this->field('password', array('User.id' => $this->id));
        $this->log($password ,'debug');
        $this->log(Security::hash($data['password_old'], null, true) ,'debug');
        return $password === Security::hash($data['password_old'], null, true);
    }

    function profile_password_old($data)
    {
        $password = $this->field('password', array('User.id' => $this->id));
        $this->log($password ,'debug');
        $this->log(Security::hash($data['profile_password_old'], null, true) ,'debug');
        return $password === Security::hash($data['profile_password_old'], null, true);
    }

    function findByUsername($username){
        $r = $this->find('first', array(
            'recursive' => -1,
            'conditions' => array('User.username' => $username),
            'fields' => array ('User.*')
        ));
        return $r;
    }

    function getUsersUnderUniversity($universityId){
        $r = $this->find('all', array(
            'recursive' => 0,
            'conditions'=> array('User.classroom_id=ClassroomTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'UniversityTable',
                    'type' => 'left',
                    'conditions'=> array('UniversityTable.id'=> $universityId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'Program',
                    'type' => 'left',
                    'conditions'=> array('UniversityTable.id=Program.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=Program.id')
                ),
                array(
                    'table' => 'users',
                    'alias' => 'UserTable',
                    'type' => 'left',
                    'conditions'=> array('UserTable.classroom_id=ClassroomTable.id')
                )
            ),
            'fields' => array ('User.*'),
            'group' => array ('User.id'),
            'order' => 'User.first_name, User.last_name'
        ));
        return $r;
    }

}

?>