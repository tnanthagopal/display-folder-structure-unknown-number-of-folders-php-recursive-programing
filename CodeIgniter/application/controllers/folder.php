<?php

class Folder extends MP_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('folder_model');
    }

    public function index() {
        $all_parent0_dir = $this->folder_model->all_parent0_dir();  //get all base folders
        foreach ($all_parent0_dir as $value) {    
            echo '-'.$value['foler_name'].'</br>'; //base folders name
            $parent_id = $value['id'];
            $nodeNumber = 1;
            $lastElem = FALSE;//is this last element of the folder
            $nodeArray = [];//save all the nodes of the folder
            $step = 1;
            while ( $parent_id != $value['id'] || $lastElem == FALSE) {
                $result=$this->recursiveFunction($parent_id,$nodeNumber,$step);
                if($result[0] == 1){ //$result[0] = $lastElem - last element of the node
                $step--;                   
                    if($parent_id != $value['id']){//if $parent_id didn't reach the first element (starting point)
                        $lastElement = array_pop($nodeArray);
                        $parent_id = $lastElement[0];
                        $nodeNumber = $lastElement[1] + 1;
                    }else{$lastElem = TRUE;}
                }else{
                $step++;
                   $lastElem = FALSE;
                   array_push($nodeArray, array($parent_id,$nodeNumber));
                   $parent_id = $result[1];//$parent_id for inner folder
                   $nodeNumber = 1;//go to next step - inner folder
                }
            }            
        }
    }
    
    public function recursiveFunction($parent_id,$nodeNumber,$step) {
        //get details of a specific folder
        if($res = $this->folder_model->get_record($parent_id,$nodeNumber))
        {
           for($i=0;$i<=$step;$i++){echo '-';}
           echo $res['foler_name'].'</br>';
           $lastElem = 0;//not last element of the node
           return array($lastElem,$res['id']);
        }else{
           $lastElem = 1;//last element of the node
           return array($lastElem,"");
        }        
    }  
}