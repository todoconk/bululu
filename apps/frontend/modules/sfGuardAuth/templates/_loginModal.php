<div id="login" class="modal hide fade" tabindex="-1" role="dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3 id="myModalLabel">Inicio de Sesión</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" action="<?php echo url_for('@sf_guard_signin') ?>" method="post" accept-charset="utf-8">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Correo Electrónico</label>
        <div class="controls">
          <?php echo $siginForm['username']; ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Contraseña</label>
        <div class="controls">
          <?php echo $siginForm['password'] ?>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <a class="white" href="#" id="resend_password_link">¿Olvido su Contraseña?</a>
        </div>
      </div>
      <?php echo $siginForm['_csrf_token'] ?>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <a href="<?php echo url_for("home") ?>" class="btn btn-primary">Entrar</a>
  </div>
</div>
