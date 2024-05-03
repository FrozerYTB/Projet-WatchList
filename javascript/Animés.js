async function fetchAnimeList() {
    try {
        const response = await fetch('https://api.myanimelist.net/v2');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Erreur lors de la récupération de la liste d\'animés : ', error);
    }
}

// Fonction pour afficher les animés sur la page
async function displayAnimeList() {
    const animeList = await fetchAnimeList();
    const animeListSection = document.getElementById('anime-list');

    animeList.forEach(anime => {
        const animeItem = document.createElement('div');
        animeItem.classList.add('anime-item');
        animeItem.innerHTML = `
            <h2>${anime.title}</h2>
            <p>${anime.synopsis}</p>
            <button onclick="showAnimeDetails('${anime.id}')">Voir les détails</button>
        `;
        animeListSection.appendChild(animeItem);
    });
}

// Fonction pour afficher les détails d'un anime sélectionné
async function showAnimeDetails(animeId) {
    // Logique pour récupérer les détails de l'anime avec l'ID spécifié
    // Afficher les détails dans la section #anime-details
}

// Appel de la fonction pour afficher la liste d'animés au chargement de la page
window.onload = displayAnimeList;