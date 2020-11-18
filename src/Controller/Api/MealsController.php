<?php

// src/Controller/MealsController.php


namespace App\Controller\Api;

use App\Controller\Api\AppController;

//use App\Controller\AppController;

/**
 * Meals Controller
 *
 * @property \App\Model\Table\MealsTable $Meals
 *
 * @method \App\Model\Entity\Meal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MealsController extends AppController {

     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $Meals = $this->Meals->find('all');
        $this->set([
            'Meals' => $Meals,
            '_serialize' => ['Meals']
        ]);
    }

    public function view($id)
    {
        $meals = $this->Meals->get($id);
        $this->set([
            'meals' => $meals,
            '_serialize' => ['meals']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $meal = $this->Meals->newEntity($this->request->getData());
        if ($this->Meals->save($meal)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'meal' => $meal,
            '_serialize' => ['message', 'meal']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $meal = $this->Meals->get($id);
        $meal = $this->Meals->patchEntity($meal, $this->request->getData());
        if ($this->Meals->save($meal)) {
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
        $meal = $this->Meals->get($id);
        $message = 'Deleted';
        if (!$this->Meals->delete($meal)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}
