document.addEventListener('DOMContentLoaded', function () {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');
    const darkMode = document.querySelector('.dark-mode');

    //Event listeners
    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    });

    darkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode-variables');
        darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
        darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    });


    //display users on page load
    displayUsers();
});


document.addEventListener('DOMContentLoaded', function () {
    const showAllLinks = document.querySelectorAll('.show-all-link');
    const showLessLinks = document.querySelectorAll('.show-less-link');
    const extraRows = document.querySelectorAll('.extra-row');

    showAllLinks.forEach((showAllLink, index) => {
        showAllLink.addEventListener('click', function (event) {
            event.preventDefault();
            extraRows[index].style.display = 'table-row';
            showAllLink.style.display = 'none';
            showLessLinks[index].style.display = 'inline-block';
        });
    });

    showLessLinks.forEach((showLessLink, index) => {
        showLessLink.addEventListener('click', function (event) {
            event.preventDefault();
            extraRows[index].style.display = 'none';
            showLessLink.style.display = 'none';
            showAllLinks[index].style.display = 'inline-block';
        });
    });
});

function toggleDetails(rowId) {
    const detailsId = 'details-' + rowId;
    const detailsDiv = document.getElementById(detailsId);
    if (detailsDiv.style.display === 'none') {
        detailsDiv.style.display = 'block';
    } else {
        detailsDiv.style.display = 'none';
    }
}

function toggleExtraRows() {
    const extraRows = document.querySelectorAll('.extra-row');
    const showAllLink = document.querySelector('.show-all-link');
    const showLessLink = document.querySelector('.show-less-link');
    extraRows.forEach(row => {
        if (row.style.display === 'none') {
            row.style.display = 'table-row';
            showAllLink.style.display = 'none';
            showLessLink.style.display = 'inline-block';
        } else {
            row.style.display = 'none';
            showAllLink.style.display = 'inline-block';
            showLessLink.style.display = 'none';
        }
    });
}

function toggleStatus() {
    var activeInput = document.getElementById('active');
    var toggleCheckbox = document.getElementById('active_toggle');

    if (toggleCheckbox.checked) {
        activeInput.value = 'YES';
    } else {
        activeInput.value = 'NO';
    }
}


