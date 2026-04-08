<?php
/**
 *
 * @package Quick Style
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace avathar\quickstyle\tests\functional;

/**
 * Functional test for the Quick Style ACP module
 *
 * Verifies that the ACP configuration page loads correctly
 * and displays the expected settings form with proper language keys.
 *
 * @group functional
 */
class quickstyle_acp_test extends \phpbb_functional_test_case
{
	/**
	 * @return string[]
	 */
	protected static function setup_extensions()
	{
		return array('avathar/quickstyle');
	}

	/**
	 * Test that the ACP Quick Style configuration page loads and contains
	 * the expected form fields and language strings.
	 *
	 * Steps:
	 * 1. Log in as admin
	 * 2. Load the extension's ACP language file
	 * 3. Request the ACP module page
	 * 4. Assert that the AV_QUICK_STYLE_DEFAULT_LOC language string appears
	 *    on the page, confirming the settings form rendered correctly
	 *
	 * @return void
	 */
	public function test_acp_page()
	{
		$this->login();
		$this->admin_login();

		$this->add_lang_ext('avathar/quickstyle', 'info_acp_quickstyle');

		$crawler = self::request('GET', 'adm/index.php?i=-avathar-quickstyle-acp-quickstyle_module&mode=settings&sid=' . $this->sid);
		$this->assertContainsLang('AV_QUICK_STYLE_DEFAULT_LOC', $crawler->text());
	}
}
