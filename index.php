<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piyatida - Code Editor Portfolio</title>
    <link rel="icon" type="image/png"" href="img/logo.png">
    <link rel="shortcut icon" type="image/png"" href="public/logo.png">
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

        /* 🚀 Enhanced Projects Panel */
        .projects-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
        }

        .projects-title {
            color: #40e0d0;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }

        .projects-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .project-card {
            background: linear-gradient(145deg, #2d2d30, #252526);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .project-card:nth-child(1) { animation-delay: 0.1s; }
        .project-card:nth-child(2) { animation-delay: 0.2s; }
        .project-card:nth-child(3) { animation-delay: 0.3s; }
        .project-card:nth-child(4) { animation-delay: 0.4s; }

        .project-card:hover {
            border-color: #40e0d0;
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(64, 224, 208, 0.15);
        }

        .project-image {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: linear-gradient(135deg, #40e0d0, #00bfff);
        }

        .project-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-card:hover .project-pic {
            transform: scale(1.1);
        }

        .project-overlay {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.8);
            color: #40e0d0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        .project-content {
            padding: 25px;
        }

        .project-title {
            color: #40e0d0;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .project-description {
            color: #d4d4d4;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .tech-tag {
            background: linear-gradient(135deg, rgba(64, 224, 208, 0.1), rgba(64, 224, 208, 0.05));
            color: #40e0d0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid rgba(64, 224, 208, 0.3);
            transition: all 0.3s ease;
        }

        .tech-tag:hover {
            background: linear-gradient(135deg, rgba(64, 224, 208, 0.2), rgba(64, 224, 208, 0.1));
            transform: translateY(-2px);
        }

        .project-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .project-link {
            color: #40e0d0;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #40e0d0;
            border-radius: 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .project-link:hover {
            background: #40e0d0;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        .project-link.demo {
            border-color: #27ca3f;
            color: #27ca3f;
        }

        .project-link.demo:hover {
            background: #27ca3f;
            color: #000;
        }

        .project-link.github {
            border-color: #6f42c1;
            color: #6f42c1;
        }

        .project-link.github:hover {
            background: #6f42c1;
            color: #fff;
        }

        .project-link.docs {
            border-color: #ffc107;
            color: #ffc107;
        }

        .project-link.docs:hover {
            background: #ffc107;
            color: #000;
        }

        /* 📊 Project Statistics */
        .project-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
        }

        .project-stats .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(64, 224, 208, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(64, 224, 208, 0.2);
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .project-stats .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(64, 224, 208, 0.15);
            border-color: rgba(64, 224, 208, 0.4);
        }

        /* 🎯 Enhanced Activities Panel */
        .activities-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
        }

        .activities-title {
            color: #40e0d0;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }

        .activities-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .activity-card {
            background: linear-gradient(145deg, #2d2d30, #252526);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .activity-card:nth-child(1) { animation-delay: 0.1s; }
        .activity-card:nth-child(2) { animation-delay: 0.2s; }
        .activity-card:nth-child(3) { animation-delay: 0.3s; }
        .activity-card:nth-child(4) { animation-delay: 0.4s; }
        .activity-card:nth-child(5) { animation-delay: 0.5s; }
        .activity-card:nth-child(6) { animation-delay: 0.6s; }

        .activity-card:hover {
            border-color: #40e0d0;
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(64, 224, 208, 0.15);
        }

        .activity-image {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        }

        .activity-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .activity-card:hover .activity-pic {
            transform: scale(1.1);
        }

        .activity-overlay {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.8);
            color: #40e0d0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        .activity-content {
            padding: 25px;
        }

        .activity-title {
            color: #40e0d0;
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .activity-description {
            color: #d4d4d4;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .activity-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .info-tag {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.05));
            color: #ff6b6b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid rgba(255, 107, 107, 0.3);
            transition: all 0.3s ease;
        }

        .info-tag:hover {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2), rgba(78, 205, 196, 0.1));
            transform: translateY(-2px);
        }

        .activity-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .activity-link {
            color: #40e0d0;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #40e0d0;
            border-radius: 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .activity-link:hover {
            background: #40e0d0;
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(64, 224, 208, 0.3);
        }

        .activity-link.photos {
            border-color: #ff6b6b;
            color: #ff6b6b;
        }

        .activity-link.photos:hover {
            background: #ff6b6b;
            color: #fff;
        }

        .activity-link.cert {
            border-color: #ffc107;
            color: #ffc107;
        }

        .activity-link.cert:hover {
            background: #ffc107;
            color: #000;
        }

        .activity-link.paper {
            border-color: #17a2b8;
            color: #17a2b8;
        }

        .activity-link.paper:hover {
            background: #17a2b8;
            color: #fff;
        }

        .activity-link.project {
            border-color: #6f42c1;
            color: #6f42c1;
        }

        .activity-link.project:hover {
            background: #6f42c1;
            color: #fff;
        }

        .activity-link.story {
            border-color: #fd7e14;
            color: #fd7e14;
        }

        .activity-link.story:hover {
            background: #fd7e14;
            color: #fff;
        }

        .activity-link.network {
            border-color: #20c997;
            color: #20c997;
        }

        .activity-link.network:hover {
            background: #20c997;
            color: #000;
        }

        /* 📊 Activities Statistics */
        .activities-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
        }

        .activities-stats .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 107, 107, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(255, 107, 107, 0.2);
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .activities-stats .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 107, 107, 0.15);
            border-color: rgba(255, 107, 107, 0.4);
        }

        .activities-stats .stat-number {
            color: #ff6b6b;
        }

        /* 🌟 Enhanced Contact Panel */
        .contact-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 40px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .contact-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(64, 224, 208, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        .contact-title {
            color: #40e0d0;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 0 20px rgba(64, 224, 208, 0.3);
        }

        .contact-subtitle {
            color: #b0b0b0;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .contact-status {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(64, 224, 208, 0.1);
            padding: 12px 20px;
            border-radius: 25px;
            border: 1px solid rgba(64, 224, 208, 0.3);
        }

        .status-dot {
            width: 12px;
            height: 12px;
            background: #27ca3f;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .status-text {
            color: #40e0d0;
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* 📱 Contact Information Cards */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .contact-card {
            background: linear-gradient(145deg, #2d2d30, #252526);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
            padding: 25px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .contact-card:nth-child(1) { animation-delay: 0.1s; }
        .contact-card:nth-child(2) { animation-delay: 0.2s; }

        .contact-card.primary {
            border-color: #40e0d0;
            background: linear-gradient(145deg, rgba(64, 224, 208, 0.1), rgba(64, 224, 208, 0.05));
        }

        .contact-card:hover {
            border-color: #40e0d0;
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(64, 224, 208, 0.15);
        }

        .contact-card-icon {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-card-icon .icon {
            font-size: 3rem;
            display: block;
            margin-bottom: 10px;
        }

        .contact-card-content h3 {
            color: #40e0d0;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .contact-card-content p {
            color: #b0b0b0;
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .contact-action {
            color: #40e0d0;
            text-decoration: none;
            font-size: 0.9rem;
            text-align: center;
            display: block;
            padding: 8px 16px;
            border: 1px solid #40e0d0;
            border-radius: 20px;
            transition: all 0.3s ease;
            word-break: break-all;
        }

        .contact-action:hover {
            background: #40e0d0;
            color: #000;
            transform: translateY(-2px);
        }

        .contact-card-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 0%, rgba(64, 224, 208, 0.1), transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .contact-card:hover .contact-card-glow {
            opacity: 1;
        }

        /* 🚀 Contact Form */
        .contact-form-section {
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h3 {
            color: #40e0d0;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #b0b0b0;
            font-size: 1rem;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #40e0d0;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #3c3c3c;
            border-radius: 12px;
            background: #1e1e1e;
            color: #d4d4d4;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #40e0d0;
            box-shadow: 0 0 0 3px rgba(64, 224, 208, 0.1);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #808080;
        }

        .submit-btn {
            background: linear-gradient(135deg, #40e0d0, #00bfff);
            color: #000;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 auto;
            font-family: inherit;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(64, 224, 208, 0.3);
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        /* 🎯 Contact Statistics */
        .contact-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 16px;
        }

        .contact-stats .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(64, 224, 208, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(64, 224, 208, 0.2);
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .contact-stats .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(64, 224, 208, 0.15);
            border-color: rgba(64, 224, 208, 0.4);
        }

        /* 💡 Why Choose Me */
        .why-choose-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background: linear-gradient(135deg, #2d2d30, #37373d);
            border: 1px solid #3c3c3c;
            border-radius: 20px;
        }

        .why-choose-section h3 {
            color: #40e0d0;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }

        .feature-item {
            padding: 20px;
            background: rgba(64, 224, 208, 0.05);
            border-radius: 16px;
            border: 1px solid rgba(64, 224, 208, 0.1);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            background: rgba(64, 224, 208, 0.1);
            border-color: rgba(64, 224, 208, 0.3);
        }

        .feature-icon {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 15px;
        }

        .feature-item h4 {
            color: #40e0d0;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .feature-item p {
            color: #b0b0b0;
            font-size: 0.9rem;
            line-height: 1.5;
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
            
            /* Projects responsive */
            .projects-title {
                font-size: 2.5rem;
            }
            
            .projects-subtitle {
                font-size: 1.1rem;
            }
            
            .project-stats {
                gap: 15px;
                padding: 20px;
            }
            
            .project-stats .stat-item {
                min-width: 100px;
                padding: 15px;
            }
            
            .project-links {
                flex-direction: column;
                align-items: stretch;
            }
            
            .project-link {
                text-align: center;
                justify-content: center;
            }
            
            /* Activities responsive */
            .activities-title {
                font-size: 2.5rem;
            }
            
            .activities-subtitle {
                font-size: 1.1rem;
            }
            
            .activities-stats {
                gap: 15px;
                padding: 20px;
            }
            
            .activities-stats .stat-item {
                min-width: 100px;
                padding: 15px;
            }
            
            .activity-links {
                flex-direction: column;
                align-items: stretch;
            }
            
            .activity-link {
                text-align: center;
                justify-content: center;
            }
            
            /* Contact responsive */
            .contact-title {
                font-size: 2.5rem;
            }
            
            .contact-subtitle {
                font-size: 1.1rem;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .contact-stats {
                gap: 15px;
                padding: 20px;
            }
            
            .contact-stats .stat-item {
                min-width: 100px;
                padding: 15px;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
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
            
            /* Projects responsive for small screens */
            .projects-title {
                font-size: 2rem;
            }
            
            .projects-subtitle {
                font-size: 1rem;
            }
            
            .projects-header {
                padding: 20px 15px;
            }
            
            .project-stats {
                gap: 10px;
                padding: 15px;
            }
            
            .project-stats .stat-item {
                min-width: 80px;
                padding: 10px;
            }
            
            .project-stats .stat-number {
                font-size: 1.5rem;
            }
            
            .project-stats .stat-label {
                font-size: 0.8rem;
            }
            
            .project-card {
                padding: 15px;
            }
            
            .project-links {
                gap: 8px;
            }
            
            .project-link {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            /* Activities responsive for small screens */
            .activities-title {
                font-size: 2rem;
            }
            
            .activities-subtitle {
                font-size: 1rem;
            }
            
            .activities-header {
                padding: 20px 15px;
            }
            
            .activities-stats {
                gap: 10px;
                padding: 15px;
            }
            
            .activities-stats .stat-item {
                min-width: 80px;
                padding: 10px;
            }
            
            .activities-stats .stat-number {
                font-size: 1.5rem;
            }
            
            .activities-stats .stat-label {
                font-size: 0.8rem;
            }
            
            .activity-card {
                padding: 15px;
            }
            
            .activity-links {
                gap: 8px;
            }
            
            .activity-link {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            /* Contact responsive for small screens */
            .contact-title {
                font-size: 2rem;
            }
            
            .contact-subtitle {
                font-size: 1rem;
            }
            
            .contact-header {
                padding: 25px 20px;
            }
            
            .contact-grid {
                gap: 15px;
            }
            
            .contact-card {
                padding: 20px;
            }
            
            .contact-form-section {
                padding: 20px;
            }
            
            .form-header h3 {
                font-size: 1.5rem;
            }
            
            .contact-stats {
                gap: 10px;
                padding: 15px;
            }
            
            .contact-stats .stat-item {
                min-width: 80px;
                padding: 10px;
            }
            
            .contact-stats .stat-number {
                font-size: 1.5rem;
            }
            
            .contact-stats .stat-label {
                font-size: 0.8rem;
            }
            
            .why-choose-section {
                padding: 20px;
            }
            
            .why-choose-section h3 {
                font-size: 1.5rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .feature-item {
                padding: 15px;
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
            'Systems' => array('Linux', 'Embedded Systems', 'Database', 'Web Development'),
            'Tools' => array('Git', 'Docker', 'VS Code', 'MySQL', 'PostgreSQL', 'PHP')
        ),
        'projects' => array(
            array(
                'name' => 'Smart IoT System',
                'description' => 'Developed a complete IoT solution using microcontrollers and PHP backend for data processing and web interface.',
                'tech' => array('PHP', 'Arduino', 'MySQL', 'JavaScript', 'MQTT')
            ),
            array(
                'name' => 'Official Website',
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
                
                <div class="folder" data-panel="activities">
                    <div class="folder-header">
                        <span class="folder-icon">🐘</span>
                        <span class="folder-name">Activities</span>
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
                <button class="tab" data-panel="activities">
                    Activities.php
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
                            ฉันเป็นนักพัฒนาระบบที่ชื่นชอบในการสร้างสรรค์โซลูชันทางเทคโนโลยีเพื่อตอบโจทย์ปัญหาที่เกิดขึ้นจริง มีประสบการณ์พัฒนาเว็บไซต์และระบบสารสนเทศหลากหลายโครงการ เช่น ระบบติดตามการใช้พลังงาน ระบบรายงานการปล่อยและดูดกลับก๊าซเรือนกระจก 
                            รวมถึงเว็บไซต์หน่วยงานและสถาบันต่าง ๆ และฉันยังมีความถนัดด้าน PHP, MySQL, JavaScript และ Laravel ทำให้สามารถออกแบบระบบที่ใช้งานง่าย ตอบโจทย์ผู้ใช้งาน และแก้ไขปัญหาได้อย่างมีประสิทธิภาพ
                            </p>
                            <p>
                            นอกจากนี้ฉันยังเป็นผู้ที่มุ่งมั่นเรียนรู้สิ่งใหม่ ๆ อย่างต่อเนื่อง เปิดรับเทคโนโลยีและแนวทางใหม่ ๆ ในการพัฒนาอยู่เสมอ พร้อมนำความสามารถ ความคิดสร้างสรรค์ และความตั้งใจไปสร้างคุณค่าให้กับองค์กร เพื่อให้ทุกโครงการที่ลงมือทำ 
                            ไม่เพียงแต่สำเร็จตามเป้าหมาย แต่ยังสร้างผลลัพธ์ที่จับต้องได้และส่งผลเชิงบวกต่อผู้ใช้
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
                            <div class="stat-number">1+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">🚀</div>
                            <div class="stat-number">8+</div>
                            <div class="stat-label">Projects Completed</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">🔧</div>
                            <div class="stat-number">5+</div>
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

            <!-- Skills Panel -->
            <div class="content-panel" id="skills">
                <div class="welcome-container">
                    <!-- 🎯 Enhanced Skills Header -->
                    <div class="skills-header">
                        <div class="skills-header-content">
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
                    
                    
                </div>
            </div>

            <!-- Projects Panel -->
            <div class="content-panel" id="projects">
                <div class="welcome-container">
                    <!-- 🚀 Projects Header -->
                    <div class="projects-header">
                        <h2 class="projects-title">Featured Projects</h2>
                        <p class="projects-subtitle">Real-world projects I've built and deployed</p>
                    </div>

                    <!-- 🎯 Enhanced Projects Grid -->
                    <div class="projects-grid">
                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/wast.png" alt="Smart IoT System" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">IoT System</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Smart IoT System</h3>
                                <p class="project-description">
                                  พัฒนาโซลูชัน IoT แบบครบวงจรโดยใช้ไมโครคอนโทรลเลอร์และแบ็กเอนด์ PHP สำหรับการประมวลผลข้อมูลและเว็บอินเทอร์เฟซ
                                มาพร้อมฟีเจอร์การตรวจสอบแบบเรียลไทม์ การแสดงภาพข้อมูล และการแจ้งเตือนอัตโนมัติ
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">Arduino</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">JavaScript</span>
                                    <span class="tech-tag">MQTT</span>
                                </div>
                                <div class="project-links">
                                    <a href="https://smartgrid.cmru.ac.th/waste/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/web_eec.png" alt="CPU Simulator" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Educational</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Official Website</h3>
                                <p class="project-description">
                                เว็บไซต์ศูนย์พลังงานและสิ่งแวดล้อม มหาวิทยาลัยราชภัฏอุตรดิตถ์ พัฒนาด้วยภาษา PHP และเฟรมเวิร์ก JavaScript สำหรับการจัดการหน้าเว็บแบบไดนามิก 
                                ภายในระบบมีฟังก์ชันการนับจำนวนการเข้าใช้งาน (visitor counter) เพื่อเก็บสถิติการใช้งาน พร้อมทั้งออกแบบให้ใช้งานง่ายและเหมาะสมกับการให้ข้อมูลด้านพลังงานและสิ่งแวดล้อมแก่ผู้ใช้
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">C++</span>
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">HTML5</span>
                                    <span class="tech-tag">Assembly</span>
                                    <span class="tech-tag">Bootstrap</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://energy.uru.ac.th/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/web_bill.png" alt="Network Monitor" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Production</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Network Monitor</h3>
                                <p class="project-description">
                                ระบบแสดงค่าไฟฟ้าของมหาวิทยาลัย พัฒนาด้วย PHP เชื่อมต่อฐานข้อมูล MySQL เพื่อจัดเก็บและบริหารข้อมูลค่าไฟฟ้าในแต่ละอาคาร สามารถแสดงผลข้อมูลผ่านหน้าเว็บไซต์ในรูปแบบที่เข้าใจง่าย 
                                ช่วยให้ผู้ใช้และผู้ดูแลสามารถติดตามการใช้พลังงานได้อย่างมีประสิทธิภาพ
                                </p>
                                <div class="project-tech">
                                    <span class="php-tag">PHP</span>
                                    <span class="tech-tag">Python</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">Chart.js</span>
                                    <span class="tech-tag">Socket.io</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://10.0.2.225/electric_bill/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/data_edi.png" alt="E-commerce Platform" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Production</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Electricity Consumption Monitoring System</h3>
                                <p class="project-description">
                                ระบบตรวจสอบข้อมูลการใช้ไฟฟ้าจากมิเตอร์ภายในอาคาร มหาวิทยาลัยราชภัฏอุตรดิตถ์ เขตพื้นที่ท่าอิฐ พัฒนาด้วย PHP และใช้ฐานข้อมูล MySQL สำหรับจัดเก็บข้อมูลการใช้ไฟฟ้าในแต่ละอาคาร โดยระบบสามารถดึงข้อมูลจากมิเตอร์ไฟฟ้ามาประมวลผลและแสดงผลผ่านเว็บไซต์ 
                                ทำให้ผู้ใช้งานสามารถตรวจสอบและติดตามปริมาณการใช้ไฟฟ้าได้อย่างสะดวกและแม่นยำ
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">JavaScript</span>
                                    <span class="tech-tag">Stripe API</span>
                                    <span class="tech-tag">Bootstrap</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://10.0.2.225/data_edmi/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/charj.png" alt="E-commerce Platform" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Production</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">EV Bus Charging Monitoring System</h3>
                                <p class="project-description">
                                ระบบติดตามการใช้พลังงานไฟฟ้าของสถานีชาร์จรถบัสไฟฟ้า พัฒนาด้วย PHP และใช้ฐานข้อมูล MySQL สำหรับจัดเก็บและประมวลผลข้อมูลการใช้พลังงาน ระบบสามารถแสดงปริมาณการใช้ไฟฟ้าในแต่ละรอบการชาร์จ 
                                และสรุปผลการใช้งานผ่านหน้าเว็บไซต์ เพื่อช่วยในการตรวจสอบและบริหารจัดการพลังงานได้อย่างมีประสิทธิภาพ
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">JavaScript</span>
                                    <span class="tech-tag">Stripe API</span>
                                    <span class="tech-tag">Bootstrap</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://10.0.2.225/Charging_Station/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/cfo.png" alt="E-commerce Platform" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Educational</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Greenhouse gas emissions and absorption reports</h3>
                                <p class="project-description">
                                พัฒนาด้วย Laravel และใช้ฐานข้อมูล MySQL พร้อมทั้งมีโปรแกรมคำนวณแปลงข้อมูลกิจกรรมเป็น CO₂e (ตันคาร์บอน) อัตโนมัติ รองรับการรายงาน 
                                การปล่อยและการดูดกลับ พร้อมสรุปผลใช้งานในแดชบอร์ดและส่งออกข้อมูลได้
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">JavaScript</span>
                                    <span class="tech-tag">Stripe API</span>
                                    <span class="tech-tag">Bootstrap</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://10.0.2.225/CFO-URU/public/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="project-card">
                            <div class="project-image">
                                <img src="img/web_rdi.png" alt="E-commerce Platform" class="project-pic">
                                <div class="project-overlay">
                                    <span class="project-status">Educational</span>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">Official Website</h3>
                                <p class="project-description">
                                เว็บไซต์สถาบันวิจัยและพัฒนา มหาวิทยาลัยราชภัฏอุตรดิตถ์ พัฒนาด้วย PHP มีระบบ Admin สำหรับจัดการข้อมูลต่าง ๆ เช่น กิจกรรม เอกสาร และแบรนเนอร์ 
                                สามารถกรอกและอัปโหลดข้อมูลขึ้นหน้าเว็บได้โดยตรง ทำให้การอัปเดตเนื้อหาเป็นไปอย่างสะดวกและรวดเร็ว
                                </p>
                                <div class="project-tech">
                                    <span class="tech-tag">PHP</span>
                                    <span class="tech-tag">MySQL</span>
                                    <span class="tech-tag">JavaScript</span>
                                    <span class="tech-tag">Stripe API</span>
                                    <span class="tech-tag">Bootstrap</span>
                                </div>
                                <div class="project-links">
                                    <a href="http://research.uru.ac.th/" class="project-link demo">🌐 Live Demo</a>
                                    
                                </div>
                            </div>
                        </div>
                                         </div>

                     <!-- 📊 Project Statistics -->
                     
                     
                    
                </div>
            </div>

            <!-- Activities Panel -->
            <div class="content-panel" id="activities">
                <div class="welcome-container">
                    <!-- 🎯 Activities Header -->
                    <div class="activities-header">
                        <h2 class="activities-title">Activities and experiences</h2>
                        <p class="activities-subtitle">ประสบการณ์การทำงานและการเข้าร่วมกิจกรรมต่างๆ ที่สร้างทักษะและความรู้ใหม่</p>
                    </div>

                    <!-- 🎨 Activities Grid -->
                    <div class="activities-grid">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/activiyt1.jpg" alt="Workshop Development" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Workshop</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">ASEAN Geospatial Challenge 2025</h3>
                                <p class="activity-description">
                                จากการแข่งขัน ASEAN Geospatial Challenge 2025 ซึ่งจัดขึ้นโดย GeoWorks ภายใต้ Singapore Land Authority โดยการแข่งขันครั้งนี้มีทีมเข้าร่วมถึง 35 ทีม 
                                จากกลุ่มประเทศอาเซียน รวมผู้เข้าร่วมทั้งสิ้น 111 คน ซึ่งประเทศไทยได้ส่งเข้าร่วมแข่งขัน 2 ทีม จากมหาวิทยาลัยราชภัฏอุตรดิตถ์ประกอบไปด้วย ทีม PhoenixReign จากคณะเทคโนโลยีอุตสาหกรรม สาขาวิศวกรรมคอมพิวเตอร์ และทีม Astrax Nova จากคณะเทคโนโลยีอุตสาหกรรม 
                                สาขาวิชาเทคโนโลยีสำรวจและภูมิสารสนเทศ และทั้ง 2 ทีมได้คว้ารางวัล Merit Award พร้อมรับเกียรติบัตรและเงินรางวัล
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 21 เมษายน 2568</span>
                                    <span class="info-tag">👥 ผู้เข้าร่วม: 111 คน</span>
                                    <span class="info-tag">📍 สถานที่:ระบบ Zoom Meeting </span>
                                </div>
                                <div class="activity-links">
                                    
                                    <a href="pdf/PhoenixReign.pdf" class="activity-link cert">🏆 ใบประกาศ</a>
                                </div>
                            </div>
                        </div>

                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/activiyt2.jpg" alt="Conference Presentation" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Conference</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">Experiential Learning Program 2024</h3>
                                <p class="activity-description">
                                    ได้รับการคัดเลือกเป็นตัวแทนมหาลัย และผ่านการคัดเลือกรอบ "ระดับภูมิภาค" ในโครงการ Experiential Learning Program 2024 ✈️
                ภายใต้โปรแกรมการเรียนรู้จากประสบการณ์ เพื่อเร่งการเป็นผู้ประกอบการจากมหาวิทยาลัยในเครือข่ายอุทยานวิทยาศาสตร์ภูมิภาคร่วมกับพันธมิตรระหว่างประเทศ ปีที่ 2 ”  
                โดยตัวแทนจะก้าวเข้าสู่การแข่งขันรอบ "ระดับประเทศ" ในวันที่  6-8 กรกฎาคม 2567 เพื่อคัดเลือกเป็นตัวแทนไปแลกเปลี่ยนประสบการณ์ในต่างประเทศ ร่วมกับเพื่อน ๆ จาก 16 มหาวิทยาลัยทั่วประเทศ ✈️
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 4 มิถุนายน 2567</span>
                                    <span class="info-tag">👥 ผู้เข้าร่วม: 60 คน</span>
                                    <span class="info-tag">📍 สถานที่: มหาวิทยาลัยขอนแก่น</span>
                                </div>
                                <div class="activity-links">
                                    <a href="img/activity2-2.jpg" class="activity-link photos">📸 ภาพกิจกรรม</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/activity3.jpg" alt="Hackathon Competition" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Competition</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">Cooperative Education Competition</h3>
                                <p class="activity-description">
                                ได้รับรางวัลรองชนะเลิศอันดับ 1 ในการแข่งขันรอบมหาวิทยาลัย และเป็นตัวแทนจากมหาวิทยาลัยในการเข้าร่วมการแข่งขันรอบภูมิภาค ภายใต้กิจกรรม Cooperative Education Competition 2024 ที่จัดขึ้นโดย ศูนย์พัฒนาคุณภาพการศึกษาบูรณาการกับการทำงาน มหาวิทยาลัยราชภัฏอุตรดิตถ์ การแข่งขันนี้เน้นการพัฒนาทักษะทั้งด้านการเรียนรู้เชิงวิชาการและการประยุกต์ใช้ความรู้ในสถานการณ์จริง การได้รับรางวัลและโอกาสเป็นตัวแทนมหาวิทยาลัยครั้งนี้จึงถือเป็นประสบการณ์ที่มีคุณค่าและเป็นแรงผลักดันให้ฉันมุ่งมั่นพัฒนาตัวเองต่อไปในด้านการศึกษาและการทำงานร่วมกับผู้อื่นอย่างมืออาชีพ
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 10 เมษายน 2568</span>
                                    <span class="info-tag">👥 ทีม: เดี่ยว</span>
                                    <span class="info-tag">🏆 รางวัล: รองชนะเลิศอันดับ 1</span>
                                </div>
                                <div class="activity-links">
                                    <a href="ac3-1.jpg" class="activity-link photos">📸 ภาพกิจกรรม</a>
                                    <a href="pdf/CWIE.pdf" class="activity-link project">🚀 โปรเจค</a>
                                </div>
                            </div>
                        </div>

                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/activity4.jpg" alt="Professional Training" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Competition</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">Startup Competition</h3>
                                <p class="activity-description">
                                ได้รับรางวัล ชนะเลิศอันดับ 1 ระดับมหาวิทยาลัย จากการแข่งขัน Startup Pitch Competition และได้รับเกียรติเป็นตัวแทนมหาวิทยาลัยเข้าร่วมการแข่งขัน ระดับภูมิภาค การแข่งขันดังกล่าวมุ่งเน้นการประเมินความคิดสร้างสรรค์ การวิเคราะห์ตลาด และความสามารถในการนำเสนอแนวคิดธุรกิจอย่างมีประสิทธิภาพ การเข้าร่วมการแข่งขันนี้เป็นประสบการณ์ที่มีคุณค่า 
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 21 พฤษภาคม 2567</span>
                                    <span class="info-tag">👥 ทีม: 5 คน</span>
                                    <span class="info-tag">🏆 รางวัล: ชนะเลิศอันดับ 1</span>
                                </div>
                                <div class="activity-links">
                                    <a href="img/ac5-1.jpg" class="activity-link photos">📸 ภาพกิจกรรม</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/activity5.jpg" alt="Volunteer Work" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Competition</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">Beyond Coding</h3>
                                <p class="activity-description">
                                ได้รับรางวัล ชมเชยอันดับ 1 พร้อมเงินรางวัล 10,000 บาท ในรอบ Showcase and Final Competition ของโครงการ Beyond Coding 17 จังหวัดภาคเหนือ ซึ่งเป็นส่วนหนึ่งของโครงการ Beyond Coding การเข้าร่วมการแข่งขันดังกล่าวเป็นประสบการณ์ที่มีคุณค่า 
                                ทำให้สามารถพัฒนาทักษะการคิดเชิงวิเคราะห์ การแก้ปัญหาเชิงเทคนิค และการนำเสนอผลงานอย่างมีประสิทธิภาพ
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 21 พฤษภาคม 2567</span>
                                    <span class="info-tag">👥 ทีม: 5 คน</span>
                                    <span class="info-tag">🏆 รางวัล: ชนะเลิศอันดับ 1</span>
                                </div>
                                <div class="activity-links">
                                    <a href="img/4-1.jpg" class="activity-link photos">📸 ภาพกิจกรรม</a>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="img/ac6.jpg" alt="Tech Meetup" class="activity-pic">
                                <div class="activity-overlay">
                                    <span class="activity-status">Competition</span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h3 class="activity-title">research to market (R2M)</h3>
                                <p class="activity-description">
                                ได้รับรางวัล รองชนะเลิศอันดับ 2 ระดับมหาวิทยาลัย จากการแข่งขัน Research to Market (R2M) และได้รับการคัดเลือกเพื่อเป็นตัวแทนมหาวิทยาลัยเข้าร่วมการแข่งขัน ระดับภูมิภาค การแข่งขันดังกล่าวเน้นการประยุกต์ผลงานวิจัยสู่เชิงพาณิชย์ ทำให้ได้ฝึกทักษะการวิเคราะห์โอกาสทางธุรกิจ การนำเสนอแนวคิดเชิงนวัตกรรม และการทำงานร่วมกับทีมอย่างมืออาชีพ
                                </p>
                                <div class="activity-info">
                                    <span class="info-tag">📅 วันที่: 9 พฤศจิกายน 2566</span>
                                    <span class="info-tag">👥 ทีม: 4 คน</span>
                                    <span class="info-tag">🏆 รางวัล: ชนะเลิศอันดับ 2</span>
                                </div>
                                <div class="activity-links">
                                    <a href="img/ac6-1.jpg" class="activity-link photos">📸 ภาพกิจกรรม</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 📊 Activities Statistics -->
                    
                    
                    
                </div>
            </div>

            <!-- Contact Panel -->
            <div class="content-panel" id="contact">
                <div class="welcome-container">
                    <!-- 🌟 Contact Header -->
                    <div class="contact-header">
                        <div class="contact-header-content">
                            <h2 class="contact-title">Let's Connect & Collaborate</h2>
                            
                            
                        </div>
                    </div>

                    <!-- 📱 Contact Information Cards -->
                    <div class="contact-grid">
                        <div class="contact-card primary">
                            <div class="contact-card-icon">
                                <span class="icon">📧</span>
                            </div>
                            <div class="contact-card-content">
                                <h3>Email</h3>
                                <p>ติดต่อโดยตรงผ่านอีเมล</p>
                                <a href="mailto:piyatida.sontawan@gmail.com" class="contact-action">
                                    piyatida.sontawan@gmail.com
                                </a>
                            </div>
                            <div class="contact-card-glow"></div>
                        </div>



                        <div class="contact-card">
                            <div class="contact-card-icon">
                                <span class="icon">📱</span>
                            </div>
                            <div class="contact-card-content">
                                <h3>Phone</h3>
                                <p>ติดต่อด่วนผ่านโทรศัพท์</p>
                                <a href="tel:+66631284795" class="contact-action">
                                    +66 63 128 4795
                                </a>
                            </div>
                            <div class="contact-card-glow"></div>
                        </div>
                    </div>

                    <!-- 🚀 Quick Contact Form -->
                    <div class="contact-form-section">
                        <div class="form-header">
                            <h3>ส่งข้อความด่วน</h3>
                            <p>หรือกรอกแบบฟอร์มด้านล่างเพื่อติดต่อ</p>
                        </div>
                        <div class="contact-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">ชื่อ *</label>
                                    <input type="text" id="name" name="name" placeholder="ชื่อของคุณ" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">อีเมล *</label>
                                    <input type="email" id="email" name="email" placeholder="อีเมลของคุณ" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">หัวข้อ *</label>
                                <input type="text" id="subject" name="subject" placeholder="หัวข้อที่ต้องการติดต่อ" required>
                                </div>
                            <div class="form-group">
                                <label for="message">ข้อความ *</label>
                                <textarea id="message" name="message" rows="5" placeholder="รายละเอียดที่ต้องการติดต่อ..." required></textarea>
                            </div>
                            <button type="submit" class="submit-btn">
                                <span class="btn-text">ส่งข้อความ</span>
                                <span class="btn-icon">🚀</span>
                            </button>
                        </div>
                    </div>

                    <!-- 🎯 Contact Statistics -->
                    

                    <!-- 💡 Why Choose Me -->
                    <div class="why-choose-section">
                        <h3>ทำไมต้องเลือกทำงานกับฉัน?</h3>
                        <div class="features-grid">
                            <div class="feature-item">
                                <span class="feature-icon">⚡</span>
                                <h4>รวดเร็ว</h4>
                                <p>พัฒนาและส่งมอบงานตามกำหนดเวลา</p>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">🎯</span>
                                <h4>แม่นยำ</h4>
                                <p>เข้าใจความต้องการและแก้ไขปัญหาได้ตรงจุด</p>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">🤝</span>
                                <h4>ร่วมมือ</h4>
                                <p>ทำงานเป็นทีมและสื่อสารได้ดี</p>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">🚀</span>
                                <h4>นวัตกรรม</h4>
                                <p>นำเทคโนโลยีใหม่ๆ มาใช้ในการพัฒนา</p>
                            </div>
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