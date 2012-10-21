<?php
/* @var $this ExpenditureToClassesController */
/* @var $model ExpenditureToClasses */

$this->breadcrumbs=array(
	'Expenditure To Classes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ExpenditureToClasses', 'url'=>array('index')),
	array('label'=>'Create ExpenditureToClasses', 'url'=>array('create')),
	array('label'=>'Update ExpenditureToClasses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExpenditureToClasses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExpenditureToClasses', 'url'=>array('admin')),
);
?>

<h1>View ExpenditureToClasses #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'expenditure',
		'class_id',
	),
)); ?>
