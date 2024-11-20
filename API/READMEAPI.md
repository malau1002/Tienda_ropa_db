# Documentación de la API - Tienda de Ropa

Este archivo describe la API de la tienda de ropa. La API permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre los datos de la tienda, tales como prendas, categorías y clientes.

## Endpoints de la API

### 1. Endpoints para Prendas

#### 1.1 Obtener todas las prendas
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/prendas/`
- Descripción: Obtiene una lista de todas las prendas disponibles en la tienda.
- Ejemplo de respuesta:
  ```json
  [
    {
      "id": 1,
      "nombre": "Camiseta",
      "precio": 20.00,
      "categoria_id": 2,
      "descripcion": "Camiseta de algodón"
    },
    {
      "id": 2,
      "nombre": "Pantalón",
      "precio": 35.00,
      "categoria_id": 1,
      "descripcion": "Pantalón de mezclilla"
    }
  ]

#### 1.2 Obtener prenda por ID
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/prenda/{id_prenda}`
- Descripción: Obtiene los detalles de una prenda específica.
- Ejemplo de respuesta:
  ```json
  [
    {
      "id": 1,
      "nombre": "Camiseta",
      "precio": 20.00,
      "categoria_id": 2,
      "descripcion": "Camiseta de algodón"
    }
  ]

#### 1.3 Insertar nueva prenda
- Método: `POST`
- URL: `http://localhost/api/tienda/public/index.php/prendas/`
- Descripción: Crea una nueva prenda en la tienda.
- Cuerpo de la solicitud:
  ```json
  [
    {
      "nombre": "Sudadera",
    "precio": 50.00,
    "categoria_id": 3,
    "descripcion": "Sudadera con capucha"
    }
  ]
- Ejemplo de respuesta:
    {
      "message": "Prenda creada exitosamente.",
      "id": 3
    }

#### 1.4 Actualizar prenda
- Método: `PUT`
- URL: `http://localhost/api/tienda/public/index.php/prenda/{id_prenda}`
- Descripción: Actualiza los detalles de una prenda existente.
- Parametro:
    id_prenda: El ID de la prenda que deseas actualizar.
- Cuerpo de la solicitud:
  ```json
  [
    {
     "nombre": "Camiseta de manga larga",
    "precio": 22.00,
    "categoria_id": 2,
    "descripcion": "Camiseta de manga larga de algodón"
    }
  ]
- Ejemplo de respuesta:
    {
      "message": "Prenda actualizada exitosamente."
    }

#### 1.5 Eliminar prenda
- Método: `DELETE`
- URL: `http://localhost/api/tienda/public/index.php/prenda/{id_prenda}`
- Descripción: Elimina una prenda específica de la tienda.
- Parametro:
    id_prenda: El ID de la prenda que deseas eliminar.
- Ejemplo de respuesta:
  ```json
  [
    {
      "message": "Prenda eliminada exitosamente."
    }
  ]

### 2. Endpoints para Categorías

#### 2.1 Obtener todas las categorías
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/categorias/`
- Descripción: Obtiene una lista de todas las categorías de productos disponibles.
- Ejemplo de respuesta:
  ```json
  [
    {
     {
    "id": 1,
    "nombre": "Pantalones"
  },
  {
    "id": 2,
    "nombre": "Camisetas"
  }
    }
    
  ]

#### 2.2 Obtener categoría por ID
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/categoria/{id_categoria}`
- Descripción:  Obtiene los detalles de una categoría específica.
- Parametro:  
    id_categoria: El ID de la categoría que deseas consultar.
- Ejemplo de respuesta:
  ```json
  [
    {
  "id": 1,
  "nombre": "Pantalones"
}
]

### 3. Endpoints para Clientes

#### 3.1 Obtener todos los clientes
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/clientes/`
- Descripción: Obtiene una lista de todos los clientes registrados.
- Ejemplo de respuesta:
  ```json
  [
    {
     {
   "id": 1,
    "nombre": "Juan Pérez",
    "correo": "juan@example.com"
  },
  {
   "id": 2,
    "nombre": "María Gómez",
    "correo": "maria@example.com"
  }
    }
    
  ]

#### 3.2 Obtener cliente por ID
- Método: `GET`
- URL: `http://localhost/api/tienda/public/index.php/cliente/{id_cliente}`
- Descripción:  Obtiene los detalles de un cliente específico.
- Parametro:
    id_cliente: El ID del cliente que deseas consultar.
- Ejemplo de respuesta:
  ```json
  [
    {
     {
   "id": 1,
  "nombre": "Juan Pérez",
  "correo": "juan@example.com"
  }
  
    }
    
  ]

#### 3.3 Insertar nuevo cliente
- Método: `POST`
- URL: `http://localhost/api/tienda/public/index.php/clientes/`
- Descripción: Crea un nuevo cliente en el sistema.
- Cuerpo de solicitud:
    "nombre": "Carlos López",
    "correo": "carlos@example.com"
- Ejemplo de respuesta:
  ```json
  [
    {
     {
   "message": "Cliente creado exitosamente.",
   "id": 3
    } 
    }  
  ]

#### 3.4 Actualizar cliente
- Método: `PUT`
- URL: `http://localhost/api/tienda/public/index.php/cliente/{id_cliente}`
- Descripción: Actualiza los detalles de un cliente existente.
- Parametro:
    id_cliente: El ID del cliente que deseas actualizar.
- Cuerpo de solicitud:
    {
  "nombre": "Carlos López Martínez",
  "correo": "carlos.martinez@example.com"
}
- Ejemplo de respuesta:
  ```json
  [
    {
     {
   "message": "Cliente actualizado exitosamente.",
   
    } 
    }  
  ]

#### 3.5 Eliminar cliente
- Método: `DELETE`
- URL: `http://localhost/api/tienda/public/index.php/cliente/{id_cliente}`
- Descripción:  Elimina un cliente del sistema..
- Parametro:
    id_cliente:  El ID del cliente que deseas eliminar.
- Ejemplo de respuesta:
  ```json
  [
    {
     {
   "message": "Cliente eliminado exitosamente.",
   
    } 
    }  
  ]