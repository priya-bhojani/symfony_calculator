<?php

namespace PRIYA\Core\MiscBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class DefaultController extends Controller
{
   
    /**
     * @Route("{_locale}/misc/calculator")
     */
    public function calculatorAction()
    {
    	return $this->render('SWSMCoreMiscBundle:Default:calculator.html.twig');
    }
    
    /**
     * @Route("{_locale}/misc/calculation", name="misc_calculation")
     */
    public function calculationAction(Request $request)
    {
    	$number_one = $request->get('number_one');
        $number_two = $request->get('number_two');
        $operand = $request->get('operand');

        $final_expression = '('.$number_one.')'.$operand.'('.$number_two.')';
        
        try 
        {
            $result = $this->evaluateExpression($final_expression);
            $expression = $this->printExpression($final_expression);
            return $this->render('SWSMCoreMiscBundle:Default:result.html.twig',array('result' => $result,'expression' => $expression));            
        }
        catch (Exception $ex)
        {
            return $ex;
        }        
    }
    
    public function evaluateExpression($final_expression) 
    {
        $expressionLanguage = new ExpressionLanguage();            
        $result = ($expressionLanguage->evaluate($final_expression));
        return $result;        
    }
    
    public function printExpression($final_expression) 
    {
        $expressionLanguage = new ExpressionLanguage();                    
        $expression = ($expressionLanguage->compile($final_expression));
        return $expression;
    }
    
}

