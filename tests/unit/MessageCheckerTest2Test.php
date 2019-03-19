<?php namespace App\Tests;

use App\Entity\Message;
use App\Helper\MessageChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Codeception\Util\Stub;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolation;





class MessageCheckerTest2Test extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;


    protected function _before()
    {

    }
    protected function _after()
    {
    }
    // tests


    public function testCheckSuccessTrue()
    {
        $validator = $this->makeEmpty(ValidatorInterface::class, ['validate' => array()]);
        $request = $this->make(Request::class, ['get' => 'name']);
        $obj = new MessageChecker($validator);
        $this->assertArraySubset(['success' => true], $obj->check($request));
    }



    public function testCheckSuccessFalse()
    {
        $getMess[] = $this->makeEmpty(ConstraintViolationInterface::class, ['getMessage' => 'Some error!',
        'getPropertyPath' => 'name']);
        $validator = $this->makeEmpty(ValidatorInterface::class, ['validate' => $getMess]);

        $request = $this->make(Request::class, ['get' => 'name']);
        $obj = new MessageChecker($validator);
        $this->assertArraySubset(['success' => false,
        'errors' => ['name' => 'Some error!']], $obj->check($request));
    }
}
