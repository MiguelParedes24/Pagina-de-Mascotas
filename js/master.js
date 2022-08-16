function armoFormulario(){
  var contenido = document.querySelector('.contenedor-form');

  var formulario = '<form method="post" action="">';
  formulario += '<div class="divBotones">';
  formulario += '<input id="idEncontrado"name="animalitoEncontrado" type="submit" value = "Animal Encontrado"><br>';
  formulario += '<input id="idPerdido" name="animalitoPerdido" type="submit" value = "Animal Perdido">';
  formulario += '</div>';
  formulario += '</form>';

  contenido.innerHTML+= formulario;
}
