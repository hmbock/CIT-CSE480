<?php

/**
 * @author 
 * @copyright 2016
 */
      $conn = new mysqli("localhost", "hmbock", "team@480", "hmbock");
                                  
      $classArray = array();

      $classSql = "SELECT Class, Class_ID FROM Class WHERE Department_ID=" . $_POST['sel_dep'];
      $classResult = $conn->query($classSql);
      while ($row = $classResult->fetch_array()) {
         echo '<option value ="' . $row['Class_ID'] . '">' . $row['CRN'] . ': ' . $row['Title'] . '</option>';
      }
      
      $conn->close();


?>
