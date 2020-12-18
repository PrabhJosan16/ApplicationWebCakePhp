<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeMeal Controller
 *
 * @property \App\Model\Table\TypeMealTable $TypeMeal
 *
 * @method \App\Model\Entity\TypeMeal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeMealController extends AppController
{
    
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByTypeMeal','getTypeMeal', 'add', 'edit', 'delete']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typeMeal = $this->paginate($this->TypeMeal);

        $this->set(compact('typeMeal'));
    }
    
     public function getTypeMeal() {
        $typeMeals = $this->TypeMeal->find('all',
                ['contain' => ['NameType']]);
        $this->set([
            'typeMeals' => $typeMeals,
            '_serialize' => ['typeMeals']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Type Meal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeMeal = $this->TypeMeal->get($id, [
            'contain' => ['MealName', 'TypeName'],
        ]);

        $this->set('typeMeal', $typeMeal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeMeal = $this->TypeMeal->newEntity();
        if ($this->request->is('post')) {
            $typeMeal = $this->TypeMeal->patchEntity($typeMeal, $this->request->getData());
            if ($this->TypeMeal->save($typeMeal)) {
                $this->Flash->success(__('The type meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type meal could not be saved. Please, try again.'));
        }
        $this->set(compact('typeMeal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Meal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeMeal = $this->TypeMeal->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeMeal = $this->TypeMeal->patchEntity($typeMeal, $this->request->getData());
            if ($this->TypeMeal->save($typeMeal)) {
                $this->Flash->success(__('The type meal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type meal could not be saved. Please, try again.'));
        }
        $this->set(compact('typeMeal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Meal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeMeal = $this->TypeMeal->get($id);
        if ($this->TypeMeal->delete($typeMeal)) {
            $this->Flash->success(__('The type meal has been deleted.'));
        } else {
            $this->Flash->error(__('The type meal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
