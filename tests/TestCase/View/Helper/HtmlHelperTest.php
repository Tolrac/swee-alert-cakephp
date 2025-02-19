<?php

namespace SweetAlertHelper\Test\TestCase\View\Helper;

use SweetAlertHelper\View\Helper\HtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * SweetAlertHelper\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \SweetAlertHelper\View\Helper\HtmlHelper
     */
    protected HtmlHelper $Html;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Html = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Html);
        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}