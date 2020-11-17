<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NameType Controller
 *
 * @property \App\Model\Table\NameTypeTable $NameType
 *
 * @method \App\Model\Entity\NameType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NameTypeController extends AppController
{
    
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByTypeMeal', 'add', 'edit', 'delete']);
    }
    
    
     public function getByTypeMeal() {
        $type_meal_id = $this->request->query('type_meal_id');

        $nameType = $this->NameType->find('all', [
            'conditions' => ['$nameType.type_meal_id' => $type_meal_id],
        ]);
        $this->set('nameType', $nameType);
        $this->set('_serialize', ['nameType']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeMeal'],
        ];
        $nameType = $this->paginate($this->NameType);

        $this->set(compact('nameType'));
    }

    /**
     * View method
     *
     * @param string|null $id Name Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nameType = $this->NameType->get($id, [
            'contain' => ['TypeMeal', 'MealName'],
        ]);

        $this->set('nameType', $nameType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nameType = $this->NameType->newEntity();
        if ($this->request->is('post')) {
            $nameType = $this->NameType->patchEntity($nameType, $this->request->getData());
            if ($this->NameType->save($nameType)) {
                $this->Flash->success(__('The name type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The name type could not be saved. Please, try again.'));
        }
        $typeMeal = $this->NameType->TypeMeal->find('list', ['limit' => 200]);
        $this->set(compact('nameType', 'typeMeal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Name Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nameType = $this->NameType->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nameType = $this->NameType->patchEntity($nameType, $this->request->getData());
            if ($this->NameType->save($nameType)) {
                $this->Flash->success(__('The name type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The name type could not be saved. Please, try again.'));
        }
        $typeMeal = $this->NameType->TypeMeal->find('list', ['limit' => 200]);
        $this->set(compact('nameType', 'typeMeal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Name Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nameType = $this->NameType->get($id);
        if ($this->NameType->delete($nameType)) {
            $this->Flash->success(__('The name type has been deleted.'));
        } else {
            $this->Flash->error(__('The name type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
