<?php
// Entity/Orderdetails.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class Orderdetails
{
    // ID
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

    // ProductID
    /**
     * @ORM\Column(name="ProductID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ProductID;

    public function getProductID(): ?int
    {
        return $this->ProductID;
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

    // Quantity
    /**
     * @ORM\Column(name="Quantity", type="smallint", length=2)
     */
    private $Quantity;

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    // Discount
    /**
     * @ORM\Column(name="Discount", type="float", length=2)
     */
    private $Discount;

    public function getDiscount(): ?float
    {
        return $this->Discount;
    }

    public function setDiscount(float $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }

    // JOIN Products

    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="Products")
     * @ORM\JoinColumn(name="SupplierId", referencedColumnName="SupplierId")
     *
     */
    private $Products;

    public function getProducts(): ?Products
    {
        return $this->Products;
    }

    public function setProducts(?Products $Products): self
    {
        $this->Products = $Products;

        return $this;
    }
}