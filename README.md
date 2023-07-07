[![Yii2](https://img.shields.io/badge/required-Yii2_v2.0.40-blue.svg)](https://packagist.org/packages/yiisoft/yii2)
[![Downloads](https://img.shields.io/packagist/dt/wdmg/yii2-editor.svg)](https://packagist.org/packages/wdmg/yii2-editor)
[![Packagist Version](https://img.shields.io/packagist/v/wdmg/yii2-editor.svg)](https://packagist.org/packages/wdmg/yii2-editor)
![Progress](https://img.shields.io/badge/progress-ready_to_use-green.svg)
[![GitHub license](https://img.shields.io/github/license/wdmg/yii2-editor.svg)](https://github.com/wdmg/yii2-editor/blob/master/LICENSE)

# Yii2 WYSIWYG Editor
 WYSIWYG editor for Yii2 based on Bootstrap 3.

This module is an integral part of the [Butterfly.SMS](https://butterflycms.com/) content management system, but can also be used as an standalone extension.

Copyrights (c) 2019-2023 [W.D.M.Group, Ukraine](https://wdmg.com.ua/)

# Requirements 
* PHP 5.6 or higher
* Yii2 v.2.0.40 and newest
* Yii2 Bootstrap
* [Bootstrap WYSIWYG editor](https://github.com/wdmg/bootstrap-wysiwyg) v.1.1.3 and newest.
* [Font Awesome](https://github.com/FortAwesome/Font-Awesome) v.5.13 and newest.

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
    echo $form->field($model, 'message')->widget(Editor::class, [
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

# Status and version [ready to use]
* v.1.2.1 - Update dependencies
* v.1.2.0 - Update copyrights
* v.1.1.1 - Update WYSIWYG editor
* v.1.1.0 - Update README.md
* v.1.0.10 - Update WYSIWYG editor
* v.1.0.9 - Fixed widget ID and init after Pjax reloading
* v.1.0.8 - Update WYSIWYG editor
* v.1.0.7 - Fixed deprecated class declaration
* v.1.0.6 - Update Yii2 version