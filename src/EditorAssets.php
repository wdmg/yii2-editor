<?php


namespace wdmg\widgets;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\web\AssetBundle;

class EditorAssets extends AssetBundle
{

    public $sourcePath = '@bower/bootstrap-wysiwyg-editor/src';

    public function init()
    {
        parent::init();
        $this->css = YII_DEBUG ? ['css/wysiwyg.css'] : ['css/wysiwyg.min.css'];
        $this->js = YII_DEBUG ? ['js/wysiwyg.js'] : ['js/wysiwyg.min.js'];
        $this->depends = [\yii\web\JqueryAsset::class];
    }

}