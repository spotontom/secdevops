<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Cameron
	Created:	11-8-2025
	Filename:	Admin/logList.php
--> 
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php'; ?>
<?php include '../model/database.php'; ?>
<?php include '../model/logs_db.php'; ?>
<?php $logs = get_logs(); ?>

<main>
    <h2>LOG ENTRIES LIST</h2>
	<h3>First 10</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Sign in</th>
                    <th>Sign out</th>
                    <th>Student ID</th>
                    <th>Course ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($log['log_signin']); ?></td>
                        <td><?php echo htmlspecialchars($log['log_signout']); ?></td>
                        <td><?php echo htmlspecialchars($log['log_student_ID']); ?></td>
                        <td><?php echo htmlspecialchars($log['log_course_ID']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../views/footer.php'; ?>
</body>
</html>
