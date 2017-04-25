<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\SitesController;

/**
* Releves Controller
*
* @property \App\Model\Table\RelevesTable $Releves
*/
class RelevesController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $this->paginate = [
      'contain' => ['Sites']
    ];
    $releves = $this->paginate($this->Releves);

    $this->set(compact('releves'));
    $this->set('_serialize', ['releves']);
  }

  /**
  * View method
  *
  * @param string|null $id Relef id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */

  /**
  * Add method
  *
  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add($site_id, $site_name)
  {
    $relef = $this->Releves->newEntity();
    $this->request->data['site_id'] = $site_id;
    $this->set('site', $site_id);
    $this->set('siteName', $site_name);
    if ($this->request->is('post')) {
      $startAsString = $this->Releves->deconstruct(
        'date', $this->data['Releves']['date']
      );
      debug($this->request->getData());
      $relef = $this->Releves->patchEntity($relef, $this->request->getData());
      if ($this->Releves->save($relef)) {
        $this->Flash->success(__('The statement has been saved.'));

        return $this->redirect(['controller'=>'Sites','action' => 'view']);
      }
      var_dump($relef);
      $this->Flash->error(__('The statement could not be saved. Please, try again.'));
    }
    $sites = $this->Releves->Sites->find('list', ['limit' => 200]);
    $this->set(compact('relef', 'sites'));
    $this->set('_serialize', ['relef']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Relef id.
  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */

  /**
  * Delete method
  *
  * @param string|null $id Relef id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $relef = $this->Releves->get($id);
    if ($this->Releves->delete($relef)) {
      $this->Flash->success(__('The relef has been deleted.'));
    } else {
      $this->Flash->error(__('The relef could not be deleted. Please, try again.'));
    }

    return $this->redirect(['controller' => 'Sites', 'action' => 'index']);
  }
}
