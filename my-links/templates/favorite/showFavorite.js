const createSpinner = () => {
    const spinnerContainer = document.createElement("div");
    const spinner = document.createElement("div");
    spinnerContainer.className = "spinner-container text-center mt-3 mb-3";
    spinner.className = "spinner-border";
    spinnerContainer.appendChild(spinner);
    return spinnerContainer;
}

const onScroll = () => {
    const spinner = createSpinner();
    if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 1)) {
        window.removeEventListener("scroll", onScroll);
        document.querySelector("main").appendChild(spinner);
        showFavorites(spinner);
    }
};

const showFavorites = (spinner) => {
    const xhr = new XMLHttpRequest();
    const sort = window.location.search || "?sort=desc"
    xhr.open("GET", `/api/favorites?${
        sort
    }&offset=${
        document.querySelectorAll(".favorite").length
    }`);
    xhr.onload = () => {
        document.querySelector("main").removeChild(spinner);
        const container = document.querySelector("main .row");
        const favorites = buildFavorites(xhr.response);
        if (favorites.length) {
            favorites.forEach(favorite => container.innerHTML += getFavoriteHTML(favorite));
            window.addEventListener("scroll", onScroll);
        }
    };
    xhr.send();
}

const buildFavorites = (response) => {

    const favorites = JSON.parse(response);
    favorites.forEach(favorite => {
        const hostExplode = favorite.href.split('/');
        favorite.favicon = `${hostExplode[0]}//${hostExplode[2]}/favicon.ico`;
        if ("www.youtube.com" === hostExplode[2]) {
            const videoSplit = favorite.href.split('watch?v=');
            if (1 < videoSplit.length) {
                favorite.preview = videoSplit[1].split("&")[0];
            }
        }
    });
    return favorites;
};

const getFavoriteHTML = (favorite) => {
    return `
        <div class="favorite col-6 col-md-4 col-lg-3 mt-3 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">
                        <img class="me-2"
                             src="${favorite.favicon}"
                             alt=""/>
                        <span>${favorite.title}</span>
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        ${favorite.preview
        ? `<iframe width="300" height="200"
                src="https://www.youtube.com/embed/${favorite.preview}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>`
        : favorite.description
        || '<span class="blockquote-footer">No description avalaible</span>'}
                    </p>
                </div>
                <div class="card-footer">
                    <a target="_blank" href="${favorite.href}" class="btn btn-primary">
                    Visit
                    </a>
                </div>
            </div>
        </div>
    `;
};

onScroll();
window.addEventListener("scroll", onScroll);
