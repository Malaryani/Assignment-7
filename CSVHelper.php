<?php
//CREATING CLASS
class CSVHelper {
    //CREATING READING FUNCTION
    public static  function reading($csvFile){ 
        //CHECK IF FILE FOUND
        if(file_exists($csvFile)){ 
        //OPENING FILE 
        $csvFile = file($csvFile);
        //CREATING DATA ARRAY
        $csvData = [];
        //TRAVESING THE FILE DATA
        foreach ($csvFile as $line) {
        //APPENDING DATA TO ARRAY
            $csvData[] = str_getcsv($line);
        }
        //RETURNING DATA
        return $csvData;
        }else{
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
        }
            //RETURNING FALSE
        return false;
    }
    //WRITING FUNCTION
    public static  function writing($csvFile,$newData,$append){ 
        //CHECKING GIVEN DATA IS NOT EMPTY
        if(!empty($newData)){ 
            // CHECK IF APPEND FLAG IS TRUE OR NOT
            if($append){
            // OPENING FILE WITH APPEND FLAG
                $fp = fopen($csvFile, 'a');
            }else{

            // OPENING FILE WITH WRITE FLAG
                $fp = fopen($csvFile, 'w');
            }
        //TRAVESING THE  DATA
            foreach ($newData as $fields) {
                //WRITING DATA TO FILE
                fputcsv($fp, $fields);
            }
            //CLOSING FILE
            fclose($fp); 
            //RETURNING TRUE
            return true; 
        }else{ 
            //RETURNING FALSE
            return false; 
        } 
    } 
    // MODIFY FUNCTION
    public static  function modify($csvFile,$newData, $idx){ 
        //CHECK IF GIVEN DATA IS NOT EMPTY
        if(!empty($newData) && is_array($newData) ){ 
            //CHECK IF FILE EXISTS
            if(file_exists($csvFile)){ 
            //RETERIVING DATA
            $csvData = self::reading($csvFile); 
            //UPDATING DATA AT INDEX
            $csvData[$idx] = $newData;
            //WRITING NEW DATA TO FILE
            $res = self::writing($csvFile,$csvData,false);
            //RETURNING WRITTEN STATUS
            return $res;
            }else{ 
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
            //RETURNING FALSE
                return false; 
            }
        }else{ 
            //RETURNING FALSE
            return false; 
        } 
    }
    //DELETE FUNCTION
    public static  function delete($csvFile,$idx){ 
            //CHECK IF FILE EXISTS
            if(file_exists($csvFile)){ 
            //RETERIVING DATA
            $csvData = self::reading($csvFile); 
            //DELETING DATA AT INDEX
            unset($csvData[$idx]);  
            //WRITING NEW DATA TO FILE
            $res = self::writing($csvFile,$csvData,false);
            //RETURNING WRITTEN STATUS
            return $res;
            }else{ 
            //SENDING NO FILE ERROR
            echo "No such File FOUND";
            //RETURNING FALSE
                return false; 
            }
    }   
}


?>