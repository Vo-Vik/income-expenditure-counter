<?php
/* @var $this IncomeController */
/* @var $model Income */

$this->breadcrumbs=array(
	'Incomes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Income', 'url'=>array('index')),
	array('label'=>'Create Income', 'url'=>array('create')),
	array('label'=>'View Income', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Income', 'url'=>array('admin')),
);
?>

<h1>Update Income <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>