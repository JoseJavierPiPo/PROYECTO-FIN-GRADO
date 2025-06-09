
# Proyecto Sociedad de Cazadores ASIR - JOSÉ JAVIER PERERA MORENO 
Este repositorio contiene la infraestructura completa para desplegar una web con una base de datos PostgreSQL relacionada, creada para la gestión y funcionamiento de la siguiente 


## 🚀 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- **Sistema operativo compatible** (recomendado: Windows 11)
- **Docker Engine** (v24.0.0 o superior)
- **Docker Compose** (v2.20.0 o superior)


## 🔧 Pasos para Desplegar la Infraestructura

### 1. Clonar el repositorio / Descargar Archivo de Drive - PÁGINA DOCKER


git clone https://github.com/JoseJavierPiPo/PROYECTO-FIN-GRADO
cd PROYECTO-FIN-GRADO

```

### Construimos los contenedores con un 
```bash
docker-compose up --build

```

Verifica que todos los servicios estén corriendo:

```bash
docker ps

```

----------

## 🔎 Comprobación de Funcionamiento 

Ejemplo de conexión desde local:

```bash
http://localhost:8080/
```

### Paneles de Web

-   **Admin**: [http://localhost:8080/subp%C3%A1ginas/admin/areaprivadaadmin.php]
    
    -   Usuario: `12345678Z`
        
    -   Contraseña: `Shenhao`
        
-   **Socio**: [http://localhost:8080/subp%C3%A1ginas/admin/areaprivadaadmin.php]
    
    -   Usuario: `23456789X`
        
    -   Contraseña: `Juan`
        

## 📚 Más Información

Consulta el documento PDF incluido para ver los detalles técnicos completos sobre la instalación desde cero.
