let operacionActual = '';
let operacionPendiente = '';
let resultado = 0;

function actualizarFechaHora() {
    const fechaHoraDiv = document.getElementById('fecha-hora');
    const fecha = new Date();

    const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    const diaSemana = diasSemana[fecha.getDay()];
    const dia = fecha.getDate();
    const mes = meses[fecha.getMonth()];
    const año = fecha.getFullYear();
    const hora = fecha.getHours().toString().padStart(2, '0');
    const minutos = fecha.getMinutes().toString().padStart(2, '0');
    const segundos = fecha.getSeconds().toString().padStart(2, '0');

    const fechaHoraTexto = `${diaSemana}, ${dia} de ${mes} de ${año}, ${hora}:${minutos}:${segundos}`;
    fechaHoraDiv.textContent = fechaHoraTexto;
}

// Actualizar cada segundo
setInterval(actualizarFechaHora, 1000);
actualizarFechaHora();


function convertir() {
    // Tasa de conversión de Pesos Mexicanos (MXN) a Dólares (USD)
    const tasaDeCambio = 0.050; // 1 peso = 0.055 dólares (ejemplo)

    // Obtener el valor ingresado por el usuario
    const pesos = document.getElementById('pesos').value;

    // Validar si el campo no está vacío y es un número válido
    if (pesos === '' || isNaN(pesos) || pesos <= 0) {
        document.getElementById('resultado').textContent = "Por favor, ingresa un valor válido.";
        return;
    }

    // Convertir pesos a dólares
    const dolares = pesos * tasaDeCambio;

    // Mostrar el resultado
    document.getElementById('resultado').textContent = `${pesos} pesos mexicanos son equivalentes a $${dolares.toFixed(2)} dólares.`;
}



function agregarValor(valor) {
    operacionActual += valor;
    document.getElementById('pantalla').value = operacionActual; // Actualizamos la pantalla
}

function operacion(operador) {
    if (operacionActual === '') return;  // Evita que se realicen operaciones sin valores previos
    operacionPendiente = operador;
    resultado = parseFloat(operacionActual);
    operacionActual = '';  // Limpia la pantalla para el siguiente valor
    document.getElementById('pantalla').value = ''; // Limpia la pantalla
}

function calcular() {
    if (operacionActual === '') return;  // Evita cálculos sin un segundo número
    let valorActual = parseFloat(operacionActual);
    switch (operacionPendiente) {
        case '+':
            resultado += valorActual;
            break;
        case '-':
            resultado -= valorActual;
            break;
        case '*':
            resultado *= valorActual;
            break;
        case '/':
            resultado /= valorActual;
            break;
        default:
            return;  // Si no hay operación pendiente, no hace nada
    }
    document.getElementById('pantalla').value = resultado;  // Mostramos el resultado en la pantalla
    operacionActual = '';  // Reiniciamos los valores
    operacionPendiente = '';
}

function reset() {
    operacionActual = '';
    operacionPendiente = '';
    resultado = 0;
    document.getElementById('pantalla').value = ''; // Limpiamos la pantalla
}
function submitQuiz() {
    let score = 0;
    const answers = {
        q1: '2006',
        q2: 'Red',
        q3: '1989 World Tour',
        q4: 'White Horse',
        q5: 'Miss Americana'
    };

    const userAnswers = new FormData(document.getElementById('quiz-form'));

    for (const [key, value] of userAnswers.entries()) {
        if (value === answers[key]) {
            score++;
        }
    }

    const result = document.getElementById('result');
    result.innerHTML = `Tu puntuación es: ${score}/5`;

    // Cambia el color del resultado según el puntaje
    if (score === 5) {
        result.style.color = 'green';
    } else if (score >= 3) {
        result.style.color = 'orange';
    } else {
        result.style.color = 'red';
    }
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden");
        e.preventDefault();
    }
});
