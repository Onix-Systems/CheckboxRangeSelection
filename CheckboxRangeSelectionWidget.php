<?php
/**
 * Simple check box range selection with shift button
 *
 * @author Taras Suhovenko
 * @property string $class class of the elements
 */
class CheckboxRangeSelectionWidget extends CWidget {

    public $class;

    public function run() {
        if (!$this->class) {
            return;
        }
        $assetsPath = dirname(__FILE__) . '/assets';
        $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile($assetsUrl . '/checkboxRangeSelection.js');

        Yii::app()->clientScript->registerScript('Yii.' . get_class($this) . '#' . $this->class, "
            $('input." . $this->class . "').enableCheckboxRangeSelection();
        ", CClientScript::POS_READY);
    }
}
