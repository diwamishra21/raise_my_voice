<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Witns Controller
 *
 * @property \App\Model\Table\WitnsTable $Witns
 *
 * @method \App\Model\Entity\Witn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WitnsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $witns = $this->paginate($this->Witns);

        $this->set(compact('witns'));
    }

    /**
     * View method
     *
     * @param string|null $id Witn id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $witn = $this->Witns->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('witn', $witn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $witn = $this->Witns->newEntity();
        if ($this->request->is('post')) {
            $witn = $this->Witns->patchEntity($witn, $this->request->getData());
            if ($this->Witns->save($witn)) {
                $this->Flash->success(__('The witn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The witn could not be saved. Please, try again.'));
        }
        $this->set(compact('witn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Witn id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $witn = $this->Witns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $witn = $this->Witns->patchEntity($witn, $this->request->getData());
            if ($this->Witns->save($witn)) {
                $this->Flash->success(__('The witn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The witn could not be saved. Please, try again.'));
        }
        $this->set(compact('witn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Witn id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $witn = $this->Witns->get($id);
        if ($this->Witns->delete($witn)) {
            $this->Flash->success(__('The witn has been deleted.'));
        } else {
            $this->Flash->error(__('The witn could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
