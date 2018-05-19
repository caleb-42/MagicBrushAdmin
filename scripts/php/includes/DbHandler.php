<?php
class DbHandler{
    const HOST = "localhost";
    /*const DB = "webplayg_mgxdb";
    const USER = "webplayg_root";
    const PASS = "webplay";*/
    const DB = "mgxdb";
    const USER = "root";
    const PASS = "ewere";
    public static $con;

    /*if(mysqli_num_rows($result) > 0){*/
    static function select_cmd($data = array()){
        if(is_array($data)){
            if(array_key_exists('db', $data)){
                $db = $data['db'];
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, $db);
            }else{
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, DbHandler::DB);
            }
            if(!$con) {
                echo "connection unsuccessful";
            }
            else{
                //echo "connection successful";
            }

            if(array_key_exists('table', $data)){
                $query = "SELECT * FROM {$data['table']} ";
            }
            if(array_key_exists('col', $data) && array_key_exists('val', $data)){
                if(count($data['col']) == 1 && count($data['val']) > 1){
                    for($i = 1; $i < count($data['val']); $i++){
                        $data['col'][$i] = $data['col'][0];
                    }
                }
                if(array_key_exists('join', $data)){
                if(count($data['join']) == 1 && count($data['val']) > 1){
                    for($i = 1; $i < count($data['val'])-1; $i++){
                        $data['join'][$i] = $data['join'][0];
                    }
                }
                }
                if(is_array($data['col']) && is_array($data['val']) && count($data['col']) ==  count($data['val'])){
                    /*$where_arr = $data['where'];*/
                    $columns = $data['col'];
                    $values = $data['val'];
                    if(array_key_exists('join', $data)){
                        $join = $data['join'];
                    }
                    $query.= "WHERE ";

                    if(array_key_exists('type', $data)){
                        if($data['type'] == 'equal'){
                                for($col = 0; $col < count($columns); $col++){
                                    if($col == 0){
                                        $query.= $columns[$col] . ' = ' . "'". $values[$col] . "'";
                                    }else{
                                        if(count($data['join']) ==count($data['val'])-1  && array_key_exists('join', $data)){
                                            $query.= " " . $join[1-$col] . " " . $columns[$col] . ' = ' . "'". $values[$col] . "'";
                                        }
                                    }
                                }

                        }
                        if($data['type'] == 'less'){
                            for($col = 0; $col < count($columns); $col++){
                                $query.= $columns[$col] . ' < ' . "'". $values[$col] . "'";
                            }
                        }
                        if($data['type'] == 'great'){
                            for($col = 0; $col < count($columns); $col++){
                                $query.= $columns[$col] . ' > ' . "'". $values[$col] . "'";
                            }
                        }
                        if($data['type'] == 'lessequal'){
                            for($col = 0; $col < count($columns); $col++){
                                $query.= $columns[$col] . ' >= ' . "'". $values[$col] . "'";
                            }
                        }
                        if($data['type'] == 'greatequal'){
                            for($col = 0; $col < count($columns); $col++){
                                $query.= $columns[$col] . ' >= ' . "'". $values[$col] . "'";
                            }
                        }
                        if($data['type'] == 'range'){
                            for($col = 0; $col < count($columns); $col++){
                                if($count == 0){
                                    $query.= $columns[$col] . ' > ' . "'". $values[$col] . "'";
                                }else{
                                    if(count($data['join']) ==count($data['val'])-1  && array_key_exists('join', $data)){
                                    $query.= " " . $join[1-$col] . " " . $columns[$col] . ' < ' . "'". $values[$col] . "'";
                                    }
                                }
                            }
                        }
                        if($data['type'] == 'rangeequal'){
                            for($col = 0; $col < count($columns); $col++){
                                if($count == 0){
                                    $query.= $columns[$col] . ' >= ' . "'". $values[$col] . "'";
                                }else{
                                    if(count($data['join']) ==count($data['val'])-1  && array_key_exists('join', $data)){
                                        $query.=  " " . $join[1-$col] . " " . $columns[$col] . ' <= ' . "'". $values[$col] . "'";
                                    }
                                }
                            }
                        }
                        //echo $query;
                        //DbHandler::getArrayCol($con,$data['table']);
                        return DbHandler::runQuery($con,$query, $data['table']);
                    }else{

                    }
                }
            }else{
                //DbHandler::getArray($con,$data['table']);
                return DbHandler::runQuery($con,$query, $data['table']);
            }
        }else{

        }
    }

    static function update_cmd($data = array()){
        if(is_array($data)){
            if(array_key_exists('db', $data)){
                $db = $data['db'];
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, $db);
            }else{
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, DbHandler::DB);
            }
            if(!$con) {
                echo "connection unsuccessful";
            }
            else{
                //echo "connection successful";
            }

            if(array_key_exists('table', $data)){
                $query = "UPDATE {$data['table']} SET ";
            }
            if(array_key_exists('col', $data) && array_key_exists('val', $data) && array_key_exists('wherecol', $data) && array_key_exists('whereval', $data)){

                if(array_key_exists('join', $data)){
                    if(count($data['join']) == 1 && count($data['whereval']) > 1){
                        for($i = 1; $i < count($data['whereval'])-1; $i++){
                            $data['join'][$i] = $data['join'][0];
                        }
                    }
                }
                if(is_array($data['col']) && is_array($data['val']) && count($data['col']) ==  count($data['val']) &&is_array($data['wherecol']) && is_array($data['whereval']) && count($data['wherecol']) ==  count($data['whereval'])){
                    /*$where_arr = $data['where'];*/
                    $columns = $data['col'];
                    $values = $data['val'];
                    $wherval = $data['whereval'];
                    $whercol= $data['wherecol'];
                    if(array_key_exists('join', $data)){
                        $join = $data['join'];
                    }

                    $query.= $columns[0] . ' = ' . "'". $values[0] . "'";
                    for($col = 1; $col < count($columns); $col++){
                        $query.= ", " . $columns[$col] . ' = ' . "'". $values[$col] . "'";
                    }

                    $query .= " WHERE (";
                    $query.= $whercol[0] . ' = ' . "'". $wherval[0] . "'";
                    if(array_key_exists('join', $data)){
                        for($col = 1; $col < count($whercol); $col++){
                            $query.= " " . $join[$col-1] . " " . $whercol[$col] . ' = ' . "'". $wherval[$col] . "'";
                        }
                    }
                    $query .= ");";
                        //echo $query;
                    return DbHandler::runInputQuery($con,$query);
                    }else{

                    }
            }else{
                //return DbHandler::runQuery($con,$query);
            }
        }
    }

    static function insert_cmd($data = array()){
        if(is_array($data)){
            if(array_key_exists('db', $data)){
                $db = $data['db'];
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, $db);
            }else{
                $con = mysqli_connect(DbHandler::HOST, DbHandler::USER, DbHandler::PASS, DbHandler::DB);
            }
            if(!$con) {
                $assoc = array('0' => 'error', '1' => 'connection unsuccessful');
                return $assoc;
            }


            if(array_key_exists('table', $data)){
                $query = "INSERT INTO {$data['table']} ";
            }else{
                $assoc = array('0' => 'error', '1' => 'no table has been entered');
                return $assoc;
            }
            if(array_key_exists('col', $data) && array_key_exists('val', $data)){


                if(is_array($data['col']) && is_array($data['val']) && count($data['col']) ==  count($data['val'])){
                    /*$where_arr = $data['where'];*/
                    $data['col'];
                    $data['val'];

                    if(count($data['col']) > 1){
                        $query.= "(". implode(",", $data['col']) . ") VALUES ('" . implode("', '", $data['val']) . "');";
                    }else{
                        $query.= "(". $data['col'][0] . ") VALUES ('" . $data['val'][0] . "');";
                    }
                    //$assoc = array('0' => 'output', '1' => $query);
                    return DbHandler::runInputQuery($con,$query);
                    //return $assoc;
                }else if(count($data['col']) == 1 && is_array($data['col'])  && $data['col'][0] == 'default' && is_array($data['val'])){
                    $query.= " VALUES ('" . implode("', '", $data['val']) . "');";
                    //$assoc = array('0' => 'output', '1' => $query);
                    return DbHandler::runInputQuery($con,$query);
                    //return $assoc;
                }else{
                    $assoc = array('0' => 'error', '1' => 'col or val parameters either have wrong datatype or values ');
                    return $assoc;
                }

            }else{
                $assoc = array('0' => 'error', '1' => 'database col  parameter is missing or no values have been entered');
                return $assoc;
            }
        }
    }

    static function runQuery($con, $query, $table){
        $result_set = mysqli_query($con, $query);
        if($result_set){
            return DbHandler::getArray($result_set,$con,$table);
        }else{
            $assoc = array('0' => 'error', '1' => 'query failed within connection');
            return $assoc;
        }
    }
    static function runInputQuery($con, $query){
        $result_set = mysqli_query($con, $query);
        if($result_set){
            return $result_set;
        }else{
            $assoc = array('0' => 'error', '1' => 'query failed within connection');
            return $assoc;
        }
    }

    static function getArray($result_set, $con, $table){
        $data = array();
        if(mysqli_num_rows($result_set) > 0){
            while($row = mysqli_fetch_array($result_set)){
                array_push($data, DbHandler::getArrayCol($con, $table, $row));
            }
            //print_r($data);
        }
        return $data;
    }
    static function getArrayCol($con,$table,$row){
        $result_set = mysqli_query($con, "SHOW COLUMNS FROM {$table}");
        $data = array();
        //echo "here";
        while($col = mysqli_fetch_array($result_set)){
            //echo($row[0]);
            $data[$col[0]] = $row[$col[0]];
        }
        return $data;
    }
}

?>
