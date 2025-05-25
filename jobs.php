<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Explore exciting IT job opportunities at TechEmpower. Apply for roles in cybersecurity, IT support and more.">
    <meta name="author" content="Soad, Minaya">
    <meta name="keywords" content="TechEmpower, Jobs, IT Careers, Cybersecurity, Web Project, HTML, CSS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Descriptions | TechEmpower</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="jobs-page">

    <?php include("header.inc"); ?>
    <?php include("nav.inc"); ?>

    <main class="job-container">
        
        <h1>Job Descriptions</h1>

        <?php
        // Used DeepSeek AI to change structure of the job.php file to dynamically pull data from the databse
        // Database connection
        require_once 'settings.php';
        $conn = new mysqli($host, $user, $pwd, $sql_db);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Get all active jobs
        $sql = "SELECT * FROM jobs WHERE is_active = 1 ORDER BY posted_date DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Convert responsibilities and qualifications to arrays
                $responsibilities = explode("\n", $row['responsibilities']);
                $qualifications = explode("\n", $row['qualifications']);
                ?>
                
                <!-- Job listing -->
                <section class="job-card">
                    <div class="job-info">
                        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                        <p><strong>Ref:</strong> <?php echo htmlspecialchars($row['ref_code']); ?></p>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                        <p><strong>Employment Type:</strong> <?php echo htmlspecialchars($row['employment_type']); ?></p>
                        <h3>Overview</h3>
                        <p><?php echo htmlspecialchars($row['overview']); ?></p>
                        <h3>Responsibilities</h3>
                        <ul>
                            <?php foreach($responsibilities as $item): ?>
                                <?php if(trim($item) !== ''): ?>
                                    <li><?php echo htmlspecialchars(trim($item)); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <h3>Qualifications</h3>
                        <ul>
                            <?php foreach($qualifications as $item): ?>
                                <?php if(trim($item) !== ''): ?>
                                    <li><?php echo htmlspecialchars(trim($item)); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <aside class="job-details">
                        <p><strong>Salary:</strong><br><?php echo htmlspecialchars($row['salary_range']); ?></p>
                        <p><strong>Contact:</strong><br><?php echo htmlspecialchars($row['contact_email']); ?></p>
                        <p><strong>Reports to:</strong><br><?php echo htmlspecialchars($row['reports_to']); ?></p>
                        <p><strong>Posted:</strong><br><?php echo date('d F Y', strtotime($row['posted_date'])); ?></p>
                        <a href="apply.php?job_id=<?php echo $row['id']; ?>" class="cta-button">Apply for this job</a>
                    </aside>
                </section>
                
                <?php
            }
        } else {
            echo '<p>No job openings at this time. Please check back later.</p>';
        }
        
        $conn->close();
        ?>

    </main>

    <?php include("footer.inc"); ?>

</body>
</html>