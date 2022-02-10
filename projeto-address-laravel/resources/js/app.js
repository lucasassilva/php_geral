function hideCityAndStreet() {
    var inputCity = document.getElementById("city");
    var labelCity = inputCity.previousElementSibling;
    var inputStreet = document.getElementById("street");
    var labelStreet = inputStreet.previousElementSibling;
    if (document.getElementById("viacep_manual1").checked) {
        inputCity.style.display = "none";
        inputStreet.style.display = "none";
        labelCity.style.display = "none";
        labelStreet.style.display = "none";
    } else if (document.getElementById("viacep_manual2").checked) {
        inputCity.style.display = "block";
        inputStreet.style.display = "block";
        labelCity.style.display = "block";
        labelStreet.style.display = "block";
    }
}

function dataTable() {
    $(document).ready(function () {
        $("#table").DataTable({
            paging: true,
            ordering: true,
            searching: false,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
            }
        });
    });
}

function maskCep() {
    $("#cep").mask("00000-000");
}

function sweetAlert(event) {
    event.preventDefault();
    var form = document.getElementById("form-delete");
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success-msg",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Você deseja excluir este registro?",
            text: "Você não será capaz de reverter isso!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Não, cancelar!",
            closeOnConfirm: false,
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
}

function validationFields() {
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
}
window.addEventListener("load", hideCityAndStreet);
window.addEventListener("load", validationFields);
window.addEventListener("load", dataTable);
window.addEventListener("load", maskCep);
document.getElementById("viacep_manual1").addEventListener("click", hideCityAndStreet);
document.getElementById("viacep_manual2").addEventListener("click", hideCityAndStreet);
document.getElementById("btn-delete-submit").addEventListener("click", sweetAlert);
