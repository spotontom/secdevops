<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Cameron
	Created:	11-8-2025
	Updated:	11-30-2025 Jay King
	Updated:	12-07-2025 Jay King
	Filename:	Admin/logList.php
-->
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php require_once '../views/header.php';?>
<?php include '../model/database.php'; ?>
<?php include '../model/logs_db.php'; ?>
<?php $logs = get_logs(); ?>
<main>
    <h2>Latest Log Entries in <?php echo $_SESSION['orderBy']; ?> Order</h2>
	<form action="preorder.php" method="post" class="button-form">
		<button class = "btn3" type="submit" name="action_course" value="Course">Course Order</button>
		<button class = "btn3" type="submit" name="action_student" value="Student">Student Order</button>
		<button class = "btn3" type="submit" name="action_datetime" value="Student">DateTime Order</button>
	</form>
    <div class="table-container">
        <table>
            <thead>
                <tr>
					<th></th>
                    <th>Sign in</th>
                    <th>Sign out</th>
					<th colspan="2">Student</th>
					<th colspan="2">Course</th>
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
						<td><?php echo strstr($log['student_email'], '@', true); ?></td>
                        <td class="right-align"><?php echo htmlspecialchars($log['log_course_ID']); ?></td>
						<td><?php echo htmlspecialchars($log['course_number']); ?></td>

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
