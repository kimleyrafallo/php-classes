<?php

class Table {
    private $headers = array();
    private $data = array();

    private $class;
    private $id;
    private $attributes;
    
    private $row = 0;
    private $column = 0;

    public function setHeaders(){
        $num_args = func_num_args();
        $arg_list = func_get_args();
        for ($i = 0; $i < $num_args; $i++) {
            $this->headers[$i] = $arg_list[$i];
        }
        $this->column = $num_args;
    }

    public function setData(){
        $num_args = func_num_args();
        $arg_list = func_get_args();
        for ($i = 0; $i < $this->column; $i++) {
            $data[$this->headers[$i]] = $arg_list[$i];
        }
        array_push($this->data, $data);
        $this->row = count($this->data);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function setAttributes($attributes) {
        $this->attributes = $attributes;
    }

    public function showTable(){
        echo '<table id="'.$this->id.'" class="'.$this->class.'" '.$this->attributes.'>';
        echo '<tr>';
            foreach($this->headers as $headers) {
                echo '<th>'.$headers.'</th>';
            }
        for ($i = 0; $i < count($this->data); $i++) {
            echo '</tr>';
            for ($j = 0; $j < count($this->headers); $j++) {
                    echo '<td>'.$this->data[$i][$this->headers[$j]].'</td>';
            }
        }
        echo '</table>';
    }

    public function showHeaders(){
        echo '<pre>';
        echo print_r($this->headers);
        echo '</pre>';
    }

    public function showData(){
        echo '<pre>';
        echo print_r($this->data);
        echo '</pre>';
    }
    
}