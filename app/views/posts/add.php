<?php require APPROOT .'/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light">
    <i class="fa fa-backward"></i> Back
  </a>
  <div class="card card-body mt-5 bg-light">
    <h2>Add Post</h2>
    <p>Create a post with this form.</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="POST">
      <div class="form-group">
        <label for="title">Title: <sub>*</sub></label>
        <input type="text" id="title" name="title" placeholder="Enter the title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Body: <sub>*</sub></label>
        <textarea id="body" name="body" placeholder="Enter the body" class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['body']; ?>"></textarea>
        <span class="invalid-feedback"><?php echo $data['body_error']; ?></span>
      </div>
      <input type="submit" value="Submit" class="btn btn-success">
    </form>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>