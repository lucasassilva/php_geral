function contactForm() {
  return {
    formData: {
      name: "",
      email: "",
      phone: "",
      message: "",
    },
    sendHttpRequest() {
      return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        var url = "http://localhost:8080/email";
        var params =
          "name=" +
          this.formData.name +
          "&email=" +
          this.formData.email +
          "&phone=" +
          this.formData.phone +
          "&message=" +
          this.formData.message;

        xhr.open("post", url, true);
        xhr.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );

        xhr.onload = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            resolve(xhr.responseText);
          } else if (xhr.status === 404) {
            reject(new Error("Ocorreu um erro ao enviar o formulário"));
          }
        };

        xhr.send(params);
      });
    },
    submitForm() {
      this.sendHttpRequest()
        .then((response) => {
          console.log(response);
          this.formData.name = "";
          this.formData.email = "";
          this.formData.phone = "";
          this.formData.message = "";
        })
        .catch((err) => {
          console.log(err);
        });
    },
  };
}
