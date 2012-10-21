<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'Expenditures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Expenditure', 'url'=>array('index')),
	array('label'=>'Manage Expenditure', 'url'=>array('admin')),
);
?>

<h1>Create Expenditure</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>