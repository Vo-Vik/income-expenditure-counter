<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div>
	Your total Expenditure is: <?php echo $totalExpenditure; ?><br />
	Your total Income is: <?php echo $totalIncome; ?><br />
	Your total Balance is: <?php echo $totalIncome-$totalExpenditure; ?>
</div>
<div>
This month your Expenditure is: <?php echo $thisMonthExpenditure; ?><br />
This month your Income is: <?php echo $thisMonthIncome; ?><br />
This month your Balance is: <?php echo $thisMonthIncome-$thisMonthExpenditure; ?>
</div>
<br />
<p><a href="<?=$this->createUrl('expenditure/admin');?>">Manage your expenditure</a><br />
<a href="<?=$this->createUrl('income/admin');?>">Manage your income</a></p>

