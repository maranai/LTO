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
	public $components = array('Paginator');

    public $uses = array('Usuario', 'Invitacion');

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




    public function olvidoClave(){
        if ($this->request->is('post') && isset($_POST['email'])){

            $usuario = $this->Usuario->findByEmail($_POST['email']);
            if (!empty($usuario)){

                $invitacion = $this->Invitacion->create();

                $invitacion['tipo']   =  'asdfadf';
                $invitacion['codigo']    = $this->Invitacion->crearCodigo($usuario['id']);
                $invitacion['creada_en']    = gmdate('c');
                $invitacion['usuario_id']    = $usuario['id'];

                $this->Invitacion->save($invitacion);

                $email = new CakeEmail();
                $email->from(array('soporte@fletescr.com' => 'My Site'));
                $email->to('maranai@gmail.com');
                $email->subject('About');
                $email->send('My message');


                $this->Redirect(array('controller' => 'transport', 'action' => 'index?emailConf=1'));
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

    function login() {
        // Check if they went here after submitting the form

        if(empty($this->data['btnSubmit']) == false)
        {
            // Here we validate the user by calling that method from the User model
            if(($user = $this->Usuario->validateLogin($this->data)) != false)
            {
                // Write some Session variables and redirect to our next page!
                $this->Session->setFlash('Thank you for logging in!');
                $this->Session->write('Usuario', $user);

                // Go to our first destination!
                $this->Redirect(array('controller' => 'transport', 'action' => 'index', 'success' => '1'));
                exit();
            }
            else
            {
                $this->Session->setFlash('Incorrect username/password!', true);
                $this->Redirect(array('action' => 'login_form'));
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