
<div class="container" style="padding: 3%;">
    <!--Section: Content-->
    <section>
        <div class="row">
            <div class="col-md-6 gx-5 mb-4">
                <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                    <img alt="..." src="/centro_comunitario/image/evento/<?php echo $datosEvento['fotografia']; ?>" class="img-fluid" style="width: 612px; height: 300px;" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                
            </div>

            <div class="col-md-6 gx-5 mb-4">
                <h4><strong><?php echo $datosEvento['evento']; ?></strong></h4>
                <p class="text-muted">
                    <?php echo $datosEvento['descripcion']; ?>
                </p>
                <p><strong>Impartido por:</strong></p>
                <p class="text-muted">
                    <?php echo $datosEventoInsc[0]['impartido_por'] ?> <br>
                </p>
                <p><strong>Horario:</strong></p>
                <p class="text-muted">
                    <?php echo $datosEvento['horario_inicio'] ?> -<?php echo $datosEvento['horario_fin'] ?>
                </p>
                <p><strong>Salon:</strong></p>
                <p class="text-muted">
                   <?php echo $datosEventoInsc[0]['salon'] ?>
                </p>
                <div class="col-md-6 gx-5 mb-4">
                <i class="btn btn-success bi bi-pencil"><a href="eventoUser.php?accion=inscribir&id_usuario=<?php echo $datos['id_usuario']?>&id_evento=<?php echo $datos['id_evento']?>" style="color: black;">Inscribir</a></i>
                </div>
            </div>
        </div>
    </section>
</div>
