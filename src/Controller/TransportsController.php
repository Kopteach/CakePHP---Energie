<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\SitesController;
use Cake\ORM\TableRegistry;


/**
* Transports Controller
*
* @property \App\Model\Table\TransportsTable $Transports
*/
class TransportsController extends AppController
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

    $transports = $this->paginate($this->Transports);
    $this->set(compact('transports'));
    $this->set('_serialize', ['transports']);
  }

  /**
  * View method
  *
  * @param string|null $id Transport id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $transport = $this->Transports->get($id, [
      'contain' => ['Sites']
    ]);
    $sites= TableRegistry::get('Sites')->find();
    $this->set('transport', $transport);
    $this->set('_serialize', ['transport']);
    $sites->find('all', ['conditions' => ['id' => $site_id]]);
    foreach ($sites as $site)
    {
      $this->set('siteName', $site->name);
    }
  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add($site_id,$site_name)
  {
    $transport = $this->Transports->newEntity();
    $sites= TableRegistry::get('Sites')->find();
    $sites->find('all', ['conditions' => ['id' => $site_id]]);
    $otherSites= TableRegistry::get('Sites')->find();
    foreach ($sites as $site)
    {
      $this->set('siteName', $site->name);
      $site_type = $site->type;
      $this->set('siteType', $site->type);
    }
    if($site_type) // if producer
    {
      $this->request->data['producer_site_id'] = $site_id;
      $otherSites->find('list',['conditions' => ['type' => false]],['keyField' => 'id','valueField' => 'name']);
      $this->set('othersites', $otherSites);
    }
    else // else consumer
    {
      $this->request->data['consumer_site_id'] = $site_id;
      $otherSites->find('list',['conditions' => ['type' => true]],['keyField' => 'id','valueField' => 'name']);
      $this->set('othersites', $otherSites);
    }
    if ($this->request->is('post')) {
      $transport = $this->Transports->patchEntity($transport, $this->request->getData());
      if ($this->Transports->save($transport)) {
        $this->Flash->success(__('The transport has been saved.'));

        return $this->redirect(['controller' => 'sites','action' => 'index']);
      }
      $this->Flash->error(__('The transport could not be saved. Please, try again.'));
    }
    $this->set(compact('transport', 'sites'));
    $this->set('_serialize', ['transport']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Transport id.
  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $transport = $this->Transports->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $transport = $this->Transports->patchEntity($transport, $this->request->getData());
      if ($this->Transports->save($transport)) {
        $this->Flash->success(__('The transport has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The transport could not be saved. Please, try again.'));
    }
    $producerSites = $this->Transports->ProducerSites->find('list', ['limit' => 200]);
    $consumerSites = $this->Transports->ConsumerSites->find('list', ['limit' => 200]);
    $this->set(compact('transport', 'sites'));
    $this->set('_serialize', ['transport']);
  }

  /**
  * Delete method
  *
  * @param string|null $id Transport id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $transport = $this->Transports->get($id);
    if ($this->Transports->delete($transport)) {
      $this->Flash->success(__('The transport has been deleted.'));
    } else {
      $this->Flash->error(__('The transport could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
