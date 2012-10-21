<?php
/* @var $this EclassInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eclass Infos',
);

$this->menu=array(
	array('label'=>'Create EclassInfo', 'url'=>array('create')),
	array('label'=>'Manage EclassInfo', 'url'=>array('admin')),
);
?>

<h1>Eclass Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
