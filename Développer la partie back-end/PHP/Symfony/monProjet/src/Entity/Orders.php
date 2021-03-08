<?php
// Entity/Orders.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */

class Orders{

    // OrderID
    /**
     * @ORM\Column(name="OrderID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $OrderID;

    public function getOrderID(): ?int
    {
        return $this->OrderID;
    }

    // CustomerID
    /**
     * @ORM\Column(name="CustomerID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $CustomerID;

    public function getCustomerID(): ?int
    {
        return $this->CustomerID;
    }

    // EmployeeID
    /**
     * @ORM\Column(name="EmployeeID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $EmployeeID;

    public function getEmployeeID(): ?int
    {
        return $this->EmployeeID;
    }

    // OrderDate
    /**
     * @ORM\Column(name="OrderDate", type="datetime")
     */
    private $OrderDate;

    public function getOrderDate(): ?string
    {
        return $this->OrderDate;
    }

    public function setOrderDate(string $OrderDate): self
    {
        $this->OrderDate = $OrderDate;

        return $this;
    }

    // RequiredDate
    /**
     * @ORM\Column(name="RequiredDate", type="datetime")
     */
    private $RequiredDate;

    public function getRequiredDate(): ?string
    {
        return $this->RequiredDate;
    }

    public function setRequiredDate(string $RequiredDate): self
    {
        $this->RequiredDate = $RequiredDate;

        return $this;
    }

    // ShippedDate
    /**
     * @ORM\Column(name="ShippedDate", type="datetime")
     */
    private $ShippedDate;

    public function getShippedDate(): ?string
    {
        return $this->ShippedDate;
    }

    public function setShippedDate(string $ShippedDate): self
    {
        $this->ShippedDate = $ShippedDate;

        return $this;
    }

    // ShipVia
    /**
     * @ORM\Column(name="ShipVia", type="decimal", length=11)
     */
    private $ShipVia;

    public function getShipVia(): ?string
    {
        return $this->ShipVia;
    }

    public function setShipVia(string $ShipVia): self
    {
        $this->ShipVia = $ShipVia;

        return $this;
    }

    // Freight
    /**
     * @ORM\Column(name="Freight", type="decimal", length=11)
     */
    private $Freight;

    public function getFreight(): ?float
    {
        return $this->Freight;
    }

    public function setFreight(float $Freight): self
    {
        $this->Freight = $Freight;

        return $this;
    }

    // ShipName
    /**
     * @ORM\Column(name="ShipName", type="string", length=40)
     */
    private $ShipName;

    public function getShipName(): ?string
    {
        return $this->ShipName;
    }

    public function setShipName(string $ShipName): self
    {
        $this->ShipName = $ShipName;

        return $this;
    }

    // ShipAddress
    /**
     * @ORM\Column(name="ShipAddress", type="string", length=60)
     */
    private $ShipAddress;

    public function getShipAddress(): ?string
    {
        return $this->ShipAddress;
    }

    public function setShipAddress(string $ShipAddress): self
    {
        $this->ShipAddress = $ShipAddress;

        return $this;
    }

    // ShipCity
    /**
     * @ORM\Column(name="ShipCity", type="string", length=15)
     */
    private $ShipCity;

    public function getShipCity(): ?string
    {
        return $this->ShipCity;
    }

    public function setShipCity(string $ShipCity): self
    {
        $this->ShipCity = $ShipCity;

        return $this;
    }

    // ShipRegion
    /**
     * @ORM\Column(name="ShipRegion", type="s", length=15)
     */
    private $ShipRegion;

    public function getShipRegion(): ?string
    {
        return $this->ShipRegion;
    }

    public function setShipRegion(string $ShipRegion): self
    {
        $this->ShipRegion = $ShipRegion;

        return $this;
    }

    // ShipPostalCode
    /**
     * @ORM\Column(name="ShipPostalCode", type="string", length=10)
     */
    private $ShipPostalCode;

    public function getShipPostalCode(): ?string
    {
        return $this->ShipPostalCode;
    }

    public function setShipPostalCode(string $ShipPostalCode): self
    {
        $this->ShipPostalCode = $ShipPostalCode;

        return $this;
    }

    // ShipCountry
    /**
     * @ORM\Column(name="ShipCountry", type="datetime", length=15)
     */
    private $ShipCountry;

    public function getShipCountry(): ?string
    {
        return $this->ShipCountry;
    }

    public function setShipCountry(string $ShipCountry): self
    {
        $this->ShipCountry = $ShipCountry;

        return $this;
    }

    //JOIN CUSTOMERS

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers", inversedBy="Orders")
     * @ORM\JoinColumn(name="CustomersID", referencedColumnName="CustomersID")
     *
     */
    private $Customers;
    public function getCustomers(): ?Customers
    {
        return $this->Customers;
    }

    public function setCustomers(?Customers $Customers): self
    {
        $this->Customers = $Customers;

        return $this;
    }
}