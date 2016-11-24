<?php

/**
 * This is the model class for table "tbl_expenditure".
 *
 * The followings are the available columns in table 'tbl_expenditure':
 * @property string $id
 * @property string $name
 * @property string $amount
 * @property string $date
 * @property integer $class_id
 */
class Expenditure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expenditure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_expenditure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id', 'required'),
			array('class_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>19),
			array('name', 'required'),
			array('amount', 'numerical'),
			array('amount', 'required'),
			array('date', 'date','format'=>'yyyy-MM-dd'),
			array('date', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, amount, date, class_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'classType' => array(self::BELONGS_TO, 'EclassInfo', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'amount' => 'Amount',
			'date' => 'Date',
			'class_id' => 'Class',
		);
	}

	/**
	 * Prepare search criteria
	 */
	public function getSearchCriteria()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('class_id',$this->class_id);

	    return $criteria;
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = $this->getSearchCriteria();

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>50,
			),
		));
	}

	/**
	 * Retrieves a total amount for specified criterias
	 * @return int
	 */
	public function totalAmount()
	{
	    $criteria=$this->getSearchCriteria();
	    $criteria->select='SUM(amount)';
	    return $this->commandBuilder->createFindCommand($this->getTableSchema(),$criteria)->queryScalar();

	}
	/**
	 * Retrives total sum of expenditure from the begining or for current month
	 * @param string $month - if isset return sum only for this month, else all from the begining
	 */
	public function totals($month='', $type=0)
	{
		if($month) {
			$stamp = strtotime( $month.'-01');
			if(is_numeric($stamp)){
				$year  = date( 'Y', $stamp );
				$month = date( 'm', $stamp );
				$year2  = date( 'Y' ,strtotime('+ 1 month',$stamp));
				$month2 = date( 'm' ,strtotime('+ 1 month',$stamp));
			}
		}
		$criteria = new CDbCriteria;
		$criteria->select = "SUM(amount) as amount";
		if(isset($year))
		{
			$criteria->condition = "date >='".$year."-".$month."-01' AND date <'".$year2."-".$month2."-01'";
		}
		if($type) {
			$criteria->condition.= " AND class_id=".$type;
		}

		return $this->find($criteria)->getAttribute('amount');
	}
}
