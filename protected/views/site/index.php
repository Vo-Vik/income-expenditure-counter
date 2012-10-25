<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$emodel = new Expenditure;
$imodel = new Income;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div>
	Your total Expenditure is: <?php echo $emodel->totals(); ?><br />
	Your total Income is: <?php echo $imodel->totals(); ?><br />
	Your total Balance is: <?php echo $imodel->totals()-$emodel->totals(); ?>
</div>
<div>
This month your Expenditure is: <?php echo $emodel->totals(true); ?><br />
This month your Income is: <?php echo $imodel->totals(true); ?><br />
This month your Balance is: <?php echo $imodel->totals(true)-$emodel->totals(true); ?>
</div>
<br />
<p><a href="?r=expenditure/admin">Manage your expenditure</a><br />
<a href="?r=income/admin">Manage your income</a></p>

