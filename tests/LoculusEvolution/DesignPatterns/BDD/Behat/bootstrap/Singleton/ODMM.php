<?php
namespace tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton;

use LoculusEvolution\DesignPatterns\Pattern\Singleton;
use LoculusEvolution\DesignPatterns\Exception;

/**
 * ODMM class implementing Singleton design pattern by using SingletonTrait.
 *
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-16T09M02S59, Europe/Krakow
 */
final class ODMM implements Singleton\SingletonInterface
{
    use Singleton\SingletonTrait;


    const MESSAGE_NOT_CONNECTED = 'Not connected';


    /**
     * @var bool
     */
    private static $connected = false;

    /**
     * @var int
     */
    private static $executedQueriesCount = 0;
    /**
     * @var int
     */
    private static $successfulQueriesCount = 0;


    /**
     * Singleton constructor.
     *
     * It's private because Singleton design pattern means, than we cannot create an instance of the object
     * based on the Singleton in standard way by writing: new Singleton().
     */
    private function __construct()
    {
    }

    /**
     * Returns an instance of the object based on Singleton design pattern
     *
     * @param  string  $className
     * @return Singleton\SingletonInterface
     * @throws Exception\ClassNotFoundException
     */
    public static function getInstance(string $className = self::class): Singleton\SingletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new Exception\ClassNotFoundException($className);
            }

            static::$instance = new self();
        }

        return static::$instance;
    }



    function __destruct()
    {
        if ($this->isConnected()) {
            $this->disconnect();
        }
    }


    /**
     * Connects with the server
     *
     * @param  string  $dsn
     * @param  bool  $reconnect
     * @return bool
     */
    public function connect($dsn, $reconnect = false)
    {
        if (! $reconnect && $this->isConnected()) {
            return false;
        }

        return $this->reconnect($dsn);
    }

    /**
     * Reconnects with the server
     *
     * @param  string  $dsn
     * @return bool
     */
    private function reconnect($dsn)
    {
        static::$executedQueriesCount = 0;
        static::$successfulQueriesCount = 0;

        static::$connected = true;

        return static::$connected;
    }

    /**
     * Sends query to the server
     *
     * @param  string  $statement
     * @return bool
     * @throws \RuntimeException
     */
    public function query($statement)
    {
        if (! $this->isConnected()) {
            throw new \RuntimeException(self::MESSAGE_NOT_CONNECTED);
        }

        ++static::$executedQueriesCount;
        static::$successfulQueriesCount++;

        return true;
    }

    /**
     * Disconnects with the server
     *
     * @return bool
     * @throws \RuntimeException
     */
    public function disconnect()
    {
        if (! $this->isConnected()) {
            throw new \RuntimeException(self::MESSAGE_NOT_CONNECTED);
        }

        static::$connected = false;

        return true;
    }

    /**
     * Checks if connection to the server was established
     *
     * @return bool
     */
    public function isConnected()
    {
        return static::$connected;
    }

    /**
     * Returns number of executed queries
     *
     * @return int
     */
    public function getNumberOfExecutedQueries()
    {
        return static::$executedQueriesCount;
    }

    /**
     * Returns number of successful queries
     *
     * @return mixed
     */
    public function getNumberOfSuccessfulQueries()
    {
        return static::$successfulQueriesCount;
    }
}