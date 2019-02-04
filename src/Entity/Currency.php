<?php

    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\CurrencyRepository")
     */
    class Currency
    {
        /**
         * @ORM\Id()
         * @ORM\GeneratedValue()
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=255)
         */
        private $business_name;

        /**
         * @ORM\Column(type="decimal", precision=8, scale=5, nullable=true)
         */
        private $USD;

        /**
         * @ORM\Column(type="decimal", precision=8, scale=5, nullable=true)
         */
        private $EUR;

        /**
         * @ORM\Column(type="decimal", precision=8, scale=5, nullable=true)
         */
        private $GBP;

        /**
         * @ORM\Column(type="datetime")
         */
        private $create_date;

        public function getId(): ?int
        {
            return $this->id;
        }

        public function getBusinessName(): ?string
        {
            return $this->business_name;
        }

        public function setBusinessName(string $business_name): self
        {
            $this->business_name = $business_name;

            return $this;
        }

        public function getUSD()
        {
            return $this->USD;
        }

        public function setUSD($USD): self
        {
            $this->USD = $USD;

            return $this;
        }

        public function getEUR()
        {
            return $this->EUR;
        }

        public function setEUR($EUR): self
        {
            $this->EUR = $EUR;

            return $this;
        }

        public function getGBP()
        {
            return $this->GBP;
        }

        public function setGBP($GBP): self
        {
            $this->GBP = $GBP;

            return $this;
        }

        public function getCreateDate(): ?\DateTimeInterface
        {
            return $this->create_date;
        }

        public function setCreateDate(\DateTimeInterface $create_date): self
        {
            $this->create_date = $create_date;

            return $this;
        }
    }