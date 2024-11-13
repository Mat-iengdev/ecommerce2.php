// Sélectionne l'élément body ou un container où tu veux que les logos tombent
const container = document.body;

// Fonction pour créer une nouvelle image
function createFallingLogo() {
    // Crée un élément <img> pour l'image/logo
    const logo = document.createElement('img');
    logo.src = './avertissement.png'; // Remplace avec ton image ou logo
    logo.classList.add('falling-logo');

    // Positionne l'image de façon aléatoire sur la largeur de la page
    logo.style.left = `${Math.random() * 100}vw`; // Position aléatoire en largeur
    logo.style.animationDuration = `${Math.random() * 5 + 3}s`; // Durée de l'animation aléatoire entre 3 et 8 secondes

    // Ajoute l'image à la page
    container.appendChild(logo);

    // Enlève l'image après qu'elle ait fini de tomber
    setTimeout(() => {
        logo.remove();
    }, 8000); // L'image sera supprimée après 8 secondes (plus longue que l'animation)
}

// Génère des logos toutes les 500ms
setInterval(createFallingLogo, 300);
