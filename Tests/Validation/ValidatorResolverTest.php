<?php
declare(ENCODING = 'utf-8');
namespace F3\FLOW3\Validation;

/*                                                                        *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * @package FLOW3
 * @subpackage Tests
 * @version $Id$
 */

/**
 * Testcase for the validator resolver
 *
 * @package FLOW3
 * @subpackage Tests
 * @version $Id$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class ValidatorResolverTest extends \F3\Testing\BaseTestCase {

	/**
	 * @test
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	public function resolveValidatorThrowsExceptionIfNoValidatorIsAvailable() {
		$mockObjectManager = $this->getMock('F3\FLOW3\Object\ManagerInterface');
		$validatorResolver = new \F3\FLOW3\Validation\ValidatorResolver($mockObjectManager);
		$this->assertEquals(NULL, $validatorResolver->resolveValidatorClass('NotExistantClass'), 'For a non existant class, resolveValidatorClass should return NULL');
	}

	/**
	 * @test
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	public function resolveValidatorReturnsTheCorrectValidator() {
		$this->markTestIncomplete('RL 12.03.09: PHPUnit fails to create a mock out of F3\FLOW3\Validation\Validator\ObjectValidatorInterface. A bug?');

		$className = uniqid('Test');
		$mockValidator = $this->getMock('F3\FLOW3\Validation\Validator\ObjectValidatorInterface', array(), array(), $className . 'Validator');
		$mockObjectManager = $this->getMock('F3\FLOW3\Object\ManagerInterface');
		$mockObjectManager->expects($this->any())->method('isObjectRegistered')->will($this->returnValue(TRUE));
		$mockObjectManager->expects($this->any())->method('getObject')->will($this->returnValue($mockValidator));

		$validatorResolver = new \F3\FLOW3\Validation\ValidatorResolver($mockObjectManager);
		$validator = $validatorResolver->resolveValidator($className);
		$this->assertSame($mockValidator, $validator);
	}
}

?>