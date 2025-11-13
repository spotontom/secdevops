<?php
function get_logs() {
    try {
        global $db;
        $query = 'SELECT * FROM log 
        ORDER BY log_updated DESC LIMIT 10';
        $statement = $db->prepare($query);
        $statement->execute();
        $logs = $statement->fetchAll();
        $statement->closeCursor();
        return $logs;
    } catch (PDOException $e)  {
        die('<div style="color:red;
        font-size: 4.0vw;
        font-weight: 600;
        background-color: #eeeeee;
        padding: 2rem;
        margin: 2rem auto 0 auto;
        border: 0.1rem solid red;
        width: 80%;">' . $_SERVER['HTTP_HOST'] . ' '  . ' connection to database failed: ' . $e->getMessage() . '</div>');
    };
}
?>