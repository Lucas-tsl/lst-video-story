# 🎞️ LST Video Story Bubble (V8 - Final Armor)

Ce plugin WordPress sur-mesure permet d'intégrer des bulles de "Stories" interactives (style Instagram) sur les fiches produits WooCommerce. Il transforme l'expérience client en permettant de visualiser des vidéos de démonstration (Unboxing, Texture, Application) sans jamais quitter le site.

---

## ✨ Points Forts
- **Expérience Captive :** Double bouclier invisible (`.lst-guard`) qui bloque les liens sortants vers YouTube (titre, logo, partage).
- **Format 9:16 Vertical :** Lecteur optimisé pour les formats mobiles type TikTok/Shorts.
- **Performance & UX :** - **Skeleton Loader :** Pulsation visuelle pendant le chargement des GIFs.
    - **Memory Tracking :** Les bulles déjà vues deviennent grises (`localStorage`).
- **Slider "Aimanté" :** Défilement horizontal fluide sur mobile avec recalage automatique (*Scroll Snap*).
- **Compatibilité Mobile :** Forçage du mode `playsinline` pour éviter l'ouverture de l'app YouTube native sur iOS.

---

## 🛠️ Installation & Fichiers

Le plugin doit être structuré ainsi dans le dossier `/wp-content/plugins/lst-video-story/` :

1.  **`lst-video-story.php`** : Cœur du plugin (Shortcode + Nettoyage HTML).
2.  **`style.css`** : Design, Slider, et Sécurités anti-clic.
3.  **`script.js`** : Logique d'ouverture, Tracking GA4, et Gestion des vues.

---

## ⚙️ Configuration ACF (Advanced Custom Fields)

Pour que le plugin fonctionne, créez un groupe de champs assigné aux **Produits** avec les clés suivantes (répétez de 1 à 4) :

| ID du champ | Type | Description |
| :--- | :--- | :--- |
| `id_video_youtube_X` | Texte | L'ID de la vidéo (ex: `GfUYq9lvZLQ`). |
| `apercu_video_bulle_X` | Image | Le GIF animé ou l'image de la bulle. |
| `label_bulle_X` | Texte | Le texte sous la bulle (ex: "TEXTURE"). |

---

## 📖 Utilisation du Shortcode

Placez le code suivant dans votre modèle de page produit ou via votre constructeur de page (Gutenberg, Elementor, Divi) :

`[bulle_video_finale]`

---

## 🛡️ Sécurité du Lecteur (Sandwich Technique)

Pour empêcher le client de s'échapper sur YouTube, le plugin superpose des zones invisibles sur l'Iframe :
- **Zone Haute (25%) :** Bloque le titre et le bouton "Partager".
- **Zone Basse (18%) :** Bloque le logo YouTube et "Regarder sur YouTube".
- **Zone Centrale (Libre) :** Permet la mise en **Pause / Lecture** d'un simple clic.

---

## 💡 Conseils de Qualité
1. **Source :** Utilisez des vidéos uploadées en **1080p** sur YouTube.
2. **Traitement :** Attendez que YouTube ait terminé le traitement "HD" avant de juger la qualité sur le site.
3. **Mute :** La vidéo démarre sans son par défaut (obligatoire pour l'autoplay mobile). L'utilisateur peut l'activer via les contrôles YouTube au centre.

---

## 📝 Journal des modifications (Changelog)
- **v8.0 :** Ajout des "Guards" anti-clic et optimisation de la qualité `vq=hd1080`.
- **v7.0 :** Nettoyage automatique des balises `<p>` parasites de WordPress.
- **v6.0 :** Intégration du Skeleton Loader et du localStorage pour les vues.

---

**Propriété exclusive de : Les Senteurs Gourmandes.** *Développé pour une conversion e-commerce maximale.*