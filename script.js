const searchIcon = document.querySelector('.search-icon');
const popupOverlay = document.getElementById('popup');
const searchButton = document.getElementById('search-button');
const closeButton = document.getElementById('close');
const searchBar = document.getElementById('search-bar');
const message = document.getElementById('message');

searchIcon.addEventListener('click', () => {
    popupOverlay.style.display = 'flex';
});

searchButton.addEventListener('click', () => {
    const searchText = searchBar.value.trim().toLowerCase();
    const arrivals = document.querySelectorAll('.arrivals_card .arrivals_tag span');
    let found = false;

    arrivals.forEach((arrival) => {
        const title = arrival.textContent.trim().toLowerCase();
        if (title === searchText) {
            found = true;
        }
    });

    if (searchText === '') {
        message.textContent = 'The search bar is empty. Please fill it.';
    } else if (found) {
        message.textContent = `✔️ The book "${searchText}" is available in New Arrivals! 📚`;
    } else {
        message.textContent = `❌ Sorry, the book "${searchText}" is not in New Arrivals.`;
    }
});

popupOverlay.addEventListener('click', (e) => {
    if (e.target === popupOverlay) {
        popupOverlay.style.display = 'none';
    }
});
closeButton.addEventListener('click', (e) => {
    if (e.target === closeButton) {
        popupOverlay.style.display = 'none';
    }
});
