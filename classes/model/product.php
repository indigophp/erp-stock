<?php

namespace Indigo\Erp\Stock;

class Model_Product extends \Orm\Model_Temporal
{
	protected static $_belongs_to = array(
		'category',
		'manufacturer',
		//'type',
	);

	protected static $_eav = array(
		'meta' => array(
			'attribute' => 'key',
			'value'     => 'value',
		)
	);

	protected static $_has_many = array(
		'meta' => array(
			'model_to'       => 'Model_Product_Meta',
			'cascade_delete' => true,
		),
		'order_product',
		'prices' => array(
			'model_to'       => 'Model_Price',
			'cascade_delete' => true,
		),
	);

	protected static $_observers = array(
		'Orm\\Observer_Slug' => array(
			'events' => array('before_insert'),
			'source' => 'name',
		),
	);

	protected static $_has_one = array();

	protected static $_properties = array(
		'id',
		'temporal_start',
		'temporal_end',
		'category_id',
		'type_id',
		'tax_class_id',
		'name',
		'slug',
		'description',
		'price',
		'enabled' => array(
			'default' => 1
		),
	);

	protected static $_table_name = 'products';

	public static function _init()
	{
		if (\Package::loaded('erp-stock'))
		{
			$priceSubquery = \DB::select('price.id')
				->from(array(Model_Price::table(), 'price'))
				->where('price.product_id', '=', \DB::expr(\DB::quote_identifier('id')))
				->where('price.available', 1)
				->order_by('price.price')
				->limit(1)
				->compile();

			static::$_has_one['price'] = array(
				'model_to'       => 'Model_Price',
				'cascade_delete' => true,
				'where'          => array(
					array('id', '=', \DB::expr($priceSubquery))
				),
			);

			static::$has_many['prices'] = array(
				'model_to'       => 'Model_Price',
				'cascade_delete' => true,
			);
		}
	}
}
