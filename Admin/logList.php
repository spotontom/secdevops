<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Cameron
	Created:	11-8-2025
	Updated:	11-30-2025 Jay King
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
    <h2>LOG ENTRIES LIST - Latest 20</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
					<th>Log<br>ID</th>				
                    <th>Sign in</th>
                    <th>Sign out</th>
                    <th>Stu<br>ID</th>
                    <th>Cou<br>ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
					<tr onclick="makeRowClickable(this, <?php echo htmlspecialchars($log['log_ID']); ?>)">
					
						<td><?php echo htmlspecialchars($log['log_ID']); ?>
							<a href="logRecord.php?id=<?php echo htmlspecialchars($log['log_ID']); ?>"</a>
						</td>							
		
                        <td><?php echo htmlspecialchars($log['log_signin']); ?></td>
                        <td><?php echo htmlspecialchars($log['log_signout']); ?></td>
                        <td class="right-align"><?php echo htmlspecialchars($log['log_student_ID']); ?></td>
                        <td class="right-align"><?php echo htmlspecialchars($log['log_course_ID']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../views/footer.php'; ?>
<script>
    // JavaScript to make the entire row clickable
    function makeRowClickable(row, id) {
        row.addEventListener('click', function() {
            window.location.href = 'logRecord.php?log_ID=' + id;
        });
    }
</script>
</body>
</html>
