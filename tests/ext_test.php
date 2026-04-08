<?php
/**
 *
 * @package Quick Style
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace avathar\quickstyle\tests;

/**
 * Class ext_test
 * Unit tests for the Quick Style extension meta class
 *
 * @package avathar\quickstyle\tests
 */
class ext_test extends \phpbb_test_case
{
	/**
	 * Test that the extension class extends \phpbb\extension\base
	 *
	 * @return void
	 */
	public function test_ext_is_instance_of_base()
	{
		$container = $this->createMock('Symfony\Component\DependencyInjection\ContainerInterface');
		$finder = $this->getMockBuilder('\phpbb\finder')
			->disableOriginalConstructor()
			->getMock();
		$migrator = $this->getMockBuilder('\phpbb\db\migrator')
			->disableOriginalConstructor()
			->getMock();

		$ext = new \avathar\quickstyle\ext(
			$container,
			$finder,
			$migrator,
			'avathar/quickstyle',
			''
		);

		$this->assertInstanceOf('\phpbb\extension\base', $ext);
	}

	/**
	 * Test that the minimum PHP version constant is 8.1.0
	 *
	 * @return void
	 */
	public function test_min_php_version_constant()
	{
		$this->assertEquals('8.1.0', \avathar\quickstyle\ext::MIN_PHP_VERSION);
	}

	/**
	 * Test that the minimum phpBB version constant is 3.3.0
	 *
	 * @return void
	 */
	public function test_min_phpbb_version_constant()
	{
		$this->assertEquals('3.3.0', \avathar\quickstyle\ext::MIN_PHPBB_VERSION);
	}
}
