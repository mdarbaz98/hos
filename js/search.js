var jsonData = null;


fetch("./productSearch.json")
  .then((response) => response.json())
  .then((json) => {
    jsonData = json;
  })
  .catch((err) => console.log(err));


const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

searchInput.addEventListener('input', handleSearch);

function handleSearch() {
    const searchText = searchInput.value.toLowerCase();
    const filteredData = jsonData.filter(item =>
        item.product_name.toLowerCase().includes(searchText) || item.slug.toLowerCase().includes(searchText)
    );
        if(searchText == ''){
            searchResults.style.display = "none"
        }else{
            searchResults.style.display = "block"
        }
    displayResults(filteredData);
}

function displayResults(results) {
    searchResults.innerHTML = '';

    if (results.length === 0) {
        searchResults.innerHTML = '<li>No results found.</li>';
    } else {
        results.forEach(item => {
            const li = document.createElement('li');
            const link = document.createElement('a');
            link.setAttribute("href", `${item.slug}`)
            link.textContent = `${item.product_name}`;
            li.appendChild(link)
            searchResults.appendChild(li);
        });
    }
}