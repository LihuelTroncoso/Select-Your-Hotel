<h2 class="text-center"><?php echo $hotel['nombre']; ?></h2>
<div class="d-flex justify-content-center"><img src="<?php echo site_url();?>assets/images/hotels/<?php echo $hotel['image']; ?> "></div>
<div class="">
	<h3 class="m-5 text-left"><?php echo $hotel['descripcion']; ?><h3>
</div>

<div class="m-5 d-flex justify-content-center"><a class="btn btn-pill btn-outline-primary" href="<?php echo site_url('/reserva/'.$hotel['idHotel']); ?>"><h2>Haga su reserva</h2></a></div>
<!--
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug'] ?>">Edit</a>
	<?php echo form_open('posts/delete/'.$post['id']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
<?php endif; ?>
-->
<!-- To view the comment of the blog 
<hr>
<h3>Comments</h3>
<?php if($comments): ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
		<h5><?php echo $comment['comment']; ?> [by <strong><?php echo $comment['username']; ?></strong>}</h5>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<p>No Comments To Display</p>
<?php endif; ?>
-->
<!-- to post the comment on particular blog 
<hr>
<h3> Add Comment </h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
  <div class="form-group">
  	<label>Name</label>
  	<input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
  	<label>Email</label>
  	<input type="text" name="email" class="form-control">
  </div>
  <div class="form-group">
  	<label>Comment</label>
  	<textarea name="comment" class="form-control"></textarea>
  </div>
  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
  <button class="btn btn-primary" type="submit">Submit</button>
</form>  -->