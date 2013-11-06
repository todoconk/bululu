<?php

/**
 * comunidades filter form base class.
 *
 * @package    venexter
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasecomunidadesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'unique_id'   => new sfWidgetFormFilterInput(),
      'feedback_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('comunidades'), 'add_empty' => true)),
      'perfil_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUserBululu'), 'add_empty' => true)),
      'pais_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('paises'), 'add_empty' => true)),
      'estado_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('estados'), 'add_empty' => true)),
      'avatar'      => new sfWidgetFormFilterInput(),
      'titulo'      => new sfWidgetFormFilterInput(),
      'descripcion' => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'unique_id'   => new sfValidatorPass(array('required' => false)),
      'feedback_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('comunidades'), 'column' => 'id')),
      'perfil_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUserBululu'), 'column' => 'id')),
      'pais_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('paises'), 'column' => 'id')),
      'estado_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('estados'), 'column' => 'id')),
      'avatar'      => new sfValidatorPass(array('required' => false)),
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comunidades_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'comunidades';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'unique_id'   => 'Text',
      'feedback_id' => 'ForeignKey',
      'perfil_id'   => 'ForeignKey',
      'pais_id'     => 'ForeignKey',
      'estado_id'   => 'ForeignKey',
      'avatar'      => 'Text',
      'titulo'      => 'Text',
      'descripcion' => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
