<?php
/**
 * @author Bc. Marek Fajfr <mfajfr90(at)gmail.com>
 * Created at: 18:55 23.06.2018
 */

namespace WarehouseAPI;

class ItemV1API extends WarehouseV1API
{
    public function stocked($item_uid, $onlyData = true)
    {
        return $this->response($this->get('item/uid/' . $item_uid . '/stocked'), $onlyData);
    }

    public function stockedList($onlyData = true)
    {
        return $this->response($this->get('item/stocked-list'), $onlyData);
    }

    public function providers($item_uid, $onlyData = true)
    {
        return $this->response($this->get('item/uid/' . $item_uid . '/providers'), $onlyData);
    }
}