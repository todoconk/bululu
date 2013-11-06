  <div class="span8 hidden-phone">
    <?php echo image_tag("registro.jpg") ?>
  </div>
  <div class="span4">
    <legend>Únete a Bululú. ¡Es gratis!</legend>
    <?php include_partial("cuentas/registroForm", array("userForm" => $userForm, "perfilForm" => $perfilForm)) ?>
  </div>
