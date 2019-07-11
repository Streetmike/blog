<div class="col-md-8 blog-main mt-2">
	<?php foreach ($data as $item):?>
		<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?=$item->image?>" class="card-img pl-1 pt-1">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><a href="/post/get?id=<?=$item->id?>"><?=ucfirst($item->title)?></a></h5>
							<p class="card-text"><?=$item->content?></p>
							<p class="card-text"><small class="text-muted"><?=$item->date?> by <?=$item->author?></small>
								<button type="button" class="btn btn-danger float-right btn-sm deletePost ml-1" value="<?=$item->id?>">Delete</button>
								<a class="btn btn-warning btn-sm float-right" href="/post/editPost?id=<?=$item->id?>" id="editPost" role="button">Edit</a>
							</p>
						</div>
					</div>
				</div>
		</div>
	<?php endforeach;?>
</div>
<aside class="col-md-4 blog-sidebar">
  <div class="p-3 mb-3 bg-light rounded text-center">
		<a class="btn btn-primary" href="/post/newPost" id="newPost" role="button">New Post</a>
  </div>
</aside>
