// Cargar farmacia seleccionada
document.addEventListener("DOMContentLoaded", () => {
    const cadena = localStorage.getItem("farmaciaCadena");
    const sucursal = localStorage.getItem("farmaciaSucursal");
    
    const elementoFarmacia = document.getElementById("farmacia-seleccionada");
    
    if (cadena && sucursal) {
        elementoFarmacia.textContent = `${cadena} — Sucursal ${sucursal}`;
    }
});

// Toggle del formulario de escribir receta
function toggleTextarea() {
    const container = document.getElementById('textarea-container');
    if (container) {
        if (container.classList.contains('d-none')) {
            container.classList.remove('d-none');
            container.offsetHeight; // Forzar reflow
            container.style.animation = 'slideDown 0.4s ease-out';
        } else {
            container.style.animation = 'slideUp 0.3s ease-out';
            setTimeout(() => {
                container.classList.add('d-none');
            }, 300);
        }
    }
}

// Agregar medicamento a la tabla
function agregarMedicamento() {
    const medication = document.getElementById('medication').value.trim();
    const quantity = document.getElementById('quantity').value.trim();
    
    if (!medication || !quantity || quantity <= 0) {
        Swal.fire({
            title: 'Campos incompletos',
            text: 'Por favor, completa todos los campos correctamente',
            icon: 'warning',
            confirmButtonColor: '#005B96'
        });
        return;
    }
    
    const tbody = document.getElementById('prescriptionDescription');
    const count = parseInt(document.getElementById('medications_count').value) + 1;
    
    // Si es el primer medicamento, limpiar mensaje
    if (count === 1) {
        tbody.innerHTML = '';
    }
    
    // Crear nueva fila
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${count}</td>
        <td>${medication}</td>
        <td>${quantity}</td>
        <td class="text-center">
            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarMedicamento(this)">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    
    tbody.appendChild(row);
    
    // Actualizar contador
    document.getElementById('medications_count').value = count;
    
    // Limpiar campos
    document.getElementById('medication').value = '';
    document.getElementById('quantity').value = '';
    document.getElementById('inStock').value = '0';
    
    // Animación de entrada
    row.style.animation = 'slideDown 0.3s ease-out';
}

// Eliminar medicamento de la tabla
function eliminarMedicamento(button) {
    const row = button.closest('tr');
    const tbody = document.getElementById('prescriptionDescription');
    
    // Animación de salida
    row.style.animation = 'fadeOut 0.3s ease-out';
    
    setTimeout(() => {
        row.remove();
        
        // Actualizar números
        const rows = tbody.querySelectorAll('tr');
        rows.forEach((r, index) => {
            const firstCell = r.querySelector('td:first-child');
            if (firstCell) {
                firstCell.textContent = index + 1;
            }
        });
        
        // Actualizar contador
        document.getElementById('medications_count').value = rows.length;
        
        // Si no hay medicamentos, mostrar mensaje
        if (rows.length === 0) {
            tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted">No hay medicamentos agregados</td></tr>';
        }
    }, 300);
}

// Event listener para el botón agregar
document.addEventListener('DOMContentLoaded', function() {
    const btnAgregar = document.getElementById('btnAgregar');
    
    if (btnAgregar) {
        btnAgregar.addEventListener('click', agregarMedicamento);
    }
});