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
        $this->pluginOptions['language'] = 'ru-ru';
        $this->pluginOptions['translations'] = [
            'ru-ru' => [
                'Editor' => "Редактор",
                'Source' => "Исходник",
                'Undo' => "Отменить",
                'Rendo' => "Повторить",
                'Cut' => "Вырезать",
                'Copy' => "Копировать",
                'Paste' => "Вставить",
                'Text style' => "Стиль текста",
                'Font family' => "Шрифт текста",
                'Font size' => "Размер шрифта",
                'Bold' => "Полужирный",
                'Italic' => "Курсив",
                'Underline' => "Подчёркнутый",
                'Striked text' => "Зачеркнутый",
                'Subscript' => "Подстрочный",
                'Superscript' => "Надстрочный",
                'Font color' => "Цвет текста",
                'Background color' => "Цвет фона",
                'Align left' => "По левому краю",
                'Align center' => "По центру",
                'Align right' => "По правому краю",
                'Justify content' => "По ширине",
                'Unordered list' => "Маркированный список",
                'Ordered list' => "Нумерованный список",
                'Indent' => "Уменьшить отступ",
                'Outdent' => "Увеличить отступ",
                'Insert table' => "Вставить таблицу",
                'Lines interval' => "Междустрочный интервал",
                'Letter spacing' => "Межсимвольный интервал",
                'Add emoji' => "Добавить эмоджи",
                'Add URL' => "Добавить URL",
                'Add image' => "Добавить изображение",
                'Add video' => "Добавить видео",
                'Add symbol' => "Добавить символ",
                'Print' => "Печать",
                'Erase style' => "Очистить стиль",
                'Visual blocks' => "Визуальные блоки",
                'Clear HTML' => "Очистить HTML",
            ]
        ];
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