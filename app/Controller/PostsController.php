<?php

class PostsController extends AppController {
	var $paginate = array();

	//declare user access right for Post Controller
	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'add') {
	        return true;
	    }

	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $postId = (int) $this->request->params['pass'][0];
	        if ($this->Post->isOwnedBy($postId, $user['id'])) {
	            return true;
	        }
	    }

	    return parent::isAuthorized($user);
	}

    //show all posts
    public function index() {
       // $this->paginate = array(
       //                          'limit' => 2,
       //                          'order' => array('id' => 'desc'),
       //                       );
       //  $data = $this->paginate("Post");
       //  $this->set("posts",$data);
    	$this->set('posts', $this->Post->find('all'));
        var_dump($this->Post->find('all'));
        die;

    }

    //view detail of a post
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    //duplicate post
    public function duplicate() {
        if( $this->request->is('post') ){
        	$this->autoRender = false;
    		$this->layout = 'ajax';
        	$id = $this->request->data['id'];
        	$oldPost = $this->Post->findById($id);
	        $newPost['Post']['title'] = $oldPost['Post']['title'] . " duplicate";
	    	$this->Post->create();
	    	$this->Post->save($newPost);	    	
	  		$result = $this->Post->findById($this->Post->id);
	  		return json_encode($result);
	    }
    }

    //add new post
    public function add() {
        if ($this->request->is('post')) {
        	$this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    //edit post
    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	//delete post
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('action' => 'index'));
	    }
	}
}

?>