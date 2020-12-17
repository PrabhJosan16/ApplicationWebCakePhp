<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MealName Controller
 *
 * @property \App\Model\Table\MealNameTable $MealName
 *
 * @method \App\Model\Entity\MealName[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealNameController extends AppController
{
    
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findMealName', 'add', 'edit', 'delete']);
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    //4.1
     public function findMealName() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->MealName->find('all', array(
                'conditions' => array('MealName.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
         $this->paginate = [
            'contain' => ['typeMeal', 'nameType'],
        ];
        $mealName = $this->paginate($this->MealName);

        $this->set(compact('mealName'));
    }

    /**
     * View method
     *
     * @param string|null $id Meal Name id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mealName = $this->MealName->get($id, [
            'contain' => ['Meals', 'typeMeal', 'nameType'],
        ]);

        $this->set('mealName', $mealName);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mealName = $this->MealName->newEntity();
        if ($this->request->is('post')) {
            $mealName = $this->MealName->patchEntity($mealName, $this->request->getData());
            if ($this->MealName->save($mealName)) {
                $this->Flash->success(__('The meal name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal name could not be saved. Please, try again.'));
        }
        $typeMeal = $this->MealName->typeMeal->find('list', ['limit' => 200]);
        $nameType = $this->MealName->nameType->find('list', ['limit' => 200]);
        $this->set(compact('mealName', 'typeMeal', 'nameType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal Name id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mealName = $this->MealName->get($id, [
            'contain' => ['TypeMeal', 'NameType'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mealName = $this->MealName->patchEntity($mealName, $this->request->getData());
            if ($this->MealName->save($mealName)) {
                $this->Flash->success(__('The meal name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal name could not be saved. Please, try again.'));
        }
         $typeMeal = $this->MealName->typeMeal->find('list', ['limit' => 200]);
        $nameType = $this->MealName->nameType->find('list', ['limit' => 200]);
        $this->set(compact('mealName', 'typeMeal', 'nameType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal Name id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mealName = $this->MealName->get($id);
        if ($this->MealName->delete($mealName)) {
            $this->Flash->success(__('The meal name has been deleted.'));
        } else {
            $this->Flash->error(__('The meal name could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
