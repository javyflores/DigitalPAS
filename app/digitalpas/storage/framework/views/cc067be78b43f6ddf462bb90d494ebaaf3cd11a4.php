<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Oficio MPPE</title>

  <style>

    /* Estilos generales */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /*tamaño del documento*/
    @page  {
      size: letter;
      margin: 2cm;
    }

    /* Estilos CSS para el cintillo */
    .cintillo {
      padding: 100;
      text-align: center;
    }
    
    /* Estilos CSS para la fecha */
    .fecha {
      margin-top: 50px;
      text-align: right;
    }

    /* Estilos CSS para el número */
    .numero {
      margin: 40px;
      text-align: left;
    }

    /* Estilos CSS para el número */
    .destinatario {
      margin: 20px;
      margin-top: 50px;
      text-align: left;
    }

    /* Estilos CSS para el cuerpo del oficio */
    .contenido {
      margin: 20px;
      margin-top: 50px;
      text-align: justify;
      line-height: 1.5;
    }
    
    /* Estilos CSS para la firma y posfirma */
    .firma {
      margin-top: 50px;
      text-align: center;
    }
    
    /* Estilos CSS para las iniciales de revisión y elaboración */
    .iniciales {
      margin-top: 20px;
      text-align: left;
    }

    /* Estilos CSS para pie */
    .pie {
      padding: 100;
      text-align: center;
    }

    /* Estilos CSS para boton vista previa */
    .vista {
      margin-top: 20px;
      text-align: center;
    }

  </style>

</head>

<body>
  <div class="documento">
    <div class="cintillo">
      <!-- Logo del MPPE y otros órganos adscritos -->
      <img src="img/CINTILLO.png" alt="Logo MPPE">
    </div>

    <div class="fecha">
      <!-- Fecha -->
      <p>Fecha: 16 de enero de 2024</p>
    </div>

    <div class="numero">
      <!-- Número de designación -->
      <p>Oficio N°: P-001/2024</p>
    </div>

    <div class="destinatario">
      <!-- Destinatario -->
      <p>Ciudadano(a).</p>
      <p>Nombre del Destinatario</p>
      <p>Directora Asuntos Gremiales y Sindicales</p>
      <p>Su Despacho.</p>
    </div>

    <div class="contenido">

      <!-- Cuerpo del oficio -->
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut estesse, asperiores eaque totam nulla repudiandae quasi, deserunt culpa exercitationem blanditiis laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut estesse, asperiores eaque totam nulla repudiandae quasi, deserunt culpa exercitationem blanditiis laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
      
      <!-- Despedida o cierre del documento -->
      <center>
        <p>Atentamente,</p>
      </center>
      
      <!-- Firma y posfirma -->
      <div class="firma">
        <p>Firma del Remitente</p>
        <p>Cargo del Remitente</p>
      </div>
      
      <!-- Iniciales de revisión y elaboración -->
      <div class="iniciales">
        <p>XXYY/xxyy</p>
      </div>
    </div>

    <div class="pie">
      <p>DIRECCIÓN: Edificio Sede Esquina de Salas, Sótano 2, Oficina S-23. Teléfonos: 0212-5068177 / 0414-1221989.  e-mail: sirtrame@gmail.com</p>
    </div>

    
  </div>

  <div class="vista">
  
  <button onclick="printDocument()">Vista previa e imprimir</button>
  
  <script>
    function printDocument() {
      var printContents = document.getElementsByClassName("documento")[0].innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>



  </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\digitalpas\DigitalPAS\app\digitalpas\resources\views/layouts/plantillaOficio.blade.php ENDPATH**/ ?>