<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Staff Controller
 *
 * @property \App\Model\Table\StaffTable $Staff
 *
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function isAuthorized($user) {
        return true;
    }

    public function index() {
        $staff = $this->paginate($this->Staff);

        $this->set(compact('staff'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $staff = $this->Staff->get($id, [
            'contain' => [],
        ]);

        $this->set('staff', $staff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
       /* if ($this->request->session()->read('Meal.id') == false) {
            $this->Flash->error(__('Staff must be added from a meal'));
            return $this->redirect(['controller' => 'meals', 'action' => 'index']);
        } else {*/
            $staff = $this->Staff->newEntity();
            if ($this->request->is('post')) {
                $staff = $this->Staff->patchEntity($staff, $this->request->getData());
                $staff->meal_id = $this->request->session()->read('Meal.id');
                $this->request->session()->delete('Meal.id');
//            debug($staff); die();
                if ($this->Staff->save($staff)) {
                    $this->Flash->success(__('The staff has been saved.'));
                    $article_slug = $this->request->session()->read('Meal.slug');
                    return $this->redirect(['controller' => 'meals', 'action' => 'view', $staff_id]);
                }
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
            $meals = $this->Staff->Meals->find('list', ['limit' => 200]);
            $this->set(compact('staff', 'meals'));
       // }
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $staff = $this->Staff->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $this->set(compact('staff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staff->get($id);
        if ($this->Staff->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
