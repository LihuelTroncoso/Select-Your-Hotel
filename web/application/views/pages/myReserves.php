<h2><b><?= $title ?></b></h2>
<?php foreach($hotels as $hotel) : ?>
	<h4><?php echo $hotel['nombre']; ?></h4>
	<!-- <div class="row">
		<div class="col-md-3">
			<img class = "post-thumb" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?> ">
		</div>
		<div class="col-md-9">
			<small class="post-date">Publicado: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
			<?php echo word_limiter($post['body'], 60)?>
			<br> <br>
			<p><a class = "btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Mas información</a></p>
		</div>
	</div> -->
<?php endforeach; ?>