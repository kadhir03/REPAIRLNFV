<div class="row g-5 g-xl-8">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                    </div>
                </div>
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filtros
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Opciones de Filtros</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->


                            <form class="form" action="?url_id=productos" method="POST" id="consultar_producto" name="consultar_producto" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" id="formulario" value="consultar_producto">
                                <div class="scroll-y mh-300px mh-lg-325px">
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Marca:</label>
                                            <input id="marca" name="marca" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Modelo:</label>
                                            <input id="modelo" name="modelo" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Referencia:</label>
                                            <input id="referencia" name="referencia" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" name="enviar" class="btn btn-primary" value="Filtrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php
                        if ($_SESSION['administrador'] == 1) {
                        ?>
                            <!--begin::Action-->
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key">
                                Crear Producto
                            </a>
                            <!--end::Action-->
                        <?php
                        }
                        ?>
                        <!--end::Crear-->
                    </div>

                    <!--begin::Group actions-->
                    <!--end::Group actions-->
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="card-scroll">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-185px"></th>
                                <th class="min-w-185px">Marca</th>
                                <th class="min-w-185px">Modelo</th>
                                <th class="min-w-185px">Referencia</th>
                                <th class="min-w-125px">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            <?php
                            if ($consulta != "") {
                                while ($fila = $consulta->fetch()) {
                            ?>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <td class="min-w-185px"></td>
                                        <td class="min-w-185px"><a href="?url_id=gestion_productos&id=<?= $fila['id']  ?>" target="_blank" class="btn btn-primary"><?= $fila['marca']  ?></a></td>
                                        <td class="min-w-125px"><?= $fila['modelo']  ?></td>
                                        <td class="min-w-185px"><?= $fila['referencia']  ?></td>
                                        <td class="min-w-125px">
                                            <?php
                                            if ($_SESSION['administrador'] == 1) {
                                                # code...
                                                if ($fila['estado'] == "activo") {
                                            ?>
                                                    <a href="?url_id=productos&accion=inactivo&id_accion=<?php echo $fila['id'] ?>">
                                                        <button type="button" class="btn btn-light-success me-3">
                                                            ACTIVO
                                                        </button>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="?url_id=productos&accion=activo&id_accion=<?php echo $fila['id'] ?>">
                                                        <button type="button" class="btn btn-light-danger me-3">
                                                            INACTIVO
                                                        </button>
                                                    </a>
                                            <?php
                                                }
                                            } else {
                                                echo $fila['estado'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <h2>Crear Producto</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <form id="crear_producto" name="crear_producto" class="form" action="?url_id=productos" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="formulario" id="formulario" value="crear_producto">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                                </svg>
                            </span>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-bold">
                                    <h4 class="text-gray-900 fw-bolder">Nota:</h4>
                                    <div class="fs-6 text-gray-700">Por favor!, diligenciar todos los campos</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-10 fv-row">
                            <div class="row">
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Marca</label>
                                    <input required name="marca" type="text" class="form-control form-control-solid" id="marca" />
                                </div>
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Modelo</label>
                                    <input required name="modelo" type="text" class="form-control form-control-solid" id="modelo" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Referencia</label>
                                    <input required name="referencia" type="text" class="form-control form-control-solid" id="referencia" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Imagen de Referencia</label>
                                    <input type="file" class="form-control " id="archivo[]" name="archivo[]" accept=".png">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer flex-center">
                            <input type="submit" name="enviar" id="enviar" value="Crear Usuario" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>