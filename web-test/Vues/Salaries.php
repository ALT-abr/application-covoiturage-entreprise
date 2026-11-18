<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salariés - Covoiturage entreprise</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container">

        <p class="hero-tag">Gestion de l'entreprise</p>
        <h1>Liste des salariés</h1>

        <p class="description">
            Retrouvez tous les salariés et leur service.
        </p>

        <?php if ($erreur !== null): ?>

            <p class="error" role="alert">
                <?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?>
            </p>

        <?php elseif (empty($salaries)): ?>

            <p class="empty">Aucun salarié enregistré.</p>

        <?php else: ?>

            <p class="description">
                <?= count($salaries) ?>
                salarié<?= count($salaries) > 1 ? 's' : '' ?> enregistré<?= count($salaries) > 1 ? 's' : '' ?>
            </p>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Service</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($salaries as $salarie): ?>
                            <tr>
                                <td><?= (int) $salarie['id_employe'] ?></td>

                                <td>
                                    <?= htmlspecialchars($salarie['nom_employe'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($salarie['prenom_employe'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($salarie['email'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($salarie['nom_service'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>

        <a class="btn btn-secondaire trajet-retour"
           href="index.php?page=accueil">
            Retour à l'accueil
        </a>

    </main>

    <footer class="pied">Projet covoiturage entreprise</footer>

</body>
</html>