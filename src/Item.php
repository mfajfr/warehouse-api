<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 13:55 02.05.2018
 */

namespace WarehouseAPI;

class Item implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $item_uid;
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
    public function __construct($item_uid, $quantity, $price_without_tax)
    {
        $this->item_uid = $item_uid;
        $this->quantity = $quantity;
        $this->price_without_tax = $price_without_tax;
    }

    /**
     * @return string
     */
    public function getItemUid()
    {
        return $this->item_uid;
    }

    /**
     * @param string $item_uid
     */
    public function setItemUid($item_uid)
    {
        $this->item_uid = $item_uid;
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
    public function setQuantity($quantity)
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
    public function setPriceWithoutTax($price_without_tax)
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
            'item_uid' => $this->item_uid,
            'quantity' => $this->quantity,
            'price_without_tax' => $this->price_without_tax,
        ];
    }
}