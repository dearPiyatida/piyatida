<?php
// Projects Data
$projects = [
    [
        "title" => "Carbon Footprint Management",
        "desc" => "A system for tracking and reporting Carbon Footprint for universities.",
        "tech" => "PHP, MySQL, Bootstrap",
        "link" => "#"
    ],
    [
        "title" => "Government Agency Websites",
        "desc" => "Developed official websites for 2 government agencies.",
        "tech" => "PHP, HTML, CSS",
        "link" => "#"
    ],
    [
        "title" => "Electricity Logging System",
        "desc" => "A tool for recording and analyzing electricity usage.",
        "tech" => "PHP, MySQL",
        "link" => "#"
    ],
    [
        "title" => "Research Management System",
        "desc" => "Integrated with Google Sheets for real-time collaboration.",
        "tech" => "PHP, Google API",
        "link" => "#"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dear's Portfolio</title>
<style>
    body {margin:0; font-family:Arial, sans-serif; background:#f8f9fa; color:#333;}
    header {background:#0d1b2a; color:white; padding:15px; text-align:center;}
    nav a {color:white; margin:0 15px; text-decoration:none; font-weight:bold;}
    .hero {text-align:center; padding:80px 20px; background:#1b263b; color:white;}
    .hero h1 span {color:#f0a500;}
    .btn {background:linear-gradient(90deg,#ff6a00,#ff8e53); color:white; padding:12px 25px; border-radius:25px; text-decoration:none; font-weight:bold;}
    .section {padding:60px 20px; max-width:1000px; margin:auto;}
    .about {display:flex; flex-direction:column; align-items:center;}
    .skills {margin-top:20px;}
    .skills span {background:#f0a500; color:white; padding:5px 10px; border-radius:5px; margin:5px;}
    .projects {display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;}
    .card {background:white; padding:20px; border-radius:10px; box-shadow:0 3px 6px rgba(0,0,0,0.1);}
    .card h3 {margin-top:0;}
    footer {text-align:center; padding:20px; background:#0d1b2a; color:white;}
</style>
</head>
<body>

<header>
    <nav>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
    </nav>
</header>

<section class="hero" id="home">
    <h1>Hi, I'm <span>Dear</span></h1>
    <p>A Web Developer passionate about building smart and scalable solutions.</p>
    <a href="#projects" class="btn">View My Work</a>
</section>

<section class="section about" id="about">
    <h2>About Me</h2>
    <p>I'm a passionate web developer with experience in PHP, JavaScript, and building dynamic systems like Carbon Footprint tools, research management platforms, and official websites. I love creating clean and scalable solutions for real-world problems.</p>
    <div class="skills">
        <span>PHP</span><span>Laravel</span><span>JavaScript</span><span>MySQL</span><span>API</span>
    </div>
</section>

<section class="section" id="projects">
    <h2>Projects</h2>
    <div class="projects">
        <?php foreach($projects as $project): ?>
            <div class="card">
                <h3><?= $project['title'] ?></h3>
                <p><?= $project['desc'] ?></p>
                <small><strong>Tech:</strong> <?= $project['tech'] ?></small><br><br>
                <a href="<?= $project['link'] ?>" class="btn">View</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section" id="contact">
    <h2>Contact Me</h2>
    <p>Email: <a href="mailto:dear@example.com">dear@example.com</a></p>
    <p>GitHub: <a href="#">github.com/dear</a></p>
    <p>LinkedIn: <a href="#">linkedin.com/in/dear</a></p>
</section>

<footer>
    <p>&copy; <?= date('Y') ?> Dear's Portfolio</p>
</footer>

</body>
</html>
