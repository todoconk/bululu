<?php use_stylesheets_for_form($userForm) ?>
<?php use_stylesheets_for_form($perfilForm) ?>

<?php use_javascripts_for_form($userForm) ?>
<?php use_javascripts_for_form($perfilForm) ?>

<form id="<?php echo $userForm->getModelName(); ?>" action="<?php echo url_for("sf_guard_register") ?>" method="post" <?php $userForm->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <div><?php echo $userForm->renderGlobalErrors() ?></div>
  <div><?php echo $perfilForm->renderGlobalErrors() ?></div>

  <div class="controls row-fluid">
    <div class="control-group span6">
      <?php echo $userForm['first_name']->renderLabel("Nombres") ?>
      <input type="text" class="span">
      <?php echo $userForm['first_name']->renderError() ?>
    </div>
    <div class="control-group span6">
      <?php echo $userForm['last_name']->renderLabel("Apellidos") ?>
      <input type="text" class="span">
      <?php echo $userForm['last_name']->renderError() ?>
    </div>
  </div>

  <div class="controls row-fluid">
    <div class="control-group span">
      <?php echo $userForm['email_address']->renderLabel("Correo Electrónico") ?>
      <?php echo $userForm['email_address']->render(array("required" => "required", "class" => "span")) ?>
      <?php echo $userForm['email_address']->renderError() ?>
    </div>
  </div>

  <div class="controls row-fluid">
    <div class="control-group span6">
      <?php echo $userForm['password']->renderLabel("Contraseña") ?>
      <?php echo $userForm['password']->render(array("required" => "required", "class" => "span")) ?>
      <?php echo $userForm['password']->renderError() ?>
    </div>
    <div class="control-group span6">
      <label for="sf_guard_user_password">Repite Contraseña</label>
      <input type="password" class="span">
    </div>
  </div>

  <div class="controls row-fluid">
    <div class="control-group span6">
      <?php echo $perfilForm['fecha_nacimiento']->renderLabel("Fecha de Nacimiento") ?>
      <input type="text" class="span">
      <span class="formHelp">Formato dd/mm/aaaa</span>
      <?php echo $perfilForm['fecha_nacimiento']->renderError() ?>
    </div>
    <div class="control-group span6">
      <?php echo $perfilForm['sexo_id']->renderLabel("Sexo") ?>
      <label class="radio inline">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
        Masculino
      </label>
      <label class="radio inline">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
        Femenino
      </label>
      <?php echo $perfilForm['sexo_id']->renderError() ?>
    </div>
  </div>

  <div class="controls row-fluid">
    <div class="control-group span6">
      <?php echo $perfilForm['pais_id']->renderLabel("País") ?>
      <?php echo $perfilForm['pais_id']->render(array("required" => "required", "class" => "span")) ?>
      <?php echo $perfilForm['pais_id']->renderError() ?>
    </div>
    <div class="control-group span6">
      <?php echo $perfilForm['estado_id']->renderLabel("Estado") ?>
      <?php echo $perfilForm['estado_id']->render(array("required" => "required", "class" => "span")) ?>
      <?php echo $perfilForm['estado_id']->renderError() ?>
    </div>
  </div>

  <div class="control-group text-center">
    <?php echo $userForm->renderHiddenFields(false) ?>
    <?php echo $perfilForm->renderHiddenFields(false) ?>
    <a class="btn btn-success" data-loading-text="Procesando bienvenida..." href="<?php echo url_for("home") ?>">Únete Ahora</a>
  </div>

</form>
