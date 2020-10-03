const search = instantsearch({
    indexName: "articles",
    searchClient: instantMeiliSearch(
      "http://127.0.0.1:7700/",
      "",
    )
  });
  
  search.addWidgets([
    instantsearch.widgets.searchBox({
      container: "#searchbox"
    }),
    instantsearch.widgets.hits({
      container: "#hits",
      templates: {
        item: `
          <div>
            <div class="hit-name">
              {{#helpers.highlight}}{ "attribute": "title" }{{/helpers.highlight}}
            </div>
          </div>
        `
      }
    })
  ]);
  
  search.start();