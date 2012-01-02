<?php
App::uses('AppController', 'Controller');
/**
 * Sizes Controller
 *
 * @property Size $Size
 */
class SizesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Size->recursive = 0;
		$this->set('sizes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Size->id = $id;
		if (!$this->Size->exists()) {
			throw new NotFoundException(__('Invalid size'));
		}
		$this->set('size', $this->Size->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Size->create();
			if ($this->Size->save($this->request->data)) {
				$this->Session->setFlash(__('The size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The size could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Size->id = $id;
		if (!$this->Size->exists()) {
			throw new NotFoundException(__('Invalid size'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Size->save($this->request->data)) {
				$this->Session->setFlash(__('The size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The size could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Size->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Size->id = $id;
		if (!$this->Size->exists()) {
			throw new NotFoundException(__('Invalid size'));
		}
		if ($this->Size->delete()) {
			$this->Session->setFlash(__('Size deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Size was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
