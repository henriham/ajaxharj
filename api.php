<?php 




function($query){

    $res=false;
    if($con=mysqli_connect('localhost', 'admin', 'admin', 'admin')){
        die("unable to connect!");
    }
    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            
            $res[] = $row;
        }
    }
    return $res;

};


if(count($_POST) > 0){
    
    $info = [];
    $info0['data_type'] = $_POST['data_type']; # tämä on js funktion handle_result tarkastus

    if($_POST['data_type'] == 'read'){
        $query          = "SELECT * FROM login";
        $result         = query($query);
        $info['data']   = $result;
    }

    echo json_encode($info); # encode muuttaa arrayn stringiksi
}

?>