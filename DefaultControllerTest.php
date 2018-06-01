<?php

namespace SWSM\Core\MiscBundle\Tests\Controller;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{    
    public function testEvaluateExpression() 
    {
        $expressionLanguage = new ExpressionLanguage();
        $final_expression = '1 + 2';
        $result = ($expressionLanguage->evaluate($final_expression));
        $this->assertEquals(3,$result);
    }
    
    public function testPrintExpression() 
    {
        $expressionLanguage = new ExpressionLanguage();
        $final_expression = '1 + 2';
        $result = ($expressionLanguage->compile($final_expression));
        $this->assertEquals('(1 + 2)',$result);
    }
}
