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
class sfWidgetFormInputHTML5Email extends sfWidgetFormInputText {

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
        $this->setOption('type', 'email');
    }

}

?>
