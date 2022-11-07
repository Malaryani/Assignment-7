<?php
require("CSVHelper.php");
//  ENTITY CLASS
class Entity {
    //CREATE FUNCTION
    static function create($name,$age){
        //PREPATING DATA ARRAY
        $userData[] = [$name,$age];
        //RETERIVING DATA
        $response = CSVHelper::reading("entities.csv");
        //CHECK IF DATA WAS GIVEN OR NOT
        if($response==false){
            //WRITING DATA TO CSV WITH APPEND FLAG
            CSVHelper::writing("entities.csv",$userData,true);
        }else{
            //PUSHING NEW DATA ON RETRIEVED DATA
            array_push($response,$userData[0]);
            //WRITING DATA TO CSV WITH WRITE FLAG
            CSVHelper::writing("entities.csv",$response,false);
        }
        return "Entity Created!!! ";
    }
    //FIND FUNCTION
    static function find($idx){
        //RETERVING DATA
        $response = CSVHelper::reading("entities.csv");
        //CHECK IF DATA WAS GIVEN OR NOT
        if($response==false){
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
        }else{
            //RETURNING DATA AT INDEX
           return $response[$idx];
        }
    }
    //MODIFY FUNCTION FOR UPDATES
    static function modify($idx,$newName,$newAge){
        //PREPATING DATA ARRAY
        $userData = [$newName,$newAge];
        //RETERIVING DATA
        $response = CSVHelper::reading("entities.csv");
        //CHECK IF DATA WAS GIVEN OR NOT
        if($response==false){
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
        }else{
            //WRITING DATA TO CSV WITH MODIFICATION FLAG
            CSVHelper::modify("entities.csv",$userData,$idx);
        }
    }
    //DELETE FUNCTION
    static function delete($idx){
        //RETERIVING DATA
        $response = CSVHelper::reading("entities.csv");
        //CHECK IF DATA WAS GIVEN OR NOT
        if($response==false){
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
        }else{
            //DELETING ENTITY FROM FILE 
            CSVHelper::delete("entities.csv",$idx);
        }
    }
    //READ FUNCTION TO GET ALL ENTITIES 
    static function readAll(){
        //RETERIVING DATA
        $response = CSVHelper::reading("entities.csv");
        //CHECK IF DATA WAS GIVEN OR NOT
        if($response==false){
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
        }else{
            //RETURNING DATA
            return $response;
        }
    }
}


?>