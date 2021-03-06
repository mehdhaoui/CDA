<?php
// Entity/Customers.php
namespace App\Entity;
/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */

class Customers{

    // ID
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

    // CompanyName
    /**
     * @ORM\Column(name="CompanyName", type="string", length=40)
     */
    private $CompanyName;

    public function getCompanyName(): ?string
    {
        return $this->CompanyName;
    }

    public function setCompanyName(string $CompanyName): self
    {
        $this->CompanyName = $CompanyName;

        return $this;
    }

    // ContactName
    /**
     * @ORM\Column(name="ContactName", type="string", length=30)
     */
    private $ContactName;

    public function getContactName(): ?string
    {
        return $this->ContactName;
    }

    public function setContactName(string $ContactName): self
    {
        $this->ContactName = $ContactName;

        return $this;
    }

    // ContactTitle
    /**
     * @ORM\Column(name="ContactTitle", type="string", length=30)
     */
    private $ContactTitle;

    public function getContactTitle(): ?string
    {
        return $this->ContactTitle;
    }

    public function setContactTitle(string $ContactTitle): self
    {
        $this->ContactTitle = $ContactTitle;

        return $this;
    }

    // Address
    /**
     * @ORM\Column(name="Address", type="string", length=60)
     */
    private $Address;

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    // City
    /**
     * @ORM\Column(name="City", type="string", length=15)
     */
    private $City;

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    // Region
    /**
     * @ORM\Column(name="Region", type="string", length=15)
     */
    private $Region;

    public function getRegion(): ?string
    {
        return $this->Region;
    }

    public function setRegion(string $Region): self
    {
        $this->Region = $Region;

        return $this;
    }

    // PostalCode
    /**
     * @ORM\Column(name="PostalCode", type="string", length=10)
     */
    private $PostalCode;

    public function getPostalCode(): ?string
    {
        return $this->PostalCode;
    }

    public function setPostalCode(string $PostalCode): self
    {
        $this->PostalCode = $PostalCode;

        return $this;
    }

    // Country
    /**
     * @ORM\Column(name="Country", type="string", length=15)
     */
    private $Country;

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    // Phone
    /**
     * @ORM\Column(name="Phone", type="string", length=24)
     */
    private $Phone;

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    // Fax
    /**
     * @ORM\Column(name="Fax", type="string", length=24)
     */
    private $Fax;

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="Customers", orphanRemoval=true)
     */
    private $Orders;

    public function __construct()
    {
        $this->Orders = new ArrayCollection();
    }

    public function getOrders(): Collection
    {
        return $this->Orders;
    }

    public function addOrders(Orders $Orders): self
    {
        if (!$this->Orders->contains($Orders)) {
            $this->Orders[] = $Orders;
            $Orders->setCustomers($this);
        }

        return $this;
    }
}