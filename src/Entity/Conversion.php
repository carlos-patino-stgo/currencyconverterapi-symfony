<?php

namespace App\Entity;

use App\Repository\ConversionRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ConversionRepository::class)
 */
class Conversion
{

    public const FROM_CURRENCY = [
        'USD' => 'USD',
        'PLN' => 'PLN'
    ];

    public const TO_CURRENCY = [
        'MXN' => 'MXN',
        'ERN' => 'ERN',
        'DZD' => 'DZD',
        'CDF' => 'CDF',
        'MAD' => 'MAD',
        'SYP' => 'SYP'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     * )
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="enum('USD', 'PLN') NOT NULL")
     * @Assert\NotBlank
     */
    private $from_currency;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="enum('MXN', 'ERN', 'DZD', 'CDF', 'MAD', 'SYP') NOT NULL")
     * @Assert\NotBlank
     */
    private $to_currency;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $current_value_of_the_currency;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $amount_convertor;

    /**
     * @ORM\Column(type="datetime", options={"default" : "CURRENT_TIMESTAMP"})
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getFromCurrency(): ?string
    {
        return $this->from_currency;
    }

    public function setFromCurrency(string $from_currency): self
    {
        $this->from_currency = $from_currency;

        return $this;
    }


    public function getToCurrency(): ?string
    {
        return $this->to_currency;
    }

    public function setToCurrency(string $to_currency): self
    {
        $this->to_currency = $to_currency;

        return $this;
    }

    public function getCurrentValueOfTheCurrency(): ?float
    {
        return $this->current_value_of_the_currency;
    }

    public function setCurrentValueOfTheCurrency(float $current_value_of_the_currency): self
    {
        $this->current_value_of_the_currency = $current_value_of_the_currency;

        return $this;
    }


    public function getAmountConvertor(): ?float
    {
        return $this->amount_convertor;
    }

    public function setAmountConvertor(float $amount_convertor): self
    {
        $this->amount_convertor = $amount_convertor;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
