<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div style="float:left; margin-right:100px">
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
</div>
<div >
<div>
	This year Expenditure is: <?php echo $thisYearExpenditure; ?><br />
	This year Income is: <?php echo $thisYearIncome; ?><br />
	This year Balance is: <?php echo $thisYearIncome-$thisYearExpenditure; ?>
</div>
<div>
	Last month your Expenditure is: <?php echo $lastMonthExpenditure; ?><br />
	Last month your Income is: <?php echo $lastMonthIncome; ?><br />
	Last month your Balance is: <?php echo $lastMonthIncome-$lastMonthExpenditure; ?>
</div>
</div>
<div style="clear:both"></div>
<br />
<p><a href="<?=$this->createUrl('expenditure/admin');?>">Manage your expenditure</a><br />
<a href="<?=$this->createUrl('income/admin');?>">Manage your income</a></p>

<script type="text/javascript" src="/includes/jscharts.js"></script>
<div id="chartcontainer">This is just a replacement in case Javascript is not
available or used for SEO purposes</div>
<a name="classes"></a>
<?foreach($classes as $id=>$name) {?>
<a href="?<?=$_SERVER['QUERY_STRING'];?>&class=<?=$id;?>#classes"><?=$name;?></a>&nbsp;&nbsp;
<?}?>
<script type="text/javascript">
var myDatae = new Array(<?echo $expenditureList;?>);
var myDatae12 = new Array(<?echo $expenditureList12;?>);
var myDataec = new Array(<?echo $expenditureClassList;?>);
var myDatai = new Array(<?echo $incomeList;?>);
var myDatai12 = new Array(<?echo $incomeList12;?>);
var myDatab = new Array(<?echo $balanceList;?>);
var myChart = new JSChart('chartcontainer', 'line');
var myChart1 = new JSChart('chartcontainer', 'line');
var myChart2 = new JSChart('chartcontainer', 'line');
var myChart3 = new JSChart('chartcontainer', 'line');
myChart.setSize(800, 300);
myChart1.setSize(800, 300);
myChart2.setSize(800, 300);
myChart3.setSize(800, 300);
myChart2.setShowYValues(true);
myChart.setDataArray(myDatae, '1');
myChart.setDataArray(myDatai, '2');
myChart1.setDataArray(myDatae12, '1');
myChart1.setDataArray(myDatai12, '2');
myChart2.setDataArray(myDatab, '1');
myChart3.setDataArray(myDataec, '1');
myChart.setLineColor('#000000','1');
myChart.setLineColor('#f00','2');
myChart1.setLineColor('#000000','1');
myChart1.setLineColor('#f00','2');
myChart2.setLineColor('#000000','1');
myChart3.setLineColor('#000000','1');
myChart.setLegendForLine('1', 'Expenditures');
myChart.setLegendForLine('2', 'Income');
myChart1.setLegendForLine('1', 'Expenditures');
myChart1.setLegendForLine('2', 'Income');
myChart2.setLegendForLine('1', 'Balance');
myChart3.setLegendForLine('1', '<?=$class;?>');
myChart.setLineSpeed(100);
myChart1.setLineSpeed(100);
myChart2.setLineSpeed(100);
myChart3.setLineSpeed(100);
myChart.setLegendShow(true);
myChart1.setLegendShow(true);
myChart2.setLegendShow(true);
myChart3.setLegendShow(true);
myChart.draw();
myChart1.draw();
myChart2.draw();
myChart3.draw();
</script>
