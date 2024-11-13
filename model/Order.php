<?php

declare(strict_types=1);
class Order
{
    private string $id;
    private string $customerName;
    private string $status;
    private float $totalPrice;
    private array $products;
    private ?string $shippingAddress;

    public function __construct(string $customerName)
    {
        if (mb_strlen($customerName) < 3) {
            throw new Exception("Merci de remplir un nom correct");
        }

        $this->status = 'cart';
        $this->totalPrice = 0;
        $this->customerName = $customerName;
        $this->id = uniqid();
        $this->products = [];
    }

    public function addProduct(): void
    {
        if ($this->status === "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        } else {
            throw new Exception("La commande ne peut pas être modifiée");
        }
    }

    public function removeProduct(): void
    {
        if ($this->status === "cart" && !empty($this->products)) {
            array_pop($this->products);
            $this->totalPrice -= 3;
        }
    }

    public function setShippingAddress(string $shippingAddress)
    {
        if ($this->status === "cart") {
            $this->shippingAddress = $shippingAddress;
            $this->status = "shippingAddressSet";
        } else {
            throw new Exception("L'adresse de livraison ne peut être modifiée.");
        }

    }

    public function pay(): void
    {
        if ($this->status === "shippingAddressSet" && !empty($this->products)) {
            $this->status = "paid";
        } else {
            throw new Exception('Vous ne pouvez pas payer, merci de remplir votre adresse d\'abord');
        }

    }

    // private or public


    public function ship()
    {
        if ($this->status === 'paid') {
            $this->status = "shipped";
        } else {
            throw new Exception("La commande ne peux pas être expédiée. elle n'est pas encore payée");
        }
    }

    public function dateTime(): string {
        // Utilise la fonction date pour formater la date
        $dateTime = date('d-m-Y'); // Format : jour-mois-année
        return $dateTime;
    }

    public function hourTime(): string {
        // Utilise la fonction date pour formater l'heure actuelle
        $dateTime = date('H:i'); // Format : heure:minutes
        return $dateTime;
    }

    public function totalPrice(): float {
        return $this->totalPrice;
    }
    // On crée une méthode (getter) afin de récupérer l'id sans qu'il devienne modifiable
    public function getId(): string {
        return $this->id;
    }
    public function getProducts(): array {
        return $this->products;
    }
    public function getAddress(): string {
        return $this->shippingAddress;
    }
    public function getCustomerName(): string {
        return $this->customerName;
    }
}