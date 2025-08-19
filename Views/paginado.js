document.addEventListener('DOMContentLoaded', () => {
    const rowsPerPageSelect = document.getElementById('rowsPerPage');
    let rowsPerPage = parseInt(rowsPerPageSelect.value);
    let currentPage = 1;

    function renderTable(data, page, rowsPerPage) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const paginatedItems = data.slice(start, end);

        for (let item of paginatedItems) {
            const row = document.createElement('tr');
            row.innerHTML = `
                <th scope="row">${item.Id_producto}</th>
                <td>${item.Marca_producto}</td>
                <td>${item.Cantidad_existentes}</td>
                <td>${item.año_elaboracion}</td>
                <td>${item.porcentaje_alcohol}</td>
                <td>${item.tipo}</td>
                <td>${item.volumen}</td>
                <td>${item.precio_producto}</td>
                <td><img height="100px" src="data:image/jpg;base64,${item.imagen}" /></td>
                <td>
                    <a href="EditarForm.php?Id=${item.Id_producto}" class="btn btn-warning">Editar</a>
                    <br>
                    <a href="../CRUD/EliminarDatos.php?Id=${item.Id_producto}" class="btn btn-danger">Eliminar</a>
                </td>
            `;
            tableBody.appendChild(row);
        }
    }

    function renderPagination(data, rowsPerPage) {
        const paginationDiv = document.getElementById('pagination');
        paginationDiv.innerHTML = '';

        const pageCount = Math.ceil(data.length / rowsPerPage);
        for (let i = 1; i <= pageCount; i++) {
            const button = document.createElement('button');
            button.innerText = i;
            button.addEventListener('click', () => {
                currentPage = i;
                renderTable(data, currentPage, rowsPerPage);
                updatePaginationButtons();
            });
            paginationDiv.appendChild(button);
        }
    }

    function updatePaginationButtons() {
        const buttons = document.querySelectorAll('.pagination button');
        buttons.forEach(button => {
            button.style.fontWeight = button.innerText == currentPage ? 'bold' : 'normal';
        });
    }

    rowsPerPageSelect.addEventListener('change', () => {
        rowsPerPage = parseInt(rowsPerPageSelect.value);
        currentPage = 1; // Reiniciar a la primera página
        renderTable(data, currentPage, rowsPerPage);
        renderPagination(data, rowsPerPage);
        updatePaginationButtons();
    });

    renderTable(data, currentPage, rowsPerPage);
    renderPagination(data, rowsPerPage);
    updatePaginationButtons();
});
