<!-- ===== NAVIGATION accueil ===== -->
<?php
$page_courante=basename($_SERVER['PHP_SELF']);

?>
<nav class="navbar">
    <a href="index.php" class="nav-logo">Coumba<span>.dev</span></a>

    <ul class="nav-links">
      <li><a href="index.php" <?php if($page_courante==='index.php')echo'class="active"';?>>Accueil</a></li>
      <li><a href="#about">À propos</a></li>
      <li><a href="#skills">Compétences</a></li>
      <li><a href="pages/projets.php">Projets</a></li>
      <li><a href="#experience">Parcours</a></li>
      <li><a href="pages/contact.php" class="nav-cta">Me contacter</a></li>
    </ul>

    <div class="nav-right">
      <!-- Bouton mode sombre : label lié à la checkbox -->
      <label for="dark-mode-toggle" class="dark-toggle-label" title="Mode sombre / clair">
        <span class="icon-moon">🌙</span>
        <span class="icon-sun">☀️</span>
      </label>
    </div>
  </nav>
