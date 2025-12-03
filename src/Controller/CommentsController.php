<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

/**
 * Description of CommentsController
 *
 * @author sio
 */
class CommentsController extends AppController{
    
    public function add() {    
        
        $leNewComment = $this->Comments->newEmptyEntity();
        if ($this->request->is('post')) {
            $leNewComment = $this->Comments->patchEntity($leNewComment, $this->request->getData());
            $leNewComment->article_id = 9;
            if ($this->Comments->save($leNewComment)) {
                $this->Flash->success(__("Le commentaire a été sauvegardé."));
                return $this->redirect(['action' => 'add']);
            } else
                $this->Flash->error(__("Impossible d'ajouter le commentaire."));
        }
        $this->set(compact('leNewComment'));
    }
    
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $leComm = $this->Comments->get($id);
        if ($this->Comments->delete($leComm)) {
            $this->Flash->success(__("Le comm {0} d' id {1} a bien été supprimé ! ", $leComm->title, $leComm->id));
        } else {
            $this->Flash->error(__("Le comm ne peux pas etre supprimé, reessayez plus tard"));
        }
        return $this->redirect(['controller' => 'articles','action' => 'detail', $leComm->article_id]);
    }
}
