<?php
/**
 * Test suite
 * 
 * @link http://www.shopware.de
 * @copyright Copyright (c) 2011, shopware AG
 * @author Heiner Lohaus
 * @package Shopware
 * @subpackage Tests
 */
class Shopware_Tests_Plugins_AllTests
{
	/**
	 * Returns test suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite()
	{
		$suite = new Enlight_Components_Test_TestSuite('Shopware Plugins');

		$suite->addTest(Shopware_Tests_Plugins_Frontend_AllTests::suite());
		$suite->addTest(Shopware_Tests_Plugins_Backend_AllTests::suite());
		$suite->addTest(Shopware_Tests_Plugins_Core_AllTests::suite());

		return $suite;
	}
}