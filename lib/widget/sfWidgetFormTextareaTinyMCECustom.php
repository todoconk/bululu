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
class sfWidgetFormTextareaTinyMCECustom extends sfWidgetFormTextareaTinyMCE {

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
        $textarea = parent::render($name, $value, $attributes, $errors);
        return $textarea . $this->getJsWidget($attributes["perfil"]);
    }

    private function getJsWidget($perfil) {
        return sprintf(<<<EOF
        <script type="text/javascript">
            tinyMCE.init({
                // General options
                mode :      "textareas",
                theme :     "advanced",
                language:   "es",
                height:     "600px",
                plugins :   "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                // Theme options
                %s
                
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : false,
                
                // Drop lists for link/image/media/template dialogs
                template_external_list_url : "js/template_list.js",
                external_link_list_url : "js/link_list.js",
                external_image_list_url : "js/image_list.js",
                media_external_list_url : "js/media_list.js",

                // Replace values for the template plugin
                template_replace_values : {
                        username : "Some User",
                        staffid : "991234"
                }
        });
        </script>
EOF
        ,$this->getPerfil($perfil));
    }

    private function getPerfil($param) {
        switch ($param) {
            case "advanced":
                $js = <<<EOF
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,undo,redo,|,justifyleft,justifycenter,justifyright,justifyfull|,ltr,rtl,|,print,fullscreen,preview",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
EOF;
                break;
            case "full":
                $js = <<<EOF
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,undo,redo,|,justifyleft,justifycenter,justifyright,justifyfull|,ltr,rtl,|,print,fullscreen,preview",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
        theme_advanced_buttons4 : "",
EOF;
                break;
            case "minimal":
                $js = <<<EOF
        theme_advanced_buttons1 : "cut,copy,paste,pastetext,pasteword,|,bold,italic,underline,strikethrough,|,undo,redo,|,search,replace,|,justifyleft,justifycenter,justifyright,justifyfull|,ltr,rtl,|,print,fullscreen,preview",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        
EOF;
                break;
        
        }
        return $js;
    }

}

?>
