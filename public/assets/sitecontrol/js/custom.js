jQuery(document).ready(function(){

  setTimeout(() => {
      jQuery('.notification_messages').fadeOut();
    }, 3000);

  tinymce.init({
    selector:'textarea'
  });

  

})