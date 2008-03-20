<?php
declare(ENCODING = 'utf-8');

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */

/**
 * @package FLOW3
 * @subpackage Tests
 * @version $Id:T3_FLOW3_Component_ConfigurationTest.php 201 2007-03-30 11:18:30Z robert $
 */

/**
 * Testcase for the configuration manager
 *
 * @package FLOW3
 * @subpackage Tests
 * @version $Id:T3_FLOW3_Component_ConfigurationTest.php 201 2007-03-30 11:18:30Z robert $
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class T3_FLOW3_Configuration_ManagerTest extends T3_Testing_BaseTestCase {

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function getFLOW3ConfigurationForOtherPackageThanFLOW3ResultsInException() {
		$manager = new T3_FLOW3_Configuration_Manager();
		try {
			$manager->getConfiguration('TestPackage', T3_FLOW3_Configuration_Manager::CONFIGURATION_TYPE_FLOW3, 'Testing');
			$this->fail('No exception was thrown.');
		} catch (T3_FLOW3_Configuration_Exception_InvalidConfigurationType $exception) {
		}
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function getConfigurationLoadsTestPackageSettings() {
		$manager = new T3_FLOW3_Configuration_Manager();
		$configuration = $manager->getConfiguration('TestPackage', T3_FLOW3_Configuration_Manager::CONFIGURATION_TYPE_SETTINGS, 'Testing');
		$this->assertTRUE($configuration->testPackageSettingsWereLoaded, 'The settings were not loaded.');
	}
}
?>