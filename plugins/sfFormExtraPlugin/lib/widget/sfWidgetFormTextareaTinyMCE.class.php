<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormTextareaTinyMCE represents a Tiny MCE widget.
 *
 * You must include the Tiny MCE JavaScript file by yourself.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormTextareaTinyMCE.class.php 17192 2009-04-10 07:58:29Z fabien $
 */
class sfWidgetFormTextareaTinyMCE extends sfWidgetFormTextarea {

    /**
     * Constructor.
     *
     * Available options:
     *
     *  * theme:  The Tiny MCE theme
     *  * width:  Width
     *  * height: Height
     *  * config: The javascript configuration
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array()) {
        $this->addOption('theme', 'advanced');
        $this->addOption('width');
        $this->addOption('height');
        $this->addOption('config', '');
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
    /*
    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $textarea = parent::render($name, $value, $attributes, $errors);
        
        $js = sprintf(<<<EOF
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        language: "es",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,undo,redo,|,justifyleft,justifycenter,justifyright,justifyfull|,ltr,rtl,|,print,fullscreen,preview",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        // skin : "o2k7",
        // skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        // content_css : "css/example.css",

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
                        ,
                        $this->generateId($name),
                        $this->getOption('theme') ? "advanced" : $this->getOption('theme'),
                        $this->getOption('skin') ? sprintf('skin: "%s",', $this->getOption('skin')) : 'skin: "default",',
                        $this->getOption('width') ? sprintf('width: "%spx",', $this->getOption('width')) : 'width: "420px",',
                        $this->getOption('height') ? sprintf('height: "%spx",', $this->getOption('height')) : '',
                        $this->getOption('config') ? ",\n" . $this->getOption('config') : ''
        );
        return $textarea . $js;
    }
*/
}
