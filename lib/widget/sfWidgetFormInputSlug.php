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
class sfWidgetFormInputSlug extends sfWidgetFormInputText {

    /**
     * Configures the current widget.
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array()) {
        parent::configure($options, $attributes);
        $this->addOption('inputToSlug', "");
        $this->addOption('inputSlugged', "");
    }
    
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
        //$attributes = array_merge($attributes, array("readonly" => "readonly"));
        
        $textfield = parent::render($name, $value, $attributes, $errors);
        return $textfield . $this->getJsWidget($this->getOption("inputToSlug"), $this->getOption("inputSlugged"));
    }

    private function getJsWidget($inputToSlug, $inputSlugged) {
        //echo $this->generateId($inputSlugged), $this->generateId($inputToSlug); exit;
        return sprintf(<<<EOF
    <button class="btn btn-green" onclick = "document.getElementById('%s').value = str2slug(document.getElementById('%s').value); return false;" style = "cursor:pointer">Get Slug!</button>
EOF
                , $this->generateId($inputSlugged), $this->generateId($inputToSlug));
    }

}
?>
