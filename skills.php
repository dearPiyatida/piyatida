<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piyatida - Code Editor Portfolio</title>
    <link rel="icon" type="image/png"" href="img/my_logo.png">
    <link rel="shortcut icon" type="image/png"" href="public/my_logo.png">
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
            overflow: hidden;
            height: 100vh;
        }

        /* Code Editor Layout */
        .editor-container {
            display: flex;
            height: 100vh;
        }

        /* Left Sidebar - File Explorer */
        .sidebar {
            width: 280px;
            background: #252526;
            border-right: 1px solid #3c3c3c;
            overflow-y: auto;
            flex-shrink: 0;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #3c3c3c;
            background: #2d2d30;
        }

        .sidebar-title {
            color: #40e0d0;
            font-size: 1.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-title::before {
            content: '📁';
            font-size: 1.5rem;
        }

        .file-tree {
            padding: 10px 0;
        }

        .folder {
            cursor: pointer;
            padding: 8px 20px;
            transition: background 0.2s ease;
            border-left: 3px solid transparent;
        }

        .folder:hover {
            background: #2a2d2e;
        }

        .folder.active {
            background: #37373d;
            border-left-color: #40e0d0;
        }

        .folder-header {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #40e0d0;
            font-weight: 500;
        }

        .folder-icon {
            font-size: 1.2rem;
        }

        .folder-name {
            font-size: 0.95rem;
        }

        .folder-content {
            margin-left: 20px;
            display: none;
        }

        .folder.active .folder-content {
            display: block;
        }

        .file {
            padding: 6px 20px 6px 40px;
            cursor: pointer;
            transition: background 0.2s ease;
            font-size: 0.9rem;
            color: #d4d4d4;
        }

        .file:hover {
            background: #2a2d2e;
        }

        .file.active {
            background: #37373d;
            color: #40e0d0;
        }

        .file::before {
            content: '📄';
            margin-right: 8px;
        }

        /* Main Content Area */
        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #1e1e1e;
        }

        /* Tab Bar */
        .tab-bar {
            height: 40px;
            background: #2d2d30;
            border-bottom: 1px solid #3c3c3c;
            display: flex;
            align-items: center;
            padding: 0 20px;
            gap: 5px;
            overflow-x: auto;
        }

        .tab {
            padding: 8px 20px 8px 15px;
            background: #3c3c3c;
            color: #d4d4d4;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.9rem;
            border-radius: 4px 4px 0 0;
            transition: all 0.2s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 120px;
            white-space: nowrap;
        }

        .tab.active {
            background: #1e1e1e;
            color: #40e0d0;
            border-bottom: 2px solid #40e0d0;
        }

        .tab:hover:not(.active) {
            background: #4a4a4a;
        }

        .tab-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 14px;
            padding: 2px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            opacity: 0.7;
        }

        .tab-close:hover {
            background: rgba(255, 255, 255, 0.1);
            opacity: 1;
        }

        .tab.active .tab-close:hover {
            background: rgba(64, 224, 208, 0.2);
        }

        .new-tab-btn {
            background: #3c3c3c;
            border: none;
            color: #d4d4d4;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 4px 4px 0 0;
            font-size: 18px;
            transition: all 0.2s ease;
            margin-left: 10px;
        }

        .new-tab-btn:hover {
            background: #4a4a4a;
            color: #40e0d0;
        }

        /* Content Panels */
        .content-panel {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            display: none;
            
            
        }

        .content-panel.active {
            display: block;
        }
        /* 🔹 Layout Container */
        .welcome-container {
        max-width: 1200px;
        margin: 0 auto;
        }

        /* 🔹 Profile Section */
        .profile-section {
        display: flex;
        align-items: center;
        gap: 40px;
        margin-bottom: 50px;
        padding: 40px;
        background: linear-gradient(135deg, #2d2d30, #37373d);
        border-radius: 16px;
        border: 1px solid #3c3c3c;
        }
        .profile-image {
        position: relative;
        flex-shrink: 0;
        }
        .profile-pic {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #40e0d0;
        box-shadow: 0 10px 30px rgba(64, 224, 208, 0.3);
        }
        .profile-overlay {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(64, 224, 208, 0.9);
        color: #000;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        white-space: nowrap;
        }
        .profile-tags {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        }
        .profile-tag {
        background: rgba(64, 224, 208, 0.1);
        color: #40e0d0;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        border: 1px solid rgba(64, 224, 208, 0.3);
        transition: all 0.3s ease;
        }
        .profile-tag:hover {
        background: rgba(64, 224, 208, 0.2);
        transform: translateY(-2px);
        }

        /* 🔹 Title + Subtitle */
        .welcome-title {
        font-size: 3rem;
        color: #40e0d0;
        margin-bottom: 15px;
        font-weight: bold;
        text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }
        .welcome-subtitle {
        font-size: 1.5rem;
        color: #b0b0b0;
        margin-bottom: 20px;
        font-weight: 500;
        }

        /* 🔹 Description + Layout */
        .welcome-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 40px;
        }
        .welcome-description h2 {
        color: #40e0d0;
        font-size: 1.8rem;
        margin-bottom: 20px;
        }
        .welcome-description p {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 20px;
        color: #d4d4d4;
        }

        /* 🔹 Stats Grid */
        .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 40px;
        }
        .stat-card {
        background: #2d2d30;
        border: 1px solid #3c3c3c;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        }
        .stat-card:hover {
        border-color: #40e0d0;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(64, 224, 208, 0.2);
        }
        .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        }
        .stat-number {
        font-size: 2rem;
        color: #40e0d0;
        font-weight: bold;
        margin-bottom: 8px;
        }
        .stat-label {
        color: #b0b0b0;
        font-size: 0.9rem;
        }

        /* 🔹 Code Snippet UI */
        .code-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #2d2d30;
        padding: 12px 20px;
        border-radius: 8px 8px 0 0;
        border-bottom: 1px solid #3c3c3c;
        }
        .code-title {
        color: #40e0d0;
        font-weight: bold;
        font-size: 0.9rem;
        }
        .code-controls {
        display: flex;
        gap: 8px;
        }
        .code-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        }
        .code-dot.red { background: #ff5f56; }
        .code-dot.yellow { background: #ffbd2e; }
        .code-dot.green { background: #27ca3f; }
        .code-content {
        padding: 20px;
        line-height: 1.6;
        }


        /* Empty State */
        .empty-state {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #808080;
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state-title {
            font-size: 1.5rem;
            color: #b0b0b0;
            margin-bottom: 15px;
        }

        .empty-state-description {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 500px;
            opacity: 0.8;
        }

        /* 🎯 Enhanced Skills Panel */
        .skills-header {
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            padding: 30px 25px;
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            box-sizing: border-box;
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
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }

        .skills-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .skills-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            max-width: 100%;
        }

        .stat-item {
            text-align: center;
            padding: 15px 20px;
            background: rgba(64, 224, 208, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(64, 224, 208, 0.2);
            transition: all 0.3s ease;
            min-width: 120px;
            max-width: 150px;
            flex: 1;
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

        /* 🎨 Enhanced Skills Grid */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 30px;
            max-width: 100%;
            overflow-x: hidden;
        }

        .skill-card {
            background: linear-gradient(145deg, #2d2d30, #252526);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            padding: 25px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
            max-width: 100%;
            box-sizing: border-box;
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .skill-card-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 0%, rgba(64, 224, 208, 0.1), transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .skill-card:hover .skill-card-glow {
            opacity: 1;
        }

        .skill-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            position: relative;
        }

        .skill-icon-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .skill-icon {
            font-size: 3rem;
            z-index: 2;
            position: relative;
            transition: transform 0.3s ease;
        }

        .skill-card:hover .skill-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .skill-icon-bg {
            position: absolute;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, rgba(64, 224, 208, 0.2), transparent);
            border-radius: 50%;
            z-index: 1;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
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
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
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
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            white-space: nowrap;
            max-width: 100%;
        }

        .skill-tag:hover {
            background: linear-gradient(135deg, rgba(64, 224, 208, 0.2), rgba(64, 224, 208, 0.1));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        .skill-tag-glow {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(64, 224, 208, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .skill-tag:hover .skill-tag-glow {
            left: 100%;
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
            animation: progressFill 2s ease-out;
        }

        @keyframes progressFill {
            from { width: 0; }
            to { width: var(--progress-width); }
        }

        .progress-text {
            color: #808080;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Projects Panel */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .project-card {
            background: #2d2d30;
            border: 1px solid #3c3c3c;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .project-card:hover {
            border-color: #40e0d0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.2);
        }

        .project-header {
            background: linear-gradient(135deg, #40e0d0, #00bfff);
            padding: 20px;
            color: #000;
            text-align: center;
        }

        .project-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .project-description {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .project-content {
            padding: 25px;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .tech-tag {
            background: rgba(64, 224, 208, 0.1);
            color: #40e0d0;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        /* Contact Panel */
        .contact-content {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #b0b0b0;
            margin: 30px 0;
        }

        .contact-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
            margin: 40px 0;
        }

        .contact-link {
            color: #40e0d0;
            text-decoration: none;
            padding: 15px 30px;
            border: 2px solid #40e0d0;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .contact-link:hover {
            background: #40e0d0;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        /* Code Snippets */
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

        /* Welcome Message */
        .welcome-message {
            text-align: center;
            padding: 60px 20px;
            color: #b0b0b0;
        }

        .welcome-title {
            font-size: 2.5rem;
            color: #40e0d0;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .welcome-subtitle {
            font-size: 1.3rem;
            color: #808080;
            margin-bottom: 30px;
        }

        .welcome-description {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto 40px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
            }
            
            .content-panel {
                padding: 20px;
            }
            
            .skills-grid,
            .projects-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .skills-header {
                padding: 25px 20px;
            }
            
            .skills-stats {
                gap: 15px;
            }
            
            .stat-item {
                min-width: 100px;
                padding: 12px 15px;
            }
            
            .skill-card {
                padding: 20px;
            }
            
            .contact-links {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .skills-header {
                padding: 20px 15px;
            }
            
            .skills-title {
                font-size: 2rem;
            }
            
            .skills-subtitle {
                font-size: 1rem;
            }
            
            .skills-stats {
                gap: 10px;
            }
            
            .stat-item {
                min-width: 80px;
                padding: 10px;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .stat-label {
                font-size: 0.8rem;
            }
            
            .skill-card {
                padding: 15px;
            }
            
            .skill-tag {
                padding: 5px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <?php
    // Portfolio configuration
    $portfolio = array(
        'name' => 'Piyatida Zontawan',
        'title' => 'Web Developer & Database',
        'logo_path' => 'img/my_logo.png',
        'profile_picture' => 'img/dear_profile.jpg',
        'skills' => array(
            'Programming' => array('PHP', 'Python', 'C++', 'JavaScript', 'HTML/CSS'),
            'Hardware' => array('Digital Circuits', 'Microprocessors', 'Arduino'),
            'Systems' => array('Linux', 'Embedded Systems', 'Networking', 'Database'),
            'Tools' => array('Git', 'Docker', 'VS Code', 'MySQL', 'PostgreSQL')
        ),
        'projects' => array(
            array(
                'name' => 'Smart IoT System',
                'description' => 'Developed a complete IoT solution using microcontrollers and PHP backend for data processing and web interface.',
                'tech' => array('PHP', 'Arduino', 'MySQL', 'JavaScript', 'MQTT')
            ),
            array(
                'name' => 'CPU Simulator',
                'description' => 'Built a MIPS processor simulator in C++ with PHP web interface for educational purposes.',
                'tech' => array('C++', 'PHP', 'HTML5', 'Assembly', 'Bootstrap')
            ),
            array(
                'name' => 'Network Monitor',
                'description' => 'Created a real-time network monitoring tool with PHP backend and responsive dashboard.',
                'tech' => array('PHP', 'Python', 'MySQL', 'Chart.js', 'Socket.io')
            ),
            array(
                'name' => 'E-commerce Platform',
                'description' => 'Full-stack e-commerce solution with user management, payment integration, and admin panel.',
                'tech' => array('PHP', 'MySQL', 'JavaScript', 'Stripe API', 'Bootstrap')
            )
        )
    );

    // Start HTML content
    ?>
    <div class="editor-container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">Portfolio Explorer</div>
            </div>
            
            <div class="file-tree">
                <div class="folder" data-panel="welcome">
                    <div class="folder-header">
                        <span class="folder-icon">🐘</span>
                        <span class="folder-name">Welcome</span>
                    </div>
                </div>
                
                <div class="folder" data-panel="skills">
                    <div class="folder-header">
                        <span class="folder-icon">🐘</span>
                        <span class="folder-name">Skills</span>
                    </div>
                </div>
                
                <div class="folder" data-panel="projects">
                    <div class="folder-header">
                        <span class="folder-icon">🐘</span>
                        <span class="folder-name">Projects</span>
                    </div>
                </div>
                
                <div class="folder" data-panel="contact">
                    <div class="folder-header">
                        <span class="folder-icon">🐘</span>
                        <span class="folder-name">Contact</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="content-area">
            <!-- Tab Bar -->
            <div class="tab-bar">
                <button class="tab" data-panel="welcome">
                    Welcome.php
                    <button class="tab-close" title="Close tab">×</button>
                </button>
                <button class="tab" data-panel="skills">
                    Skills.php
                    <button class="tab-close" title="Close tab">×</button>
                </button>
                <button class="tab" data-panel="projects">
                    Projects.php
                    <button class="tab-close" title="Close tab">×</button>
                </button>
                <button class="tab" data-panel="contact">
                    Contact.php
                    <button class="tab-close" title="Close tab">×</button>
                </button>
                <button class="new-tab-btn" title="New tab">+</button>
            </div>

            <!-- Empty State -->
            <div class="empty-state" id="empty-state">
                <div class="empty-state-icon">🐘</div>
                <h2 class="empty-state-title">Welcome to Portfolio Explorer</h2>
                <p class="empty-state-description">
                    Select a folder from the sidebar to explore my portfolio sections. 
                    Each folder contains different aspects of my work and skills.
                </p>
            </div>

            <!-- Welcome Panel -->
            <div class="content-panel" id="welcome">
            <div class="welcome-container">

                <!-- 🔹 Profile Section -->
                <div class="profile-section">
                <div class="profile-image">
                    <?php ?>
                    <img src="<?= $portfolio['profile_picture'] ?>" alt="<?= $portfolio['name'] ?>" class="profile-pic">
                    <div class="profile-overlay">
                    <div class="profile-status">Available for opportunities</div>
                    </div>
                </div>
                <div class="profile-info">
                    <h1 class="welcome-title"><?= $portfolio['name'] ?></h1>
                    <p class="welcome-subtitle"><?= $portfolio['title'] ?></p>
                    <div class="profile-tags">
                    <span class="profile-tag">🐘 PHP Developer</span>
                    <span class="profile-tag">🔧 Hardware Engineer</span>
                    <span class="profile-tag">💻 Full-Stack Developer</span>
                    </div>
                </div>
                </div>

                <!-- 🔹 Welcome Content -->
                <div class="welcome-content">
                <div class="welcome-description">
                    <h2>Welcome to my digital portfolio! 🚀</h2>
                    <p>
                    I'm passionate about bridging the gap between hardware and software.
                    With a background in Computer Engineering, I specialize in building robust systems,
                    from low-level embedded programming to high-level web applications using PHP and modern technologies.
                    </p>
                    <p>
                    My journey combines the precision of hardware engineering with the creativity of software development,
                    creating innovative solutions that make a real impact.
                    </p>
                </div>

                <!-- 🔹 Code Snippet -->
                <div class="code-snippet">
                    <div class="code-header">
                    <span class="code-title">welcome.php</span>
                    <div class="code-controls">
                        <span class="code-dot red"></span>
                        <span class="code-dot yellow"></span>
                        <span class="code-dot green"></span>
                    </div>
                    </div>
                    <div class="code-content">
                    <span class="php-tag">&lt;?php</span><br>
                    <span class="php-comment">// Welcome to my digital world</span><br>
                    <span class="php-variable">$engineer</span> = <span class="php-string">"<?= $portfolio['name'] ?>"</span>;<br>
                    <span class="php-variable">$passion</span> = <span class="php-string">"Computer Engineering"</span>;<br>
                    <span class="php-variable">$expertise</span> = array(<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'Backend'</span> => <span class="php-string">'PHP, Python, Node.js'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'Frontend'</span> => <span class="php-string">'JavaScript, React, Vue.js'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'Hardware'</span> => <span class="php-string">'Arduino, Microprocessors, IoT'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'Database'</span> => <span class="php-string">'MySQL, PostgreSQL, MongoDB'</span><br>
                    );<br>
                    <span class="php-variable">$status</span> = <span class="php-string">"Building tomorrow's technology today!"</span>;<br>
                    <br>
                    <span class="php-comment">// Let's create something amazing together</span><br>
                    echo <span class="php-variable">$status</span>;<br>
                    <span class="php-tag">?&gt;</span>
                    </div>
                </div>
                </div>

                <!-- 🔹 Quick Stats -->
                <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">💻</div>
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🚀</div>
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🔧</div>
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Technologies</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
                </div>

            </div>
            </div>

            </div>

            <!-- Skills Panel -->
            <div class="content-panel" id="skills">
                <div class="welcome-container">
                    <!-- 🎯 Enhanced Skills Header -->
                    <div class="skills-header">
                        <div class="skills-header-content">
                            <h2 class="skills-title">🚀 Technical Skills</h2>
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
                    </div>

                    <!-- 🎨 Skills Grid -->
                    <div class="skills-grid">
                        <?php foreach ($portfolio['skills'] as $category => $skills): ?>
                        <div class="skill-card" data-category="<?= strtolower($category) ?>">
                            <div class="skill-card-glow"></div>
                            <div class="skill-header">
                                <div class="skill-icon-wrapper">
                                    <div class="skill-icon">
                                        <?php 
                                        $icons = array('Programming' => '💻', 'Hardware' => '🔧', 'Systems' => '⚙️', 'Tools' => '🛠️');
                                        echo $icons[$category] ?? '📚';
                                        ?>
                                    </div>
                                    <div class="skill-icon-bg"></div>
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
                                    <span class="skill-tag" data-skill="<?= $skill ?>">
                                        <span class="skill-tag-text"><?= $skill ?></span>
                                        <div class="skill-tag-glow"></div>
                                    </span>
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
            </div>

            <!-- Projects Panel -->
            <div class="content-panel" id="projects">
                <div class="welcome-container">
                    <h2 style="color: #40e0d0; font-size: 2rem; margin-bottom: 30px;">Featured Projects</h2>
                    <div class="projects-grid">
                        <?php foreach ($portfolio['projects'] as $project): ?>
                        <div class="project-card">
                                <div class="project-header">
                                    <div class="project-title"><?= $project['name'] ?></div>
                                    <div class="project-description"><?= $project['description'] ?></div>
                            </div>
                            <div class="project-content">
                                    <div class="project-tech">
                                    <?php foreach ($project['tech'] as $tech): ?>
                                        <span class="tech-tag"><?= $tech ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                        
                    <div class="code-snippet">
                        <span class="php-tag">&lt;?php</span><br>
                        <span class="php-comment">// Project showcase</span><br>
                        <span class="php-variable">$projects</span> = array(<br>
                        &nbsp;&nbsp;array(<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'name'</span> => <span class="php-string">'Smart IoT System'</span>,<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="php-string">'tech'</span> => array(<span class="php-string">'PHP'</span>, <span class="php-string">'Arduino'</span>, <span class="php-string">'MySQL'</span>)<br>
                        &nbsp;&nbsp;),<br>
                        &nbsp;&nbsp;<span class="php-comment">// More projects...</span><br>
                        );<br>
                        <span class="php-tag">?&gt;</span>
                    </div>
                </div>
            </div>

            <!-- Contact Panel -->
            <div class="content-panel" id="contact">
                <div class="welcome-container">
                    <div class="contact-content">
                        <h2 style="color: #40e0d0; font-size: 2rem; margin-bottom: 30px;">Let's Connect</h2>
                        <p class="contact-description">
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
                            <span class="php-comment">// Contact information</span><br>
                            <span class="php-variable">$contact</span> = array(<br>
                            &nbsp;&nbsp;<span class="php-string">'email'</span> => <span class="php-string">'your.email@example.com'</span>,<br>
                            &nbsp;&nbsp;<span class="php-string">'linkedin'</span> => <span class="php-string">'linkedin.com/in/yourprofile'</span>,<br>
                            &nbsp;&nbsp;<span class="php-string">'github'</span> => <span class="php-string">'github.com/yourusername'</span>,<br>
                            &nbsp;&nbsp;<span class="php-string">'status'</span> => <span class="php-string">'Available for opportunities'</span><br>
                            );<br>
                            echo <span class="php-string">"Thanks for visiting my portfolio!"</span>;<br>
                            <span class="php-tag">?&gt;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab and panel switching functionality
        document.querySelectorAll('.tab, .folder').forEach(element => {
            element.addEventListener('click', function(e) {
                // Don't trigger if clicking on close button
                if (e.target.classList.contains('tab-close')) {
                    return;
                }
                
                const targetPanel = this.dataset.panel;
                
                // Update active tab
                document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
                document.querySelector(`[data-panel="${targetPanel}"]`).classList.add('active');
                
                // Update active folder
                document.querySelectorAll('.folder').forEach(folder => folder.classList.remove('active'));
                this.classList.add('active');
                
                // Hide empty state and show target panel
                const emptyState = document.getElementById('empty-state');
                if (emptyState) {
                    emptyState.style.display = 'none';
                }
                
                document.querySelectorAll('.content-panel').forEach(panel => panel.classList.remove('active'));
                document.getElementById(targetPanel).classList.add('active');
                
                // Update tab bar to show the corresponding tab
                if (this.classList.contains('folder')) {
                    // If clicking on folder, update the tab bar
                    document.querySelectorAll('.tab').forEach(tab => {
                        if (tab.dataset.panel === targetPanel) {
                            tab.classList.add('active');
                        } else {
                            tab.classList.remove('active');
                        }
                    });
                }
            });
        });

        // Function to handle tab closing
        function handleTabClose(closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent tab click event
                
                const tab = this.closest('.tab');
                const panelId = tab.dataset.panel;
                const panel = document.getElementById(panelId);
                
                // Don't close if it's the last tab
                const allTabs = document.querySelectorAll('.tab');
                if (allTabs.length <= 1) {
                    return;
                }
                
                // Remove tab and panel
                tab.remove();
                if (panel) {
                    panel.remove();
                }
                
                // If closed tab was active, activate another tab
                if (tab.classList.contains('active')) {
                    const remainingTabs = document.querySelectorAll('.tab');
                    if (remainingTabs.length > 0) {
                        const nextTab = remainingTabs[0];
                        const nextPanelId = nextTab.dataset.panel;
                        
                        // Activate next tab
                        nextTab.classList.add('active');
                        const nextPanel = document.getElementById(nextPanelId);
                        if (nextPanel) {
                            nextPanel.classList.add('active');
                        }
                        
                        // Update folder selection
                        document.querySelectorAll('.folder').forEach(folder => folder.classList.remove('active'));
                        const nextFolder = document.querySelector(`[data-panel="${nextPanelId}"]`);
                        if (nextFolder) {
                            nextFolder.classList.add('active');
                        }
                    } else {
                        // If no tabs left, show empty state
                        const emptyState = document.getElementById('empty-state');
                        if (emptyState) {
                            emptyState.style.display = 'flex';
                        }
                    }
                }
            });
        }

        // Initialize tab close functionality for existing tabs
        document.querySelectorAll('.tab-close').forEach(closeBtn => {
            handleTabClose(closeBtn);
        });

        // New tab functionality
        document.querySelector('.new-tab-btn').addEventListener('click', function() {
            // Create a new tab (you can customize this)
            const newTabId = 'new-tab-' + Date.now();
            const newTab = document.createElement('button');
            newTab.className = 'tab';
            newTab.dataset.panel = newTabId;
            newTab.innerHTML = `
                New Tab
                <button class="tab-close" title="Close tab">×</button>
            `;
            
            // Insert before the new tab button
            this.parentNode.insertBefore(newTab, this);
            
            // Add event listeners to new tab
            newTab.addEventListener('click', function(e) {
                if (e.target.classList.contains('tab-close')) {
                    return;
                }
                
                // Activate this tab
                document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');
                
                // You can add content for new tabs here
                console.log('New tab activated:', newTabId);
            });
            
            // Add close functionality to new tab using the same function
            const newCloseBtn = newTab.querySelector('.tab-close');
            handleTabClose(newCloseBtn);
        });

        // 🎯 Enhanced Skills Panel Interactions
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
            
            // Add click effect for skill tags
            const skillTags = card.querySelectorAll('.skill-tag');
            skillTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        });

        // Add some interactive effects for project cards
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Smooth scrolling for any anchor links
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
    </script>
</body>
</html>