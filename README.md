# CELS // Violencia policial
Violencia policial es una plataforma que reúne datos actualizados sobre lesiones y muertes producidas por las fuerzas de seguridad argentinas para contribuir a monitorear sus intervenciones y orientar políticas de seguridad desde una perspectiva de derechos humanos.


## Setup
Para ejecutar la plataforma, solo basta con realizar una ejecucion de php server en local.

		php -S localhost:8000

Luego, con abrir una web en http://localhost:8000 funcionará todo :-)


## Actualización de visualizaciones
Para realizar la actualización de las visualizaciones se deben exportar los archivos de UWUAZI a un JSON, debido a que la API no soporta la integración total o los parámetros de búsqueda como fue visto durante el desarrollo.
Para eso debe subir vía FTP a la carpeta /data  y actualizar 
- f.json > Desde Funcionarnos
- h.json > Desde Hechos
- v.json > Desde Victimas.
