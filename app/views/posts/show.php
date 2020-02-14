<?php require_once APPROOT.'/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT?>/posts" class="btn btn-info">Back</a>
  <h1><?php echo $data['post']->post_title; ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
    Created by <?php echo $data['post']->user_id;?> at <?php echo $data['post']->post_created;?>
  </div>
  <p><?php echo $data['post']->post_content; ?></p>
  <hr>
<?php if($data['post']->user_id == $_SESSION['user_id']) :?>
  <div class="row justify-content-around">
    <div class="col-8">
      <a href="<?php echo URLROOT?>/posts/edit/<?php echo $data['post']->post_id; ?>" class="btn btn-success">Edit</a>
    </div>
    <div class="col-4">
      <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->post_id; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
      </form>
    </div>
  </div>
<?php endif;?>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>