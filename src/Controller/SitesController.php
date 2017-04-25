<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\RelevesController;

/**
* Sites Controller
*
* @property \App\Model\Table\SitesTable $Sites
*/
class SitesController extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $sites = $this->paginate($this->Sites);

    $this->set(compact('sites'));
    $this->set('_serialize', ['sites']);
  }

  /**
  * View method
  *
  * @param string|null $id Site id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $site = $this->Sites->get($id, [
      'contain' => ['Releves']
    ]);
    $this->set('site', $site);
    $this->set('_serialize', ['site']);
  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $site = $this->Sites->newEntity();
    if ($this->request->is('post')) {
      $site = $this->Sites->patchEntity($site, $this->request->getData());
      if ($this->Sites->save($site)) {
        $this->Flash->success(__('The site has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The site could not be saved. Please, try again.'));
    }
    $this->set(compact('site'));
    $this->set('_serialize', ['site']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Site id.
  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {

    /**
    * Create a Bootstrap Modal
    * @param string $id the modal id
    * @param string $header the text in the header
    * @param string $body the content of the body
    * @param array $buttons informations about open, close and save buttons
    * @param array $options
    * @return string
    */

    $site = $this->Sites->get($id);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $site = $this->Sites->patchEntity($site, $this->request->getData());
      if ($this->Sites->save($site)) {
        $this->Flash->success(__('The site has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The site could not be saved. Please, try again.'));
    }
    $this->set(compact('site'));
    $this->set('_serialize', ['site']);
  }


  /**
  * Delete method
  *
  * @param string|null $id Site id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $site = $this->Sites->get($id);
    if ($this->Sites->delete($site)) {
      $this->Flash->success(__('The site has been deleted.'));
    } else {
      $this->Flash->error(__('The site could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
