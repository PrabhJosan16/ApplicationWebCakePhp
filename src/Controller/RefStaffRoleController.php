<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefStaffRole Controller
 *
 * @property \App\Model\Table\RefStaffRoleTable $RefStaffRole
 *
 * @method \App\Model\Entity\RefStaffRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefStaffRoleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $refStaffRole = $this->paginate($this->RefStaffRole);

        $this->set(compact('refStaffRole'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Staff Role id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refStaffRole = $this->RefStaffRole->get($id, [
            'contain' => [],
        ]);

        $this->set('refStaffRole', $refStaffRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refStaffRole = $this->RefStaffRole->newEntity();
        if ($this->request->is('post')) {
            $refStaffRole = $this->RefStaffRole->patchEntity($refStaffRole, $this->request->getData());
            if ($this->RefStaffRole->save($refStaffRole)) {
                $this->Flash->success(__('The ref staff role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref staff role could not be saved. Please, try again.'));
        }
        $this->set(compact('refStaffRole'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Staff Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refStaffRole = $this->RefStaffRole->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refStaffRole = $this->RefStaffRole->patchEntity($refStaffRole, $this->request->getData());
            if ($this->RefStaffRole->save($refStaffRole)) {
                $this->Flash->success(__('The ref staff role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref staff role could not be saved. Please, try again.'));
        }
        $this->set(compact('refStaffRole'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Staff Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refStaffRole = $this->RefStaffRole->get($id);
        if ($this->RefStaffRole->delete($refStaffRole)) {
            $this->Flash->success(__('The ref staff role has been deleted.'));
        } else {
            $this->Flash->error(__('The ref staff role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
