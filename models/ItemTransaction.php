<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 13:54 02.05.2018
 */

namespace models;

class ItemTransaction implements \JsonSerializable
{
    /**
     * @var Item[]
     */
    protected $items = [];
    /**
     * @var \DateTime
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $reference_id;

    /**
     * ItemTransaction constructor.
     * @param Item[] $items
     * @param \DateTime $created_at
     * @param string $reference_id
     */
    public function __construct($items = [], \DateTime $created_at = null, string $reference_id = '')
    {
        $this->items = $items;
        if (is_null($created_at)) {
            $created_at = new \DateTime();
        }
        $this->created_at = $created_at;
        $this->reference_id = $reference_id;
    }

    public function addItem(Item $item)
    {
        $this->items[$item->getItemId()] = $item;
    }

    public function deleteItem(Item $item)
    {
        if ($this->existItem($item)) {
            unset($this->items[$item->getItemId()]);
        }
    }

    public function updateItem(Item $item)
    {
        $this->addItem($item);
    }

    public function existItem(Item $item)
    {
        return array_key_exists($item->getItemId(), $this->items);
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
        $arr = [];
        $arr['created_at'] = $this->created_at->format('Y-m-d H:i:s');
        $arr['reference_id'] = $this->reference_id;
        $arr['items'] = [];
        foreach ($this->items as $key => $item) {
            $arr['items'][$key] = $item->jsonSerialize();
        }
        return $arr;
    }
}