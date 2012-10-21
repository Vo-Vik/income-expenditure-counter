<?php
/* @var $this EclassInfoController */
/* @var $model EclassInfo */

$this->breadcrumbs=array(
	'Eclass Infos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EclassInfo', 'url'=>array('index')),
	array('label'=>'Create EclassInfo', 'url'=>array('create')),
	array('label'=>'View EclassInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EclassInfo', 'url'=>array('admin')),
);
?>

<h1>Update EclassInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>