
# Cuestionario de PHP – Respuestas

---

## Preguntas Abiertas

### 1. Conceptos Básicos

PHP es un lenguaje de programación **del lado del servidor**, utilizado para crear páginas web dinámicas.  
**Diferencia con JavaScript:** JavaScript se ejecuta en el navegador (cliente), mientras que PHP se ejecuta en el servidor antes de enviar el contenido al navegador.

---

### 2. Tipos de Datos

PHP es de **tipado dinámico**, lo que significa que no es necesario declarar el tipo de una variable; PHP lo detecta automáticamente y puede cambiar en tiempo de ejecución.

``` php
$variable = 10;    // Entero
$variable = "Hola"; // Ahora es cadena
$variable = 3.14;   // Ahora es flotante
```

---

### 3. Arrays

* **Array indexado:** usa índices numéricos.

```php
$frutas = ["Manzana", "Banana", "Cereza"];
```

* **Array asociativo:** usa claves de tipo string.

```php
$persona = [
    "nombre" => "César",
    "edad" => 25
];
```

---

### 4. Funciones: require e include

* Ambas incluyen un archivo PHP dentro de otro.
* **Diferencia:**

  * `require`: genera **error fatal** si el archivo no existe y detiene la ejecución.
  * `include`: genera **warning** pero continúa ejecutando el script.

---

### 5. Programación Orientada a Objetos – Métodos mágicos

Los **métodos mágicos** empiezan con `__` y PHP los llama automáticamente en situaciones especiales.

* `__construct()`: se ejecuta al crear un objeto para inicializar propiedades.

```php
class Persona {
    public $nombre;
    public function __construct($nombre){
        $this->nombre = $nombre;
    }
}
$p = new Persona("César");
```

* `__toString()`: se ejecuta al imprimir un objeto como cadena.

```php
class Persona {
    public $nombre;
    public function __construct($nombre){
        $this->nombre = $nombre;
    }
    public function __toString(){
        return "Nombre: ".$this->nombre;
    }
}
$p = new Persona("César");
echo $p; // Nombre: César
```

---

## Preguntas Verdadero o Falso

| Pregunta | Respuesta | Justificación                                                           |
| -------- | --------- | ----------------------------------------------------------------------- |
| 1        | Falso     | PHP se ejecuta en el servidor, no en el navegador.                      |
| 2        | Falso     | PHP es de tipado dinámico; no se requiere declarar tipo.                |
| 3        | Verdadero | `count()` devuelve el número de elementos de un array.                  |
| 4        | Falso     | `return` es opcional; una función puede no devolver valor.              |
| 5        | Verdadero | Se usa `new` para crear instancias de clases.                           |
| 6        | Falso     | `true` y `false` deben ir en minúsculas; no son sensibles a mayúsculas. |
| 7        | Falso     | Para heredar se usa `extends`; `implements` es para interfaces.         |

---

## Preguntas de Múltiple Opción

1. **Etiqueta PHP:** `b) <?php ... ?>`
2. **Mostrar info detallada de variable:** `d) var_dump()`
3. **Array con claves string:** `c) Array asociativo`
4. **Acceder a propiedad no estática en un método:** `c) $this->propiedad`
5. **Función con argumentos variables:** `b) function miFuncion(...$args)`

    ```php
    function sumar(...$numeros){
        return array_sum($numeros);
    }
    echo sumar(1,2,3,4); // 10
    ```

6. **Resultado de (int)(25/7):** `c) 3`

    *Explicación:* 25/7 = 3.5714, al convertir a int se descarta la parte decimal.

Posdata: Estoy aprendiendo md, esto es con ayuda de Chatgpt, disculpe si hay algun error en el md.
