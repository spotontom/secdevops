<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Cameron
	Created:	11-8-2025
	Filename:	Admins/index.php
--> 
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php'; ?>
<?php include '../model/database.php'; ?>
<?php include '../model/logs_db.php'; ?>
<?php $logs = get_logs(); ?>

<main>
    <h3>First 10 log entries</h3>
    <div class="table-container">
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
    </div>
</main>
<?php include '../views/footer.php'; ?>
</body>
</html>