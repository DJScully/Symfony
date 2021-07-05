/*<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">
											Autor
										</label>
										<input type="text" name="autor" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
									</div>

									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">
											Tipo
										</label>
										<input type="text" name="tipo" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
									</div></div>*/
document.addEventListener("readystatechange", cargarEventos, false);

function cargarEventos(evento) {
    if(document.readyState == "interactive") {
        document.getElementById("id_autores").addEventListener("change",serv,false);
    }
}
  function serv(){
    
  }
  