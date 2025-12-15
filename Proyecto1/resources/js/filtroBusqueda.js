/**
 * Sistema de filtro para múltiples tablas en vista global.
 * Filtra automáticamente según la pestaña activa.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

class VistaGlobalFilter {
    constructor() {
        this.buscarInput = document.getElementById('buscar');
        this.searchBtn = document.getElementById('search-btn');
        this.tabButtons = document.querySelectorAll('.tabs-btn');
        this.currentTab = 1; // Pestaña por defecto

        this.tabConfigs = {
            1: { // Usuarios
                container: '.content-section-1',
                items: '.member',
                searchFields: ['nombre', 'email', 'rol'],
                dataAttributes: ['data-nombre', 'data-email', 'data-rol']
            },
            2: { // Solicitudes superUsuario
                container: '.content-section-2',
                items: '.su-request-item',
                searchFields: ['nombre', 'correo'],
                dataAttributes: ['data-nombre', 'data-correo']
            },
            3: { // Proyectos
                container: '.content-section-3',
                items: '.cardProyectoId',
                searchFields: ['titulo', 'descripcion', 'estado'],
                dataAttributes: ['data-titulo', 'data-descripcion', 'data-estado']
            },
            4: { // Grupos
                container: '.content-section-4',
                items: '.grupoCard:not(#anadir)',
                searchFields: ['descripcion', 'miembros'],
                dataAttributes: ['data-descripcion', 'data-miembros']
            },
            5: { // Incidencias
                container: '.content-section-5',
                items: '.incidencia-item',
                searchFields: ['descripcion', 'nombreUser'],
                dataAttributes: ['data-descripcion', 'data-nombre-user']
            }
        };

        this.init();
    }

    init() {
        if (!this.buscarInput) return;

        // Detectar pestaña activa inicial
        this.detectActiveTab();

        // Configurar eventos
        this.setupEvents();

        // Aplicar filtro inicial si hay valor
        if (this.buscarInput.value) {
            this.applyFilter(this.buscarInput.value);
        }
    }

    detectActiveTab() {
        // Buscar botón activo
        this.tabButtons.forEach(btn => {
            if (btn.classList.contains('btn-active')) {
                this.currentTab = parseInt(btn.dataset.tab);
            }
        });

        // Si no se encuentra, usar la primera
        if (!this.currentTab) {
            this.currentTab = 1;
        }
    }

    setupEvents() {
        // Evento en input de búsqueda
        this.buscarInput.addEventListener('input', (e) => {
            this.applyFilter(e.target.value);
        });

        // Evento en botón de búsqueda
        if (this.searchBtn) {
            this.searchBtn.addEventListener('click', () => {
                this.applyFilter(this.buscarInput.value);
            });
        }

        // Evento en cambio de pestaña
        const tabContainer = document.querySelector('#tab-container');
        if (tabContainer) {
            tabContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('tabs-btn')) {
                    setTimeout(() => {
                        this.detectActiveTab();
                        this.applyFilter(this.buscarInput.value);
                    }, 50);
                }
            });
        }

        // Tecla Enter para buscar
        this.buscarInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.applyFilter(this.buscarInput.value);
            }
        });
    }

    applyFilter(searchTerm) {
        const config = this.tabConfigs[this.currentTab];
        if (!config) return;

        const container = document.querySelector(config.container);
        if (!container) return;

        const items = container.querySelectorAll(config.items);
        const searchLower = searchTerm.toLowerCase().trim();

        // Si no hay término, mostrar todo
        if (!searchLower) {
            items.forEach(item => {
                item.style.display = '';
                item.classList.remove('filtered-out');
            });
            this.updateCounter(items.length, items.length);
            return;
        }

        let visibleCount = 0;

        items.forEach(item => {
            let matches = false;

            // Buscar en atributos de datos
            config.dataAttributes.forEach(attr => {
                const value = item.getAttribute(attr);
                if (value && value.toLowerCase().includes(searchLower)) {
                    matches = true;
                }
            });

            // Si no tiene atributos de datos, buscar en texto
            if (!matches) {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchLower)) {
                    matches = true;
                }
            }

            // Buscar en campos específicos según la pestaña
            if (!matches && config.searchFields) {
                config.searchFields.forEach(field => {
                    const element = item.querySelector(`[data-field="${field}"]`);
                    if (element && element.textContent.toLowerCase().includes(searchLower)) {
                        matches = true;
                    }
                });
            }

            // Mostrar u ocultar
            item.style.display = matches ? '' : 'none';
            item.classList.toggle('filtered-out', !matches);

            if (matches) visibleCount++;
        });

        this.updateCounter(visibleCount, items.length);
    }

    updateCounter(visible, total) {
        // Actualizar contador en el input (opcional)
        const counter = document.getElementById('filter-counter');

        if (!counter) {
            // Crear contador si no existe
            const counterEl = document.createElement('span');
            counterEl.id = 'filter-counter';
            counterEl.className = 'filter-counter';
            counterEl.textContent = ` (${visible}/${total})`;

            // Insertar después del input
            if (this.buscarInput.parentNode) {
                this.buscarInput.parentNode.appendChild(counterEl);
            }
        } else {
            counter.textContent = ` (${visible}/${total})`;
        }
    }

    clearFilter() {
        this.buscarInput.value = '';
        this.applyFilter('');

        const counter = document.getElementById('filter-counter');
        if (counter) {
            counter.remove();
        }
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.vistaGlobalFilter = new VistaGlobalFilter();

    // También hacer disponible para otros scripts
    if (typeof window.appFilters === 'undefined') {
        window.appFilters = {};
    }
    window.appFilters.vistaGlobal = window.vistaGlobalFilter;
});