/* Loader */
function ocultarLoader () {
    loader = document.getElementById("load");
    imgB1 = document.querySelector('.imgBienvenida1');
    imgB2 = document.querySelector(".imgBienvenida2");

    loader.classList.add("ocultar");
    loader.classList.remove("loader");
    $("body").removeClass("hide");
    imgB1.classList.add("inBurger");
    imgB2.classList.add("inHotdog");

    console.log("llego aqui");
}

setTimeout(ocultarLoader, 3000);

/*! Indicador de seccion en foco */
const option = document.querySelectorAll(".option");
const section = document.querySelectorAll("section");

function activeMenu() {
    let len = section.length;
    while (--len && window.scrollY + 70 < section[len].offsetTop) {}
    option.forEach((ltx) => ltx.classList.remove("active"));
    option[len].classList.add("active");
}

activeMenu();
window.addEventListener("scroll", activeMenu);

/* Boton home */
document.getElementById("btn_home").addEventListener("click", () => {
    window.scrollTo({
        top: 0,
    });
});

/* --------------------------------------------------- */
/* Animacion al hacer scroll con observer */
const img1 = document.getElementById("it1");
const img2 = document.getElementById("it2");
const img3 = document.getElementById("it3");
const img4 = document.getElementById("it4");

const imagenes = document.querySelectorAll('.itm');

const cargarImagen = (entradas, observador) => {
    entradas.forEach((entrada) => {
        if (entrada.isIntersecting) {
            entrada.target.classList.add('animarEntrada');
            
        } else {
            entrada.target.classList.remove("animarEntrada");
        }
    });
}; 

/*! Llamar el observer */
 const observador = new IntersectionObserver(cargarImagen, {
    /* Elemento al que se aplica el observador - null para el viewport*/
     root: null, 
    /* Establecer el margen requiere comillas si es diferente de cero */
     rootMargin: "300px", 
    /* Elegir cuanta parte de la imagen debe entrar para que se ejecute entre 0 y 1*/
     threshold: 1, 
});

/* Dentro de parentesis se elige el elemento, si para vigilar varios elementos, agregar varias veces con diferente parametro */
observador.observe(img1);
observador.observe(img2);
observador.observe(img3);
observador.observe(img4);


/* Segundo observer */
const options = {
    root: null,
    rootMargin: "200px",
    threshold: .9
}

const cb = (entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animarEntrada');
        } else {
            entry.target.classList.remove('animarEntrada');
        }
    });
}

let observer = new IntersectionObserver(cb, options);

imagenes.forEach(el => {
    observer.observe(el);
});


/* Ajax */

ventanaModal = document.getElementById("vModalVer");
function abrirVentana() {
    ventanaModal.style.left = "0";
    $("body").addClass("hide");
}

function cerrarVentana() {
    ventanaModal.style.left = "-100vw";
    $("body").removeClass("hide");
}

/* Funciones tipo Ajax */
function ordenar(proceso, id_producto) {
    console.log("proceso", proceso, "id", id_producto);
    if (proceso == 1) {
        abrirVentana();
        /* Carga los datos del producto */
        var parametros = {
            proceso: proceso,
            id: id_producto,
        };
        console.log(parametros);
    } else if (proceso == 2) {
        abrirVentana();
        /* genera formulario para los datos del usuario*/
        var parametros = {
            proceso: proceso,
            id: id_producto,
        };
        console.log(parametros);
    } else if (proceso == 3) {
        nombre_cliente = document.getElementById("nombre").value;
        contacto_cliente = document.getElementById("contacto").value;
        direccion_cliente = document.getElementById("direccion").value;
        cantidad = document.getElementById("cantidad").value;

        var parametros = {
            nombre_cliente: nombre_cliente,
            contacto_cliente: contacto_cliente,
            direccion_cliente: direccion_cliente,
            cantidad: cantidad,
            proceso: proceso,
            id: id_producto
        };
        /* oculta ventana de ordenar */
        cerrarVentana();
    }

    $.ajax({
        data: parametros,
        url: "../control/ordenar.php",
        type: "POST",
        beforeSend: function () {
            console.log("before");
        },
        error: function () {
            console.log("error");
        },
        success: function (mensaje) {
            console.log("sucess");
            $("#vModalContent").html(mensaje);
        },
    });
}