<?php
namespace App\Controller;


namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
      public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $Customers = $this->Customers->find('all');
        $this->set([
            'Customers' => $Customers,
            '_serialize' => ['Customers']
        ]);
    }

    public function view($id)
    {
        $customer = $this->Customers->get($id);
        $this->set([
            '$customer' => $customer,
            '_serialize' => ['$customer']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $customer = $this->Customers->newEntity($this->request->getData());
        if ($this->Customers->save($customer)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '$customer' => $customer,
            '_serialize' => ['message', '$customer']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $customer = $this->Customers->get($id);
        $customer = $this->Customers->patchEntity($customer, $this->request->getData());
        if ($this->Customers->save($customer)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $customer = $this->Customers->get($id);
        $message = 'Deleted';
        if (!$this->Customers->delete($customer)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
