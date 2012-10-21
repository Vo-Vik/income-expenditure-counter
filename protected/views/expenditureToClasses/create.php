<?php
/* @var $this ExpenditureToClassesController */
/* @var $model ExpenditureToClasses */

$this->breadcrumbs=array(
	'Expenditure To Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExpenditureToClasses', 'url'=>array('index')),
	array('label'=>'Manage ExpenditureToClasses', 'url'=>array('admin')),
);
?>

<h1>Create ExpenditureToClasses</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>