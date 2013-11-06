<?php

/**
 * sfGuardUserBululu form base class.
 *
 * @method sfGuardUserBululu getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserBululuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'unique_id'        => new sfWidgetFormInputText(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'foto_avatar'      => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'sexo_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sexos'), 'add_empty' => true)),
      'profesion'        => new sfWidgetFormInputText(),
      'video_url'        => new sfWidgetFormInputText(),
      'pais_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'add_empty' => true)),
      'estado_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('estados'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'unique_id'        => new sfValidatorPass(array('required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'foto_avatar'      => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
      'sexo_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sexos'), 'required' => false)),
      'profesion'        => new sfValidatorPass(array('required' => false)),
      'video_url'        => new sfValidatorPass(array('required' => false)),
      'pais_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'required' => false)),
      'estado_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('estados'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_bululu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserBululu';
  }

}
