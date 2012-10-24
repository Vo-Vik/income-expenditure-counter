<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expenditure-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
			'model'=>$model,
			'attribute'=>'date',
			//  optional: jquery Datepicker options
			'options' => array(
				'dateFormat'=>'yy-mm-dd',

				// this is useful to allow only valid chars in the input field, according to dateFormat
				'constrainInput' => 'false',
				'showAnim' =>'fold',
			),


			// optional: html options will affect the input element, not the datepicker widget itself
			'htmlOptions'=>array(
			'style'=>'height:20px;
				width:80px;
				background:#ffbf00;
				color:#00a;
				font-weight:bold;
				font-size:0.9em;
				border: 1px solid #A80;
				padding-left: 4px;'
			)
		));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->dropDownList($model,'class_id', CHtml::listData(EclassInfo::model()->findAll(), 'id', 'name'), array('empty'=>'select Class')); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->