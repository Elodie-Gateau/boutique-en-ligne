<h2>Gestion des utilisateurs</h2>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $utilisateurs = UtilisateursController::listAllUsers();
        foreach ($utilisateurs as $user):
        ?>
            <tr>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['prenom']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= $user['admin'] ? 'Oui' : 'Non' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>