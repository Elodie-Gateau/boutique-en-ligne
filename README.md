# 🛒 Projet : Boutique en Ligne

Ce projet est une boutique en ligne complète réalisée en PHP orienté objet et MySQL dans le cadre de la formation **Développeur Web et Web Mobile (DWWM)** chez Arinfo. Il propose une interface publique pour les utilisateurs et une interface d’administration pour gérer les produits, utilisateurs et commandes.

---

## ✨ Fonctionnalités clés

### 🎫 Côté utilisateurs
- Parcourir les produits par catégorie
- Rechercher un produit par nom ou description
- Ajouter un ou plusieurs produits au panier
- Modifier les quantités dans le panier
- S'inscrire, se connecter et accéder à son profil
- Valider une commande

### 🛠️ Côté administrateur
- Ajouter, modifier et supprimer un produit
- Activer ou désactiver un produit
- Gérer les utilisateurs (activer/désactiver un compte)
- Accéder à la liste des commandes passées

### 🖼 Gestion d’images
- Upload d’image lors de la création ou modification d’un produit
- Prévisualisation des images dans l’interface admin
- Stockage dans `public/images/products/`

---

## 🗃️ Base de données (MySQL)

### 🔗 Tables principales

- `utilisateurs` : comptes utilisateurs avec rôles (`admin`, `user`) et statut
- `produits` : catalogue des produits
- `commandes` : enregistrements de commande avec date
- `commandes_par_produits` : table de liaison entre commandes et produits

### 🔒 Intégrité
- Clés étrangères
- Suppression restreinte (`ON DELETE RESTRICT`) pour préserver l’historique

---

## 🛠️ Technologies utilisées

- **Langage back-end** : PHP 8+
- **Base de données** : MySQL / MariaDB
- **Serveur local** : XAMPP
- **Frontend** : HTML5, CSS3
- **Outils** : VS Code, Git, phpMyAdmin

---

## ⚙️ Installation et lancement

1. **Cloner le projet** :
```bash
git clone https://github.com/Elodie-Gateau/boutique_en_ligne.git
```

2. **Placer le dossier dans** `htdocs/` de XAMPP

3. **Importer la base de données** :
   - Ouvrir phpMyAdmin
   - Créer la base `boutique_en_ligne`
   - Importer le fichier `boutique_en_ligne.sql`

4. **Démarrer Apache & MySQL**, puis accéder à :
```
http://localhost/boutique_en_ligne
```

---

## 📁 Arborescence du projet

```
/boutique_en_ligne
├── controller/             # Contrôleurs PHP (MVC simplifié)
├── model/                  # Modèles de données (Produit, Utilisateur...)
├── repository/             # Requêtes vers la base (produits, utilisateurs...)
├── view/                   # Templates HTML
├── public/                 # Fichiers publics (images, CSS, JS...)
│   └── images/products/    # Uploads d'images
├── config/                 # Configuration et routeur
└── index.php               # Point d’entrée
```

---

## 🔐 Accès utilisateur

- Interface publique : accessible à tous
- Interface admin :
  - Ajouter/modifier des produits
  - Gérer utilisateurs
  - Voir commandes

---

## 🙋 Auteur

Projet réalisé par Maxime Vertueux, Fabien Thomas et Elodie Gateau dans le cadre de la formation DWWM chez **Arinfo**.

---

## 📜 Licence

Ce projet est fourni à des fins pédagogiques uniquement.
