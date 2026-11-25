<?php


include './config.php';
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit();
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PixelAI - Image Generator</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

<div class="app-container">

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">

    <div class="brand">
      <div class="brand-icon">
        <i class="fa-solid fa-wand-magic-sparkles"></i>
      </div>
      <span>Pixel<span>AI</span></span>
      <button class="close-sidebar" id="closeSidebar">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <button class="new-chat" id="newChat">
      <i class="fa-solid fa-plus"></i>
      New Generation
    </button>

    <div class="search-box">
      <i class="fa-solid fa-search"></i>
      <input type="text" id="searchInput" placeholder="Search history...">
    </div>

    <div class="sidebar-heading">WORKSPACE</div>

    <a href="#" class="sidebar-link active">
      <i class="fa-solid fa-image"></i>
      Image Generator
    </a>

    <a href="#" class="sidebar-link">
      <i class="fa-solid fa-compass"></i>
      Explore Gallery
    </a>

    <a href="#" class="sidebar-link">
      <i class="fa-solid fa-folder"></i>
      My Creations
    </a>

    <div class="sidebar-heading">RECENT GENERATIONS</div>

    <div class="history-list" id="historyList">
      <a href="#" class="history-item">Modern Architecture</a>
      <a href="#" class="history-item">Fantasy Landscape</a>
      <a href="#" class="history-item">Product Photography</a>
      <a href="#" class="history-item">Cyberpunk City</a>
    </div>

    <div class="sidebar-bottom">
      <div class="upgrade-card">
        <i class="fa-solid fa-crown"></i>
        <h6>Upgrade to Pro</h6>
        <p>Unlock more creative possibilities.</p>
        <button class="upgrade-btn">Explore Plans</button>
      </div>

      <div class="profile">
        <div class="avatar">JD</div>
        <div>
          <h6>John Doe</h6>
          <small>Free Plan</small>
        </div>
        <i class="fa-solid fa-ellipsis ms-auto"></i>
      </div>
    </div>

  </aside>

  <!-- Main Content -->
  <main class="main-content">

    <header class="topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="menu-btn" id="menuBtn">
          <i class="fa-solid fa-bars"></i>
        </button>
        <span class="page-title">Image Generator</span>
      </div>

      <div class="topbar-right">
        <button class="icon-btn">
          <i class="fa-regular fa-bell"></i>
        </button>
        <a href="./login.php"><button class="help-btn">Click to Logout</button></a>
      </div>
    </header>

    <!-- Workspace -->
    <section class="workspace" id="workspace">

      <div class="welcome-section">
        <div class="welcome-icon">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
        </div>

        <h1>Create something <span>amazing.</span></h1>
        <p>Transform your imagination into beautiful AI-generated images.</p>
      </div>

      <!-- Suggestions -->
      <div class="suggestions">
        <button class="suggestion-card" data-prompt="A futuristic luxury city at sunset">
          <i class="fa-solid fa-city"></i>
          <span>Architecture</span>
        </button>

        <button class="suggestion-card" data-prompt="A cinematic fantasy mountain landscape">
          <i class="fa-solid fa-mountain-sun"></i>
          <span>Landscape</span>
        </button>

        <button class="suggestion-card" data-prompt="Professional luxury product photography">
          <i class="fa-solid fa-camera"></i>
          <span>Photography</span>
        </button>

        <button class="suggestion-card" data-prompt="A beautiful futuristic digital artwork">
          <i class="fa-solid fa-palette"></i>
          <span>Digital Art</span>
        </button>
      </div>

      <!-- Chat Area -->
      <div class="chat-area" id="chatArea"></div>

      <!-- Prompt Box -->
      <div class="prompt-container">

        <textarea
          id="promptInput"
          rows="2"
          placeholder="Describe the image you want to create..."
        ></textarea>

        <div class="prompt-toolbar">

          <div class="prompt-options">
            <select id="imageSize">
              <option value="1:1">1:1 Square</option>
              <option value="16:9">16:9 Landscape</option>
              <option value="9:16">9:16 Portrait</option>
            </select>

            <select id="imageStyle">
              <option>Realistic</option>
              <option>3D Render</option>
              <option>Anime</option>
              <option>Digital Art</option>
              <option>Cinematic</option>
            </select>
          </div>

          <button class="generate-btn" id="generateBtn">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            Generate
          </button>

        </div>
      </div>

      <p class="footer-note">
        AI can make mistakes. Review your generated creations.
      </p>

    </section>

  </main>
</div>

<script src="./assets/script.js"></script>
</body>
</html>



<?php





?>