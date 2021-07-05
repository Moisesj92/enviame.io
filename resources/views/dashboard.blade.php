<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Compañías</h2>
                    <br />
                    <x-table />
                </div>
            </div>
        </div>
    </div>


    @push('scripts')

    <script type="text/javascript">
        //Iniciar al cargar la pagina
        (() => {

            //Definiciones y variables
            const companyBaseWebRoute = "{{ route('companyweb.store')}}";
            const companyListWebRoute = "{{ route('companyweb.list') }}";
            const getCompanyTableButton = document.getElementById("getCompanyTable");
            const companyTable = document.getElementById("companiesTable");
            const companyTableBody = document.getElementById("companiesTableBody");

            let companyTableRows = [{
                id: 1,
                name: "Example",
                rut: ""
            }];

            //Eventos
            getCompanyTableButton.addEventListener("click", function() {

                //Bloquear boton
                this.disabled = true;

                //Consultar registros al API
                getCompaniesTableRows();


            }, false);

            //Functions
            function renderCompanyTableBodyHtml(companies) {

                let companyTableRowsHtml = "";

                companies.forEach(company => {

                    companyTableRowsHtml += `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        ${company.name}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    ${ (typeof company.rut === 'undefined' || company.rut == null ) ? "" : company.rut }
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-button-link class="ml-4 bg-gray-600" :href="__('${companyBaseWebRoute}/edit/${company.id}')">
                                    {{ __('Editar') }}
                                </x-button-link>
                                <button class="deleteCompany inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" data-companyid="${company.id}"> Eliminar </button>
                            </td>
                        </tr>`;

                });

                companyTableBody.innerHTML = companyTableRowsHtml;

                //Atachment de eventos para nuevos botones
                document.querySelectorAll('.deleteCompany').forEach( (element) => {
                    element.addEventListener('click', function() {
                        this.disabled = true;
                        deleteCompany(this.dataset.companyid);
                    }, false);
                });

            }

            function emptyCompanyTableBodyHtml() {
                let companyTableRowsHtml = "";
                companyTableRowsHtml = `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap" colspan="3">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Sin registros
                                </div>
                            </div>
                        </td>
                    </tr>
                    `;
                companyTableBody.innerHTML = companyTableRowsHtml;

            }

            function getCompaniesTableRows() {

                axios.get(companyListWebRoute,{
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                }).then((response) => {

                    if (response.status == 200) {
                        //Limpiar Registros Actuales
                        emptyCompanyTableBodyHtml();
                        //Renderizar nuevos registros
                        renderCompanyTableBodyHtml(response.data);
                    }

                }).catch((error) => {
                    console.log("error", error);
                }).then(() => {
                    getCompanyTableButton.disabled = false;
                });

            }

            function deleteCompany(companyId) {

                axios.delete(companyBaseWebRoute + '/' + companyId,{
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                }).then((response) => {

                    if (response.status == 200) {
                        console.log("Eliminado", companyId);
                    }else{
                        console.log(response);
                    }

                }).catch((error) => {
                    console.log("error", error);
                }).then(() => {
                    //Renderizar nuevos registros
                    getCompaniesTableRows();
                });

            }

            //Ejecución



        })();
    </script>

    @endpush

</x-app-layout>