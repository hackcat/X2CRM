<?php
/***********************************************************************************
 * X2CRM is a customer relationship management program developed by
 * X2Engine, Inc. Copyright (C) 2011-2016 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2ENGINE, X2ENGINE DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. P.O. Box 66752, Scotts Valley,
 * California 95067, USA. on our website at www.x2crm.com, or at our
 * email address: contact@x2engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 **********************************************************************************/

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/importexport.css');
?>
<div class="page-title"><h2><?php echo Yii::t('admin','Import Data from Template'); ?></h2></div>
<div class='admin-form-container'>
<div class="form">
<?php echo Yii::t('admin','To import your data a CSV file, please upload the file here using the form below.').
        ' '.Yii::t('admin','Please note, this installation of X2Engine must have all the same fields as the source data.'); ?>
<br><br>
<?php echo Yii::t('admin','This import has a very specific style of data formatting required to be used. To get a better example of the formatting, export a set of data and look at how it is formatted.  A brief description is also provided here.'); ?>
<br><br>
<?php echo Yii::t('admin','The first cell of the CSV should be the version from which data was exported.  If it is a fresh set of data or was not exported, use the current version.');?>
<br><br>
<?php echo Yii::t('admin','Each record type should have a set of column names as metadata with the type of record (e.g. "Contacts" or "Accounts" at the end.  Each record should also have the record type as the last column.'); ?>
<br><br>
<h3><?php echo Yii::t('contacts','Upload File'); ?></h3>
<?php 
echo CHtml::form('import','post',array('enctype'=>'multipart/form-data','id'=>'file-form')); 
echo CHtml::activeFileField($formModel, 'data', array('id'=>'data')); 
echo CHtml::error ($formModel, 'data');
?> <br><br>
<?php 
echo Yii::t('admin','Overwrite old data');
echo X2Html::hint("Overwriting is disabled on Fields as this would remove all currently existing data in that field."); 
?><br>
<?php 
echo CHtml::activeDropDownList(
    $formModel, 
    'overwrite', 
    array(0=>Yii::t('app','No'),1=>Yii::t('app','Yes')),array('id'=>'overwrite-selector')); 
?>

<h3><?php
    echo Yii::t('admin', 'Customize CSV') .
        X2Html::minimizeButton (array('class' => 'pseudo-link'), '#importSeparator'); ?>
</h3>
<div id='importSeparator' style='display:none'>
    <?php
        echo CHtml::activeLabel($formModel, 'delimeter');
        echo CHtml::activeTextField($formModel, 'delimeter').'<br />';
        echo CHtml::activeLabel($formModel, 'enclosure');
        echo CHtml::activeTextField($formModel, 'enclosure');
    ?>
</div>
<br><br>
<?php 
echo CHtml::submitButton(Yii::t('app','Submit'),array('class'=>'x2-button','id'=>'import-button'));
echo CHtml::endForm(); 
?>
</div>
</div>
