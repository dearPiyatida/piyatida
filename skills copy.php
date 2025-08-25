<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills - Piyatida Portfolio</title>
    <link rel="icon" type="image/png" href="img/my_logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'JetBrains Mono', 'Fira Code', 'Consolas', monospace;
            background: #1e1e1e;
            color: #d4d4d4;
            line-height: 1.6;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .back-btn {
            display: inline-block;
            background: #40e0d0;
            color: #000;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: #00bfff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        .page-title {
            font-size: 3.5rem;
            color: #40e0d0;
            margin-bottom: 15px;
            font-weight: bold;
            text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }

        .page-subtitle {
            font-size: 1.3rem;
            color: #b0b0b0;
            margin-bottom: 30px;
        }

        /* Skills Header */
        .skills-header {
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            padding: 40px;
            margin-bottom: 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .skills-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(64, 224, 208, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .skills-title {
            color: #40e0d0;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .skills-subtitle {
            color: #b0b0b0;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .skills-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(64, 224, 208, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(64, 224, 208, 0.2);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(64, 224, 208, 0.15);
            border-color: rgba(64, 224, 208, 0.4);
        }

        .stat-number {
            display: block;
            color: #40e0d0;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #d4d4d4;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Skills Grid */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .skill-card {
            background: linear-gradient(145deg, #2d2d30, #252526);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            padding: 30px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #40e0d0, #00bfff, #40e0d0);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .skill-card:hover::before {
            transform: scaleX(1);
        }

        .skill-card:hover {
            border-color: #40e0d0;
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(64, 224, 208, 0.15);
        }

        .skill-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .skill-icon {
            font-size: 3rem;
            transition: transform 0.3s ease;
        }

        .skill-card:hover .skill-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .skill-title {
            color: #40e0d0;
            font-size: 1.5rem;
            font-weight: bold;
            flex: 1;
        }

        .skill-count {
            background: rgba(64, 224, 208, 0.1);
            color: #40e0d0;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        .skill-description {
            color: #b0b0b0;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 25px;
            font-style: italic;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }

        .skill-tag {
            background: linear-gradient(135deg, rgba(64, 224, 208, 0.1), rgba(64, 224, 208, 0.05));
            color: #40e0d0;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: linear-gradient(135deg, rgba(64, 224, 208, 0.2), rgba(64, 224, 208, 0.1));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        .skill-footer {
            border-top: 1px solid #3c3c3c;
            padding-top: 20px;
        }

        .skill-progress {
            text-align: center;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #3c3c3c;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #40e0d0, #00bfff);
            border-radius: 3px;
            transition: width 1s ease;
        }

        .progress-text {
            color: #808080;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Code Snippet */
        .code-snippet {
            background: #1e1e1e;
            border: 1px solid #3c3c3c;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            font-family: 'JetBrains Mono', 'Fira Code', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
            position: relative;
        }

        .code-snippet::before {
            content: '<?php';
            position: absolute;
            top: -10px;
            left: 20px;
            background: #1e1e1e;
            padding: 0 10px;
            color: #40e0d0;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .php-tag { color: #ff6b6b; }
        .php-variable { color: #4ecdc4; }
        .php-string { color: #ffe66d; }
        .php-comment { color: #95a5a6; font-style: italic; }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .page-title {
                font-size: 2.5rem;
            }
            
            .skills-header {
                padding: 30px 20px;
            }
            
            .skills-stats {
                gap: 20px;
            }
            
            .skills-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .skill-card {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 2rem;
            }
            
            .skills-header {
                padding: 25px 15px;
            }
            
            .skills-stats {
                gap: 15px;
            }
            
            .stat-item {
                padding: 15px;
            }
            
            .skill-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Portfolio configuration
    $portfolio = array(
        'name' => 'Piyatida',
        'title' => 'Web Developer & Database',
        'skills' => array(
            'Programming' => array('PHP', 'Python', 'C++', 'JavaScript', 'HTML/CSS'),
            'Hardware' => array('Digital Circuits', 'Microprocessors', 'Arduino'),
            'Systems' => array('Linux', 'Embedded Systems', 'Networking', 'Database'),
            'Tools' => array('Git', 'Docker', 'VS Code', 'MySQL', 'PostgreSQL')
        )
    );
    ?>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <a href="index.php" class="back-btn">← กลับหน้าหลัก</a>
            <h1 class="page-title">🚀 Technical Skills</h1>
            <p class="page-subtitle">My expertise across multiple domains</p>
        </div>

        <!-- Skills Header -->
        <div class="skills-header">
            <h2 class="skills-title">Technical Skills</h2>
            <p class="skills-subtitle">My expertise across multiple domains</p>
            <div class="skills-stats">
                <div class="stat-item">
                    <span class="stat-number">4</span>
                    <span class="stat-label">Categories</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Technologies</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5+</span>
                    <span class="stat-label">Years Exp</span>
                </div>
            </div>
        </div>

        <!-- Skills Grid -->
        <div class="skills-grid">
            <?php foreach ($portfolio['skills'] as $category => $skills): ?>
            <div class="skill-card">
                <div class="skill-header">
                    <div class="skill-icon">
                        <?php 
                        $icons = array('Programming' => '💻', 'Hardware' => '🔧', 'Systems' => '⚙️', 'Tools' => '🛠️');
                        echo $icons[$category] ?? '📚';
                        ?>
                    </div>
                    <div class="skill-title"><?= $category ?></div>
                    <div class="skill-count"><?= count($skills) ?> skills</div>
                </div>
                <div class="skill-description">
                    <?php 
                    $descriptions = array(
                        'Programming' => 'Languages & frameworks for building robust applications',
                        'Hardware' => 'Digital circuits, microprocessors & embedded systems',
                        'Systems' => 'Operating systems, networking & database management',
                        'Tools' => 'Development tools, version control & deployment'
                    );
                    echo $descriptions[$category] ?? 'Technical expertise in this domain';
                    ?>
                </div>
                <div class="skill-list">
                    <?php foreach ($skills as $skill): ?>
                        <span class="skill-tag"><?= $skill ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="skill-footer">
                    <div class="skill-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?= (count($skills) / 6) * 100 ?>%"></div>
                        </div>
                        <span class="progress-text">Expertise Level</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Code Snippet -->
        <div class="code-snippet">
            <span class="php-tag">&lt;?php</span><br>
            <span class="php-comment">// My technical expertise</span><br>
            <span class="php-variable">$skills</span> = array(<br>
            &nbsp;&nbsp;<span class="php-string">'Programming'</span> => array(<span class="php-string">'PHP'</span>, <span class="php-string">'Python'</span>, <span class="php-string">'C++'</span>),<br>
            &nbsp;&nbsp;<span class="php-string">'Hardware'</span> => array(<span class="php-string">'Digital Circuits'</span>, <span class="php-string">'Microprocessors'</span>),<br>
            &nbsp;&nbsp;<span class="php-string">'Systems'</span> => array(<span class="php-string">'Linux'</span>, <span class="php-string">'Embedded Systems'</span>)<br>
            );<br>
            <span class="php-tag">?&gt;</span>
        </div>
    </div>

    <script>
        // Add some interactive effects
        document.querySelectorAll('.skill-card').forEach((card, index) => {
            // Add entrance animation delay
            card.style.animationDelay = `${index * 0.1}s`;
            
            // Add hover effects
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
                this.style.boxShadow = '0 20px 40px rgba(64, 224, 208, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 5px 15px rgba(64, 224, 208, 0.1)';
            });
        });

        // Add click effect for skill tags
        document.querySelectorAll('.skill-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });
    </script>
</body>
</html> 