<?php

declare(strict_types=1);

namespace NovaCore\Core;


use ReflectionClass;
use NovaCore\Contracts\ContainerInterface;


class Container implements ContainerInterface
{


    protected array $bindings = [];


    protected array $instances = [];



    public function bind(
        string $abstract,
        mixed $concrete
    ): void
    {

        $this->bindings[$abstract]=$concrete;

    }



   public function singleton(
    string $abstract,
    mixed $concrete
): void
{

    $this->bindings[$abstract]=$concrete;


    if(is_object($concrete))
    {
        $this->instances[$abstract]=$concrete;
    }
    else
    {
        $this->instances[$abstract]=null;
    }

}




    public function make(
        string $abstract
    ): mixed
    {


        if(isset($this->instances[$abstract]))
        {
            return $this->instances[$abstract];
        }



        if(isset($this->bindings[$abstract]))
        {

            $concrete=$this->bindings[$abstract];

        }
        else
        {

            $concrete=$abstract;

        }



       if(is_object($concrete))
{
    return $concrete;
}


if($concrete instanceof \Closure)
{
    return $concrete($this);
}


        $object=$this->build($concrete);



        if(array_key_exists($abstract,$this->instances))
        {

            $this->instances[$abstract]=$object;

        }


        return $object;

    }




    protected function build(string $class): object
    {


        $reflection=new ReflectionClass($class);



        if(!$reflection->isInstantiable())
        {

            throw new \Exception(
                "Class {$class} cannot be instantiated"
            );

        }



        $constructor=$reflection->getConstructor();



        if(!$constructor)
        {

            return new $class;

        }



        $dependencies=[];



        foreach($constructor->getParameters() as $parameter)
        {

            $type=$parameter->getType();


            if(!$type)
            {

                throw new \Exception(
                    "Cannot resolve dependency"
                );

            }


            $dependencies[]=$this->make(
                $type->getName()
            );

        }



        return $reflection->newInstanceArgs(
            $dependencies
        );

    }


}