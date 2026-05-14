<?php
// ===== TRAITEMENT FORMULAIRE DE CONTACT =====
$erreurs_contact=[];
$succes_contact= false;
$nom='';
$email='';
$message='';

// ===== TRAITEMENT DEMANDE DE PROJET =====
$proj_nom='';
$proj_email='';
$proj_type='';
$proj_delai='';
$proj_description='';
$erreurs_projet=[];
$succes_projet=false;
//formulaire contact
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formulaire_contact'])){
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if ($nom == '') {
        $erreurs_contact['nom'] = 'Le nom est obligatoire.';
    }
    if ($email == '') {
        $erreurs_contact['email'] = 'L\'email est obligatoire.';
    }
    if ($message == '') {
        $erreurs_contact['message'] = 'Le message est obligatoire.';
    }
    
    if (empty($erreurs_contact)) {
        $succes_contact = true;
    }
}

//demande de projet
 if ($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['formulaire_projet']))
    $proj_nom = $_POST['proj_nom'] ?? '';
    $proj_email = $_POST['proj_email'] ?? '';
    $proj_type = $_POST['proj_type'] ?? '';
    $proj_delai = $_POST['proj_delai'] ?? '';
   $proj_description=$_POST['proj_description']??'';
    
   if($proj_nom==''){ 
        $erreurs_projet['proj_nom']='Le nom est obligatoire.';
    }
    if($proj_email==''){
       $erreurs_projet['proj_email']='L\'email est obligatoire.';
    }
   if($proj_type=='') {
       $erreurs_projet['proj_type']='Le type de projet es obligatoire';
    }
    if($proj_description ==''){
        $erreurs_projet['proj_description']='La description est obligatoire';
    }
    
    if (empty($erreurs_projet)){
        $succes_projet=true;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact — COUMBA.DEV</title>
  <meta name="description" content="Contactez Coumba Dia pour vos projets web, IoT ou collaborations." />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <style>
    #dark-mode-toggle { display: none; }
    .icon-moon { display: inline; }
    .icon-sun  { display: none; }
    html:has(#dark-mode-toggle:checked) body {
      --rose-deep:#f06292;--rose-accent:#ff80ab;--rose-soft:#f48fb1;
      --rose-blush:#3d1a2e;--rose-pale:#2a0d1e;--dark:#fce4ec;
      --text-main:#f8d7e3;--text-light:#ce93b6;--text-muted:#8b5a72;
      --bg-main:#1a0a12;--bg-section:#200e18;--bg-card:#2d1a24;
      --border:rgba(240,98,146,0.2);
      --shadow:0 4px 30px rgba(0,0,0,0.4);--shadow-lg:0 20px 60px rgba(0,0,0,0.5);
      background:#1a0a12;color:#f8d7e3;
    }
    html:has(#dark-mode-toggle:checked) .navbar { background:rgba(26,10,18,0.94); }
    html:has(#dark-mode-toggle:checked) .footer  { background:#0d0509; }
    html:has(#dark-mode-toggle:checked) .icon-moon { display:none; }
    html:has(#dark-mode-toggle:checked) .icon-sun  { display:inline; }
    .erreur { color: #dc3545; font-size: 0.85rem; margin-top: 5px; }
    .succes { background: #d4edda; color: #155724; padding: 15px; margin: 20px; border-radius: 8px; }
    .succes-projet { background: #d4edda; color: #155724; padding: 15px; margin: 20px; border-radius: 8px; }
    .recap { background: #e8f4f8; padding: 15px; margin-top: 10px; border-radius: 5px; }
  </style>
</head>
<body>

<input type="checkbox" id="dark-mode-toggle" aria-label="Activer le mode sombre" />

<?php require '../composants/navigation.php'; ?>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="breadcrumb">
    <a href="../index.php">Accueil</a>
    <span>/</span>
    <span>Contact</span>
  </div>
  <h1>Travaillons <em>ensemble</em> 🌸</h1>
  <p>Une idée, un projet, une question ? Je serais ravie d'en discuter avec toi.</p>
</div>

<!-- ===== MESSAGE SUCCÈS CONTACT ===== -->
<?php if($succes_contact===true):?>
    <div class="succes">
        ✅ Message envoyé avec succès ! Merci de m'avoir contactée.
    </div>
<?php endif; ?>

<!-- ===== MESSAGE SUCCÈS PROJET ===== -->
<?php if($succes_projet===true): ?>
   <div class="succes-projet"> 
        <h3>✅ Demande de projet envoyée avec succès !</h3>
        <div class="recap">
           <P><strong> Nom : </strong> <?php echo $proj_nom; ?></p>
           <P><strong> Email : </strong> <?php echo $proj_email; ?></p>
           <P><strong> Type de projet: </strong> <?php echo $proj_type; ?></p>
           <P><strong> Délai : </strong> <?php echo $proj_delai; ?></p>
           <P><strong> Description: </strong> <?php echo $proj_description; ?></p>
           </div>
           </div>
           <?php endif; ?>

<!-- CONTACT -->
<section class="contact-page-section">
  <div class="contact-full-grid">

    <!-- Infos -->
    <div>
      <div class="contact-info">
        <h3>Parlons de ton projet</h3>
        <p>Je suis disponible pour des projets web, des systèmes IoT, des collaborations ou simplement pour échanger sur le développement.</p>

        <div class="contact-item">
          <div class="contact-icon">📧</div>
          <div class="contact-item-text">
            <strong>Email</strong>
            <a href="mailto:bistadiash@gmail.com">bistadiash@gmail.com</a>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">💻</div>
          <div class="contact-item-text">
            <strong>GitHub</strong>
            <a href="https://github.com/coumbadia-creator/PORTFOLLIO" target="_blank">github.com/coumbadia-creator</a>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div class="contact-item-text">
            <strong>Localisation</strong>
            <span>Sénégal 🇸🇳</span>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">⏰</div>
          <div class="contact-item-text">
            <strong>Disponibilité</strong>
            <span>Ouverte aux opportunités</span>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">📄</div>
          <div class="contact-item-text">
            <strong>CV</strong>
            <a href="../images/cv-coumba.pdf" download>Mon CV</a>
          </div>
        </div>
      </div>

      <!-- Carte disponibilité -->
      <div style="background:linear-gradient(135deg,var(--rose-deep),#6a0572);border-radius:12px;padding:2rem;color:#fff;margin-top:2rem;">
        <div style="font-size:2rem;margin-bottom:1rem;">🌸</div>
        <h4>Ouverte aux collaborations</h4>
        <p>Stage, projet freelance, ou simple échange technique — je suis disponible !</p>
      </div>
    </div>

    <!-- FORMULAIRES -->
    <div>

      <!-- Formulaire de contact -->
      <div class="form-card" style="margin-bottom:2rem;">
        <h3 class="form-title">✉️ Envoyer un message</h3>
        <form method="post">
         <input type="hiden" name= "formulaire_contact" value="1"> 
          
        <div class="form-row">
           <div class="form-group">  
            <label >Nom complet *</label>
            <input type="text" name="nom" value="<?php echo $nom; ?>">
            <?php if(isset($erreurs_contact['nom'])): ?>
              <div class="erreur"> <?php echo $erreurs_contact['nom']; ?></div>
              <?php endif; ?>
              <</div>
              <div class="form-group">
                <label> Email *</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <?php  if(isset($erreurs_contact['email'])): ?>
                  <div class="erreur"> <?php echo $erreurs_contact['email']; ?></div>
                  <?php endif; ?>

                  </div>

              </div>
            
              
             
             
                
           <div class="form-group">
            <label> Message *</label>
            <textarea name="message" rows="5"><?php echo $message; ?> </textarea>
            <?php if(isset($erreurs_contact['message'])): ?>
                <div class="erreur"> <?php echo $erreurs_contact['message']; ?></div>
                <?php endif; ?>

                  </div>
            
          
          
              
          
          <button type="submit" class="btn-submit">Envoyer le message 🌸</button>
        </form>
      </div>

      <!-- Formulaire demande de projet -->
      <div class="form-card">
        <h3 class="form-title">📋 Demande de projet</h3>
       <form method="post">
        <input type="hidden" name="formulaire_projet" value="1">
  
          
          <div class="form-row">
            <div class="form-group">
              <label>Nom *</label>
              <input type="text" name="proj_nom" value="<?php echo $proj_nom; ?>">
               <?php if(isset($erreurs_projet['proj_nom'])): ?>
                <div class="erreur"> <?php echo $erreurs_projet['proj_nom']; ?></div>
                <?php endif; ?>

                  </div>
             

                  <div class="form-group">
            
              <label>Email *</label>
              <input type="email" name="proj_email" value="<?php echo $proj_email; ?>">
               <?php if(isset($erreurs_projet['proj_email'])): ?>
                <div class="erreur"> <?php echo $erreurs_projet['proj_email']; ?></div>
                <?php endif; ?>

                  </div>
                  </div>
             
               
             
            huuj
          <div class="form-group">
            <label>Type de projet *</label>
            <select name="proj_type">
              <option value="">-- Choisissez --</option>
              <option value="Site web">Site web</option>
              <option value="Application mobile">Application mobile</option>
              <option value="IoT / Embarqué">IoT / Embarqué</option>
              <option value="Automatisation">Automatisation</option>
            </select>
            <?php if(isset($erreurs_projet['proj_type'])): ?>
                <div class="erreur"> <?php echo $erreurs_projet['proj_type']; ?></div>
                <?php endif; ?>
                </div>


            <
          
          <div class="form-group">
            <label>Délai souhaité</label>
            <select name="proj_delai">
              <option value="">-- Sélectionner --</option>
              <option value="Urgent">Urgent (moins de 2 semaines)</option>
              <option value="Normal">Normal (1 à 2 mois)</option>
              <option value="Flexible">Flexible</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Description *</label>
            <textarea name="proj_description" rows="5"><?php echo $proj_description; ?> </textarea>
        <?php if(isset($erreurs_projet['proj_description'])): ?>
                <div class="erreur"> <?php echo $erreurs_projet['proj_description']; ?></div>
                <?php endif; ?>
            
          
          <button type="submit" class="btn-submit">Soumettre le projet 🌸</button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- FOOTER -->
<?php require '../composants/footerprojets.php'; ?>
</body>
</html>