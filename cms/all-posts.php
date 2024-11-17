<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #all-posts {
    padding: 20px;
}

#search-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
}

#sort-select {
    padding: 10px;
}

.posts-container {
    display: flex;
    flex-wrap: wrap;
}

.post {
    width: calc(33% - 40px);
}

    </style>
</head>
<body>
<section id="all-posts">
    <h2>Wszystkie wpisy</h2>
    
    <!-- Wyszukiwarka -->
    <input type="text" id="search-input" placeholder="Szukaj w blogu...">
    
    <!-- Sortowanie -->
    <select id="sort-select">
        <option value="date_desc">Sortuj od najnowszych</option>
        <option value="date_asc">Sortuj od najstarszych</option>
        <option value="title_asc">Sortuj alfabetycznie (A-Z)</option>
        <option value="title_desc">Sortuj alfabetycznie (Z-A)</option>
    </select>

    <!-- Lista postów -->
    <div class="posts-container" id="posts-container">
        <!-- Posty będą ładowane dynamicznie przez AJAX -->
        <!-- Przykład jednego postu -->
        <div class="post">
            <h3><a href="post1.html">Tytuł wpisu 1</a></h3>
            <p>Krótki opis pierwszego wpisu...</p>
        </div>
        <!-- Więcej postów -->
    </div>

</section>


<script>
    document.getElementById('search-input').addEventListener('input', function() {
   const query = this.value.toLowerCase();
   fetchPosts(query);
});

document.getElementById('sort-select').addEventListener('change', function() {
   const sortOption = this.value;
   fetchPosts(null, sortOption);
});

function fetchPosts(searchQuery = '', sortOption = 'date_desc') {
   // Przykład zapytania AJAX do serwera (można użyć Fetch API lub jQuery)
   fetch(`fetch_posts.php?query=${searchQuery}&sort=${sortOption}`)
      .then(response => response.json())
      .then(data => {
         const postsContainer = document.getElementById('posts-container');
         postsContainer.innerHTML = ''; // Wyczyść poprzednie wyniki

         data.posts.forEach(post => {
            const postElement = document.createElement('div');
            postElement.classList.add('post');
            postElement.innerHTML = `
               <h3><a href="${post.url}">${post.title}</a></h3>
               <p>${post.excerpt}</p>`;
            postsContainer.appendChild(postElement);
         });
      });
}

</script>
    
</body>
</html>