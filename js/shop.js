document.addEventListener('DOMContentLoaded', function() {
  var searchInput = document.getElementById('searchInput');
  var sortSelect = document.getElementById('sortSelect');

  searchInput.addEventListener('input', fetchProducts);

  sortSelect.addEventListener('change', fetchProducts);

  fetchProducts();
});

function fetchProducts() {
  var searchInput = document.getElementById('searchInput');
  var sortSelect = document.getElementById('sortSelect');

  var searchQuery = searchInput.value.trim();

  var sortOption = sortSelect.value;

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'fetch-shop.php?search=' + encodeURIComponent(searchQuery) + '&sort=' + sortOption);
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.getElementById('productList').innerHTML = xhr.responseText;
    } else {
      console.error('Req failed. Status: ' + xhr.status);
    }
  };
  xhr.send();
}
