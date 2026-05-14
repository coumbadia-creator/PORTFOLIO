<?php
require_once '../composants/fonctions.php';

/* =========================
   TABLEAU DES PROJETS
========================= */

$projets = [

    [
        'titre' => 'Poubelle Intelligente Connectée',
        'description' => 'Projet IoT avec ESP32 et capteurs.',
        'technologies' => ['ESP32', 'IoT', 'Wi-Fi'],
        'image' => '../images/poubelle.jpeg'
    ],

    [
        'titre' => 'Mini Serveur DNS',
        'description' => 'Serveur DNS simplifié développé en Python.',
        'technologies' => ['Python', 'Réseaux', 'DNS'],
        'image' => '../images/dns.jpeg'
    ],

    [
        'titre' => 'Portfolio Personnel',
        'description' => 'Portfolio moderne avec mode sombre.',
        'technologies' => ['HTML', 'CSS', 'PHP'],
        'image' => '../images/portfolio.jpeg'
    ]

];


/* =========================
   RECHERCHE AVEC GET
========================= */

$mot_cle = nettoyer($_GET['q'] ?? '');

$resultats = [];

if ($mot_cle !== '') {

    foreach ($projets as $projet) {

        if (
            stripos($projet['titre'], $mot_cle) !== false ||
            stripos($projet['description'], $mot_cle) !== false
        ) {

            $resultats[] = $projet;
        }
    }

} else {

    $resultats = $projets;
}


/* =========================
   FORMULAIRE PROJET
========================= */

$proj_nom = '';
$proj_email = '';
$proj_type = '';
$proj_description = '';

$erreurs_projet = [];

$succes_projet = false;


/* =========================
   TRAITEMENT FORMULAIRE
========================= */

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['formulaire_projet'])
) {

    $proj_nom = trim($_POST['proj_nom'] ?? '');
    $proj_email = trim($_POST['proj_email'] ?? '');
    $proj_type = trim($_POST['proj_type'] ?? '');
    $proj_description = trim($_POST['proj_description'] ?? '');

    // Validation nom
    if ($proj_nom == '') {

        $erreurs_projet['proj_nom'] =
            'Le nom est obligatoire.';
    }

    // Validation email
    if ($proj_email == '') {

        $erreurs_projet['proj_email'] =
            'L’email est obligatoire.';

    } elseif (
        !filter_var($proj_email, FILTER_VALIDATE_EMAIL)
    ) {

        $erreurs_projet['proj_email'] =
            'Email invalide.';
    }

    // Validation type
    if ($proj_type == '') {

        $erreurs_projet['proj_type'] =
            'Le type de projet est obligatoire.';
    }

    // Validation description
    if ($proj_description == '') {

        $erreurs_projet['proj_description'] =
            'La description est obligatoire.';
    }

    // Succès
    if (empty($erreurs_projet)) {

        $succes_projet = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8" />

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />

    <title>
        Mes Projets — COUMBA.DEV
    </title>

    <meta
        name="description"
        content="Tous les projets de Coumba Dia : IoT, Python, HTML/CSS."
    />

    <link
        rel="stylesheet"
        href="../css/style.css"
    />

    <style>

        #dark-mode-toggle {
            display: none;
        }

        .erreur {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .succes-projet {
            background: #d4edda;
            color: #155724;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        }

        .recap {
            background: #e8f4f8;
            padding: 15px;
            margin-top: 10px;
            border-radius: 8px;
        }

    </style>

</head>

<body>

<input
    type="checkbox"
    id="dark-mode-toggle"
    aria-label="Activer le mode sombre"
/>

<?php require '../composants/navigation.php'; ?>

<!-- HERO -->

<div class="page-hero">

    <div class="breadcrumb">

        <a href="../index.php">
            Accueil
        </a>

        <span>/</span>

        <span>
            Projets
        </span>

    </div>

    <h1>
        Mes <em>Projets</em> ✦
    </h1>

    <p>
        Des réalisations concrètes — de l'IoT au web
        en passant par les réseaux.
    </p>

</div>


<!-- RECHERCHE -->

<section
    style="background:var(--bg-main);padding:3rem 5% 0;"
>

    <div class="projects-search">

        <form
            method="get"
            action=""
            style="width:100%;"
        >

            <input
                type="search"
                name="q"
                placeholder="Rechercher : Python, IoT, ESP32..."
                value="<?= htmlspecialchars($mot_cle) ?>"
                style="width:100%;padding:1rem;border-radius:10px;"
            />

        </form>

    </div>

</section>


<!-- RESULTATS -->

<section class="projects-page-section">

    <div class="projects-grid">

        <?php foreach ($resultats as $projet) : ?>

            <article class="project-card">

                <div class="project-img">

                    <img
                        src="<?= htmlspecialchars($projet['image']) ?>"
                        alt="<?= htmlspecialchars($projet['titre']) ?>"
                        class="project-screenshot"
                    />

                </div>

                <div class="project-info">

                    <!-- Technologies -->

                    <div class="project-tags">

                        <?php foreach ($projet['technologies'] as $tech) : ?>

                            <span>
                                <?= htmlspecialchars($tech) ?>
                            </span>

                        <?php endforeach; ?>

                    </div>

                    <!-- Titre -->

                    <h3>
                        <?= htmlspecialchars($projet['titre']) ?>
                    </h3>

                    <!-- Description -->

                    <p>
                        <?= htmlspecialchars($projet['description']) ?>
                    </p>

                </div>

            </article>

        <?php endforeach; ?>

    </div>


    <!-- AUCUN RESULTAT -->

    <?php if (empty($resultats)) : ?>

        <div style="text-align:center;padding:40px;">

            <p>
                😔 Aucun projet ne correspond
                à votre recherche.
            </p>

        </div>

    <?php endif; ?>

</section>


<!-- MESSAGE SUCCES -->

<?php if ($succes_projet === true): ?>

<div class="succes-projet">

    <h3>
        ✅ Demande envoyée avec succès !
    </h3>

    <div class="recap">

        <p>
            <strong>Nom :</strong>
            <?= htmlspecialchars($proj_nom) ?>
        </p>

        <p>
            <strong>Email :</strong>
            <?= htmlspecialchars($proj_email) ?>
        </p>

        <p>
            <strong>Type :</strong>
            <?= htmlspecialchars($proj_type) ?>
        </p>

        <p>
            <strong>Description :</strong><br>

            <?= nl2br(htmlspecialchars($proj_description)) ?>
        </p>

    </div>

</div>

<?php endif; ?>


<!-- DEMANDE -->

<section
    style="background:var(--bg-section);padding:5rem 5%;"
    id="demande"
>

    <div class="section-header">

        <span class="section-tag">
            Collaboration
        </span>

        <h2 class="section-title">
            Tu as un <em>projet</em> pour moi ?
        </h2>

        <div class="divider"></div>

        <p class="section-subtitle">
            Décris-moi ton projet et je te réponds rapidement.
        </p>

    </div>


    <div
        class="form-card"
        style="max-width:650px;margin:0 auto;"
    >

        <h3 class="form-title">
            📋 Soumettre une demande
        </h3>

        <form method="post">

            <input
                type="hidden"
                name="formulaire_projet"
                value="1"
            >

            <div class="form-row">

                <!-- NOM -->

                <div class="form-group">

                    <label for="req-name">
                        Votre nom *
                    </label>

                    <input
                        type="text"
                        id="req-name"
                        name="proj_nom"
                        value="<?= htmlspecialchars($proj_nom) ?>"
                    />

                    <?php if (isset($erreurs_projet['proj_nom'])): ?>

                        <div class="erreur">

                            ❌ <?= $erreurs_projet['proj_nom'] ?>

                        </div>

                    <?php endif; ?>

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="req-email">
                        Email *
                    </label>

                    <input
                        type="email"
                        id="req-email"
                        name="proj_email"
                        value="<?= htmlspecialchars($proj_email) ?>"
                    />

                    <?php if (isset($erreurs_projet['proj_email'])): ?>

                        <div class="erreur">

                            ❌ <?= $erreurs_projet['proj_email'] ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div>


            <!-- TYPE -->

            <div class="form-group">

                <label for="req-type">
                    Type de projet *
                </label>

                <select
                    id="req-type"
                    name="proj_type"
                >

                    <option value="">
                        Choisissez un type…
                    </option>

                    <option
                        value="web"
                        <?= $proj_type == 'web' ? 'selected' : '' ?>
                    >
                        Site web / Application web
                    </option>

                    <option
                        value="iot"
                        <?= $proj_type == 'iot' ? 'selected' : '' ?>
                    >
                        Système embarqué / IoT
                    </option>

                    <option
                        value="python"
                        <?= $proj_type == 'python' ? 'selected' : '' ?>
                    >
                        Script / Automatisation Python
                    </option>

                </select>

                <?php if (isset($erreurs_projet['proj_type'])): ?>

                    <div class="erreur">

                        ❌ <?= $erreurs_projet['proj_type'] ?>

                    </div>

                <?php endif; ?>

            </div>


            <!-- DESCRIPTION -->

            <div class="form-group">

                <label for="req-desc">
                    Description du projet *
                </label>

                <textarea
                    id="req-desc"
                    name="proj_description"
                    required
                ><?= htmlspecialchars($proj_description) ?></textarea>

                <?php if (isset($erreurs_projet['proj_description'])): ?>

                    <div class="erreur">

                        ❌ <?= $erreurs_projet['proj_description'] ?>

                    </div>

                <?php endif; ?>

            </div>


            <!-- BOUTON -->

            <button
                type="submit"
                class="btn-submit"
            >

                Envoyer la demande 🌸

            </button>

        </form>

    </div>

</section>


<!-- FOOTER -->

<?php require '../composants/footerprojets.php'; ?>

</body>
</html>