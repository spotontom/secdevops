<?php
function get_courses()  {
    global $db; 
    $query = 'SELECT * FROM courses
              ORDER BY course_number';
        $statement = $db->prepare($query);
        $statement->execute();
        $customers = $statement->fetchAll();
        $statement->closeCursor();
        return $customers;
}
