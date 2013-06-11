<?php

class AuthorityComponent extends Component
{
    var $initialized = false;
    var $crud_actions = array('index' => 'read', 'view' => 'read',
                              'add' => 'create', 'edit' => 'update', 'delete' => 'delete');

    /*
     * Defines then custom controller mappings, if you are following cake controllers and actions conventions you could not
     * need to map your controller here, it will use the controller name and will map the controller action to $crud_actions
     */
    var $mappings = array(
        //'controller_name' => array('model' => 'model_name', 'actions' => array('action_name' => 'authority_key'))
    );


    function getAuthority($controller, $action = "index"){
        $actions = array_merge(array(), $this->crud_actions); //includes crud mapping

        $authority_action = (isset($actions[$action])) ? $actions[$action] : $action;
        $authority_model = $controller;

        $mappings = $this->mappings;
        if (isset($mappings[$controller])){
            $authority_model = (isset($mappings[$controller]['model'])) ? $mappings[$controller]['model'] : $controller;
            if (isset($mappings[$controller]['actions'])){
                $actions = array_merge($actions, $mappings[$controller]['actions']); //includes controller mapping
            }
            $authority_action = (isset($actions[$action])) ? $actions[$action] : $action;
        }

        $authority = $authority_action . "_" . $authority_model;
        $this->log(sprintf('Controller: %s, Action: %s, Authority: %s', $controller, $action, $authority), 'info');
        return $authority;
    }

}