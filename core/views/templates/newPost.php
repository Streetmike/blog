<form id="my_form" enctype="multipart/form-data">
  <input type="hidden" id="type" name="type" value="<?=isset($data['post']) ? $data['post']->type : ''?>">
  <input type="hidden" name="id" value="<?=isset($data['post']) ? $data['post']->id : ''?>">
  <div class="alert alert-success" role="alert" id='success-alert'>
    Saved!
  </div>
  <div class="alert alert-danger" role="alert" id='danger-alert'>
    Something wrong!
  </div>
  <div class="form-row mt-4">
    <div class="form-group col-6">
      <input type="text" class="form-control" name="title" aria-describedby="titleHelp"
        placeholder="Enter title" value="<?=isset($data['post']) ? $data['post']->title : ''?>" required>
      <small id="titleHelp" class="form-text text-muted">Enter some title for you post.</small>
    </div>
    <div class="form-group col-6">
      <input type="text" class="form-control" name="author"
        value="<?=isset($data['post']) ? $data['post']->author : ''?>" placeholder="Enter you name" required>
    </div>
    <div class="form-group col-12">
      <label for="content">Content</label>
      <textarea class="form-control" id="content" name="content" rows="3"><?=isset($data['post']) ? $data['post']->content : ''?></textarea>
    </div>
    <div class="form-group col-12">
    <label for="image">Load image for post</label>
    <input type="file" name='image' class="form-control-file" id="image">
    <? if(isset($data['post'])): ?>
      <img src="/<?=$data['post']->image?>" alt="" class="float-left mt-3" height="150">
    <? endif ?>
  </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
  </div>
</form>
