<?php

abstract class Entidad{

	public function toArray(){
	    $result = array();
        foreach ($this as $key => $value) {
            if(!empty($value)){
            	$result[$key] = $value;
            }
            
        }
        return $result;
	}

}