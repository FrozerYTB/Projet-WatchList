async function fetchMovieList() {
    try {
        const response = await fetch('https://api.themoviedb.org/3/authentication');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Erreur lors de la récupération de la liste de films : ', error);
    }
}

async function displayMovieList() {
    const movieList = await fetchMovieList();
    const movieListSection = document.getElementById('movie-list');

    movieList.forEach(movie => {
        const movieItem = document.createElement('div');
        movieItem.classList.add('movie-item');
        movieItem.innerHTML = `
            <h2>${movie.title}</h2>
            <p>${movie.synopsis}</p>
            <button onclick="showMovieDetails('${movie.id}')">Voir les détails</button>
        `;
        movieListSection.appendChild(movieItem);
    });
}

async function showMovieDetails(movieId) {
    // Logique pour récupérer les détails du film avec l'ID spécifié
    // Afficher les détails dans la section #movie-details
}

window.onload = displayMovieList;




const request = require('request');
