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
        //chargement de tous les éléments de la table Data
        $data = $this->Data->find('all');
        //znvoi des éléments à la vue
        $this->set('data', $data);

    }

    public function add()
    {
        //Crétion d'un nouvel Objet de type Data
        $data = $this->Data->newEntity();

        //récupération de la requète en mode POST ou Put ou Patch
        if ($this->request->is(['patch', 'post', 'put'])) {
            //Récupération dans l'objet Data des infos récupérée dans la requète
            $data = $this->Data->patchEntity($data, $this->request->getData());
            //Contrôle de la réussite de la sauvegarde en base de données
            if ($this->Data->save($data)) {
                $this->Flash->success('Donnée ajoutée avec succès', ['key' => 'message']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter cette données!"));

        }
        //envoi de la DATA à la vue
        $this->set('data', $data);

    }

    public function view($id = null)
    {
        //selection d'une data grace à l'id avec tous les elements associés
        $elements = $this->Data->get($id, ['contain' => ['Dataelement']]);
        //envoi de la DATA à la vue
        $this->set('elements', $elements);

    }

    public function delete($id = null)
    {

        $data = $this->Data->get($id);

        //Contrôle de la réussite de la suppression en base de données
        if ($this->Data->delete($data)) {
            //envoi d'un message flash à la vue
            $this->Flash->success('La data avec l\'id: ' . $id . ' a été supprimée.', ['key' => 'message']);
        } else {
            $this->Flash->error(__('la data ne peut être supprimée.'));
        }
        //redirection vers la fonction index du controller Data
        return $this->redirect(['action' => 'index']);
    }

    public function edit($id = Null)
    {
        $data = $this->Data->get($id);
        //récupération de la requète en mode POST ou Put ou Patch
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->Data->patchEntity($data, $this->request->getData());
            //Contrôle de la réussite de la sauvegarde en base de données
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

    public function login()
    {
        //recupération de la requete de connexion
        if ($this->request->is(['patch', 'post', 'put'])) {
            //connecter un utilisateur en utilisant les clés fournies dans la requête
            $user = $this->Auth->identify();
            if ($user) {
                //connecter l’utilisateur et sauvegarder les infos de l’utilisateur en controlant les données avec la classe de connection
                $this->Auth->setUser($user);
                $this->Flash->success('Vous êtes connécté',
                    ['key' => 'message']);
                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('Vous êtes déconnécté',
            ['key' => 'message']);
        // déconnexion de l'utilisateur
        $this->redirect($this->Auth->logout());
    }

    public function json($id = null)
    {
        //récupération des data avec liaison avec les data éléments
        $data = $this->Data->get($id, ['contain' => ['Dataelement']]);

        $json = json_encode($data, JSON_UNESCAPED_UNICODE);

        $this->set('json', $json);

    }
}

?>
