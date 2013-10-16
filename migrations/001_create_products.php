<?php

namespace Fuel\Migrations;

class Create_products
{
	public function up()
	{
		\DBUtil::create_table('products', array(
			'id'             => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'temporal_start' => array('constraint' => 11, 'type' => 'int'),
			'temporal_end'   => array('constraint' => 11, 'type' => 'int'),
			'category_id'    => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'type_id'        => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'tax_class_id'   => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'name'           => array('constraint' => 255, 'type' => 'varchar'),
			'slug'           => array('constraint' => 255, 'type' => 'varchar'),
			'description'    => array('type' => 'text', 'null' => true),
			'price'          => array('constraint' => '15, 4', 'type' => 'decimal', 'null' => true),
			'stock'          => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'enabled'        => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
		), array('id', 'temporal_start', 'temporal_end'));
	}

	public function down()
	{
		\DBUtil::drop_table('products');
	}
}
