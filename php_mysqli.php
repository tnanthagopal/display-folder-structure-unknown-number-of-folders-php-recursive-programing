<?php
/*mysqli*****************************/
$db = new mysqli("localhost", "root", "", "your_db");// Create connection
if ($db->connect_error) {// Check connection
    die("Connection failed: " . $conn->connect_error);
}
$mysqli_result = $db->query("SELECT * FROM tbl_folder");        
$all_folders =[]; //get all folders
while($row = mysqli_fetch_array($mysqli_result)) {
  $all_folders[]=$row;
}
/**************************|********/
$array_column = array_column($all_folders, 'parent_id'); 
$all_parent0_dir = array_keys($array_column, "0"); //get array indicators of all base folders arrays      

foreach ($all_parent0_dir as $value) { 
    $dir = $all_folders[$value];//get base folder array      
    echo '-'.$dir['foler_name'].'</br>'; //base folders name
    $parent_id = $dir['id'];
    $nodeNumber = 1;
    $lastElem = FALSE;//is this last element of the folder
    $nodeArray = [];//save all the nodes of the folder
    $step = 1;
    while ( $parent_id != $dir['id'] || $lastElem == FALSE) {
        $last = 1; //is this last element of the node
        /*get details of a specific folder*****************************/
        $sub_dir_ids = array_keys($array_column, $parent_id); //[] of array indicators of folders(arrays) with parent_id = $parent_id
        if($sub_dir_ids)
        { 
            $sub_dir = isset($sub_dir_ids[$nodeNumber-1])? $sub_dir_ids[$nodeNumber-1] : null; //eg: $sub_dir_ids[] =[5,6] | $sub_dir_ids[0] = 5
            if($sub_dir){ 
                $res = $all_folders[$sub_dir];//specific folder
                for($i=0;$i<=$step;$i++){echo '-';}
                echo $res['foler_name'].'</br>';
                if($res){$last = 0; }                       
            }
        }
        /*************************************************************/
        if($last == 1){
        $step--;                   
            if($parent_id != $dir['id']){//if $parent_id didn't reach the first element (starting point)
                $lastElement = array_pop($nodeArray);
                $parent_id = $lastElement[0];
                $nodeNumber = $lastElement[1] + 1;
            }else{$lastElem = TRUE;}//very last element of the folder
        }else{
        $step++;
           $lastElem = FALSE;
           array_push($nodeArray, array($parent_id,$nodeNumber));
           $parent_id = $res['id'];//$parent_id for inner folder
           $nodeNumber = 1;//go to next step - inner folder
        }
    }            
}