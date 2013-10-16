<?php

namespace Fuel\Migrations;

class Create_product_meta
{
	public function up()
	{
		\DBUtil::create_table('product_meta', array(
			'id'         => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'key'        => array('constraint' => 255, 'type' => 'varchar'),
			'value'      => array('type' => 'text', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_meta');
	}
}
