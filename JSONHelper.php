<?php
class JSONHelper {
    //READ FUNCTION TO GET DATA
    static public function reading($userDataFile){ 
        //CHECK IF FILE FOUND
        if(file_exists($userDataFile)){ 
            //RETERVING DATA
            $jsonData = file_get_contents($userDataFile); 
            $userData = json_decode($jsonData, true);
            //RETURN DATA        
            return !empty($userData)?$userData:false; 
        }else{
            //SENDING NO FILE ERROR
            echo "No such File exisits";
        }
        //RETURN FALSE
        return false; 
    }
    //WRITE FUNCTION 
    static public function writing($userDataFile,$newData,$append){ 
    //CHECK THAT GIVEN DATA IS NOT EMPTY
        if(!empty($newData)){  
    //CREATING DATA ARRAY
            $userData = [];
                //CHECKING APPEND FLAG
            if($append){
        //CHECK IF FILE FOUND
            if(is_file($userDataFile)){
            //RETERVING DATA
            $jsonData = file_get_contents($userDataFile); 
            $userData = json_decode($jsonData, true); 
            }
            //FILTERING DATA
            $userData = !empty($userData)?array_filter($userData):$userData; 
            if(!empty($userData)){ 
            //MERGING DATA
                $userData[0] = array_merge($userData[0], $newData); 
            }else{ 
                $userData[] = $newData; 
            }
            }else{
                $userData[] = $newData; 
            }
            //WRITING DATA
            $f=fopen($userDataFile,'w');
            fwrite($f,json_encode($userData));
            fclose($f); 
             
            //RETURN TRUE STATUS
            return true; 
        }else{ 
            //RETURN FALSE STATUS
            return false; 
        } 
    } 
    //MODIFY FUNCTION TO UPDATE
    static public function modify($userDataFile,$upData, $id){ 
        //CHECK IF GIVEN DATA IS NOT EMPTY 
        if(!empty($upData) && is_array($upData)){ 
        //CHECK IF FILE FOUND
        if(file_exists($userDataFile)){ 

            //RETERVING DATA
            $jsonData = file_get_contents($userDataFile); 
            $userData = json_decode($jsonData, true); 
            //UPDATING DATA
            $userData[0][$id] = $upData; 
            //WRITING DATA
            $update = self::writing($userDataFile, $userData[0],false); 
            //RETURN TRUE STATUS IF DONE ELSE FLASE
            return $update?true:false; 
        }else{
            //SENDING NO FILE ERROR
            echo "No such File exisits";
        }
        }else{ 
            //RETURN FALSE STATUS
            return false; 
        } 
    }
    //DELETE FUNCTION
    static public function delete($userDataFile,$id){ 
        //CHECK IF FILE FOUND
        if(file_exists($userDataFile)){ 
            //RETERVING DATA
        $jsonData = file_get_contents($userDataFile); 
        $userData = json_decode($jsonData, true); 
        $userData=$userData[0];
            //DELETING DATA
        unset($userData[$id]);  
            //WRITING DATA
        $response = self::writing($userDataFile,$userData,false);
            //RETURN RESULT
        return $response;
    }else{
            //SENDING NO FILE ERROR
        echo "No such File exisits";
    }
    }   
}


?>