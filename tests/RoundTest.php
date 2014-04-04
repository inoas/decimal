<?php
namespace RtLopez;

class RoundTest extends \PHPUnit_Framework_TestCase
{
  private static $_classes = array(
    'RtLopez\\DecimalBCMath',
    'RtLopez\\DecimalFloat',
    'RtLopez\\DecimalFixed',
  );
  
  public function providerRoundConstruct()
  {
    $result = array();
    foreach(self::$_classes as $class)
    {
      $result[] = array($class,    1,     0.0,   '0');
      $result[] = array($class,    1,     0.1,   '0.1');
      $result[] = array($class,    1,     0.01,  '0');
      $result[] = array($class,    1,     1.04,  '1');
      $result[] = array($class,    1,     0.05,  '0.1');
      $result[] = array($class,    1,     0.06,  '0.1');
      $result[] = array($class,    1,     0.09,  '0.1');
      $result[] = array($class,    1,    -1.0,   '-1');
      $result[] = array($class,    2, '-2.001',  '-2');
      $result[] = array($class,    2, '-2.001',  '-2');
      $result[] = array($class,    2, '-2.004',  '-2');
      $result[] = array($class,    2, '-2.005',  '-2.01');
      $result[] = array($class,    2, '-2.006',  '-2.01');
      $result[] = array($class,    2, '-2.009',  '-2.01');
      $result[] = array($class,    3, '-2.0999', '-2.1');
      $result[] = array($class,    3, '-2.00049', '-2.00');
    }
    return $result;
  }
  
  /**
   * @dataProvider providerRoundConstruct
   */
  public function testRoundConstruct($class, $prec, $val, $exp)
  {
    $res = new $class($val, $prec);
    $this->assertEquals($exp, (string)$res);
  }
}
