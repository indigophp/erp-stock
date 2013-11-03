<?php

class Query extends \Orm\Query
{

	protected $aliases = array();

	public static function forge($model, $connection = null, $options = array(), $table_alias = null)
	{
		exit;
		return new static($model, $connection, $options, $table_alias);
	}

	protected function modify_join_result($join_result, $name)
	{
		exit;
		$this->aliases[]
		if ($name == 'product')
		{
			Model_Product::alias($join_result[$name]['table'][1]);
		}
		elseif (in_array($name, array('price', 'product.price')))
		{
			$subquery = \DB::select('price.id')
				->from(array(Model_Price::table(), 'price'))
				->where('price.product_id', '=', \DB::expr(\DB::quote_identifier(Model_Product::alias() . '.id')))
				->where('price.available', 1)
				->order_by('price.price')
				->limit(1);

			$join_result[$name]['join_on'][] = array(
				$join_result[$name]['table'][1] . '.id',
				'=',
				$subquery
			);
		}
		return $join_result;
	}

	protected function __construct($model, $connection, $options, $table_alias = null)
	{
		empty($table_alias) or $this->alias = $table_alias;
		return parent::__construct($model, $connection, $options, $table_alias);
	}
}
