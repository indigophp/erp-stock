<?php

namespace Indigo\Erp\Stock;

class Model_Product_Meta extends \Orm\Model
{
	protected static $_belongs_to = array(
		'product'
	);

	protected static $_properties = array(
		'id',
		'product_id',
		'key',
		'value',
	);

	protected static $_table_name = 'product_meta';
}
