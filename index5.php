<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Name - Computer Engineering Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: #e2e8f0;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 15px 0;
            border-bottom: 1px solid rgba(64, 224, 208, 0.3);
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #40e0d0;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
        }

        .logo:hover {
            text-shadow: 0 0 10px #40e0d0;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: #e0e6ed;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #40e0d0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #40e0d0;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 60px;
            align-items: center;
            width: 100%;
        }

        .hero-text {
            max-width: 600px;
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-picture {
            width: 300px;
            height: 300px;
            border-radius: 20px;
            object-fit: cover;
            border: 3px solid rgba(64, 224, 208, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .profile-picture:hover {
            transform: scale(1.05);
            border-color: rgba(64, 224, 208, 0.6);
            box-shadow: 0 25px 50px rgba(64, 224, 208, 0.2);
        }

        .hero h1 {
            font-size: clamp(2.5rem, 8vw, 4rem);
            margin-bottom: 20px;
            background: linear-gradient(45deg, #40e0d0, #00bfff, #7fffd4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease-out;
            font-weight: 700;
        }

        .hero .subtitle {
            font-size: clamp(1.2rem, 4vw, 1.8rem);
            color: #94a3b8;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-out 0.3s both;
            font-weight: 500;
        }

        .hero .description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #64748b;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, #40e0d0, #00bfff);
            color: #000;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease-out 0.9s both;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(64, 224, 208, 0.3);
        }

        /* Skills Section */
        .skills {
            padding: 100px 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #40e0d0;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(45deg, #40e0d0, #00bfff);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .skill-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(64, 224, 208, 0.2);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(45deg, #40e0d0, #00bfff);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .skill-card:hover::before {
            transform: scaleX(1);
        }

        .skill-card:hover {
            transform: translateY(-5px);
            border-color: rgba(64, 224, 208, 0.5);
            box-shadow: 0 15px 30px rgba(64, 224, 208, 0.1);
        }

        .skill-icon {
            font-size: 2.5rem;
            color: #40e0d0;
            margin-bottom: 20px;
            display: block;
        }

        .skill-card h3 {
            color: #e2e8f0;
            margin-bottom: 15px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .skill-card p {
            color: #64748b;
            line-height: 1.6;
        }

        /* Projects Preview */
        .projects-preview {
            padding: 100px 0;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(64, 224, 208, 0.2);
        }

        .project-card:hover {
            transform: scale(1.02);
            border-color: rgba(64, 224, 208, 0.5);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(135deg, #40e0d0, #00bfff);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-image::before {
            content: '{ }';
            font-size: 3rem;
            color: rgba(0, 0, 0, 0.3);
            font-weight: bold;
        }

        .project-content {
            padding: 25px;
        }

        .project-content h3 {
            color: #e2e8f0;
            margin-bottom: 10px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .project-content p {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tech-tag {
            background: rgba(64, 224, 208, 0.2);
            color: #40e0d0;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        /* Contact Section */
        .contact {
            padding: 100px 0;
            background: rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .contact-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .contact p {
            font-size: 1.2rem;
            color: #64748b;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .contact-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-link {
            color: #40e0d0;
            text-decoration: none;
            padding: 12px 25px;
            border: 2px solid #40e0d0;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-link:hover {
            background: #40e0d0;
            color: #000;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }
            
            .profile-picture {
                width: 250px;
                height: 250px;
            }
            
            .contact-links {
                flex-direction: column;
                align-items: center;
            }
        }

        /* PHP Code Display */
        .code-snippet {
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(64, 224, 208, 0.3);
            border-radius: 12px;
            padding: 25px;
            margin: 40px 0;
            font-family: 'JetBrains Mono', 'Fira Code', 'Courier New', monospace;
            font-size: 0.95rem;
            overflow-x: auto;
            backdrop-filter: blur(10px);
        }

        .php-tag { color: #f472b6; }
        .php-variable { color: #06b6d4; }
        .php-string { color: #fbbf24; }
        .php-comment { color: #64748b; font-style: italic; }
    </style>
</head>
<body>
    <?php
    // Portfolio configuration
    $portfolio = [
        'name' => 'Piyatida',
        'title' => 'Computer Engineering Student',
        'logo_path' => 'img/my_logo.png', // Add your logo path here
        'profile_picture' => 'img/dear_profile.jpg', // Add your profile picture path here
        'skills' => [
            'Programming' => ['PHP', 'Python', 'C++', 'JavaScript'],
            'Hardware' => ['Digital Circuits', 'Microprocessors', 'FPGA'],
            'Systems' => ['Linux', 'Embedded Systems', 'Networking'],
            'Tools' => ['Git', 'Docker', 'VS Code', 'Vim']
        ],
        'projects' => [
            [
                'name' => 'Smart IoT System',
                'description' => 'Developed a complete IoT solution using microcontrollers and PHP backend for data processing and web interface.',
                'tech' => ['PHP', 'Arduino', 'MySQL', 'JavaScript']
            ],
            [
                'name' => 'CPU Simulator',
                'description' => 'Built a MIPS processor simulator in C++ with PHP web interface for educational purposes.',
                'tech' => ['C++', 'PHP', 'HTML5', 'Assembly']
            ],
            [
                'name' => 'Network Monitor',
                'description' => 'Created a real-time network monitoring tool with PHP backend and responsive dashboard.',
                'tech' => ['PHP', 'Python', 'MySQL', 'Chart.js']
            ]
        ]
    ];
    ?>

    <nav>
        <div class="container">
            <a href="#" class="logo">
                <?php if (!empty($portfolio['logo_path'])): ?>
                    <img src="<?= $portfolio['logo_path'] ?>" alt="Logo">
                <?php endif; ?>
                <span><?= $portfolio['name'] ?></span>
            </a>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1><?= $portfolio['name'] ?></h1>
                <p class="subtitle"><?= $portfolio['title'] ?></p>
                <p class="description">
                    Passionate about bridging the gap between hardware and software. I specialize in building 
                    robust systems, from low-level embedded programming to high-level web applications using 
                    PHP and modern technologies. Always eager to tackle complex engineering challenges.
                </p>
                <a href="#projects" class="cta-button">View My Work</a>
                
                <div class="code-snippet">
                    <span class="php-tag">&lt;?php</span><br>
                    <span class="php-comment">// Welcome to my digital world</span><br>
                    <span class="php-variable">$engineer</span> = <span class="php-string">"<?= $portfolio['name'] ?>"</span>;<br>
                    <span class="php-variable">$passion</span> = <span class="php-string">"Computer Engineering"</span>;<br>
                    echo <span class="php-string">"Building tomorrow's technology today!"</span>;<br>
                    <span class="php-tag">?&gt;</span>
                </div>
            </div>
        </div>
    </section>

    <section class="skills" id="skills">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
            <div class="skills-grid">
                <?php foreach ($portfolio['skills'] as $category => $skills): ?>
                <div class="skill-card">
                    <div class="skill-icon">
                        <?php 
                        $icons = ['Programming' => '💻', 'Hardware' => '🔧', 'Systems' => '⚙️', 'Tools' => '🛠️'];
                        echo $icons[$category] ?? '📚';
                        ?>
                    </div>
                    <h3><?= $category ?></h3>
                    <p><?= implode(' • ', $skills) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="projects-preview" id="projects">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="projects-grid">
                <?php foreach ($portfolio['projects'] as $project): ?>
                <div class="project-card">
                    <div class="project-image"></div>
                    <div class="project-content">
                        <h3><?= $project['name'] ?></h3>
                        <p><?= $project['description'] ?></p>
                        <div class="tech-stack">
                            <?php foreach ($project['tech'] as $tech): ?>
                                <span class="tech-tag"><?= $tech ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="container">
            <div class="contact-content">
                <h2 class="section-title">Let's Connect</h2>
                <p>
                    Ready to collaborate on innovative projects or discuss opportunities in computer engineering? 
                    I'm always excited to connect with fellow engineers and explore new challenges.
                </p>
                <div class="contact-links">
                    <a href="mailto:your.email@example.com" class="contact-link">
                        📧 Email
                    </a>
                    <a href="https://linkedin.com/in/yourprofile" class="contact-link">
                        💼 LinkedIn
                    </a>
                    <a href="https://github.com/yourusername" class="contact-link">
                        📁 GitHub
                    </a>
                </div>
                
                <div class="code-snippet">
                    <span class="php-tag">&lt;?php</span><br>
                    <span class="php-variable">$contact</span> = [<br>
                    &nbsp;&nbsp;<span class="php-string">'email'</span> => <span class="php-string">'your.email@example.com'</span>,<br>
                    &nbsp;&nbsp;<span class="php-string">'status'</span> => <span class="php-string">'Available for opportunities'</span><br>
                    ];<br>
                    echo <span class="php-string">"Thanks for visiting!"</span>;<br>
                    <span class="php-tag">?&gt;</span>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scrolled class to nav on scroll
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.style.background = 'rgba(10, 10, 10, 0.95)';
            } else {
                nav.style.background = 'rgba(10, 10, 10, 0.9)';
            }
        });
    </script>
</body>
</html>