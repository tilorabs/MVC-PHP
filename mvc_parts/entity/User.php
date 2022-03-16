<?php
namespace MVC;

/**
 * Class User
 * @package MVC
 */
class User
{
    /**
     * @var string $uniqueid
     */
    protected $uniqueid;

    /**
     * @var string $firstname
     */
    protected $firstname;

    /**
     * @var string $lastname
     */
    protected $lastname;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $gender
     */
    protected $gender;

    /**
     * User constructor.
     * @param array $data
     */
    public function __construct(array $data) {
        $this->setUniqueid($data['uniqueid']);
        $this->setFirstname($data['firstname']);
        $this->setLastname($data['lastname']);
        $this->setEmail($data['email']);
        if (array_key_exists('gender', $data)) {
            $this->setGender($data['gender']);
        }
    }

    /**
     * @return string
     */
    public function getUniqueid(): string {
        return $this->uniqueid;
    }

    /**
     * @param string $uniqueid
     */
    public function setUniqueid(string $uniqueid): void {
        $this->uniqueid = $uniqueid;
    }

    /**
     * @return string
     */
    public function getFirstname(): string {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGender(): string {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void {
        if (preg_match('/^(f|female|frau|weiblich)$/i', $gender)) {
            $this->gender = 'female';
        } else {
            $this->gender = 'male';
        }
    }
}