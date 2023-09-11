let botones = document.querySelectorAll('[data-target="#modaleditar"]');
botones.forEach((btn) => {
  btn.addEventListener("click", function () {
    // Obtener columnas desde TR padre:
    let tds = this.closest("tr").querySelectorAll("td");
    // Obtener ID desde el botón
    let id = this.dataset.id;
    // Obtener datos por contenido de TD:
    let nombre = tds[1].innerText;
    let password = tds[2].innerText;
    // Asignar datos a ventana modal:
    document.querySelector("#id").value = id;
    document.querySelector("#usuarioEditar").value = nombre;
    document.querySelector("#passwordEditar").value = password;
    console.log("abrir modal");
    $("#modaleditar").modal();
  });
});
