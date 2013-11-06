<?php

/**
 * perfilesContactos filter form base class.
 *
 * @package    venexter
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseperfilesContactosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'valor'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'valor'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('perfiles_contactos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'perfilesContactos';
  }

  public function getFields()
  {
    return array(
      'perfil_id'        => 'Number',
      'tipo_contacto_id' => 'Number',
      'valor'            => 'Text',
    );
  }
}
