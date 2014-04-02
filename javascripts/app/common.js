$(function() {
  $('button.cancel').click(function(){
    $('.close-reveal-modal').click();
  });

  $('a.delete').each(function() {
    $(this).click(function(){
      $('#hid_delete_id').val($(this).parent('td').siblings('.delete-id').html());
    });
  });

  $("form input#title").on('blur', function(){
    if ($('form input#title').val() != ''){
      var postData = {};
      postData['title'] = $('form input#title').val();
      // postData[csrf_token_name] = csrf_token_hash;

      $.ajax({
        type : 'POST',
        url : config.base + 'index.php/common/set_slug',
        data : postData,
        success : function(ret) {
          $("form input#slug").val(ret);
        }
      });
    }
  });

});

function delete_entry(obj)
{
    var postData = {};
    postData['id'] = $('div#delete-prompt input#hid_delete_id').val();
    //postData[csrf_token_name] = csrf_token_hash;

    $.ajax({
      type : 'POST',
      url : config.base + 'index.php/' + $(obj).data('cont') + '/' + $(obj).data('func'),
      data : postData,
      success : function(ret) {
        ret = JSON.parse(ret);
        if (ret.st == 1){
          $('#infoMessageDelete').html(ret.msg);
          
          setTimeout(function() {
              $('.close-reveal-modal').click();
              window.location.href = config.base + 'index.php/' + $(obj).data('goto');
            }, 1000);

        } else{
          $('#infoMessageDelete').html(ret.msg);
        }
      }
    });
}