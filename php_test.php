<?php
class Product {
	public $Name;
	public $Price;
	
	function __construct($Name, $Price) {
    	$this->Name = $Name;
    	$this->Price = $Price;
    }
    function get_name() {
    	return $this->Name;
    }
    function get_price() {
    	return $this->Price;
    }
    function print_name() {
    	echo $this->get_name();
    }
    function print_price() {
    	echo $this->get_price();
    }
	function print() {
		echo "<p>{$this->get_name()} стоит {$this->get_price()} рублей</p>";
	}
}

class MyGood {
	public $Good;
	public $Count;
	
	function __construct($Product, $Count) {
    	$this->Good = $Product;
		$this->Count = $Count;
    }
	function get_count() {
		return $this->Count;
	}
	
	function get_name() {
		return $this->Good->get_name();
	}
	function get_price() {
		return $this->Good->get_price();
	}
	function print_count() {
		print $this->get_count();
	}
	function print() {
		return $this->Good->print();
	}
}


class MyBasket {
	public $Basket;
	
	function add($Good) {
    	$this->Basket[] = $Good;
    }
	function get_count() {
		return count($this->Basket);
	}
	function get_cost() {
		$cost = 0;
		foreach ($this->Basket as $b) {
			$cost += $b->get_count() * $b->get_price();
		}
		return $cost;
	}
	function print_info() {
		$goodsName = 'товаров';
		$goodsCount = $this->get_count();
				
		if (substr($goodsCount, -1) == 1) {
			$goodsName = 'товар';
		}
		if (in_array(substr($goodsCount, -1),  [2,3,4])) {
			$goodsName = 'товара';
		} 
		if (in_array(substr($goodsCount, -2),  [11,12,13,14])) {
			$goodsName = 'товаров';
		}
		echo "Всего в корзине {$this->get_count()} {$goodsName} общей стоимостью {$this->get_cost()} рублей.";
	}
	
	function get_tr() {
		$tr = 0;
		foreach ($this->Basket as $b) {
			$cost = $b->get_price() * $b->get_count();
			$costdollar = $b->get_price() * $b->get_count() / 70;
			$costdollar = round($costdollar, 2);
			$tr .= "<tr>
				   		<td>{$b->get_name()}</td>
						<td>{$b->get_price()}</td>
						<td>{$b->get_count()}</td>
						<td>{$cost}</td>
						<td>{$costdollar}</td>
					</tr>";
		}
		return $tr;
	}
	
	function print_list() {
		echo "<table border='1'>
				   <caption>Таблица заказов</caption>
				   <tr>
					<th>Наименование</th>
					<th>Цена</th>
					<th>Количество</th>
					<th>Стоимость</th>
					<th>Стоимость в долларах</th>
				   </tr>
				   {$this->get_tr()}
				  </table>
				 </body>
				</html>";
	}	
}

$MyBasket = new MyBasket();

$product = new Product('Гречка', 100);
$MyGood = new MyGood($product, 10);
$MyBasket->add($MyGood);

$product = new Product('Рис', 70);
$MyGood = new MyGood($product, 6);
$MyBasket->add($MyGood);

$product = new Product('Макароны', 50);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Туалетная бумага', 130);
$MyGood = new MyGood($product, 5);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$product = new Product('Маска', 500);
$MyGood = new MyGood($product, 20);
$MyBasket->add($MyGood);

$MyBasket->print_info();
$MyBasket->print_list();