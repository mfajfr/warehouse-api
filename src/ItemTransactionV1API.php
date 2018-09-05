<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 18:57 23.06.2018
 */

namespace WarehouseApi;

class ItemTransactionV1API extends WarehouseV1API
{
    public function store(ItemTransaction $itemTransaction)
    {
        return $this->response($this->post($this->url . 'item-transaction/store', $itemTransaction->jsonSerialize()));
    }

    public function update(ItemTransaction $itemTransaction, $item_transaction_uid)
    {
        return $this->response($this->patch($this->url . 'uid/item-transaction/' . $item_transaction_uid . '/complete', $itemTransaction->jsonSerialize()));
    }

    public function complete($item_transaction_uid)
    {
        return $this->response($this->patch($this->url . 'uid/item-transaction/' . $item_transaction_uid . '/complete', []));
    }

    public function delete($item_transaction_uid)
    {
        return $this->response(parent::delete($this->url . 'uid/item-transaction/' . $item_transaction_uid));
    }
}