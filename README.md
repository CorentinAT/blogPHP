# BLOG PHP - Tp noté
## Table des Matières
## Table des Matières

1. [Intro / Contexte](#intro--contexte)
2. [Présentation rapide de la Base de Données](#présentation-rapide-de-la-base-de-données)
3. [Présentation du Code](#présentation-du-code)
    - [Découpage](#découpage)
    - [Fonctions](#fonctions)

## Intro / Contexte
Le projet vise à créer une application web de type "Blog". Ce projet comprend plusieurs fonctionnalités comme la connexion utilisateur, la liste et création d'articles, la gestion des catégories, etc.

### Accessibilité

Nous avons pris plusieurs mesures pour rendre notre site accessible :

- Utilisation de balises HTML sémantiques pour aider les lecteurs d'écran à naviguer plus facilement sur le site.
- Contraste élevé entre le texte et l'arrière-plan pour faciliter la lecture.
- Testé pour l'accessibilité sur différents navigateurs.

### Gestion des Erreurs

Une autre priorité a été la robustesse de l'application, notamment en ce qui concerne la gestion des erreurs :

- Messages d'erreur clairs et descriptifs en cas de problèmes, aidant ainsi l'utilisateur à comprendre ce qui ne va pas et comment le corriger.
- Validation côté serveur en plus de la validation côté client pour une sécurité accrue.

En résumé, ce projet vise à créer un blog accessible, robuste et convivial, en mettant l'accent sur une expérience utilisateur exceptionnelle.

## Présentation rapide de la Base de Données
Nous avons utilisé une base de données MySQL qui comprend les tables suivantes :

![Base de donée](./BD.png)

* User: Stocke les informations des utilisateurs

* Article : Contient les articles publiés
* Categories : Pour les différentes catégories d'articles
