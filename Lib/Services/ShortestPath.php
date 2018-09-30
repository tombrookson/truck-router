<?php namespace TruckRouter\Services;

use TruckRouter\DataModels\Link;

class ShortestPath
{
	protected $from;
	protected $to;
	public $jumps = 1;

	public function __construct($from, $to)
	{
		$this->from = $from;
		$this->to = $to;


		$this->jumps++;

		$links = Link::findByFrom($from);

		foreach($links as $link){
			if($link['to_id'] == $this->to){
				break;
			}else{
				$this->increaseSearchDepth($link['to_id']);
			}
		}
	}

	public function increaseSearchDepth($from)
	{
		$this->jumps++;

		$links = Link::findByFrom($from);

		foreach($links as $link){
			if($link['to_id'] == $this->to){
				break;
			}else{
				$this->increaseSearchDepth($link['to_id']);
			}
		}
	}
}