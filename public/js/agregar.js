



// Constantes para el div contenedor de los inputs y el botón de agregar
const contenedor = document.querySelector('#dinamic');
const btnAgregar = document.querySelector('#agregar');

// Variable para el total de elementos agregados
let total = 1;

/**
 * Método que se ejecuta cuando se da clic al botón de agregar elementos
 */
btnAgregar.addEventListener('click', e => {
    let div = document.createElement('div');
    div.innerHTML = `<label class="text-black">${total++}</label>:
    <input onkeyup="obtnerTelefonos()" type="text" id="telefono[]" name="telefono[]" placeholder="TELEFONO" required> 
    <button class="btn btn-danger btn-sm" onclick="eliminar(this)"><i class="fas fa-trash"></i></button>  
    <br></br>
    `;
    contenedor.appendChild(div);
})

/*Funcion para obtner los numero cada que se oprime una tecla en el input id=telefono */
function obtnerTelefonos(){
    //Obtner valaroes de todos los inputs name='telefono[]'
    var values = $("input[name='telefono[]']")
              .map(function(){return $(this).val();}).get();
    //Crear una cadena de texto con los numeros de los inputs id=telefono y separarlos con una coma
    var txtTelefonos = values.toString();
    //Asignamos mediante Jquery la cadena de texto al input del formulario agregar persona para enviar al back
    $("#telefonos").val(txtTelefonos);
}

/**
 * Método para eliminar el div contenedor del input
 * @param {this} e
 */
const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    actualizarContador();
};

/**
 * Método para actualizar el contador de los elementos agregados
*/
const actualizarContador = () => {
    let divs = contenedor.children;
    total = 1;
    for (let i = 0; i < divs.length; i++) {
        divs[i].children[0].innerHTML = total++;
    }//end for

};
