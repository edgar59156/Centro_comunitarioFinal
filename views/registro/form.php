<form method="POST" action="registro.php?accion=register">
    <section class="mb-5" style="padding: 1%;">
        <br>
        <h1 class="mb-5 text-center"><strong>Registrarse</strong></h1>
        <br>
        <br>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form">
                            <input type="text" id="form3Example1" class="form-control" name="nombre" />
                            <label class="form-label" for="form3Example1">Nombre(s)</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form">
                            <input type="text" class="form-control" name="primer_apellido" />
                            <label class="form-label" >Apellido paterno </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form">
                            <input type="text" class="form-control" name="segundo_apellido" />
                            <label class="form-label" >Apellido materno</label>
                        </div>
                    </div>
                </div>
                <div class="form">
                    <input type="text" class="form-control" name="telefono" />
                    <label class="form-label" >Telefono</label>
                </div>
                <!-- Email input -->
                <div class="form mb-4">
                    <input type="email" id="form3Example3" class="form-control" name="correo" />
                    <label class="form-label" for="form3Example3">Correo</label>
                </div>
                <!-- Password input -->
                <div class="form mb-4">
                    <input type="password"  class="form-control" name="contrasena" />
                    <label class="form-label" >Crontraseña</label>
                </div>
                <!-- Submit button -->
                <br>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4" name="Guardar" value="Guardar">
                    Registrarse
                </button>
            </div>
        </div>
    </section>
</form>