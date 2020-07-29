<?php

  class Posts extends Controller {
    public function __construct()
    {
      if (!isLoggedIn()) {
        redirect('users/login');
      }

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    public function index()
    {
      // Get Posts
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];

      $this->view('posts/index', $data);
    }

    public function add()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_error' => '',
          'body_error' => ''
        ];

        // Validate title
        if (empty($data['title'])) {
          $data['title_error'] = 'Please enter title';
        }

        // Validate body
        if (empty($data['body'])) {
          $data['body_error'] = 'Please enter body';
        }

        // Make sure no errors
        if (empty($data['title_error']) && empty($data['body_error'])) {
          // Validated
          if ($this->postModel->addPost($data)) {
            flash('post_message', 'Post Added Successfully');
            redirect('posts');
          } else {
            die('Something went wrong!');
          }

        } else {
          // Load view with errors
          $this->view('posts/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'body' => '',
          'user_id' => ''
        ];
  
        $this->view('posts/add', $data);
      }
    }

    public function show($id)
    {
      $post = $this->postModel->findPostById($id);
      $user = $this->userModel->findUserById($post->user_id);

      $data = [
        'post' => $post,
        'user' => $user
      ];

      $this->view('posts/show', $data);
    }

    public function edit($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_error' => '',
          'body_error' => ''
        ];

        // Validate title
        if (empty($data['title'])) {
          $data['title_error'] = 'Please enter title';
        }

        // Validate body
        if (empty($data['body'])) {
          $data['body_error'] = 'Please enter body';
        }

        // Make sure no errors
        if (empty($data['title_error']) && empty($data['body_error'])) {
          // Validated
          if ($this->postModel->updatePost($data)) {
            flash('post_message', 'Post Updated Successfully');
            redirect('posts');
          } else {
            die('Something went wrong!');
          }

        } else {
          // Load view with errors
          $this->view('posts/edit', $data);
        }

      } else {
        // Fetch the post
        $post = $this->postModel->findPostById($id);
        // Check for owner
        if ($post->user_id != $_SESSION['user_id']) {
          redirect('posts');
        }

        $data = [
          'post' => $post
        ];
  
        $this->view('posts/edit', $data);
      }
    }

    public function delete($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Fetch the post
        $post = $this->postModel->findPostById($id);
        // Check for owner
        if ($post->user_id != $_SESSION['user_id']) {
          redirect('posts');
        }
        if ($this->postModel->deletePost($id)) {
          flash('post_message', 'Post Deleted Successfully');
          redirect('posts');
        } else {
          die('Something went wrong!');
        }

      } else {
        redirect('posts');
      }
    }
  }