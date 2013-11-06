<?php

/**
 * perfilesFollow form base class.
 *
 * @method perfilesFollow getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseperfilesFollowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'perfil_id' => new sfWidgetFormInputHidden(),
      'follow_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'perfil_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('perfil_id')), 'empty_value' => $this->getObject()->get('perfil_id'), 'required' => false)),
      'follow_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('follow_id')), 'empty_value' => $this->getObject()->get('follow_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfiles_follow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'perfilesFollow';
  }

}
