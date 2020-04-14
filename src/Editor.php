<?php

namespace wdmg\widgets;

/**
 * Yii2 WYSIWYG editor
 *
 * @category        Widgets
 * @version         1.0.10
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-editor
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class Editor extends InputWidget
{
    public $clientPlugins;
    public $clientOptions = [];
    public $pluginOptions = [];
    private $editorId = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        // Get input id
        if (isset($this->options['id']))
            $this->editorId = $this->options['id'];
        else
            $this->editorId = $this->getId();

        $this->options['id'] = $this->editorId;

        // Input field
        if($this->hasModel())
            $input = Html::activeHiddenInput($this->model, $this->attribute, $this->options);
        else
            $input = Html::hiddenInput($this->name, $this->value, $this->options);

        // Register assets
        $this->registerAssets();

        echo $input;
    }

    /**
     * Register required assets for the widgets
     */
    public function registerAssets()
    {
        $js = [];
        $view = $this->getView();

        // Register WYSYWIG editor assets to view
        EditorAssets::register($view);

        // Register Font Awesome assets to view
        FontAwesomeAssets::register($view);

        // Parse plugin options and insert inline
        $pluginOptions = !empty($this->pluginOptions) ? Json::encode($this->pluginOptions) : '';
        $js[] = "; jQuery('#" . $this->editorId . "').wysiwyg($pluginOptions);";
        $js[] = "; jQuery(document).on('pjax:success', function() {
            jQuery('#" . $this->editorId . "').wysiwyg($pluginOptions);
        });";

        // Register datepicker component initial script
        $view->registerJs(implode("\n", $js));

    }


}

?>