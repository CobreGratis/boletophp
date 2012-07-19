<?php
/**
 * @file
 * Unit testing.
 */

require_once 'simpletest/autorun.php';
require_once "../../../Boleto.class.php";

/**
 * Tutorial at http://www.simpletest.org/en/first_test_tutorial.html.
 */
abstract class BoletoTestCase extends UnitTestCase {
  protected $boletoObject;
  protected $bank_code;
  protected $plugin_class_file;
  protected $plugin_class_name;
  protected $plugin_simpletest_class_name;

  function __construct() {

    $this->plugin_simpletest_class_name = $plugin_simpletest_class_name = get_called_class();

    $bank_code = explode('TestOf', $plugin_simpletest_class_name);
    // Get the second part of the explosion debris.
    $bank_code = $this->bank_code = $bank_code[1];

    $arguments = array('bank_code' => $bank_code);

    if (method_exists($this, 'mockingArguments')) {
      $this->mockingArguments();
      // Use the mockary data instead from the plugin implementation.
      $arguments = $this->mockingArguments;
    }

    if (file_exists("../Banco_$bank_code.php")) {
      $this->plugin_class_name = "Banco_$bank_code";

      $plugin_class_file = $this->plugin_class_file = "../Banco_$bank_code.php";
      
      include_once $plugin_class_file;
  
      $this->boletoObject = Boleto::load_boleto($arguments);
    }
  }

  function testTheBankCodeArgumentIsTheSameAsCodeInTheSimpleTestClassName() {
    $this->assertEqual($this->mockingArguments['bank_code'], $this->bank_code);
  }

  function testPluginClassFileExists() {
    $this->assertTrue(file_exists($this->plugin_class_file));
  }

  function testPluginClassExists() {
    $this->assertTrue(class_exists($this->plugin_class_name));
  }

  function testBoletoObjectsHasBeenInstantiated() {
    $this->assertTrue(is_object($this->boletoObject));
  }

  function testFebraban20to44MethodExists() {
    $this->assertTrue(method_exists($this->boletoObject, 'febraban_20to44'));
  }

  function testMockingArgumentsExists() {
    $this->assertTrue(method_exists($this->plugin_simpletest_class_name, 'mockingArguments'));
  }

  function testMockingArgumentsPropertyIsAnArrayAndIsPopulated() {
    $this->assertTrue(is_array($this->mockingArguments));
    $this->assertFalse(empty($this->mockingArguments));
  }

  function testFebraban20to44PropertyIsNumericAndHas15Digits() {
    $febraban = $this->boletoObject->febrabanPropertyGetter();
    $this->assertTrue(is_numeric($febraban['20-44']));
    $this->assertTrue(strlen($febraban['20-44']) == 25);
  }
  
  function testLinhaDigitavelHasTheRequiredNumberOfCharactersAndIsNumeric() {
    $output = $this->boletoObject->outputPropertyGetter();
    $lengh = strlen($output['linha_digitavel']);

    $this->assertEqual($lengh, 54);

    $linha_digitavel = str_replace(' ', '', $output['linha_digitavel']);
    $linha_digitavel = str_replace('.', '', $linha_digitavel);

    $this->assertTrue(is_numeric($linha_digitavel));
    $this->assertEqual(strlen($linha_digitavel), 47);
    

  }

  function testPluginReadmeFileExistsAndItsNameFollowsTheConvention() {
    $settings = $this->boletoObject->settingsPropertyGetter();
    
    $readme = explode('/', $settings['readme']);
    $readme = end($readme);

    $convention_names = array('README.txt', 'README.md');

    $this->assertTrue(in_array($readme, $convention_names));
    $this->assertTrue(file_exists("../$readme"));
  }

  function testPluginBankLogoFileExistsAndItIsOfJpgType() {
    $output = $this->boletoObject->outputPropertyGetter();

    $bank_logo = explode('/', $output['bank_logo_path']);
    $bank_logo = end($bank_logo);

    $this->assertEqual($bank_logo, 'logo.jpg');
    $this->assertTrue(file_exists("../$bank_logo"));
    $this->assertEqual(exif_imagetype("../$bank_logo"), IMAGETYPE_JPEG);
  }
}
