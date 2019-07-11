$('document').ready(function(){

  $('.deletePost').click(function(event){
    self = $(this);
    let postId = event.target.value;

    $.post('/post/delete', {id:postId, ajax:true}, function(response){
        self.closest('.card').remove()
    })
  });

  $('#my_form').submit(function(){
    event.preventDefault();
    var formData = new FormData($(this)[0]);

    if($('#type').val() == 'edit'){
      storePost(formData, '/post/update');
    } else {
      storePost(formData, '/post/store');
    }
  })
});

function storePost(formData, url) {
  $.ajax({
    url: url,
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function(response){
      if(response == 'false'){
        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#danger-alert").slideUp(500);
        });
      } else {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
        });
        location.reload(true);
      }
    }
  });
}
