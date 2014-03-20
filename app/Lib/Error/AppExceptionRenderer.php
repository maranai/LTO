<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/6/14
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
}
