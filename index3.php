<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piyatida Portfolio</title>
    <link rel="icon" type="imag/png" href="img/my_logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        } */
        .logo {
            display: flex;
            align-items: center;
            margin-left: 8px;
        }

        .logo-icon {
            width: 260px;
            height: 60px;
            background: transparent;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 600;
            line-height: 1.2;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #ffd700;
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .php-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
            animation: pulse 2s infinite;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        section {
            padding: 80px 0;
            background: white;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
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
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .skill-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .skill-card:hover {
            transform: translateY(-5px);
        }

        .skill-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .project-tech {
            color: #667eea;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .contact {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .contact-content {
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            .logo-icon {
                width: 90px;
                height: 28px;
            }
            
            .nav-links {
                display: none;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape" style="font-size: 4rem; color: #667eea;">&lt;?php</div>
        <div class="shape" style="font-size: 3rem; color: #764ba2;">{ }</div>
        <div class="shape" style="font-size: 2.5rem; color: #ffa500;">?&gt;</div>
    </div>

    <header>
        <nav class="container">
            <div class="logo">
                <a href="index.php" style="text-decoration: none; color: inherit;">
                    <div class="logo-icon">
                        <img src="img/my_logo.png" alt="โลโก้ สถาบันวิจัยและพัฒนา">
                    </div>
                </a>
            </div>
            <!-- <a href="#" class="logo">&lt;/&gt; PHP Dev</a> -->
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                
                <h1>Full Stack Developer</h1>
                <p>Passionate about tech, coding, and creating impactful digital experiences</p>
                <a href="#projects" class="btn">View My Work</a>
            </div>
        </div>
    </section>

    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <div style="max-width: 800px; margin: 0 auto; text-align: center; font-size: 1.1rem; line-height: 1.8;">
                <p>I'm a passionate web developer with experience in building dynamic and efficient web applications. Skilled in PHP, JavaScript, and modern frameworks, I have worked on projects like Carbon Footprint systems, research management platforms, and official websites for organizations. My goal is to create scalable, user-friendly solutions with clean and maintainable code.</p>
            </div>
        </div>
    </section>

    <section id="skills" class="section" style="background: #f8f9fa;">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
            <div class="skills-grid">
                <div class="skill-card">
                    <div class="skill-icon">🐘</div>
                    <h3>Core PHP</h3>
                    <p>Object-oriented programming, MVC architecture, namespaces, and modern PHP 8+ features</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">⚡</div>
                    <h3>Laravel Framework</h3>
                    <p>Eloquent ORM, Artisan CLI, Blade templating, middleware, and advanced Laravel features</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🎼</div>
                    <h3>Symfony</h3>
                    <p>Component-based architecture, Doctrine ORM, Twig templating, and enterprise solutions</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🗄️</div>
                    <h3>Database Design</h3>
                    <p>MySQL, PostgreSQL, database optimization, indexing, and complex query optimization</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">🔌</div>
                    <h3>API Development</h3>
                    <p>RESTful APIs, GraphQL, JWT authentication, API documentation, and third-party integrations</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">☁️</div>
                    <h3>DevOps & Deployment</h3>
                    <p>Docker, AWS, CI/CD pipelines, server management, and performance optimization</p>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="section">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="img/wast.png" alt="IoT Project">
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">IoT Project</h3>
                        <p class="project-tech">Laravel • MySQL • Stripe API • Redis</p>
                        <p>Full-featured e-commerce solution with payment processing, inventory management, and admin dashboard. Handles 10k+ daily transactions.</p>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">📊</div>
                    <div class="project-content">
                        <h3 class="project-title">AI Project</h3>
                        <p class="project-tech">Symfony • PostgreSQL • Vue.js • Docker</p>
                        <p>Enterprise CRM with advanced reporting, lead management, and team collaboration features. Serves 500+ sales professionals.</p>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">🔗</div>
                    <div class="project-content">
                        <h3 class="project-title">Web Project</h3>
                        <p class="project-tech">Core PHP • JWT • Rate Limiting • Microservices</p>
                        <p>High-performance API gateway with authentication, rate limiting, and service orchestration. Processes 1M+ requests daily.</p>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-image">📱</div>
                    <div class="project-content">
                        <h3 class="project-title">Content Management System</h3>
                        <p class="project-tech">Laravel • MySQL • AWS S3 • ElasticSearch</p>
                        <p>Custom CMS with advanced content workflow, multi-language support, and SEO optimization. Powers 50+ websites.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <div class="contact-content">
                <h2 class="section-title" style="color: white;">Get In Touch</h2>
                <p style="font-size: 1.2rem; margin-bottom: 2rem;">Ready to bring your PHP project to life? Let's discuss how I can help build your next web application.</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <span style="font-size: 1.5rem;">📧</span>
                        <span>developer@example.com</span>
                    </div>
                    <div class="contact-item">
                        <span style="font-size: 1.5rem;">📱</span>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    <div class="contact-item">
                        <span style="font-size: 1.5rem;">🌐</span>
                        <span>github.com/phpdev</span>
                    </div>
                </div>
                <div style="margin-top: 3rem;">
                    <a href="mailto:developer@example.com" class="btn">Start a Project</a>
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

        // Header background on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
                header.querySelectorAll('a').forEach(link => {
                    link.style.color = '#333';
                });
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.1)';
                header.style.boxShadow = 'none';
                header.querySelectorAll('a').forEach(link => {
                    link.style.color = 'white';
                });
            }
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.skill-card, .project-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>