<?php
/* @var $this ExpenditureToClassesController */
/* @var $model ExpenditureToClasses */

$this->breadcrumbs=array(
	'Expenditure To Classes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExpenditureToClasses', 'url'=>array('index')),
	array('label'=>'Create ExpenditureToClasses', 'url'=>array('create')),
	array('label'=>'View ExpenditureToClasses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExpenditureToClasses', 'url'=>array('admin')),
);
?>

<h1>Update ExpenditureToClasses <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>