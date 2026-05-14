<?php require_once 'composants/fonctions.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coumba.dev — Portfolio Développeuse Web</title>
  <meta name="description" content="Portfolio de Coumba Dia — Développeuse Web, HTML, CSS, JS, PHP." />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- ===== DARK MODE CSS PUR — checkbox hack ===== -->
  <style>
    /* La checkbox est cachée mais contrôle le mode sombre via CSS */
    #dark-mode-toggle { display: none; }

    /* Quand la checkbox est cochée, on applique les variables dark au body */
    #dark-mode-toggle:checked ~ body,
    #dark-mode-toggle:checked ~ * body {
      /* fallback pour navigateurs moins souples */
    }

    /* Solution : on met tout dans un wrapper avec le toggle en sibling */
    /* Alternative fiable : on stylise en ciblant le label + ~ body */
    /* Méthode la plus compatible : on applique la classe via :has() */
    html:has(#dark-mode-toggle:checked) body {
      --rose-deep:   #f06292;
      --rose-accent: #ff80ab;
      --rose-soft:   #f48fb1;
      --rose-blush:  #3d1a2e;
      --rose-pale:   #2a0d1e;
      --dark:        #fce4ec;
      --text-main:   #f8d7e3;
      --text-light:  #ce93b6;
      --text-muted:  #8b5a72;
      --bg-main:     #1a0a12;
      --bg-section:  #200e18;
      --bg-card:     #2d1a24;
      --border:      rgba(240, 98, 146, 0.2);
      --shadow:      0 4px 30px rgba(0,0,0,0.4);
      --shadow-lg:   0 20px 60px rgba(0,0,0,0.5);
      background: #1a0a12;
      color: #f8d7e3;
      transition: background 0.4s ease, color 0.4s ease;
    }

    html:has(#dark-mode-toggle:checked) .navbar {
      background: rgba(26,10,18,0.94);
    }

    html:has(#dark-mode-toggle:checked) .footer {
      background: #0d0509;
    }

    /* Icônes toggle */
    .icon-moon { display: inline; }
    .icon-sun  { display: none; }
    html:has(#dark-mode-toggle:checked) .icon-moon { display: none; }
    html:has(#dark-mode-toggle:checked) .icon-sun  { display: inline; }
  </style>
</head>
<body>

  <!-- ===== CHECKBOX DARK MODE (hors du flux visible) ===== -->
  <input type="checkbox" id="dark-mode-toggle" aria-label="Activer le mode sombre" />

  <?php require 'composants/navaccueil.php';?>

  <!-- ===== HERO ===== -->
  <section class="hero" id="home">
    <div class="hero-inner">

      <!-- Texte -->
      <div class="hero-text">
        <div class="hero-badge">Développeuse Web & Créatrice d'interfaces</div>

        <h1 class="hero-title">
          Bonjour, je suis<br>
          <em>Coumba Dia</em> 🌸<br>
          <span style="font-size:0.7em; font-style:normal;">Développeuse Web</span>
        </h1>

        <p class="hero-description">
          Passionnée par la création d'interfaces qui allient esthétique et fonctionnalité.
          Je crois que chaque ligne de code peut changer le quotidien des gens.
        </p>

        <div class="hero-actions">
          <a href="pages/projets.php" class="btn-primary">Voir mes projets ✦</a>
          <a href="pages/contact.php" class="btn-secondary">Me contacter →</a>
          <!-- Bouton téléchargement CV -->
          <a href="images/cv-coumba.pdf" download="CV-Coumba-Dia.pdf" class="btn-cv">
            Télécharger mon CV
          </a>
        </div>
      </div>

      <!-- Photo -->
      <div class="hero-visual">
        <div class="hero-image-wrapper">
          <!-- Remplace images/photo.jpg par ta vraie photo -->
          <img
            src="images/coumba.jpeg"
            alt="Photo de profil de Coumba Dia"
            class="hero-photo"
            onerror="this.style.display='none'; document.getElementById('hero-placeholder').style.display='flex';"
          />
          <div class="hero-photo-placeholder" id="hero-placeholder" style="display:none;">
            <div class="avatar-icon">🌸</div>
            <p>Ajoute ta photo<br><small>images/photo.jpg</small></p>
          </div>
          <div class="hero-float-card float-card-1">🌸 3 Projets réalisés</div>
          <div class="hero-float-card float-card-2">✅ Disponible pour projets</div>
        </div>
      </div>

    </div>
  </section>

  <!-- ===== STATS ===== -->
  <div class="stats-row">
    <div class="stat-item">
      <div class="stat-number">3+</div>
      <div class="stat-label">Projets réalisés</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">5+</div>
      <div class="stat-label">Technologies</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">1+</div>
      <div class="stat-label">An de formation</div>
    </div>
    <div class="stat-item">
      <div class="stat-number">∞</div>
      <div class="stat-label">Passion pour le code</div>
    </div>
  </div>

  <!-- ===== À PROPOS ===== -->
  <section class="about" id="about">
    <div class="about-grid">

      <!-- Image -->
      <div class="about-image-box">
        <div class="about-img-frame">
          <img
            src="images/coumba.jpeg"
            alt="Coumba Dia — Développeuse Web"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
          />
          <div class="about-img-fallback" style="display:none;">🌸</div>
        </div>
        <div class="about-badge">
          <span class="about-badge-num">2025</span>
          <span class="about-badge-label">En cours de formation</span>
        </div>
      </div>

      <!-- Texte -->
      <div class="about-content">
        <div class="section-tag">À propos de moi</div>
        <h2>Je suis <em>Coumba Dia</em> 🌸</h2>

        <p class="about-text">
         Je m’appelle Coumba Dia, étudiante en Licence 2 GLAR à l’ESTM. Passionnée par l’informatique, j’ai eu l’opportunité de réaliser plusieurs projets dans des domaines variés :
        </p>

         

        <p class="about-text">
          Systèmes Embarqués : Conception de solutions intelligentes.

Développement Web : Création d'applications interactives avec JavaScript.

Programmation Système : Développement robuste en C++.

Curieuse et déterminée, je recherche constamment à allier mes connaissances en réseaux et en développement pour bâtir des systèmes performants.

        <div class="about-highlights">
          <div class="highlight-item"><span class="highlight-dot"></span>Développement Front-End</div>
          <div class="highlight-item"><span class="highlight-dot"></span>Design Responsive</div>
          <div class="highlight-item"><span class="highlight-dot"></span>PHP & MySQL</div>
          <div class="highlight-item"><span class="highlight-dot"></span>Systèmes Embarqués</div>
          <div class="highlight-item"><span class="highlight-dot"></span>Python & Réseaux</div>
          <div class="highlight-item"><span class="highlight-dot"></span>Git & GitHub</div>
        </div>

        <div class="about-actions">
          <a href="pages/projets.php" class="btn-primary">Voir mes projets →</a>
          <a href="images/cv-coumba.pdf" download="CV-Coumba-Dia.pdf" class="btn-cv">Mon CV</a>
        </div>
      </div>

    </div>
  </section>

  <!-- ===== COMPÉTENCES ===== -->
  <section class="skills" id="skills">
    <div class="section-header">
      <span class="section-tag">Compétences</span>
      <h2 class="section-title">Ce que je <em>maîtrise</em></h2>
      <div class="divider"></div>
      <p class="section-subtitle">Technologies web, embarqué et réseaux.</p>
    </div>

    <div class="skills-grid">

      <!-- Développement Web -->
      <div class="skill-category">
        <div class="skill-cat-icon"></div>
        <h3 class="skill-cat-title">Développement Web</h3>
        <div class="skill-bar-list">
          <div class="skill-bar-item">
            <div class="skill-bar-header">
              <span class="skill-bar-name">HTML5</span>
              <span class="skill-bar-pct">90%</span>
            </div>
            <div class="skill-bar-track"><div class="skill-bar-fill" style="width:90%"></div></div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-header">
              <span class="skill-bar-name">CSS3</span>
              <span class="skill-bar-pct">85%</span>
            </div>
            <div class="skill-bar-track"><div class="skill-bar-fill" style="width:85%"></div></div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-header">
              <span class="skill-bar-name">JavaScript</span>
              <span class="skill-bar-pct">65%</span>
            </div>
            <div class="skill-bar-track"><div class="skill-bar-fill" style="width:65%"></div></div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-header">
              <span class="skill-bar-name">PHP & MySQL</span>
              <span class="skill-bar-pct">60%</span>
            </div>
            <div class="skill-bar-track"><div class="skill-bar-fill" style="width:60%"></div></div>
          </div>
        </div>
      </div>

      <!-- IoT & Embarqué -->
      <div class="skill-category">
        <div class="skill-cat-icon"></div>
        <h3 class="skill-cat-title">IoT & Systèmes Embarqués</h3>
        <div class="skill-tags">
          <span class="skill-tag">ESP32</span>
          <span class="skill-tag">Arduino</span>
          <span class="skill-tag">Capteurs</span>
          <span class="skill-tag">Wi-Fi</span>
          <span class="skill-tag">I2C / LCD</span>
          <span class="skill-tag">DHT11</span>
          <span class="skill-tag">LED & Buzzer</span>
        </div>
      </div>

      <!-- Python & Réseaux -->
      <div class="skill-category">
        <div class="skill-cat-icon"></div>
        <h3 class="skill-cat-title">Python & Réseaux</h3>
        <div class="skill-tags">
          <span class="skill-tag">Python</span>
          <span class="skill-tag">DNS & IP</span>
          <span class="skill-tag">Protocoles Réseau</span>
          <span class="skill-tag">Simulation</span>
        </div>
      </div>

      

    </div>
  </section>

  <!-- ===== PROJETS (aperçu) ===== -->
  <section class="projects" id="projects">
    <div class="section-header">
      <span class="section-tag">Mes Réalisations</span>
      <h2 class="section-title">Projets <em>récents</em></h2>
      <div class="divider"></div>
      <p class="section-subtitle">Des projets concrets, réalisés avec soin.</p>
    </div>
<div class="projects-grid">

  <article class="project-card">
    <div class="project-img" style="background: linear-gradient(135deg, #c2185b, #f48fb1);">
      <img src="images/poubelle.jpeg" alt="Capture d'écran de l'interface Poubelle intelligente" class="project-screenshot" />
      <div class="project-icon"></div>
    </div>
    <div class="project-info">
      <div class="project-tags">
        <span>ESP32</span><span>IoT</span><span>Wi-Fi</span>
      </div>
      <h3>Poubelle Intelligente Connectée</h3>
      <p>Système embarqué ESP32 : détection de présence par capteur ultrason, ouverture automatique du couvercle, tableau de bord web en temps réel (température, humidité, état).</p>
      <a href="pages/projets.php" class="project-link">Voir le projet →</a>
    </div>
  </article>

  <article class="project-card">
    <div class="project-img" style="background: linear-gradient(135deg, #6a0572, #c2185b);">
      <img src="images/dns.jpeg" alt="Capture de terminal du Mini serveur DNS" class="project-screenshot" />
      <div class="project-icon"></div>
    </div>
    <div class="project-info">
      <div class="project-tags">
        <span>Python</span><span>Réseaux</span><span>DNS</span>
      </div>
      <h3>Mini Serveur DNS</h3>
      <p>Serveur DNS simplifié en Python : résolution de noms de domaine, base simulée, cache DNS et gestion des domaines inconnus. Projet de compréhension des réseaux.</p>
      <a href="pages/projets.php" class="project-link">Voir le projet →</a>
    </div>
  </article>

  <article class="project-card">
    <div class="project-img" style="background: linear-gradient(135deg, #e91e8c, #fce4ec);">
      <img src="images/portfolio.jpeg" alt="Capture d'écran du Portfolio Personnel" class="project-screenshot" />
      <div class="project-icon">🌸</div>
    </div>
    <div class="project-info">
      <div class="project-tags">
        <span>HTML5</span><span>CSS3</span><span>Responsive</span>
      </div>
      <h3>Portfolio Personnel</h3>
      <p>Conception d'un portfolio moderne et responsive : présentation, compétences, projets, formulaires de contact et demandes de projets. Mode sombre inclus.</p>
      <a href="pages/projets.php" class="project-link">Voir le projet →</a>
    </div>
  </article>

</div>

    </div>

    <div style="text-align:center; margin-top:3rem;">
      <a href="pages/projets.php" class="btn-primary">Voir tous les projets ✦</a>
    </div>
  </section>

  <!-- ===== EXPÉRIENCES ===== -->
  <section class="experience" id="experience">
    <div class="section-header">
      <span class="section-tag">Parcours</span>
      <h2 class="section-title">Mon <em>parcours</em></h2>
      <div class="divider"></div>
      <p class="section-subtitle">Ma progression dans le développement web.</p>
    </div>
 <p>
<div class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-body">
          <div class="timeline-date">2023 - 2024</div>
 
          <div class="timeline-title">Baccalauréat Scientifique mention passable-SERIE S2 Lycée des Parcelles Assainies unité13</div>
          
        </div>
      </div>
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-body">
          <div class="timeline-date">2024 — 2025</div>
          <div class="timeline-title">Licence 1 Génie Logiciel & Administration Réseau</div>
          
            
          </p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-body">
          <div class="timeline-date">2025 en cours</div>
         
          <div class="timeline-title">Licence 2 Génie Logiciel & Administration Réseau</div>
          
        </div>
      </div>

      

      <div class="no-experience" style="display:none;">
        <p>Pas encore d'expérience professionnelle — mais les projets sont là pour prouver mes compétences !</p>
        <a href="pages/projets.html" class="btn-secondary" style="display:inline-flex; margin-top:0.5rem;">Voir mes projets</a>
      </div>
    </div>
  </section>

  <!-- ===== CTA CONTACT ===== -->
  <div class="cta-banner">
    <h2>Tu as un projet ? <em>Discutons-en</em> 🌸</h2>
    <p>Je suis disponible pour des projets, stages ou collaborations. N'hésite pas !</p>
    <a href="pages/contact.php">Me contacter ✦</a>
  </div>

  <?php require 'composants/footeracceuil.php';?>

</body>
</html>