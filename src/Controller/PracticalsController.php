<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Practicals Controller
 *
 * @property \App\Model\Table\PracticalsTable $Practicals
 *
 * @method \App\Model\Entity\Practical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PracticalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $practicals = $this->paginate($this->Practicals);

        $this->set(compact('practicals'));
    }

    /**
     * View method
     *
     * @param string|null $id Practical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $practical = $this->Practicals->get($id, [
            'contain' => []
        ]);

        $this->set('practical', $practical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $practical = $this->Practicals->newEntity();
        if ($this->request->is('post')) {
            $practical = $this->Practicals->patchEntity($practical, $this->request->getData());
            if ($this->Practicals->save($practical)) {
                $this->Flash->success(__('The practical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practical could not be saved. Please, try again.'));
        }
        $this->set(compact('practical'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Practical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $practical = $this->Practicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $practical = $this->Practicals->patchEntity($practical, $this->request->getData());
            if ($this->Practicals->save($practical)) {
                $this->Flash->success(__('The practical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practical could not be saved. Please, try again.'));
        }
        $this->set(compact('practical'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Practical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $practical = $this->Practicals->get($id);
        if ($this->Practicals->delete($practical)) {
            $this->Flash->success(__('The practical has been deleted.'));
        } else {
            $this->Flash->error(__('The practical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
