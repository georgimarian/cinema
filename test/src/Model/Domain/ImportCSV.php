<?php

class Import
{
    protected $filename;

    public function importCSV(string $fileName)
    {
        $lines  = array();
        $handle = fopen($fileName, "r");
        if ($handle) {
            //Reading table header into an array
            $keysArray = fgetcsv($handle);
            while (($line = fgetcsv($handle)) !== false) {
                //Adding data, using keys already read
//            if (!validateTableData($line))
//                return "Error in $fileName ";
//            else
                $lines[] = array_combine($keysArray, $line);

            }
            fclose($handle);
            return $lines;
        }
        return false;
    }

    public function importMovie(string $fileName)
    {
        $lines  = array();
        $handle = fopen($fileName, "r");
        if ($handle) {
            //Reading table header into an array
            $keysArray = fgetcsv($handle);
            while (($line = fgetcsv($handle)) !== false) {
                //Adding data, using keys already read
//            if (!validateTableData($line))
//                return "Error in $fileName ";
//            else
                $lines[] = array_combine($keysArray, $line);

            }
            fclose($handle);
            return $lines;
        }
        return false;
    }
}
