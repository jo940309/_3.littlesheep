<?php

class Cart
{
    private $items = [];
	private $config;

    public function __construct($config = [])
	{
		$this->config = $config;
	}


    public function add($id, $count, $img, $name, $price)
	{
		if (isset($this->items[$id])) {
			// 商品已存在，將數量進行累加
			$this->items[$id]['count'] += $count;
		} else {
			// 商品不存在，新增到購物車
			$item = [
				'id' => $id,
				'attributs' => [
					'img' => $img,
					'name' => $name,
					'price' => $price
				],
				'count' => $count,
			];

			$this->items[$id] = $item;
		}
	}

	public function remove($id) 
	{
		unset($this->items[$id]);
	}

	public function clear()
	{
		$this->items = [];
	}


    public function getItems()
    {
        return $this->items;
    }

    public function isEmpty()
    {
        return empty($this->items);
    }

	public function serialize() {
        return serialize([
            'items' => $this->items,
            'config' => $this->config,
        ]);
    }

    public function unserialize($data) {
        $data = unserialize($data);
        $this->items = $data['items'];
        $this->config = $data['config'];
    }
}

?>