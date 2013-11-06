<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfWidgetFormTextareaTinyMCECustom
 *
 * @author kkrikorian
 */
class sfWidgetFormTextareaCKEditor extends sfWidgetFormTextarea {

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
        $attributes["class"] = "ckeditor";
        $textarea = parent::render($name, $value, $attributes, $errors);
        return $textarea;//. $this->getJsWidget($this->generateId($name));
    }

    private function getJsWidget($widgetId) {
        return sprintf(<<<EOF
        
        <script type="text/javascript">
            
            CKEDITOR.replace( '%s', 
                {
                    %s
                });
                
           </script>
EOF
                , $widgetId, $this->getFileBrowser());
    }

    protected function getFileBrowser() {
        $webRoot = sfContext::getInstance()->getRequest()->getRelativeUrlRoot();
        return sprintf(<<<EOF
                    filebrowserBrowseUrl        :   '%s/kcfinder/browse.php?type=files',
                    filebrowserImageBrowseUrl   :   '%s/kcfinder/browse.php?type=images',
                    filebrowserFlashBrowseUrl   :   '%s/kcfinder/browse.php?type=flash',
                    filebrowserUploadUrl        :   '%s/kcfinder/upload.php?type:files',
                    filebrowserImageUploadUrl   :   '%s/kcfinder/upload.php?type=images',
                    filebrowserFlashUploadUrl   :   '%s/kcfinder/upload.php?type=flash',
EOF
                , $webRoot, $webRoot, $webRoot, $webRoot, $webRoot, $webRoot);
    }

}

?>
