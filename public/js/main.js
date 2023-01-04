

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
    div.innerHTML = ` <label>${total++}</label> : <input type="text" id="telefono[]" name="telefono[]" placeholder="TELEFONO" required > 
   
    <button class="btn btn-danger" onclick="eliminar(this)">Eliminar </button><br></br> `;
        
    contenedor.appendChild(div);
    var numeros;
    numeros=document.getElementById("telefono[]");
    console.log(numeros.value);   

})

/**
 * Método para eliminar el div contenedor del input
 * @param {this} e 
 */
const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    total=total;
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
