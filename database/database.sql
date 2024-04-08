CREATE DATABASE IF NOT EXISTS ProyectoPHP;

USE ProyectoPHP;

CREATE TABLE Empleado (
    id_empleado INT PRIMARY KEY NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tipo_usuario ENUM('gerente', 'empleado', 'RRHH', 'CEO', 'marketing') DEFAULT 'empleado' 
    -- gerente | empleado | RRHH (recursos humanos) | CEO | marketing
);

CREATE TABLE Tarea (
    id_tarea INT PRIMARY KEY NOT NULL,
    titulo VARCHAR(50),
    descripcion VARCHAR(50)   
);

CREATE TABLE Empleado_Tarea (
    id_empleado INT,
    id_tarea INT,
    fecha_entrega DATE,

    FOREIGN KEY (id_empleado) REFERENCES Empleado(id_empleado),
    FOREIGN KEY (id_tarea) REFERENCES Tarea(id_tarea)
);

CREATE TABLE Asistencia (
    id_asistencia INT PRIMARY KEY NOT NULL,
    id_empleado INT,
    fecha DATE,
    hora_entrada TIME,
    hora_salida TIME,

    FOREIGN KEY (id_empleado) REFERENCES Empleado(id_empleado)
);