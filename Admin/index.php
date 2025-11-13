<?php include '../views/head.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../model/database.php'; ?>
<?php 
    $query = "SELECT * FROM logs ORDER BY log_updated DESC LIMIT 10";
    $statement = $db->prepare($query);
    $statement->execute();
    $logs = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
?>


<main>
    <h2>Sorry, the admin page is currently under construction.</h2>
    <p>We'll finish it as quickly as we can. Thanks!</p>
    <h3>First 10 log entries</h3>
    <table>
        <thead>
            <tr>
                <th>Log ID</th>
                <th>Sign in</th>
                <th>Sign out</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Log updated</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?php echo htmlspecialchars($log['log_ID']); ?></td>
                    <td><?php echo htmlspecialchars($log['sign_in']); ?></td>
                    <td><?php echo htmlspecialchars($log['sign_out']); ?></td>
                    <td><?php echo htmlspecialchars($log['student_ID']); ?></td>
                    <td><?php echo htmlspecialchars($log['course_ID']); ?></td>
                    <td><?php echo htmlspecialchars($log['log_updated']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</main>
<?php include '../views/footer.php'; ?>