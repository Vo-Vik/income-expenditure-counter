<?php
/* @var $this EclassInfoController */
/* @var $model EclassInfo */

$this->breadcrumbs=array(
	'Eclass Infos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EclassInfo', 'url'=>array('index')),
	array('label'=>'Create EclassInfo', 'url'=>array('create')),
	array('label'=>'Update EclassInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EclassInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EclassInfo', 'url'=>array('admin')),
);
?>

<h1>View EclassInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
