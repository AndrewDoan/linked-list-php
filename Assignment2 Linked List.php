<?php
	class Node{
		public $value, $prev, $next;

		public function __construct($value){
			$this->value = $value;
		}
	}

	class Station{
		public $head, $tail;

		public function add_node($node){
			if($this->head === null){
				$this->head = $node;
				$this->tail = $node;
				return;
			}

			$node->prev = $this->tail;
			$this->tail->next = $node;
			$this->tail = $node;
		}

		public function remove_node($nth_value){
			$temp = $this->head;
			for ($i=0; $i < $nth_value-1; $i++) { 
				if($temp->next != NULL)
					$temp = $temp->next;
				else{
					echo ("Error deleting node");
					return;
				}
			}

			if($temp->prev === NULL && $temp->next === NULL){
				$this->head = NULL;
				$this->tail = NULL;
			}

			else if($temp->prev === NULL && $temp->next != NULL){
				$this->head = $temp->next;
				$temp->next->prev = NULL;
			}

			else if($temp->next === NULL && $temp->prev != NULL){
				$this->tail = $temp->prev;
				$temp->prev->next = NULL;
			}

			else if($temp->prev != NULL && $temp->next != NULL){
				$temp->prev->next = $temp->next;
				$temp->next->prev = $temp->prev;
			}

			$temp->prev = NULL;
			$temp->next = NULL;
			unset($temp);
		}
		public function insert_node($node, $nth_value){
			$temp = $this->head;
			for ($i=0; $i < $nth_value-1; $i++) { 
				if($temp->next != NULL)
					$temp = $temp->next;
				else{
					echo ("Error inserting node");
					return;
				}
			}

			if($temp->prev === NULL && $temp->next === NULL){
				$this->head = $node;
				$this->tail = $node;
				$node->prev = NULL;
				$node->next = NULL;
			}

			else if($temp->prev === NULL && $temp->next != NULL){
				$this->head = $node;
				$node->next = $temp;
				$node->prev = NULL;
				$temp->prev = $node;
			}

			else if($temp->next === NULL && $temp->prev != NULL){
				$node->prev = $temp->prev;
				$node->next = $temp;
				$temp->prev = $node;
			}

			else if($temp->prev != NULL && $temp->next != NULL){
				$temp->prev->next = $node;
				$node->prev = $temp->prev;
				$temp->prev = $node;
				$node->next = $temp;

			}
		}
	}

	$node1 = new Node(3);
	$node2 = new Node(10);
	$node3 = new Node(20);
	$node4 = new Node(50);
	$node5 = new Node(99);
	$node6 = new Node(30);
	$station1 = new Station();
	$station1->add_node($node1);
	$station1->add_node($node2);
	$station1->add_node($node3);
	$station1->add_node($node4);
	$station1->add_node($node5);

	$station1->insert_node($node6, 5);
	var_dump($station1);
?>