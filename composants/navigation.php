<!-- ===== NAVIGATION pages ===== -->

<?php
$page_courante=basename($_SERVER['PHP_SELF']);

?>
<nav class="navbar">
    <a href="../index.php" class="nav-logo">Coumba<span>.dev</span></a>
    <ul class="nav-links">
      <li><a href="../index.php">Accueil</a></li>
      <li><a href="../index.php#about">À propos</a></li>
      <li><a href="../index.php#skills">Compétences</a></li>
      <li><a href="projets.php" <?php if($page_courante==='projets.php') echo 'class="active"';?>>Projets
      </a>
      </li>
      <li><a href="../index.php#experience">Parcours</a></li>
      <li><a href="contact.php" <?php if($page_courante==='contact.php') echo 'class="nav-cta active"';else echo 'class="nav-cta"'; ?>>Me contacter</a></li>
    </ul>
    <div class="nav-right">
      <label for="dark-mode-toggle" class="dark-toggle-label" title="Mode sombre / clair">
        <span class="icon-moon">🌙</span>
        <span class="icon-sun">☀️</span>
      </label>
    </div>
  </nav>


  