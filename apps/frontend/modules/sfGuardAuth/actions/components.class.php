<?php

/**
 * Description of components
 *
 * @author Your name here
 */
class sfGuardAuthComponents extends sfComponents {

  public function executeLoginModal(sfWebRequest $request) {
   $this->siginForm = new sfGuardFormSignin();
 }

}

?>
