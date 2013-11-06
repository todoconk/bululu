<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfWidgetFormInputSlug
 *
 * @author kkrikorian
 */
class sfWidgetFormInputDatePicker extends sfWidgetFormInputText {
       
    /**
     * @param  string $name        The element name
     * @param  string $value       The value selected in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $attributes = array_merge($attributes, array("size" => "10", "class" => "jquery-datepicker"));
        
        $textfield = parent::render($name, $value, $attributes, $errors);
        return $textfield;
    }

}
?>
