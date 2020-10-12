<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MealDishes Controller
 *
 * @property \App\Model\Table\MealDishesTable $MealDishes
 *
 * @method \App\Model\Entity\MealDish[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealDishesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $mealDishes = $this->paginate($this->MealDishes);

        $this->set(compact('mealDishes'));
    }

    /**
     * View method
     *
     * @param string|null $id Meal Dish id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mealDish = $this->MealDishes->get($id, [
            'contain' => [],
        ]);

        $this->set('mealDish', $mealDish);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mealDish = $this->MealDishes->newEntity();
        if ($this->request->is('post')) {
            $mealDish = $this->MealDishes->patchEntity($mealDish, $this->request->getData());
            if ($this->MealDishes->save($mealDish)) {
                $this->Flash->success(__('The meal dish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal dish could not be saved. Please, try again.'));
        }
        $this->set(compact('mealDish'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meal Dish id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mealDish = $this->MealDishes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mealDish = $this->MealDishes->patchEntity($mealDish, $this->request->getData());
            if ($this->MealDishes->save($mealDish)) {
                $this->Flash->success(__('The meal dish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meal dish could not be saved. Please, try again.'));
        }
        $this->set(compact('mealDish'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meal Dish id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mealDish = $this->MealDishes->get($id);
        if ($this->MealDishes->delete($mealDish)) {
            $this->Flash->success(__('The meal dish has been deleted.'));
        } else {
            $this->Flash->error(__('The meal dish could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
