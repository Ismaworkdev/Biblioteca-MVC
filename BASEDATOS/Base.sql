
CREATE TABLE USUARIOS (
    id_user VARCHAR(50) PRIMARY KEY ,
    nombre VARCHAR(50) NOT NULL,
    ape1 VARCHAR(50) NOT NULL,
    ape2 VARCHAR(50) NOT NULL,
    rol VARCHAR(50) NOT NULL
);


CREATE TABLE LIBROS (
    ISBN VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL
);



CREATE TABLE PRESTAMOS (
    id_user VARCHAR(50) NOT NULL ,
    ISBN VARCHAR(13) NOT NULL,
    fecha_desde DATE NOT NULL,
    fecha_hasta DATE NOT NULL,
    PRIMARY KEY (id_user, ISBN),
CONSTRAINT FOREIGN KEY (id_user) REFERENCES USUARIOS(id_user),
 CONSTRAINT FOREIGN KEY (ISBN) REFERENCES LIBROS(ISBN)
);

-- Insert 5 users
INSERT INTO USUARIOS (id_user, nombre, ape1, ape2, rol) VALUES
('1', 'admin', 'admin', 'admin', '0'),
('2', 'María', 'López', 'Martínez', '1'),
('3', 'Carlos', 'Sánchez', 'Rodríguez', '1'),
('4', 'Ana', 'González', 'Hernández', '1'),
('5', 'Luis', 'Martín', 'Díaz', '1');

-- Insert 5 books
INSERT INTO LIBROS (ISBN, titulo, autor) VALUES
('9781234567890', 'El Quijote', 'Miguel de Cervantes'),
('9781234567891', 'Cien Años de Soledad', 'Gabriel García Márquez'),
('9781234567892', 'La Sombra del Viento', 'Carlos Ruiz Zafón'),
('9781234567893', 'Donde los Árboles Cantan', 'Laura Gallego'),
('9781234567894', 'La Casa de los Espíritus', 'Isabel Allende');

-- Insert 10 loans
INSERT INTO PRESTAMOS (id_user, ISBN, fecha_desde, fecha_hasta) VALUES
('1', '9781234567890', '2024-01-01', '2024-01-15'),
('2', '9781234567891', '2024-01-02', '2024-01-16'),
('3', '9781234567892', '2024-01-03', '2024-01-17'),
('4', '9781234567893', '2024-01-04', '2024-01-18'),
('5', '9781234567894', '2024-01-05', '2024-01-19'),
('1', '9781234567891', '2024-01-06', '2024-01-20'),
('2', '9781234567892', '2024-01-07', '2024-01-21'),
('3', '9781234567893', '2024-01-08', '2024-01-22'),
('4', '9781234567894', '2024-01-09', '2024-01-23'),
('5', '9781234567890', '2024-01-10', '2024-01-24');
