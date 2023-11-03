$(document).ready(function () {
  const $searchInput = $("#form-search");
  const $suggestionList = $("#suggestion-list");
  let timeout;

  // Function to fetch suggestions
  function fetchSuggestions(searchQuery) {
    const data = {
      sources: specifiedTexts,
      search_query: searchQuery,
    };

    if (optionalCourseValue !=="") {
      data.course = optionalCourseValue;
    }
    $.ajax({
      type: "POST",
      url: "get_suggestions.php",
      data: data,
      success: function (data) {
        const suggestions = data; // Data is already HTML list elements
        $suggestionList.html(suggestions); // Append suggestions to the list

        if (suggestions.trim() !== "") {
          $suggestionList.show();
        } else {
          $suggestionList.hide();
        }
        // When a suggestion is clicked, fill in the input with the clicked suggestion
        $suggestionList.on("click", "div", function () {
          const clickedSuggestion = $(this).text().trim();
          $searchInput.val(clickedSuggestion);
          $(this).remove(); // Clear the suggestion list

          // Check if this suggestion is the last one
          const allSuggestions = $suggestionList.find("div");
          const lastIndex = allSuggestions.length - 1;
          const currentIndex = allSuggestions.index(this);

          if (currentIndex === lastIndex) {
            // This is the last suggestion
            $suggestionList.hide();
          }
        });

        // Click outside the suggestion box to hide it
        $(document).on("click", function (event) {
          if (
            !$suggestionList.is(event.target) &&
            $suggestionList.has(event.target).length === 0
          ) {
            $suggestionList.hide();
          }
        });

        // Prevent the click event on the suggestion list from propagating to the document
        $suggestionList.on("click", function (event) {
          event.stopPropagation();
        });
        if ($searchInput.val() === "") {
          $suggestionList.hide();
        }
      },
    });
  }

  // Function to handle input change
  function handleInputChange() {
    const searchQuery = $searchInput.val().trim();

    // Clear the suggestion list if input is empty
    if (searchQuery === "") {
      $suggestionList.empty();
      $suggestionList.hide();
    } else {
      // Use a debounce to limit AJAX calls
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        fetchSuggestions(searchQuery);
      }, 300); // Adjust the debounce delay as needed
    }
  }

  // Input change event handler
  $searchInput.on("input", handleInputChange);
});
