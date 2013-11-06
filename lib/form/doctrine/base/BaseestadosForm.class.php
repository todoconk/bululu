<?php

/**
 * estados form base class.
 *
 * @method estados getObject() Returns the current form's model object
 *
 * @package    venexter
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseestadosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'titulo'     => new sfWidgetFormInputText(),
      'pais_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'add_empty' => true)),
      'activo'     => new sfWidgetFormInputCheckbox(),
      'by_admin'   => new sfWidgetFormInputCheckbox(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'     => new sfValidatorPass(array('required' => false)),
      'pais_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'required' => false)),
      'activo'     => new sfValidatorBoolean(array('required' => false)),
      'by_admin'   => new sfValidatorBoolean(array('required' => false)),
      'created_by' => new sfValidatorInteger(array('required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'estados', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('estados[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'estados';
  }

}
