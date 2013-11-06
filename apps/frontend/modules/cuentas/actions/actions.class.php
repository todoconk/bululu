<?php

/**
 * registro actions.
 *
 * @package    venexter
 * @subpackage cuentas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cuentasActions extends sfActions{

  public function executeIndex(sfWebRequest $request){
    $this->userForm = new sfGuardUserForm();
    $this->perfilForm = new sfGuardUserBululuForm();

    $userFormSchema = $this->userForm->getWidgetSchema();
    $userFormSchema["email_address"] = new sfWidgetFormInputHTML5Email();

    unset($this->userForm['username']);

    $userValidatorSchema = $this->userForm->getValidatorSchema();
    $userValidatorSchema["email_address"] = new sfValidatorEmail(array('required' => true));

    $userFormSchema['password_again'] = new sfWidgetFormInputPassword();
    $userValidatorSchema['password_again'] = clone $userValidatorSchema['password'];
    $userFormSchema->moveField('password_again', 'after', 'password');
    $this->userForm->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));

    if ($request->isMethod(sfRequest::POST)) {
      $this->userForm->bind($request->getParameter($this->userForm->getName()), $request->getFiles($this->userForm->getName()));
      $this->perfilForm->bind($request->getParameter($this->perfilForm->getName()), $request->getFiles($this->perfilForm->getName()));
      if ($this->userForm->isValid() && $this->perfilForm->isValid()) {
        $this->processRegistroForm($request, $this->userForm, $this->perfilForm);
      }
    }
  }

  protected function processRegistroForm($request, $userForm, $perfilForm) {
    $userGuard = $userForm->updateObject();
    $userGuard->setIsActive(true);
    $userGuard->setUsername($userGuard->getEmailAddress());
    $userGuard->save();

    $perfilUser = $perfilForm->updateObject();
    $perfilUser->setUniqueId(koiLib::getUniqueToken(20));
    $perfilUser->setUserId($userGuard->getId());
    $perfilUser->setCodigoVerificacion(koiLib::randomString(50, false, true, false));
    $perfilUser->save();

    $userGroup = new sfGuardUserGroup();
    $userGroup->setUserId($userGuard->getId());
    $userGroup->setGroupId(sfGuardGroupTable::getInstance()->findOneByName("commonGroup")->getId());
    $userGroup->save();

    $this->getUser()->signin($userGuard);
    //$this->registroEmail($userGuard);
  }

  protected function registroEmail($usuario) {

    $to = $usuario->getEmailAddress();
    $from = sfConfig::get("app_sf_guard_plugin_default_from_email");

    $body_partial = $this->getPartial("cuentas/registroEmail", array("user" => $usuario));

    $message = $this->getMailer()->compose($from, $to, $usuario->getFirstName() . " " . $usuario->getLastName() . " Bienvenido a Didijin");
    $message->setBody($body_partial, 'text/html');
    try {
      if($this->getMailer()->send($message)){
        $this->getUser()->setFlash("success", "¡Felicidades!, Hemos enviado un correo a " . $usuario->getEmailAddress() . " para la activación de su cuenta.");
        $this->redirect("usuariosIndex");
      }else{
        $this->getUser()->setFlash("error", "Lo siento!, No hemos podido enviar tu correo de activación a " . $usuario->getEmailAddress());
        $this->redirect("cuentasActivar");
      }          
    }  catch (Exception $e){
      echo $e->getMessage();
    }

  }

}
