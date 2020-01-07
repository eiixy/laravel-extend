<?php

function Pipeline($stack, $pipe)
{
    var_dump($stack,$pipe);
//    exit;
    return function ($passable) use ($stack, $pipe) {
        if (is_callable($pipe)) {
            $pipe($passable, $stack);
        } elseif (is_object($pipe)) {
            $method = "handle";
            if (!method_exists($pipe, $method)) {
                throw new InvalidArgumentException('object that own handle method');
            } else {
                $pipe->$method($passable, $stack);
            }
        } else {
            throw new InvalidArgumentException('$pipe must be callback or object');
        }
    };
}

interface  TestUnit
{
    public function handle($passable, callable $next = null);
}

class  Unit1 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        $next($passable);
    }
}

class  Unit2 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        $next($passable);
    }
}

class  Unit3 implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        $next($passable);
    }
}

class  InitialValue implements TestUnit
{
    public function handle($passable, callable $next = null)
    {
        echo __CLASS__ . '->' . __METHOD__ . " called\n";
        //$next($passable);
    }
}

$pipeline = array_reduce(['1','2','3'], function ($item){
    echo $item.'\r\n';
}, function ($passable) {
    (new InitialValue())->handle($passable);
});
$pipeline(1);
