function createPost() {
  return {
    formData: {
      title: "",
      body: "",
    },
    sendHttpRequest() {
      return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        var url = "http://localhost:8080/api/v1/posts";
        var params =
          "title=" + this.formData.title + "&body=" + this.formData.body;

        xhr.open("post", url, true);
        xhr.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );

        xhr.onload = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            resolve(xhr.responseText);
          } else if (xhr.status === 404) {
            reject(new Error("Ocorreu um erro ao cadastrar uma postagem"));
          }
        };

        xhr.send(params);
      });
    },
    submitForm() {
      this.sendHttpRequest()
        .then((_) => {
          this.formData.title = "";
          this.formData.body = "";
          window.location.href = "index.html";
        })
        .catch((err) => {
          console.log(err);
        });
    },
  };
}
