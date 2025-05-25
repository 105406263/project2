<!DOCTYPE html>
<html lang="en">
<!-- Declares document type and language -->
<head>
    <!-- Document metadata and links -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Meet the TechEmpower project team and explore our contributions, skills, and collaboration.">
    <meta name="author" content="Simran">
    <meta name="keywords" content="TechEmpower Team, Group Project, About Us, HTML Group, Student Contributions">

    <title>About Page</title>
    <link rel="stylesheet" href="styles/styles.css"> <!-- External CSS stylesheet -->
</head>

<body class="about-page">
    <!-- Header and Navigation Bar -->
    <?php include("header.inc"); ?>
    <?php include("nav.inc"); ?>
    <h1> About Page </h1>

    <!-- Group information section -->
    <section>
        <h1><strong>Group Information</strong></h1>
        <div><h2>Group Name:</h2> <h3>TechEmpower</h3></div>
        <div><h2>Class Time:</h2> <h3>Thursday 2:00pm - 5:00pm</h3></div>
    </section>

    <!-- Group members section -->
    <section>
        <h2>Student IDs and Group Members</h2>
        <!-- Unordered list of members -->
        <ul>
            <li><h3><em>Soad Yusuf:</em></h3> <h4>105406263</h4></li>
            <li><h3><em>Simran Ayaz:</em></h3> <h4>105916377</h4></li>
            <li><h3><em>Parveer Kaur Batth:</em></h3> <h4>105519080</h4></li>
            <li><h3><em>Minaya Methsathi Kudathantrige:</em></h3> <h4>105553062</h4></li>
        </ul>
    </section>

    <!-- Tutor name section -->
    <section>
        <h1>Tutor</h1>
        <h2><em>Rahul Raghavan</em></h2>
    </section>

    <!-- Members' contributions section -->
    <section>
        <h2><strong>Members Contribution</strong></h2>
        <!-- Definition list for contributions -->
        <dl>
            <dt><strong><em>Soad</em></strong></dt>
            <dd>Designed the Home page for TechEmpower and assigned tasks in Jira (including making the GitHub repository
                for the project with necessary files). 
                
                To get started on the second part of the project, 
                she used PHP to reuse common elements in our website and also created a file called "setttings.php" to store the database connection variables. 
                To further assist our website, she created a file called "enhancemnets.php"b and contributed towards the final presentation slides.</dd>

            <dt><strong><em>Simran</em></strong></dt>
            <dd>Designed the About page for TechEmpower and reviewed the final website before submission (assigned to be
                the meeting facilitator and reviewing any necessary documents). 
                
                For the second part of the project, she updated the contribution section on the about page 
                and created the Jobs Table where she stored job descriptions in a database table and creted the HTML dynamically by PHP. She also contributed towards the final presentation slides.</dd>

            <dt><strong><em>Parveer</em></strong></dt>
            <dd>Designed the Job Application page for TechEmpower and was responsible for tracking progress and ensuring
                that everyone is up to date. 
                
                For the second part of the project, she created an Expressions Of Interest (EOI) table in the MySQL database and
                further added validated records by using the "process_eoi.php" file. She also contributed towards the final presentation slides. </dd>

            <dt><strong><em>Minaya</em></strong></dt>
            <dd>Designed the Job Description page for TechEmpower and was responsible for ensuring that all group
                communications are documented in Discord. 
                
                For the second Part of the project, she created a "manage.php" web page that allows a manager to make querires using the EOI table and
                have in return, have a page with appropriate results. She also contributed towards the final presentation slides.</dd>
        </dl>
    </section>

    <!-- Members' background information section -->
    <section>
        <table>
            <caption><h2>Members Background Information</h2></caption> <!-- Table caption -->
            <thead> <!-- Table header -->
                <tr>
                    <th><strong><em>Name</em></strong></th> <!-- Column headers -->
                    <th><strong><em>Background/Hometown</em></strong></th>
                </tr>
            </thead>
            <tbody> <!-- Table body -->
                <tr> <!-- Table row -->
                    <td><strong>Soad</strong></td> <!-- Table data cell -->
                    <td>Originally from Somalia but grew up in the UAE.</td>
                </tr>
                <tr>
                    <td><strong>Simran</strong></td>
                    <td>Originally from Pakistan but grew up in the UAE.</td>
                </tr>
                <tr>
                    <td><strong>Parveer</strong></td>
                    <td>From India.</td>
                </tr>
                <tr>
                    <td><strong>Minaya</strong></td>
                    <td>From Sri Lanka.</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Members' interests section -->
    <section>
        <table>
            <caption><h2>Members Interests</h2></caption>
            <thead>
                <tr>
                    <th><strong><em>Name</em></strong></th>
                    <th><strong><em>Interests</em></strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Soad</strong></td>
                    <td>A huge fan of K-dramas and loves to spend time at the beach, especially if she has a good
                        fantasy book in hand (usually written in Arabic). She is an introvert who prefers places that
                        are quiet and somewhere she can relax, think and just enjoy good times. Fun fact, she is able to
                        speak four different languages.</td>
                </tr>
                <tr>
                    <td><strong>Simran</strong></td>
                    <td>Loves reading a good book (usually fantasies) and enjoys listening to K-pop. She prefers to stay
                        indoors most of the time as she is an introvert (although loves the idea of travelling) and
                        watching story-based movies and shows. Fun fact, she has done paragliding before and can speak 2
                        different languages.</td>
                </tr>
                <tr>
                    <td><strong>Parveer</strong></td>
                    <td>Loves to listen to music in her free time and also loves to mess around with her siblings when
                        bored. She has previously participated in extracurriculars in school such as sport competitions
                        and quizzes, and also loves to play Cricket or Badminton. Fun fact: she is an ambivert where
                        sometimes she really interacts with people and other times, prefers to be alone.</td>
                </tr>
                <tr>
                    <td><strong>Minaya</strong></td>
                    <td>Loves to try out new types of foods and enjoys going on social media (especially funny TikToks).
                        She is an ambivert who is quiet around new people but more interactive with those she feels
                        comfortable with. Fun fact, she has been doing Karate ever since she was a kid, making it a big
                        part of who she is, and is currently a national-level athlete.</td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Group Profile section -->
    <section class="profile-photo-wrapper">
        <div class="group-profile-text">
            <h1>Group Profile</h1>
                <h2><em>Our group consists of four computer science students with diverse backgrounds and skills:</em></h2>
            <p>Our group consists of four computer science students with diverse backgrounds and skills:</p>
            <ul>
                <li>Combined 10+ years of programming experience</li>
                <li>Experience working on 5+ commercial projects</li>
                <li>Specializations in web development, cybersecurity, and database design</li>
                <li>Strong teamwork and problem-solving skills</li>
            </ul>
        </div>
    
        <figure class="group-photo">
            <img src="images/group-photo.jpg" alt="The TechEmpower Team">
            <figcaption><strong>Our Team</strong></figcaption>
        </figure>
    </section>

    <div style="clear: both;"></div>
    <!-- Footer Section -->
    <?php include("footer.inc"); ?>
    
</body>
</html>