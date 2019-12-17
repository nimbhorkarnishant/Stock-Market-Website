
    // document.getElementById("getpost").addEventListener("click", getpost);
    // document.getElementById("getpost").addEventListener("click", )
    function getpost() {
      fetch(
          "https://newsapi.org/v2/everything?q=business&apiKey=bf01230214534ef59366fde091d800c0"
        )
        .then(function (res) {
          // console.log(res.json());
          return res.json();
        })
        .then(function (json) {
          let output = `<h2 style='text-align:center;margin-top:2rem;'>Business News</h2>`;

          output += `
            <div class="card-deck" style="width: 70vw; margin-top: 5rem;">
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[0].urlToImage}" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h5 class="card-title">${json.articles[0].title}</h5>
                  <p class="card-text">${json.articles[0].description}</p>
                  <a href="${json.articles[0].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[0].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[1].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[1].title}</h5>
                  <p class="card-text">${json.articles[1].description}</p>
                  <a href="${json.articles[1].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[1].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[3].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[3].title}</h5>
                  <p class="card-text">${json.articles[3].description}</p>
                  <a href="${json.articles[3].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[3].publishedAt}</small>
                </div>
              </div>
            </div>
            <div class="card-deck" style="width: 70vw; margin-top: 7rem;">
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[4].urlToImage}" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h5 class="card-title">${json.articles[4].title}</h5>
                  <p class="card-text">${json.articles[4].description}</p>
                  <a href="${json.articles[4].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[4].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[5].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[5].title}</h5>
                  <p class="card-text">${json.articles[5].description}</p>
                  <a href="${json.articles[5].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[5].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[6].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[6].title}</h5>
                  <p class="card-text">${json.articles[6].description}</p>
                  <a href="${json.articles[6].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[6].publishedAt}</small>
                </div>
              </div>
            </div>
            <div class="card-deck" style="width: 70vw; margin-top: 7rem;">
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[7].urlToImage}" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h5 class="card-title">${json.articles[7].title}</h5>
                  <p class="card-text">${json.articles[7].description}</p>
                  <a href="${json.articles[7].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[7].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[8].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[8].title}</h5>
                  <p class="card-text">${json.articles[8].description}</p>
                  <a href="${json.articles[8].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[8].publishedAt}</small>
                </div>
              </div>
              <div class="card" style="width: 12rem;">
                <img src="${json.articles[9].urlToImage}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">${json.articles[9].title}</h5>
                  <p class="card-text">${json.articles[9].description}</p>
                  <a href="${json.articles[9].url}" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">${json.articles[9].publishedAt}</small>
                </div>
              </div>
            </div>
            `;

          document.getElementById("post").innerHTML = output;
          console.log(json.articles[0].title);
        })
        .catch(err => console.log(err));
        setInterval(getchart(), 1000);

    }

    window.onload=function(){
      getpost()
    };
