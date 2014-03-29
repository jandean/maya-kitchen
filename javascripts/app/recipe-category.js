$(function() {
  $('a.edit-cat').each(function() {
    $(this).click(function(){
      $('#category_id').val($(this).parent('td').siblings('.cat-id').html());
      $('#category_name').val($(this).parent('td').siblings('.cat-name').html());
      $('button.save-cat').html('UPDATE');
    });
  });

  $('a.add-cat').click(function(){
    $('button.save-cat').html('ADD');
  });

  $('a.delete-cat').each(function() {
    $(this).click(function(){
      $('#hid_catid').val($(this).parent('td').siblings('.cat-id').html());
    });
  });

  $('button.cancel').click(function(){
    $('.close-reveal-modal').click();
  });
});

function save_category()
{
    $.ajax({
      type : 'POST',
      url : config.base + 'index.php/recipe/save_category',
      data : $('#form_category').serialize(),
      success : function(ret) {
        ret = JSON.parse(ret);
        if (ret.st == 1){
          $('#infoMessage').html(ret.msg);
          $('#form_category').reset();
          
          setTimeout(function() {
              $('.close-reveal-modal').click();
              window.location.href = config.base + 'index.php/recipe/category';
            }, 1000);

        } else{
          $('#infoMessage').html(ret.msg);
        }
      }
    });
}

function delete_category()
{
    $.ajax({
      type : 'POST',
      url : config.base + 'index.php/recipe/delete_category',
      data : {"catid" : $('#hid_catid').val()},
      success : function(ret) {
        ret = JSON.parse(ret);
        if (ret.st == 1){
          $('#infoMessageDelete').html(ret.msg);
          
          setTimeout(function() {
              $('.close-reveal-modal').click();
              window.location.href = config.base + 'index.php/recipe/category';
            }, 1000);

        } else{
          $('#infoMessage').html(ret.msg);
        }
      }
    });
}