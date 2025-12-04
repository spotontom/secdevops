<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Cameron
	Created:	11-8-2025
	Updated:	11-30-2025 Jay King
	Filename:	Admin/logList.php

Spaces used in table heading
&nbsp;
&ensp; "en space" (typically two spaces wide).
&emsp; "em space" (typically four spaces wide, about the width of a capital M).	
-->
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php'; ?>
<?php include '../model/database.php'; ?>
<?php include '../model/logs_db.php'; ?>
<?php $logs = get_logs(); ?>
<main>
    <h2>LATEST LOG ENTRIES</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
					<th>Log<br>&ensp;ID</th>
                    <th>Sign in</th>
                    <th>Sign out</th>
                    <th>Student<br>&emsp;&emsp;&ensp;ID</th>
                    <th>Course<br>&emsp;&emsp;ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
					<tr onclick="makeRowClickable(this, <?php echo htmlspecialchars($log['log_ID']); ?>)">
						<a href="logRecord.php?id=<?php echo htmlspecialchars($log['log_ID']); ?>"</a>
						
						<td class="right-align"><?php echo htmlspecialchars($log['log_ID']); ?></td>
						<td><?php echo $log['log_signin']; ?></td>
						<td><?php echo $log['log_signout']; ?></td>						
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
