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
 * @subpackage MVC
 * @version $Id$
 */

/**
 * A mock action controller which throws a "stop action exception"
 *
 * @package FLOW3
 * @subpackage MVC
 * @version $Id$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class F3_FLOW3_MVC_Fixture_Controller_MockExceptionThrowing extends F3_FLOW3_MVC_Controller_ActionController {

	/**
	 * @return void
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function stopActionAction() {
		throw new F3_FLOW3_MVC_Exception_StopAction();
	}

	/**
	 * @return void
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function throwGeneralExceptionAction() {
		throw new F3_FLOW3_MVC_Exception();
	}
}

?>