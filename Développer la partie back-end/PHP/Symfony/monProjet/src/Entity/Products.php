<?php
// Entity/Products.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class Products
{
    // ID
    /**
     * @ORM\Column(name="ProductId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    // Productname
    /**
     * @ORM\Column(name="ProductName", type="string", length=40)
     */
    private $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    //SupplierID
    /**
     * @ORM\Column(name="SupplierID", type="integer",nullable=false, length=11)
     */
    private $SuppID;

    public function getSuppID(): ?int
    {
        return $this->SuppID;
    }

    //CategoryID
    /**
     * @ORM\Column(name="CategoryID", type="integer",nullable=false, length=11)
     */
    private $CatID;

    public function getCatID(): ?int
    {
        return $this->CatID;
    }

    // QuantityPerUnit
    /**
     * @ORM\Column(name="QuantityPerUnit", type="string", length=20)
     */
    private $Qty;

    public function getqty(): ?string
    {
        return $this->Qty;
    }

    public function setqty(string $Qty): self
    {
        $this->Qty = $Qty;

        return $this;
    }

    //UnitPrice
    /**
     * @ORM\Column(name="UnitPrice", type="decimal", length=11)
     */
    private $UnitPrice;

    public function getUnitPrice(): ?float
    {
        return $this->UnitPrice;
    }

    public function setUnitPrice(float $UnitPrice): self
    {
        $this->UnitPrice = $UnitPrice;

        return $this;
    }

    //UnitsInStock
    /**
     * @ORM\Column(name="UnitsInStock", type="smallint", length=2)
     */
    private $UnitStock;

    public function getUnitStock(): ?int
    {
        return $this->UnitStock;
    }

    public function setUnitStock(int $UnitStock): self
    {
        $this->UnitStock = $UnitStock;

        return $this;
    }

    //UnitOnOrder
    /**
     * @ORM\Column(name="UnitsOnOrder", type="smallint", length=2)
     */
    private $UnitsOrder;

    public function getUnitsOrder(): ?int
    {
        return $this->UnitsOrder;
    }

    public function setUnitOrder(int $UnitsOrder): self
    {
        $this->UnitsOrder = $UnitsOrder;

        return $this;
    }

    //ReorderLevel
    /**
     * @ORM\Column(name="ReorderLevel", type="smallint", length=2)
     */
    private $ReorderLevel;

    public function getReorderLevel(): ?int
    {
        return $this->ReorderLevel;
    }

    public function setReorderLevel(int $ReorderLevel): self
    {
        $this->ReorderLevel = $ReorderLevel;

        return $this;
    }

    //Discontinued
    /**
     * @ORM\Column(name="Discontinued", type="integer", length=2)
     */
    private $Discontinued;

    public function getDiscontinued(): ?int
    {
        return $this->Discontinued;
    }

    public function setDiscontinued(int $Discontinued): self
    {
        $this->Discontinued = $Discontinued;

        return $this;
    }


    // JOIN SUPPLIERS

    /**
     * @var \Suppliers
     *
     * @ORM\ManyToOne(targetEntity="Suppliers", inversedBy="Products")
     * @ORM\JoinColumn(name="SupplierId", referencedColumnName="SupplierId")
     *
     */
    private $Suppliers;

    public function getSuppliers(): ?Suppliers
    {
        return $this->Suppliers;
    }

    public function setSuppliers(?Suppliers $Suppliers): self
    {
        $this->Suppliers = $Suppliers;

        return $this;
    }
    /////////////
    /**
     * @ORM\OneToMany(targetEntity="Orderdetails", mappedBy="Products", orphanRemoval=true)
     */
    private $Orderdetails;

    public function __construct()
    {
        $this->Orderdetails = new ArrayCollection();
    }

    public function getOrderdetails(): Collection
    {
        return $this->Orderdetails;
    }

    public function addOrderdetails(Orderdetails $Orderdetails): self
    {
        if (!$this->Orderdetails->contains($Orderdetails)) {
            $this->Orderdetails[] = $Orderdetails;
            $Orderdetails->setProducts($this);
        }

        return $this;
    }


}