<?php declare(strict_types=1);

namespace App\Service;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionException;

class AttributeReader
{
    /**
     * @param class-string $classname
     * @throws ReflectionException
     * @return array<ReflectionAttribute<object>>
     */
    public static function readAttributes(string $classname): array
    {
        $classReflection = new ReflectionClass($classname);

        return $classReflection->getAttributes();
    }

    /**
     * @throws ReflectionException
     */
    public static function getArgumentValue(string $modelClassname, string $attributeClassname, string $argumentName): mixed
    {
        $attributes = self::readAttributes($modelClassname);

        foreach ($attributes as $attribute) {
            if ($attribute->getName() !== $attributeClassname) {
                continue;
            }

            return $attribute->getArguments()[$argumentName];
        }

        return null;
    }
}
