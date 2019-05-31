[![Progress](https://img.shields.io/badge/required-Yii2_v2.0.13-blue.svg)](https://packagist.org/packages/yiisoft/yii2) [![Github all releases](https://img.shields.io/github/downloads/wdmg/yii2-editor/total.svg)](https://GitHub.com/wdmg/yii2-editor/releases/) [![GitHub version](https://badge.fury.io/gh/wdmg/yii2-editor.svg)](https://github.com/wdmg/yii2-editor) ![Progress](https://img.shields.io/badge/progress-in_development-red.svg) [![GitHub license](https://img.shields.io/github/license/wdmg/yii2-editor.svg)](https://github.com/wdmg/yii2-editor/blob/master/LICENSE)

# Yii2 WYSIWYG Editor
Simple WYSIWYG editor for Yii2 based on Bootstrap 3

# Requirements 
* PHP 5.6 or higher
* Yii2 v.2.0.19 and newest
* Yii2 Bootstrap
* [Bootstrap WYSIWYG editor](https://github.com/wdmg/bootstrap-wysiwyg) v.1.1.1 and newest.
* [Font Awesome](https://github.com/FortAwesome/Font-Awesome) v.4.7.0 and newest.

# Installation
To install the widget, run the following command in the console:

`$ composer require "wdmg/yii2-editor"`

# Usage
Example of standalone widget:

    <?php
    
    use wdmg\widgets\Editor;
    ...
    
    echo Editor::widget([
        'model' => $model,
        'attribute' => 'message',
        'options' => [
           ...
        ],
        'pluginOptions' => [
            ...
        ]
        ...
    ]);
    
    ?>

Example of use with ActiveForm:

    <?php
    
    use wdmg\widgets\Editor;
    ...
    
    $form = ActiveForm::begin();
    ...
    echo $form->field($model, 'message')->widget(Editor::className(), [
        'options' => [
            ...
        ],
        'pluginOptions' => [
            ...
        ]
        ...
    ]);
    ...
    ActiveForm::end();
    
    ?>

# Status and version
* v.1.0.5 - Update Yii2 version
* v.1.0.4 - Updated dependecies