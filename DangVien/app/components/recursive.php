<?php

namespace App\components;

class Recursive{

    private $data;
    private $htmlSelect = '';
    public function __construct($data){
        $this->data = $data;
    }

    public function RecursiveOption($ma, $value , $name ,$dk){
        foreach ($this->data as $dt1) {
            if($value == null){
                $giatri = '';
            }else {
                $giatri = $dt1->$value;
            }
            if($dk == $dt1->$ma){
                $this->htmlSelect .= "<option selected value = ".$dt1->$ma.">".$giatri.' '.$dt1->$name."</option>";
            }else {
                $this->htmlSelect .= "<option value = ".$dt1->$ma.">".$giatri.' '.$dt1->$name."</option>";
            }

        }
        return $this->htmlSelect;
    }

    public function dataRecusive($parent_id_selected,$id = 0,$text = ''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                if (!empty($parent_id_selected) && $parent_id_selected == $value['id']){
                    $this->htmlSelect .= "<option selected value=\"".$value['id']."\">".$text.$value['name']."</option>";
                }else{
                    $this->htmlSelect .= "<option value=\"".$value['id']."\">".$text.$value['name']."</option>";
                }
                $this->dataRecusive($parent_id_selected,$value['id'],$text.'--');
            }
        }
        return $this->htmlSelect;
    }
}
