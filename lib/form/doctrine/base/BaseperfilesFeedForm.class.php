<?php

/**
 * perfilesFeed form base class.
 *
 * @method perfilesFeed getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseperfilesFeedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'unique_id'   => new sfWidgetFormInputText(),
      'feedback_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('perfilesFeed'), 'add_empty' => true)),
      'perfil_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUserBululu'), 'add_empty' => true)),
      'descripcion' => new sfWidgetFormTextarea(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'unique_id'   => new sfValidatorPass(array('required' => false)),
      'feedback_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('perfilesFeed'), 'required' => false)),
      'perfil_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUserBululu'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'perfilesFeed', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('perfiles_feed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'perfilesFeed';
  }

}
