function readPost() {
  return {
    posts: new Array(),
    sendHttpRequest() {
      return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        var url = "http://localhost:8080/api/v1/posts";
        xhr.open("get", url, true);
        xhr.responseType = "json";
        xhr.onload = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            resolve(xhr.response);
          } else if (xhr.status === 404) {
            reject(new Error("Nenhum registro foi encontrado"));
          }
        };
        xhr.send();
      })
    },
    getData() {
      this.sendHttpRequest().then(response => {
        response.forEach(data => {
          this.posts.push(data);
        })
      }).catch(err => {
        console.log(err);
      })
    }
  };
}
