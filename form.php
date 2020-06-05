<?php
    include('./form.config.php');
    
    $html = '<form method="POST" id="jsSubmitForm">';
    foreach (FIELDS as $key => $value) {
        $requred = ($value['required'] ? 'required' : '');
        $html .= '<input type="text" name="'. $key .'" value="" placeholder="'.$value['caption'].'" '.$requred.'/> <br>';
    }
    $html .= '<button>'.BUTTON.'</button>';
    $html .= '</form>';
    
    echo $html;
?>

<script>
    $('#jsSubmitForm').submit(function(e) {
      e.preventDefault();
      const $form = $(this);
      let data = $form.serializeObject();

      $.ajax({
        url: "/php/feedback.php",
        type: "POST",
        data: data,
        error:function () {
          // Ошибка
        },             
        success: function () {
          $form.trigger("reset");
          // Успех
        }
      });
    });
</script>