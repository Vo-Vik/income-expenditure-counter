<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  //allow all users to perform 'contact' and 'login' actions
				'actions'=>array('contact','login','page'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','logout'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$eClassModel = new EclassInfo;
		$classes = $eClassModel->getClassesList();
		if(isset($_GET['class']) && in_array($_GET['class'], array_keys($classes))) $class=$_GET['class'];
		else $class = 1;
		$emodel = new Expenditure;
		$imodel = new Income;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$expenditureList='';
		$expenditureList12='';
		$expenditureClassList='';
		$incomeList='';
		$incomeList12='';
		$balanceList='';
		$first = true;
		$month = '2011-09';
		$now = date('Y-m');
		$year_ago = date('Y-m',strtotime('-1 year'));
		$monthBalance = 0;
		$fill12 = false;
		while($month!=$now) {
			if($month == $year_ago) $fill12 = true;
			$expenditure = $emodel->totals($month);
			$expenditureClass = $emodel->totals($month, $class);
			$income= $imodel->totals($month);
			$expenditureList.=($first?"":",")."['".$month."',".($expenditure?$expenditure:'0')."]";
			$expenditureClassList.=($first?"":",")."['".$month."',".($expenditureClass?$expenditureClass:'0')."]";
			$incomeList.=($first?"":",")."['".$month."',".($income?$income:'0')."]";
			$monthBalance += $income-$expenditure;
			$balanceList.=($first?"":",")."['".$month."',".($monthBalance)."]";
			$first=false;
			if($fill12) {
				$expenditureList12.=($month == $year_ago?"":",")."['".$month."',".($expenditure?$expenditure:'0')."]";
				$incomeList12.=($month == $year_ago?"":",")."['".$month."',".($income?$income:'0')."]";
			}
			$month = date('Y-m', strtotime('+ 1 month', strtotime($month.'-01')));
		}
		$this->render('index', array(
			'totalExpenditure' => $emodel->totals(),
			'totalIncome' => $imodel->totals(),
			'thisMonthExpenditure' => $emodel->totals(date('Y-m',time())),
			'thisMonthIncome' => $imodel->totals(date('Y-m',time())),
			'thisYearExpenditure' => $emodel->totals('', 0, date('Y',time())),
			'thisYearIncome' => $imodel->totals('', date('Y',time())),
			'lastMonthExpenditure' => $emodel->totals(date('Y-m',strtotime('- 1 month'))),
			'lastMonthIncome' => $imodel->totals(date('Y-m',strtotime('- 1 month'))),
			'expenditureList' => $expenditureList,
			'expenditureList12' => $expenditureList12,
			'expenditureClassList' => $expenditureClassList,
			'classes'=>$classes,
			'class' => (isset($classes[$class])?$classes[$class]:'undefined'),
			'incomeList' => $incomeList,
			'incomeList12' => $incomeList12,
			'balanceList' => $balanceList,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
