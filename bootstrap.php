<?php

Autoloader::add_core_namespace('Indigo\\Erp\\Stock');

Autoloader::add_classes(array(
	'Indigo\\Erp\\Stock\\Model_Product'       => __DIR__ . '/classes/model/product.php',
	'Indigo\\Erp\\Stock\\Model_Product_Meta'  => __DIR__ . '/classes/model/product/meta.php',
	'Indigo\\Erp\\Stock\\Model_Product_Field' => __DIR__ . '/classes/model/product/field.php',
	'Indigo\\Erp\\Stock\\Model_Category'      => __DIR__ . '/classes/model/category.php',
));
