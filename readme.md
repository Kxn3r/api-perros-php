# API Perros PHP
Busqueda
## Descripción
Aplicación web desarrollada durante el Técnico en Programación de Software (SENA). Permite ver imágenes de perros por raza usando una API externa, y forma parte de un taller con otros módulos (libros y posts).

## Objetivo
Practicar el consumo de una API externa con PHP, mostrar los datos en una página web y manejar errores, dejando el proceso documentado con Git y GitHub.

## Capturas de pantalla
![Captura final del proyecto](evidencias/prueba1.jpeg)
![Captura final del proyecto](evidencias/prueba2.jpeg)
## Tecnologías
- HTML
- CSS
- PHP (cURL)
- API externa: Dog CEO
- Git
- GitHub

## Funcionalidades
- Buscar imágenes de perros por raza.
- Elegir cuántos perros mostrar (5, 10 o 20) con un selector.
- Ver perros aleatorios si no se escribe ninguna raza.
- Validar que la raza tenga solo letras.
- Mostrar mensajes claros cuando la raza no existe o el servicio no responde.
- Menú principal con diseño adaptable a celular.

## Estructura
```
Ficha 3538620/
├── readme.md        Explicación del proyecto
├── index.php        Menú principal
├── perros.php       Página de perros por raza
├── libros.php       Página de libros
├── posts.php        Página de posts
├── funciones.php    Funciones que consultan APIs con cURL
├── styles.css       Estilos de la página
└── evidencias/      Capturas del proyecto
```

## API utilizada
Dog CEO API (https://dog.ceo/dog-api/), pública y gratuita, sin clave.

**Endpoints principales:**

| Uso | Dirección |
|---|---|
| Perros aleatorios | `https://dog.ceo/api/breeds/image/random/{cantidad}` |
| Perros de una raza | `https://dog.ceo/api/breed/{raza}/images/random/{cantidad}` |

**Ejemplo de respuesta JSON:**
```json
{
  "message": [
    "https://images.dog.ceo/breeds/husky/ejemplo1.jpg",
    "https://images.dog.ceo/breeds/husky/ejemplo2.jpg"
  ],
  "status": "success"
}
```

## Flujo de la aplicación
```
Usuario
  ↓
Formulario HTML (raza y cantidad)
  ↓
perros.php valida los datos
  ↓
funciones.php consulta la API con cURL
  ↓
La API responde en JSON
  ↓
perros.php procesa la respuesta
  ↓
Se muestran las imágenes o un mensaje de error
```

## Ejecución
1. Clonar el repositorio.
2. Abrirlo en Visual Studio Code.
3. Copiar la carpeta en `htdocs` (XAMPP) o equivalente.
4. Iniciar Apache.
5. Abrir `http://localhost/ficha3538620_php/Clase10/index.php` en el navegador.

## Limitaciones conocidas
- Depende de que la API externa esté funcionando y de tener internet.
- Solo se pueden buscar razas principales escritas en inglés (por ejemplo `hound`, `beagle`, `pug`).
- La página de perros todavía tiene un diseño muy sencillo.

## Aprendizajes logrados
- Trabajar con ramas, commits, Issues y Pull Requests en GitHub.
- Consumir una API con PHP y cURL.
- Validar datos del usuario y controlar errores.
- Documentar un proyecto para que otra persona pueda ejecutarlo.

## Autor
Keyner Guasca - Ficha 3538620
Diyer Arlexis - Ficha 3538620

Técnico en Programación de Software - SENA