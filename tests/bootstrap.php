<?php
/**
 * Test suite bootstrap for SweetAlertHelper.
 *
 * This function is used to find the location of CakePHP whether CakePHP
 * has been installed as a dependency of the plugin, or the plugin is itself
 * installed as a dependency of an application.
 */
$findRoot = function ($root) {
    do {
        $lastRoot = $root;
        $root = dirname($root);
        if (is_dir($root . '/vendor/cakephp/cakephp')) {
            return $root;
        }
    } while ($root !== $lastRoot);

    throw new Exception("Cannot find the root of the application, unable to run tests");
};

$root = $findRoot(__FILE__);
unset($findRoot);

chdir($root);

// Load the application bootstrap if it exists
if (file_exists($root . '/config/bootstrap.php')) {
    include $root . '/config/bootstrap.php';
} else {
    // Fallback to CakePHP's test bootstrap if the application bootstrap does not exist
    require $root . '/vendor/cakephp/cakephp/tests/bootstrap.php';
}

// Load the CakePHP testing framework
require_once $root . '/vendor/cakephp/cakephp/tests/TestSuite/TestSuite.php';