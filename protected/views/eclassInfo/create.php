<?php
/* @var $this EclassInfoController */
/* @var $model EclassInfo */

$this->breadcrumbs=array(
	'Eclass Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EclassInfo', 'url'=>array('index')),
	array('label'=>'Manage EclassInfo', 'url'=>array('admin')),
);
?>

<h1>Create EclassInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>