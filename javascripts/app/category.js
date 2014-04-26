$(function() {
  $('a.edit-cat').each(function() {
    $(this).click(function(){
      $('#category_id').val($(this).parent('td').siblings('.delete-id').html());
      $('#category_name').val($(this).parent('td').siblings('.cat-name').html());
      $('button.save-cat').html('UPDATE');
    });
  });

  $('a.add-cat').click(function(){
    $('button.save-cat').html('ADD');
  });

  $('form#form_category').on('submit', function(e){
    return false;
  });
});

function save_category()
{
    $.ajax({
      type : 'POST',
      url : config.base + 'index.php/category/save',
      data : $('#form_category').serialize(),
      success : function(ret) {
        ret = JSON.parse(ret);
        if (ret.st == 1){
          $('#infoMessage').html(ret.msg);
          // $('#form_category').reset();
          
          setTimeout(function() {
              $('.close-reveal-modal').click();
              window.location.href = config.base + 'index.php/category/index/' + $('#content_type').val();
            }, 1000);

        } else{
          $('#infoMessage').html(ret.msg);
        }
      }
    });
}