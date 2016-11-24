<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'Expenditures'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Expenditure', 'url'=>array('index')),
	array('label'=>'Create Expenditure', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('expenditure-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Expenditures</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $classNames = CHtml::listData(EclassInfo::model()->findAll(), 'id', 'name'); ?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'expenditure-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'name',
			'value' => '$data->name',
		),
		array(
			'name'=>'amount',
			'value' => '$data->amount',
			'header' => 'Total amount: '.$model->totalAmount(),
		),
		'date',
		array(
			'name' => 'class_id',
			'value' => '$data->classType->name',
			'filter' => $classNames
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
