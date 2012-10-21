<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'Expenditures'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Expenditure', 'url'=>array('index')),
	array('label'=>'Create Expenditure', 'url'=>array('create')),
	array('label'=>'View Expenditure', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Expenditure', 'url'=>array('admin')),
);
?>

<h1>Update Expenditure <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>