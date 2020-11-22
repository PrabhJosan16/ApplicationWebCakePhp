<?php

// src/Controller/MealsController.php

namespace App\Controller;

//use App\Controller\AppController;

/**
 * Meals Controller
 *
 * @property \App\Model\Table\MealsTable $Meals
 *
 * @method \App\Model\Entity\Meal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['tags']);
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the meal belongs to the current user.
        $meal = $this->Meals->findById($id)->first();

        return $meal->user_id === $user['id'];
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->loadComponent('Paginator');
        $meals = $this->Paginator->paginate($this->Meals->find(
                        'all', [
                    'contain' => ['Users', 'Tags', 'Files'],
        ]));

        $this->set(compact('meals'));
    }

    /**
     * View method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $meal = $this->Meals->findById($id)->contain(['Users', 'Tags', 'Files'])->firstOrFail();
        // debug($meal);
        // die();
        $this->set(compact('meal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $meal = $this->Meals->newEntity();
        if ($this->request->is('post')) {
            $meal = $this->Meals->patchEntity($meal, $this->request->getData());
            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            //debug($meal);
            //die();
            $meal->user_id = $this->Auth->user('id');
            //$meal->user_id = 3;
            // debug($meal);
            // die();
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('Your meal has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your meal.'));
        }
        // Get a list of tags.
        $tags = $this->Meals->Tags->find('list');
        $files = $this->Meals->Files->find('list');

        // Set tags to the view context
        $this->set('tags', $tags);
        $this->set('meal', $meal);
        $this->set('files', $files);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id) {
        $meal = $this->Meals->findById($id)->contain('Tags', 'Files', 'NameMeal')->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Meals->patchEntity($meal, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Meals->save($meal)) {
                $this->Flash->success(__('Your meal has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your meal.'));
        }
        // Get a list of tags.
        //$mealsName = $this->Articles->MealsName->find('list', ['limit' => 200]);
        $tags = $this->Meals->Tags->find('list');
        $files = $this->Meals->Files->find('list');
        

        // Set tags to the view context
       // $this->set('NameMeal', $mealsName);
        $this->set('tags', $tags);
        $this->set('files', $files);
        $this->set('meal', $meal);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $meal = $this->Meals->findById($id)->firstOrFail();
        if ($this->Meals->delete($meal)) {
            $this->Flash->success(__('The {0} meals has been deleted.', $meal->Other_details));
            return $this->redirect(['action' => 'index']);
        }
    }

}
