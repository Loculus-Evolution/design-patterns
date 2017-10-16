<?php
namespace tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer;

use LoculusEvolution\DesignPatterns\Pattern\Observer\AbstractSubject;

/**
 * Class NamedSubject
 *
 * @package     LoculusEvolution\DesignPatterns\Demo\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class Account extends AbstractSubject
    implements \Countable
{
    const STATUS_ACTIVE      = 1;
    const STATUS_NOT_ACTIVE  = 0;
    const STATUS_DISABLED    = 2;

    const STATUS_NAME_ACTIVE         = 'active';
    const STATUS_NAME_NOT_ACTIVE     = 'not active';
    const STATUS_NAME_DISABLED       = 'disabled';
    const STATUS_NAME_UNRECOGNIZED   = 'unrecognized';

    const STATUSES = [
        self::STATUS_ACTIVE      => self::STATUS_NAME_ACTIVE,
        self::STATUS_NOT_ACTIVE  => self::STATUS_NAME_NOT_ACTIVE,
        self::STATUS_DISABLED    => self::STATUS_NAME_DISABLED,
    ];

    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var \DateTime
     */
    protected $createdAt;
    /**
     * @var \DateTime
     */
    protected $updatedAt;
    /**
     * @var \DateTime
     */
    protected $deletedAt;

    /**
     * @var int
     */
    protected $status = self::STATUS_NOT_ACTIVE;


    /**
     * Account constructor.
     *
     * @param  string  $email
     * @param  string  $firstName
     * @param  string  $lastName
     */
    public function __construct(string $email, string $firstName, string $lastName)
    {
        $this->id = substr(md5(uniqid()), 0, 7);

        $this->email     = $email;

        $this->firstName = $firstName;
        $this->lastName  = $lastName;

        $this->createdAt = new \DateTime();
    }


    /**
     * Notifies all attached observer, when subject change it's state
     */
    public function notify()
    {
        $this->updatedAt = new \DateTime();

        parent::notify();
    }


    /**
     * Returns information about account status
     */
    public function getStatus(): int
    {
        return $this->status;
    }


    /**
     * Returns information about account state
     */
    public function getState(): array
    {
        return [
            'id' => $this->id,

            'email' => $this->email,
            'status' => $this->status,

            'firstName' => $this->firstName,
            'lastName' => $this->lastName,

            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ];
    }


    /**
     * Returns e-mail address
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets e-mail address (changes it's state in general)
     *
     * @param  string  $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        $this->notify();
    }


    /**
     * Returns first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Sets first name (changes it's state in general)
     *
     * @param  string  $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;

        $this->notify();
    }

    /**
     * Returns first name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Sets last name (changes it's state in general)
     *
     * @param  string  $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        $this->notify();
    }

    /**
     * Returns string representation of subject's status or for provided value
     *
     * @param  integer  $status
     * @return string
     */
    public function getStatusAsString(int $status = null): string
    {
        if (is_null($status)) {
            $status = $this->getStatus();
        }

        if (array_key_exists($status, self::STATUSES)) {
            return self::STATUSES[$status];
        }

        return self::STATUS_NAME_UNRECOGNIZED;
    }

    /**
     * Sets account active (changes it's state)
     */
    public function setActive()
    {
        $this->status = self::STATUS_ACTIVE;

        $this->notify();
    }

    /**
     * Sets account not active (changes it's state)
     */
    public function setNotActive()
    {
        $this->status = self::STATUS_NOT_ACTIVE;

        $this->notify();
    }

    /**
     * Sets account disabled (changes it's state)
     */
    public function setDisabled()
    {
        $this->status = self::STATUS_DISABLED;

        $this->notify();
    }


    /**
     * Returns account creation datetime
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Returns number of attached observers
     *
     * @return int
     */
    public function count()
    {
        return count($this->observers);
    }
}