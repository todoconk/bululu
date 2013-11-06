<div class="span8">

  <legend>Personas</legend>

  <div class="media mb30">
    <a class="pull-left" href="<?php echo url_for("@personasDetail?unique_id=".time()) ?>">
      <img class="media-object img-rounded" style="width: 64px; height: 64px;" src="<?php echo image_path("no-avatar.png"); ?>">
    </a>
    <div class="media-body">
      <h4 class="media-heading">Aquiles Bailo</h4>
      <p><a href="#">Estados Unidos</a> - <a href="#">Connecticut</a></p>
      <p>Ocupación: <a href="#">Periodista</a></p>
    </div>
  </div>

  <div class="media mb30">
    <a class="pull-left" href="<?php echo url_for("@personasDetail?unique_id=".time()) ?>">
      <img class="media-object img-rounded" style="width: 64px; height: 64px;" src="<?php echo image_path("no-avatar.png"); ?>">
    </a>
    <div class="media-body">
      <h4 class="media-heading">Susana Oria</h4>
      <p><a href="#">Estados Unidos</a> - <a href="#">Seattle</a></p>
      <p>Ocupación:<a href="#">Analista de Sistemas</a></p>
    </div>
  </div>
  <div class="media mb30">
    <a class="pull-left" href="<?php echo url_for("@personasDetail?unique_id=".time()) ?>">
      <img class="media-object img-rounded" style="width: 64px; height: 64px;" src="<?php echo image_path("no-avatar.png"); ?>">
    </a>
    <div class="media-body">
      <h4 class="media-heading">Esteban Dido</h4>
      <p><a href="#">Estados Unidos</a> - <a href="#">Florida</a></p>
      <p>Ocupación: <a href="#">Creativo Audiovisual</a></p>
    </div>
  </div>

  <div class="media mb30">
    <a class="pull-left" href="<?php echo url_for("@personasDetail?unique_id=".time()) ?>">
      <img class="media-object img-rounded" style="width: 64px; height: 64px;" src="<?php echo image_path("no-avatar.png"); ?>">
    </a>
    <div class="media-body">
      <h4 class="media-heading">Mario Neta</h4>
      <p><a href="#">Estados Unidos</a> - <a href="#">Texas</a></p>
      <p>Ocupación: <a href="#">Carpintero</a></p>
    </div>
  </div>

</div>

<div class="span4">
  <div class="row-fluid mb30">
    <legend>Buscar por:</legend>
    
    <label>Correo Electrónico</label>
    <input type="text">

    <label>Ocupación</label>
    <input type="text">
    
    <label>País</label>
    <select id="sf_guard_user_bululu_pais_id" class="span" required="required" name="sf_guard_user_bululu[pais_id]">
      <option selected="selected" value=""></option>
      <option value="1">Estados Unidos</option>
    </select>
    
    <label>Estado</label>
    <select id="sf_guard_user_bululu_estado_id" class="span" required="required" name="sf_guard_user_bululu[estado_id]">
      <option selected="selected" value=""></option>
      <option value="1">Alabama</option>
      <option value="2">Alaska</option>
      <option value="3">Arizona</option>
      <option value="4">Arkansas</option>
      <option value="5">California</option>
      <option value="6">Carolina del Norte</option>
      <option value="7">Carolina del Sur</option>
      <option value="8">Colorado</option>
      <option value="9">Connecticut</option>
      <option value="10">Dakota del Norte</option>
      <option value="11">Dakota del Sur</option>
      <option value="12">Delaware</option>
      <option value="13">Florida</option>
      <option value="14">Georgia</option>
      <option value="15">Hawái</option>
      <option value="16">Idaho</option>
      <option value="17">Illinois</option>
      <option value="18">Indiana</option>
      <option value="19">Iowa</option>
      <option value="20">Kansas</option>
      <option value="21">Kentucky</option>
      <option value="22">Luisiana</option>
      <option value="23">Maine</option>
      <option value="24">Maryland</option>
      <option value="25">Massachusetts</option>
      <option value="26">Míchigan</option>
      <option value="27">Minnesota</option>
      <option value="28">Misisipi</option>
      <option value="29">Misuri</option>
      <option value="30">Montana</option>
      <option value="31">Nebraska</option>
      <option value="32">Nevada</option>
      <option value="33">Nueva Jersey</option>
      <option value="34">Nueva York</option>
      <option value="35">Nuevo Hampshire</option>
      <option value="36">Nuevo México</option>
      <option value="37">Ohio</option>
      <option value="38">Oklahoma</option>
      <option value="39">Oregón</option>
      <option value="40">Pensilvania</option>
      <option value="41">Rhode Island</option>
      <option value="42">Tennessee</option>
      <option value="43">Texas</option>
      <option value="44">Utah</option>
      <option value="45">Vermont</option>
      <option value="46">Virginia</option>
      <option value="47">Virginia Occidental</option>
      <option value="48">Washington</option>
      <option value="49">Wisconsin</option>
      <option value="50">Wyoming</option>
    </select>

    <label class="radio inline">
      <input type="radio"> Masculino
    </label>
    <label class="radio inline">
      <input type="radio"> Femenino
    </label>
    <button type="submit" class="mt10 btn btn-success btn-block">Buscar</button>

  </div>
</div>