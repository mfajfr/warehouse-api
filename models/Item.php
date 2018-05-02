<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 13:55 02.05.2018
 */

namespace models;

class Item implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $item_id;
    /**
     * @var integer
     */
    protected $quantity;
    /**
     * @var float
     */
    protected $price_without_tax;

    /**
     * Item constructor.
     * @param string $item_id
     * @param integer $quantity
     * @param float $price_without_tax
     */
    public function __construct($item_id, $quantity, $price_without_tax)
    {
        $this->item_id = $item_id;
        $this->quantity = $quantity;
        $this->price_without_tax = $price_without_tax;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * @param string $item_id
     */
    public function setItemId($item_id): void
    {
        $this->item_id = $item_id;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getPriceWithoutTax()
    {
        return $this->price_without_tax;
    }

    /**
     * @param float $price_without_tax
     */
    public function setPriceWithoutTax($price_without_tax): void
    {
        $this->price_without_tax = $price_without_tax;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'price_without_tax' => $this->price_without_tax,
        ];
    }
}