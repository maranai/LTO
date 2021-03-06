<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Usuario Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class UsuariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session', 'Paginator', 'RequestHandler');

    public $helpers = array('Html', 'Form', 'Ajax', 'Js' => array('Jquery'));

    public $uses = array('Usuario', 'Invitacion', 'Email');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'login', 'logout', 'olvidoClave');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {


		$this->Usuario->recursive = 0;
		$this->set('usuario', $this->Paginator->paginate());
	}



    function ajax_search(){
        if ( $this->RequestHandler->isAjax() ) {
            Configure::write ('debug', 0 );
            $this->autoRender=false;
            $users=$this->Usuario->find('all',
                array(
                    'conditions'=>array(
                        'OR' => array(
                            array('Usuario.nombre LIKE'=>'%'.$_GET['term'].'%'),
                            array('Usuario.email LIKE'=>'%'.$_GET['term'].'%'),
                            array('Usuario.apellido1 LIKE'=>'%'.$_GET['term'].'%')
                        )
                    )
                ));

            $i=0;
            foreach($users as $user){
                $response[$i]['id']= $user['Usuario']['id'];
                $response[$i]['value']= $user['Usuario']['id'] . " / " . $user['Usuario']['nombre'] . ' ' . $user['Usuario']['apellido1'] . ' / ' . $user['Usuario']['email'];
                $i++;
            }
            echo json_encode($response);
        } else {
            if (!empty($this->data)) {
//            $this->set('users' ,$this->paginate(array(‘User.username LIKE’=>’%’.$this->data['User']['username'].’%’)));
            }
        }
    }



    private function enviarEmailOlvido($nombre, $apellido, $emailTo, $invitacion, $id){
        $url = Router::url('/forgot/forgot?invit=' . $id . '&code=' . $invitacion['codigo'], true);
        $email = new CakeEmail('gmail');
        $email->viewVars(array("url" => $url, "nombre" => $nombre . ' ' .$apellido));
        $email->template('olvido-clave');
        $email->emailFormat('html');
        $email->from('admin@fletescr.com');
        $email->to($emailTo);
        $email->subject('Cambio de clave fletescr.com');
        $email->send();
    }



    public function olvidoClave(){
        if ($this->request->is('post') && isset($_POST['email'])){
            if ($_POST['email'] == ""){}

            $email = $this->Email->create();
            $email['email'] = $_POST['email'];
            if (!$this->Email->validates(array('fieldList' => array('email')))) {
                $this->Redirect(array('controller' => 'transport', 'action' => 'index?emailError=1'));
                exit();
            }

            $usuario = $this->Usuario->findByEmail($_POST['email']);
            if (!empty($usuario)){
                $invitacion = $this->Invitacion->create();

                $invitacion['tipo']   =  'asdfadf';
                $invitacion['codigo']    = $this->Invitacion->crearCodigo($usuario['id']);
                $invitacion['usuario_id']    = $usuario['id'];

                if ($this->Invitacion->save($invitacion)){
                    $id = $this->Invitacion->getLastInsertID();

                    $this->enviarEmailOlvido($usuario['nombre'], $usuario['apellido1'], $usuario['email'], $invitacion, $id);

                    $this->Redirect(array('controller' => 'transport', 'action' => 'index?emailConf=1'));
                    exit();
                } else {

                }


            } else {
                $this->Redirect(array('controller' => 'transport', 'action' => 'index?usrNotFound=1'));
                exit();
            }
        }
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
//		$rols = $this->Usuario->Rol->find('list');
//		$this->set(compact('rols'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
		$rols = $this->Usuario->Rol->find('list');
		$this->set(compact('rols'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    function login() {
        // Check if they went here after submitting the form

        if(empty($this->data['btnSubmit']) == false)
        {
            // Here we validate the user by calling that method from the User model
            if(($user = $this->Usuario->validateLogin($this->data)) != false)
            {
                // Write some Session variables and redirect to our next page!
                $this->setMessage('success', "Bienvenido a fletescr.com!");

                $roles = $user['Rol'];
                $userRoles = array();

                foreach($roles as $rol){
                    $userRoles[] = $rol['id'];
                }
                $this->Auth->login($user);
                $this->Session->write('roles', $userRoles);

                // Go to our first destination!
                $this->Redirect(array('controller' => 'transport', 'action' => 'index', 'success' => '1'));
                exit();
            }
            else
            {
                $this->setMessage('error', "El usuario o clave ingresados son incorrectos.");
                $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                exit();
            }
        }
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }



}
