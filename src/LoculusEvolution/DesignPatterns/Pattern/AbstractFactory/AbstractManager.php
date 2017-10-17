<?php
namespace LoculusEvolution\DesignPatterns\Pattern\AbstractFactory;


abstract class AbstractManager implements AbstractFactoryInterface
{
    const EXCEPTION_MESSAGE_TYPE_NOT_FOUND = 'Unsupported type: %s';

    const TYPE_DIRECTORY            = '';
    const TYPE_CLASS_NAME_PREFIX    = '';
    const TYPE_CLASS_NAME_SUFFIX    = '';


    /**
     * Resolves class name for provided type
     *
     * @param string $type
     * @return string
     */
    protected static function classNameResolve(string $type): string
    {
        $thisClass = new \ReflectionClass(static::class);
        $namespace = $thisClass->getNamespaceName();
        $className = static::TYPE_CLASS_NAME_PREFIX . $type . static::TYPE_CLASS_NAME_SUFFIX;

        if ('' !== static::TYPE_DIRECTORY) {
            $namespace .= '\\' . static::TYPE_DIRECTORY;
        }

        return $namespace . '\\' . $className;
    }

    /**
     * Returns service instance made by factory for provided type
     *
     * @param string  $type
     * @param  array  $config
     * @return ServiceInterface
     * @throws \RuntimeException
     */
    public static function factory(string $type, array $config)
    {
        $className = static::classNameResolve($type);

        if (! class_exists($className)) {
            throw new \RuntimeException(sprintf(self::EXCEPTION_MESSAGE_TYPE_NOT_FOUND, $type));
        }

        return new $className($config);
    }
}