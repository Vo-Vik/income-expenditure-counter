<?php
/* @var $this ExpenditureToClassesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expenditure To Classes',
);

$this->menu=array(
	array('label'=>'Create ExpenditureToClasses', 'url'=>array('create')),
	array('label'=>'Manage ExpenditureToClasses', 'url'=>array('admin')),
);
?>

<h1>Expenditure To Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
