<?php

class Table {
    private $headers = array();
    private $data = array();
    private $id;
    private $class;
    private $attributes;
    private $row = 0;
    private $column = 0;

    // SET TABLE DATA
    
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
        try {
            $this->checkNumArgs($num_args);

            $arg_list = func_get_args();
            for ($i = 0; $i < $this->column; $i++) {
                $data[$this->headers[$i]] = $arg_list[$i];
            }
            array_push($this->data, $data);
            $this->row = count($this->data);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function setId($id) {
        try {
            $this->checkId($id);
            $this->id = $id;
        } catch (Exception $e) {
            echo 'Warning: ' . $e->getMessage();
        }
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function setAttributes($attributes) {
        $this->attributes = $attributes;
    }

    // PRINT TABLE

    public function showTable(){
        echo '<table id="'.$this->id.'" class="'.$this->class.'" '.$this->attributes.'>';
        echo '<tr>';
            foreach($this->headers as $headers) {
                echo '<th>'.$headers.'</th>';
            }
        echo '</tr>';
        for ($i = 0; $i < count($this->data); $i++) {
            echo '<tr>';
            for ($j = 0; $j < count($this->headers); $j++) {
                    echo '<td>'.$this->data[$i][$this->headers[$j]].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    // EXCEPTION HANDLING

    private function checkNumArgs($num_args) {
        if($num_args !== $this->column){
            throw new Exception("Number of data must be equal to number of columns.");
        }else{
            return TRUE;
        }
    }

    private function checkId($id) {
        if(preg_match('/\s/', $id)){
            throw new Exception("Id cant contain white spaces.");
        }else{
            return TRUE;
        }
    }    
}
