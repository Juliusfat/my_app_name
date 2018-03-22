<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 17/03/2018
 * Time: 14:38
 */

namespace App\Controller;


class DataController extends AppController
{

    public function index()
    {

        $this->set('data', $data = $this->Data->find('all'));

    }

    public function add()
    {
        $data = $this->Data->newEntity();
        if ($this->request->is('post')) {
            $data = $this->Data->patchEntity($data, $this->request->getData());
            if ($this->Data->save($data)) {
                $this->Flash->success('Donnée ajoutée avec succès', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter cette données!"));

        }
        $this->set('data', $data);

    }

    public function view($id = null)
    {

        $data = $this->Data->get($id);
        $this->set('data', $data);
        // Récupère une liste des tags.
        $elements= $this->Data->Dataelement->find('all',array(
            'conditions' => array('Dataelement.data_id =' => $id),
            'recursive' => 0
        ));
        $this->set('elements',$elements);

    }

    public function delete($id = null)
    {

        $data = $this->Data->get($id);
        if ($this->Data->delete($data)) {
            $this->Flash->success('La data avec l\'id: ' . $id . ' a été supprimée.', ['key' => 'message']);
        } else {
            $this->Flash->error(__('la data ne peut être supprimée.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function edit($id = Null)
    {
        $data = $this->Data->get($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->Data->patchEntity
            ($data, $this->request->getData());

            if ($this->Data->save($data)) {
                $this->Flash->success('La data a été modifiée !',
                    ['key' => 'message']);

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de modifier cette data !'));
            }

        }
        $this->set('data', $data);
    }


}

?>