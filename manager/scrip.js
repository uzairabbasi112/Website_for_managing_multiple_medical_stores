       // Function to fetch search results from the backend
       function fetchSearchResults(query) {
        // Make an AJAX request to the backend PHP file
        // You can replace "backend.php" with the actual filename
        // and pass the query as a parameter in the request
        // Here's an example using jQuery's AJAX method
        $.ajax({
          url: "index.php",
          method: "POST",
          data: { query: query },
          success: function(response) {
            // Handle the response from the backend
            // and update the search results in the HTML
            var results = JSON.parse(response);
            var searchResults = document.getElementById("searchResults");
            searchResults.innerHTML = "";
      
            // Create a list item for each search result
            results.forEach(function(result) {
              var li = document.createElement("li");
              li.textContent = result;
              searchResults.appendChild(li);
            });
          }
        });
      }
      
      // Event listener for the search input
      var searchInput = document.getElementById("searchInput");
      searchInput.addEventListener("input", function() {
        var query = searchInput.value.trim();
        if (query !== "") {
          fetchSearchResults(query);
        } else {
          var searchResults = document.getElementById("searchResults");
          searchResults.innerHTML = "";
        }
      });