<!DOCTYPE html>
<html>
<head>
    <title>Carnet Sindical</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        .carnet {
            width: 300px;
            height: 400px;
            border: 1px solid #000;
            margin: 0 auto;
            padding: 20px;
        }
        
        .photo {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            background-color: #ccc;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        
        .info {
            text-align: left;
            margin-bottom: 20px;
        }
        
        .info p {
            margin: 0;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="imp">
        <div class="carnet">
            <div class="photo">
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </div>
            <div class="info">
                <p><strong>Nombre:</strong> Juan Pérez</p>
                <p><strong>Cargo:</strong> Desarrollador Web</p>
                <p><strong>Departamento:</strong> Tecnología</p>
                <p><strong>Fecha de inicio:</strong> 01/01/2024</p>
            </div>
        </div>
    </div>


    <div class="vista">
          <button onclick="printDocument()">Vista previa e imprimir</button>
          
          <script>
            function printDocument() {
              var printContents = document.getElementsByClassName("imp")[0].innerHTML;
              var originalContents = document.body.innerHTML;
              document.body.innerHTML = printContents;
              window.print();
              document.body.innerHTML = originalContents;
            }
          </script>
    </div>

    


</body>
</html>
<?php /**PATH C:\xampp\htdocs\DigitalPAS\app\digitalpas\resources\views/layouts/plantillaCarnet.blade.php ENDPATH**/ ?>