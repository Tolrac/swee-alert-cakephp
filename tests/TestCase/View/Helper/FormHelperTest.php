<?php

namespace SweetAlertHelper\Test\TestCase\View\Helper;

use SweetAlertHelper\View\Helper\FormHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * SweetAlertHelper\View\Helper\FormHelper Test Case
 */
class FormHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \SweetAlertHelper\View\Helper\FormHelper
     */
    protected FormHelper $Form;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Form = new FormHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Form);
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