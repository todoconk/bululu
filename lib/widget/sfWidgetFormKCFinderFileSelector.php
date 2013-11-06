<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfWidgetFormKCFinderFileSelector
 *
 * @author koko
 */
class sfWidgetFormKCFinderFileSelector extends sfWidgetFormInputText {

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
        $this->addOption('browseType', "files");
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
        return $textfield . $this->getJsWidget($this->generateId($name), $this->getOption("browseType"));
    }
    private function getJsWidget($widgetId, $browseType = "files") {
        return sprintf(<<<EOF
        
    <button class="btn btn-blue" onclick = "%sKCFinder(document.getElementById('%s')); return false;" style = "cursor:pointer">Seleccionar</button>
    <div id="%sKCfinder_div"></div>

    <script type="text/javascript">
        function %sKCFinder(field) {
            window.KCFinder = {
                callBack: function(url) {
                    window.KCFinder = null;
                    field.value = url;
                }
            };
            
            window.open('%s?type=%s', 'kcfinder_textbox',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
            'resizable=1, scrollbars=0, width=800, height=600'
            );
        }
    </script>
    
EOF
                , $widgetId, $widgetId, $widgetId, $widgetId, public_path("kcfinder/browse.php"), $browseType);
    }

}


?>
