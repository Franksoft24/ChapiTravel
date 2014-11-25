<?php

abstract class Entidad{

	public function toArray(){
	    $result = array();
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
	}

}