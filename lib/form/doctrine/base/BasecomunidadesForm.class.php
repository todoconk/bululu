<?php

/**
 * comunidades form base class.
 *
 * @method comunidades getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasecomunidadesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'unique_id'   => new sfWidgetFormInputText(),
      'feedback_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('comunidades'), 'add_empty' => true)),
      'perfil_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUserBululu'), 'add_empty' => true)),
      'pais_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'add_empty' => true)),
      'estado_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('estados'), 'add_empty' => true)),
      'avatar'      => new sfWidgetFormInputText(),
      'titulo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'unique_id'   => new sfValidatorPass(array('required' => false)),
      'feedback_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('comunidades'), 'required' => false)),
      'perfil_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUserBululu'), 'required' => false)),
      'pais_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'required' => false)),
      'estado_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('estados'), 'required' => false)),
      'avatar'      => new sfValidatorPass(array('required' => false)),
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('comunidades[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'comunidades';
  }

}
