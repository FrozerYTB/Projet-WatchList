async function fetchFilmList() {
    try {
        const response = await fetch('');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Erreur lors de la récupération de la liste de films : ', error);
    }
}

// Fonction pour afficher les films sur la page
async function displayFilmList() {
    const filmList = await fetchAnimeList();
    const filmListSection = document.getElementById('anime-list');

    filmList.forEach(anime => {
        const filmItem = document.createElement('div');
        filmItem.classList.add('anime-item');
        filmItem.innerHTML = `
            <h2>${film.title}</h2>
            <p>${film.synopsis}</p>
            <button onclick="showFilmDetails('${film.id}')">Voir les détails</button>
        `;
        filmListSection.appendChild(filmItem);
    });
}

// Fonction pour afficher les détails d'un film sélectionné
async function showFilmDetails(animeId) {
    // Logique pour récupérer les détails du film avec l'ID spécifié
    // Afficher les détails dans la section #film-details
}

// Appel de la fonction pour afficher la liste de film au chargement de la page
window.onload = displayFilmList;