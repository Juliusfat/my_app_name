<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dataelement Controller
 *
 * @property \App\Model\Table\DataelementTable $Dataelement
 *
 * @method \App\Model\Entity\Dataelement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DataelementController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Data']
        ];
        $dataelement = $this->paginate($this->Dataelement);

        $this->set(compact('dataelement'));
    }

    /**
     * View method
     *
     * @param string|null $id Dataelement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataelement = $this->Dataelement->get($id, [
            'contain' => ['Data']
        ]);

        $this->set('dataelement', $dataelement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataelement = $this->Dataelement->newEntity();
        if ($this->request->is('post')) {
            $dataelement = $this->Dataelement->patchEntity($dataelement, $this->request->getData());
            if ($this->Dataelement->save($dataelement)) {
                $this->Flash->success(__('The dataelement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dataelement could not be saved. Please, try again.'));
        }
        $data = $this->Dataelement->Data->find('list', ['limit' => 200]);
        $this->set(compact('dataelement', 'data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dataelement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataelement = $this->Dataelement->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataelement = $this->Dataelement->patchEntity($dataelement, $this->request->getData());
            if ($this->Dataelement->save($dataelement)) {
                $this->Flash->success(__('The dataelement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dataelement could not be saved. Please, try again.'));
        }
        $data = $this->Dataelement->Data->find('list', ['limit' => 200]);
        $this->set(compact('dataelement', 'data'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dataelement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataelement = $this->Dataelement->get($id);
        if ($this->Dataelement->delete($dataelement)) {
            $this->Flash->success(__('The dataelement has been deleted.'));
        } else {
            $this->Flash->error(__('The dataelement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
