<?php

/**
 * This is the model class for table "tbl_income".
 *
 * The followings are the available columns in table 'tbl_income':
 * @property string $id
 * @property string $date
 * @property string $name
 * @property string $amount
 */
class Income extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Income the static model class
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
		return 'tbl_income';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date', 'date','format'=>'yyyy-MM-dd'),
			array('date', 'required'),
			array('name', 'length', 'max'=>15),
			array('name', 'required'),
			array('amount', 'numerical'),
			array('amount', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, name, amount', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'name' => 'Name',
			'amount' => 'Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('amount',$this->amount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Retrives total sum of income from the begining or for current month
	 * @param string $month - if isset return sum only for this month, else all from the begining
	 */
	public function totals($month='')
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

		return $this->find($criteria)->getAttribute('amount');
	}
}