<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfWidgetFormInputImageFileEditable
 *
 * @author kkrikorian
 */
class sfWidgetFormInputImageFileEditable extends sfWidgetFormInputFileEditable {

    protected function configure($options = array(), $attributes = array()) {
        parent::configure($options, $attributes);
        $this->addRequiredOption('file_name');
        $this->addRequiredOption('input_mode');
        $this->addRequiredOption("upload_dir");
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $nameID = $this->generateId($name);
        $acciones = "";

        if ($this->getOption("edit_mode") && $this->getOption("input_mode") == "backend") {
            $acciones =
                    '<span>' .
                    '<a class="fancybox" href="' . $this->getOption("upload_dir") . 'koizoom_' . $this->getOption("file_name") . '" ><img style="vertical-align: middle; " src="' . $this->getOption("upload_dir") . 'koipanel_' . $this->getOption("file_name") . '"/></a> ' .
                    '</span>';
        }


        $this->setOption("template", "%input% %delete% " . $acciones);
        $inputFile = parent::render($name, $value, $attributes, $errors);
        return sprintf("<style>#%s_delete{ display:none; }</style>", $nameID) . $inputFile;
    }

}

?>
